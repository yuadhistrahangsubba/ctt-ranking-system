<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;

class DownloadController extends Controller
{
    public function downloadSoc(Request $request){
        $students = DB::table('students')
                        ->select('INDEX_NO', 'NAME', 'DOB', 'CID', 'SCHOOL', 'SUB1','MKS1','SUB2','MKS2','SUB3','MKS3','SUB4','MKS4','SUB5','MKS5','SUB6','MKS6','TOTAL')
                        ->where('SOC', '=', '1')
                        ->orderBy('TOTAL', 'desc')
                        ->get();

        if ($students->isEmpty()) {
            return redirect()->back()->with('error', 'No students found');
        }

        $csvFileName = 'SOC.csv';

        $handle = fopen('php://memory', 'r+');

        $header = array_keys((array) $students[0]);
        $header[] = 'Rank'; // Adding Rank column to the header
        fputcsv($handle, $header);

        $rank = 1; // Initializing the rank counter

        foreach ($students as $row) {
            unset($row->created_at, $row->updated_at);
            $rowData = (array) $row;
            $rowData['Rank'] = $rank++; // Adding rank to each row
            fputcsv($handle, $rowData);
        }

        rewind($handle);

        $content = stream_get_contents($handle);
        fclose($handle);

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $csvFileName . '"',
        ];

        return response($content, 200, $headers);
    }

    public function downloadSidd(Request $request){
        $students = DB::table('students')
                        ->select('INDEX_NO', 'NAME', 'DOB', 'CID', 'SCHOOL', 'SUB1','MKS1','SUB2','MKS2','SUB3','MKS3','SUB4','MKS4','SUB5','MKS5','SUB6','MKS6','TOTAL')
                        ->where('SIDD', '=', '1')
                        ->orderBy('TOTAL', 'desc')
                        ->get();

        if ($students->isEmpty()) {
            return redirect()->back()->with('error', 'No students found');
        }

        $csvFileName = 'SIDD.csv';

        $handle = fopen('php://memory', 'r+');

        $header = array_keys((array) $students[0]);
        $header[] = 'Rank'; // Adding Rank column to the header
        fputcsv($handle, $header);

        $rank = 1; // Initializing the rank counter

        foreach ($students as $row) {
            unset($row->created_at, $row->updated_at);
            $rowData = (array) $row;
            $rowData['Rank'] = $rank++; // Adding rank to each row
            fputcsv($handle, $rowData);
        }

        rewind($handle);

        $content = stream_get_contents($handle);
        fclose($handle);

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $csvFileName . '"',
        ];

        return response($content, 200, $headers);
    }


    public function downloadAll(Request $request){
            $students = DB::table('students')->select('INDEX_NO', 'NAME', 'DOB', 'CID', 'SCHOOL', 'SUB1','MKS1','SUB2','MKS2','SUB3','MKS3','SUB4','MKS4','SUB5','MKS5','SUB6','MKS6','TOTAL','year','SOC','SIDD')->get();

            if ($students->isEmpty()) {
                return response()->json(['error' => 'No students found'], 404);
            }

            $csvFileName = 'students.csv';

            $handle = fopen('php://memory', 'r+');

            $header = array_keys((array) $students[0]);
            fputcsv($handle, $header);

            foreach ($students as $row) {
                unset($row->created_at, $row->updated_at);
                fputcsv($handle, (array) $row);
            }

            rewind($handle);

            $content = stream_get_contents($handle);
            fclose($handle);

            $csvFileName = 'Student.csv';

            $headers = [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="' . $csvFileName . '"',
            ];

            return response($content, 200, $headers);
    }

    //Admission Officer
    public function downloadAoSoc(Request $request){
        $students = DB::table('students')
                        ->select('INDEX_NO', 'NAME', 'DOB', 'CID', 'SCHOOL', 'SUB1','MKS1','SUB2','MKS2','SUB3','MKS3','SUB4','MKS4','SUB5','MKS5','SUB6','MKS6','TOTAL')
                        ->where('SOC', '=', '1')
                        ->orderBy('TOTAL', 'desc')
                        ->get();

        if ($students->isEmpty()) {
            return redirect()->back()->with('error', 'No students found');
        }

        $csvFileName = 'SOC.csv';

        $handle = fopen('php://memory', 'r+');

        $header = array_keys((array) $students[0]);
        $header[] = 'Rank'; // Adding Rank column to the header
        fputcsv($handle, $header);

        $rank = 1; // Initializing the rank counter

        foreach ($students as $row) {
            unset($row->created_at, $row->updated_at);
            $rowData = (array) $row;
            $rowData['Rank'] = $rank++; // Adding rank to each row
            fputcsv($handle, $rowData);
        }

        rewind($handle);

        $content = stream_get_contents($handle);
        fclose($handle);

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $csvFileName . '"',
        ];

        return response($content, 200, $headers);
    }

    public function downloadAoSidd(Request $request){
        $students = DB::table('students')
                        ->select('INDEX_NO', 'NAME', 'DOB', 'CID', 'SCHOOL', 'SUB1','MKS1','SUB2','MKS2','SUB3','MKS3','SUB4','MKS4','SUB5','MKS5','SUB6','MKS6','TOTAL')
                        ->where('SIDD', '=', '1')
                        ->orderBy('TOTAL', 'desc')
                        ->get();

        if ($students->isEmpty()) {
            return redirect()->back()->with('error', 'No students found');
        }

        $csvFileName = 'SIDD.csv';

        $handle = fopen('php://memory', 'r+');

        $header = array_keys((array) $students[0]);
        $header[] = 'Rank'; // Adding Rank column to the header
        fputcsv($handle, $header);

        $rank = 1; // Initializing the rank counter

        foreach ($students as $row) {
            unset($row->created_at, $row->updated_at);
            $rowData = (array) $row;
            $rowData['Rank'] = $rank++; // Adding rank to each row
            fputcsv($handle, $rowData);
        }

        rewind($handle);

        $content = stream_get_contents($handle);
        fclose($handle);

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $csvFileName . '"',
        ];

        return response($content, 200, $headers);
    }


    public function downloadAoStudent(Request $request){
            $students = DB::table('students')->select('INDEX_NO', 'NAME', 'DOB', 'CID', 'SCHOOL', 'SUB1','MKS1','SUB2','MKS2','SUB3','MKS3','SUB4','MKS4','SUB5','MKS5','SUB6','MKS6','TOTAL','year','SOC','SIDD')->get();

            if ($students->isEmpty()) {
                return response()->json(['error' => 'No students found'], 404);
            }

            $csvFileName = 'students.csv';

            $handle = fopen('php://memory', 'r+');

            $header = array_keys((array) $students[0]);
            fputcsv($handle, $header);

            foreach ($students as $row) {
                unset($row->created_at, $row->updated_at);
                fputcsv($handle, (array) $row);
            }

            rewind($handle);

            $content = stream_get_contents($handle);
            fclose($handle);

            $csvFileName = 'Student.csv';

            $headers = [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="' . $csvFileName . '"',
            ];

            return response($content, 200, $headers);
    }
    // student
    public function studentDownloadSoc(Request $request){
        $students = DB::table('students')
                        ->select('INDEX_NO', 'NAME', 'DOB', 'CID', 'SCHOOL', 'SUB1','MKS1','SUB2','MKS2','SUB3','MKS3','SUB4','MKS4','SUB5','MKS5','SUB6','MKS6','TOTAL')
                        ->where('SOC', '=', '1')
                        ->orderBy('TOTAL', 'desc')
                        ->get();

        if ($students->isEmpty()) {
            return redirect()->back()->with('error', 'No students found');
        }

        $csvFileName = 'SOC.csv';

        $handle = fopen('php://memory', 'r+');

        $header = array_keys((array) $students[0]);
        $header[] = 'Rank'; // Adding Rank column to the header
        fputcsv($handle, $header);

        $rank = 1; // Initializing the rank counter

        foreach ($students as $row) {
            unset($row->created_at, $row->updated_at);
            $rowData = (array) $row;
            $rowData['Rank'] = $rank++; // Adding rank to each row
            fputcsv($handle, $rowData);
        }

        rewind($handle);

        $content = stream_get_contents($handle);
        fclose($handle);

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $csvFileName . '"',
        ];

        return response($content, 200, $headers);
    }

    public function studentDownloadSid(Request $request){
        $students = DB::table('students')
                        ->select('INDEX_NO', 'NAME', 'DOB', 'CID', 'SCHOOL', 'SUB1','MKS1','SUB2','MKS2','SUB3','MKS3','SUB4','MKS4','SUB5','MKS5','SUB6','MKS6','TOTAL')
                        ->where('SIDD', '=', '1')
                        ->orderBy('TOTAL', 'desc')
                        ->get();

        if ($students->isEmpty()) {
            return redirect()->back()->with('error', 'No students found');
        }

        $csvFileName = 'SIDD.csv';

        $handle = fopen('php://memory', 'r+');

        $header = array_keys((array) $students[0]);
        $header[] = 'Rank'; // Adding Rank column to the header
        fputcsv($handle, $header);

        $rank = 1; // Initializing the rank counter

        foreach ($students as $row) {
            unset($row->created_at, $row->updated_at);
            $rowData = (array) $row;
            $rowData['Rank'] = $rank++; // Adding rank to each row
            fputcsv($handle, $rowData);
        }

        rewind($handle);

        $content = stream_get_contents($handle);
        fclose($handle);

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $csvFileName . '"',
        ];

        return response($content, 200, $headers);
    }
}
