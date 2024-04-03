<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function viewRequest($INDEX_NO)
    {   //dd($INDEX_NO);
        $student = Student::where('INDEX_NO', $INDEX_NO)->first();
        // dd($student);

        return view('admin.viewRequest', ['student' => $student]);
    }

    public function deleteRequest($INDEX_NO)
    {
        $student = Student::where('INDEX_NO', $INDEX_NO)->first();

        if ($student) {
            $student->delete();
            return redirect()->back()->with('success', 'Student Request deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Student not found.');
        }
    }

    public function editRequest($INDEX_NO)
    {
        $student = Student::where('INDEX_NO', $INDEX_NO)->first();

        return view('admin.editRequest', ['student' => $student]);
    }

    public function updateRequest(Request $request, $INDEX_NO)
    {
        $student = Student::where('INDEX_NO', $INDEX_NO)->first();

        if ($student) {
            $student->update($request->all());
            return redirect()->back()->with('success', 'Student updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Student not found.');
        }
    }
}
