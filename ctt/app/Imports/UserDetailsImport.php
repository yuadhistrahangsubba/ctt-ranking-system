<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Events\AfterImport;
use Illuminate\Support\Collection;
use App\Models\Student;

class UserDetailsImport implements ToModel, WithHeadingRow, WithEvents
{
    protected $socRankings = [];
    protected $siddRankings = [];

    public function model(array $row)
    {
        $subjects = ['sub1', 'sub2', 'sub3', 'sub4', 'sub5', 'sub6'];
        $marks = [
            intval($row['mks1']),
            intval($row['mks2']),
            intval($row['mks3']),
            intval($row['mks4']),
            intval($row['mks5']),
            intval($row['mks6']),
        ];

        $conditionsMet = false;
        $total = 0;

        foreach ($subjects as $key => $subject) {
            if (in_array($row[$subject], ['MAT', 'BMT']) && $marks[$key] > 50) {
                $conditionsMet = true;
                break;
            }
        }

        if ($conditionsMet) {
            foreach ($subjects as $key => $subject) {
                if (in_array($row[$subject], ['MAT', 'BMT'])) {
                    $total += $marks[$key] * 5;
                } elseif ($row[$subject] === 'ENG') {
                    $total += $marks[$key] * 2;
                }
            }

            $otherSubjects = [];
            $otherMarks = [];

            $otherSubjectsList = ['DZO', 'ECO', 'PHY', 'CHE', 'BENT', 'ACC', 'COM', 'HIS', 'GEO', 'AGFS', 'MED', 'BIO', 'RIGE', 'EVS'];

            foreach ($subjects as $key => $subject) {
                if (in_array($row[$subject], $otherSubjectsList)) {
                    $otherSubjects[] = $row[$subject];
                    $otherMarks[] = $marks[$key];
                }
            }

            arsort($otherMarks);

            $top3OtherSubjects = array_slice($otherMarks, 0, 3, true);

            foreach ($top3OtherSubjects as $subject => $mark) {
                $total += intval($mark);
            }

            $userDetails = new Student([
                'INDEX_NO' => $row['index_no'],
                'NAME' => $row['name'],
                'DOB' => $row['dob'],
                'CID' => $row['cid'],
                'SCHOOL' => $row['school'],
                'SUB1' => $row['sub1'],
                'MKS1' => $row['mks1'],
                'SUB2' => $row['sub2'],
                'MKS2' => $row['mks2'],
                'SUB3' => $row['sub3'],
                'MKS3' => $row['mks3'],
                'SUB4' => $row['sub4'],
                'MKS4' => $row['mks4'],
                'SUB5' => $row['sub5'],
                'MKS5' => $row['mks5'],
                'SUB6' => $row['sub6'],
                'MKS6' => $row['mks6'],
                'TOTAL' => $total,
                // 'SOC' => isset($row['soc']) ? $row['soc'] === 'false' : true,
                // 'SIDD' => isset($row['sidd']) ? $row['sidd'] === 'false' : true,
                'SOC' => isset($row['soc']) ? $row['soc'] === 'true' : false,
                'SIDD' => isset($row['sidd']) ? $row['sidd'] === 'true' : false,

                'SOC_RANKING' => null,
                'SIDD_RANKING' => null,
                'ELIGIBILITY' => 'Eligible',
            ]);

            $this->socRankings[] = [
                'total' => $total,
                'user' => $userDetails,
            ];

            $this->siddRankings[] = [
                'total' => $total,
                'user' => $userDetails,
            ];

            return $userDetails;
        }

        Student::create([
            'INDEX_NO' => $row['index_no'],
            'NAME' => $row['name'],
            'DOB' => $row['dob'],
            'CID' => $row['cid'],
            'SCHOOL' => $row['school'],
            'SUB1' => $row['sub1'],
            'MKS1' => $row['mks1'],
            'SUB2' => $row['sub2'],
            'MKS2' => $row['mks2'],
            'SUB3' => $row['sub3'],
            'MKS3' => $row['mks3'],
            'SUB4' => $row['sub4'],
            'MKS4' => $row['mks4'],
            'SUB5' => $row['sub5'],
            'MKS5' => $row['mks5'],
            'SUB6' => $row['sub6'],
            'MKS6' => $row['mks6'],
            'TOTAL' => $total,
            'SOC' => isset($row['soc']) ? $row['soc'] === 'true' : false,
            'SIDD' => isset($row['sidd']) ? $row['sidd'] === 'true' : false,

            'SOC_RANKING' => null,
            'SIDD_RANKING' => null,
            'ELIGIBILITY' => 'Not Eligible',
        ]);

        return null;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
            },
            BeforeSheet::class => function (BeforeSheet $event) {
            },
            AfterImport::class => function (AfterImport $event) {
                $this->onEnd(collect([]));
            },
        ];
    }

    public function onEnd(Collection $collection)
{
    $users = Student::all();

    $socUsers = $users->filter(function ($user) {
        return $user->SOC;
    });

    $siddUsers = $users->filter(function ($user) {
        return $user->SIDD;
    });

Student::where('SOC', false)->update(['SOC_RANKING' => null]);
Student::where('SIDD', false)->update(['SIDD_RANKING' => null]);

$validUsers = $users->filter(function ($user) {
    return $user->SOC && $user->SIDD;
});

$this->setRankings($validUsers, 'SOC_RANKING');
$this->setRankings($socUsers, 'SOC_RANKING');
$this->setRankings($siddUsers, 'SIDD_RANKING');
}


private function setRankings($users, $rankingColumn)
{
    // Filter out users with null values in the ranking column
    $validUsers = collect($users)->filter(function ($user) {
        return $user !== null && $user->TOTAL !== null;
    });

    $sortedUsers = $validUsers->sortByDesc(function ($user) {
        return [
            $user->TOTAL,
            $user->MKS1 + $user->MKS2 + $user->MKS3 + $user->MKS4 + $user->MKS5 + $user->MKS6,
        ];
    });

    $currentRank = 0;
    $previousTotal = null;
    $previousMatBmt = null;
    $previousOtherMarks = null;

    foreach ($sortedUsers as $user) {
        $total = $user->TOTAL;
        $userMatBmt = $user->MKS1 + $user->MKS2 + $user->MKS3 + $user->MKS4 + $user->MKS5 + $user->MKS6;

        if ($total === $previousTotal) {
            if ($userMatBmt !== $previousMatBmt) {
                $currentRank++;
            } else {
                $otherSubjects = ['MKS2', 'MKS3', 'MKS4', 'MKS5', 'MKS6'];
                $userOtherMarks = 0;

                foreach ($otherSubjects as $subject) {
                    $userOtherMarks += $user->$subject;
                }

                if ($userOtherMarks !== $previousOtherMarks) {
                    $currentRank++;
                }
            }
        } else {
            $currentRank++;
        }

        $user->$rankingColumn = $currentRank;
        $user->save();

        $previousTotal = $total;
        $previousMatBmt = $userMatBmt;
        $previousOtherMarks = $userOtherMarks ?? null;
    }
}
}
