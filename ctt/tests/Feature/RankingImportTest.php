<?php

namespace Tests\Feature;

use App\Models\Student;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Tests\TestCase;

/**
 * Characterization test for the marks upload: pins down how the current code
 * scores, marks eligibility and ranks students, so framework upgrades can be
 * checked against it. It records existing behaviour, quirks included.
 */
class RankingImportTest extends TestCase
{
    use RefreshDatabase;

    private const HEADINGS = [
        'index_no', 'name', 'dob', 'cid', 'school',
        'sub1', 'mks1', 'sub2', 'mks2', 'sub3', 'mks3',
        'sub4', 'mks4', 'sub5', 'mks5', 'sub6', 'mks6',
        'soc', 'sidd',
    ];

    public function test_admin_upload_scores_and_ranks_students(): void
    {
        $admin = User::forceCreate([
            'cid' => 11111111111,
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'phone' => 17000000,
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        $file = $this->spreadsheet([
            // A: eligible. 90*5 + 80*2 + best three others (70, 65, 60) = 805
            ['0001', 'Student A', '2005-01-01', '10000000001', 'School X',
                'ENG', 80, 'MAT', 90, 'DZO', 70, 'PHY', 60, 'CHE', 65, 'BIO', 50, 'true', 'true'],
            // B: Math is not above 50, so not eligible and TOTAL stays 0
            ['0002', 'Student B', '2005-02-02', '10000000002', 'School X',
                'ENG', 90, 'MAT', 45, 'DZO', 90, 'PHY', 90, 'CHE', 90, 'BIO', 90, 'true', 'false'],
            // C: eligible. 85*5 + 70*2 + (75, 60, 55) = 755
            ['0003', 'Student C', '2005-03-03', '10000000003', 'School Y',
                'ENG', 70, 'MAT', 85, 'DZO', 60, 'ECO', 75, 'GEO', 55, 'HIS', 50, 'true', 'false'],
            // D: eligible via BMT. 95*5 + 60*2 + (70, 70, 70) = 805, ties with A
            ['0004', 'Student D', '2005-04-04', '10000000004', 'School Z',
                'ENG', 60, 'BMT', 95, 'DZO', 50, 'PHY', 70, 'CHE', 70, 'BIO', 70, 'false', 'true'],
        ]);

        $this->actingAs($admin)
            ->post(route('import-data'), ['file' => $file])
            ->assertRedirect()
            ->assertSessionHas('success');

        $this->assertSame(4, Student::count());

        $expected = [
            //        TOTAL  ELIGIBILITY     SOC_RANKING SIDD_RANKING
            '0001' => [805, 'Eligible',     1,    1],
            '0002' => [0,   'Not Eligible', 3,    null], // ineligible students still get an SOC rank
            '0003' => [755, 'Eligible',     2,    null],
            '0004' => [805, 'Eligible',     null, 2],    // tie with A broken by marks
        ];

        foreach ($expected as $index => [$total, $eligibility, $socRank, $siddRank]) {
            $student = Student::findOrFail($index);
            $this->assertSame($total, (int) $student->TOTAL, "TOTAL for $index");
            $this->assertSame($eligibility, $student->ELIGIBILITY, "ELIGIBILITY for $index");
            $this->assertSame($socRank, $student->SOC_RANKING === null ? null : (int) $student->SOC_RANKING, "SOC_RANKING for $index");
            $this->assertSame($siddRank, $student->SIDD_RANKING === null ? null : (int) $student->SIDD_RANKING, "SIDD_RANKING for $index");
        }
    }

    public function test_non_admin_cannot_upload(): void
    {
        $student = User::forceCreate([
            'cid' => 22222222222,
            'name' => 'Student',
            'email' => 'student@example.com',
            'phone' => 17000001,
            'password' => bcrypt('password'),
            'role' => 'student',
        ]);

        $this->actingAs($student)
            ->post(route('import-data'), ['file' => $this->spreadsheet([])])
            ->assertNotFound();

        $this->assertSame(0, Student::count());
    }

    private function spreadsheet(array $rows): UploadedFile
    {
        $sheet = new Spreadsheet();
        $sheet->getActiveSheet()->fromArray([self::HEADINGS, ...$rows]);

        $path = tempnam(sys_get_temp_dir(), 'marks').'.xlsx';
        (new Xlsx($sheet))->save($path);

        return new UploadedFile($path, 'marks.xlsx', null, null, true);
    }
}
