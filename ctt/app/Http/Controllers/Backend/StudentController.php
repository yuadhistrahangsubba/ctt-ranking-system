<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\feedback;

class StudentController extends Controller
{
    public function viewAllStudents()
    {
        return view('admin.viewAll');
    }

    public function viewCreateStudent()
    {
        return view('admin.createStudent');
    }

    public function viewStudent($INDEX_NO)
    {
        $student = Student::where('INDEX_NO', $INDEX_NO)->first();
        return view('admin.viewStudent', ['student' => $student]);
    }

    public function studentPost(Request $request) {
        $student = new Student();

        $student->INDEX_NO = $request->INDEX_NO;
        $student->CID = $request->CID;
        $student->NAME = $request->NAME;
        $student->DOB = $request->DOB;
        $student->SCHOOL = $request->SCHOOL;
        $student->year = $request->year;

        $student->SUB1 = 'ENG';
        $student->MKS1 = $request->eng;
        $student->SUB2 = 'MAT';
        $student->MKS2 = $request->math;
        $student->SUB3 = 'DZO';
        $student->MKS3 = $request->dzo;
        $student->SUB4 = $request->sub4_name;
        $student->MKS4 = $request->sub4;
        $student->SUB5 = $request->sub5_name;
        $student->MKS5 = $request->sub5;
        $student->SUB6 = $request->sub6_name;
        $student->MKS6 = $request->sub6;
        $student->status = 'approved';

        $values = [$request->dzo, $request->sub4, $request->sub5, $request->sub6];

        rsort($values);
        $top3Values = array_slice($values, 0, 3);
        $totalMarks = ($request->math * 5) + ($request->eng * 2) + array_sum($top3Values);
        $student->TOTAL = $totalMarks;

        $student->save();

        return redirect()->route('studentLayout')->with('success', 'Student successfully added.');
    }

    public function deleteStudent($INDEX_NO)
    {
        $student = Student::where('INDEX_NO', $INDEX_NO)->first();

        if ($student) {
            $student->delete();
            return redirect()->back()->with('success', 'Student deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Student not found.');
        }
    }

    public function editStudent($INDEX_NO)
    {
        $student = Student::where('INDEX_NO', $INDEX_NO)->first();

        return view('admin.editStudent', ['student' => $student]);
    }

    public function updateStudent(Request $request, $INDEX_NO)
    {
        $student = Student::where('INDEX_NO', $INDEX_NO)->first();

        if ($student) {
            $student->update($request->all());
            return redirect()->back()->with('success', 'Student updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Student not found.');
        }
    }

    //Search for Admin
    // public function searchStudent(Request $request){
    //     $query = $request->input('query');

    //     $studentsQuery = Student::where('ELIGIBILITY', 'Eligible')->orderBy('TOTAL');

    //     if (!empty($query)) {
    //         $studentsQuery = $studentsQuery->where('INDEX_NO', 'like', '%' . $query . '%');
    //     }

    //     $students = $studentsQuery->get();

    //     return view('admin.studentLayout', compact('students'));
    // }
    public function searchStudent(Request $request){
        $query = $request->input('query');

        $studentsQuery = Student::where('ELIGIBILITY', 'Eligible')->orderBy('TOTAL');

        if (!empty($query)) {
            $studentsQuery = $studentsQuery->where('INDEX_NO', 'like', '%' . $query . '%');
        }

        $students = $studentsQuery->get();

        return view('admin.studentLayout', compact('students'));
    }

    public function searchSoc(Request $request){
        $query = $request->input('query');

        $studentsQuery = Student::orderBy('TOTAL');

        if (!empty($query)) {
            $studentsQuery = $studentsQuery->where('INDEX_NO', 'like', '%' . $query . '%');
        }

        $students = $studentsQuery->get();

        return view('admin.viewAll', compact('students'));
    }

    public function viewContactUs() {
        return view('student.contactUs');
    }

    public function feedbackPost(Request $request) {

        $feedback = new feedback();

        $request->validate([
            'name' => 'required',
            'message' => 'required',
        ]);

        $feedback->name = $request->name;
        $feedback->email = auth()->user()->email;
        $feedback->message = $request->message;

        $feedback->save();

        return redirect()->route('studentDashboard')->with('form2_success', 'Feedback successfully sent.');
    }

    //SOC
    public function viewSoc($INDEX_NO)
    {
        $student = Student::where('INDEX_NO', $INDEX_NO)->first();
        return view('admin.viewSoc', ['student' => $student]);
    }

    public function editSoc($INDEX_NO)
    {
        $student = Student::where('INDEX_NO', $INDEX_NO)->first();

        return view('admin.editSoc', ['student' => $student]);
    }

    public function updateSoc(Request $request, $INDEX_NO)
    {
        $student = Student::where('INDEX_NO', $INDEX_NO)->first();

        if ($student) {
            $student->update($request->all());
            return redirect()->back()->with('success', 'Student updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Student not found.');
        }
    }

    //Sid
    public function viewSid($INDEX_NO)
    {
        $student = Student::where('INDEX_NO', $INDEX_NO)->first();
        return view('admin.viewSid', ['student' => $student]);
    }

    public function editSid($INDEX_NO)
    {
        $student = Student::where('INDEX_NO', $INDEX_NO)->first();

        return view('admin.editSid', ['student' => $student]);
    }

    public function updateSid(Request $request, $INDEX_NO)
    {
        $student = Student::where('INDEX_NO', $INDEX_NO)->first();

        if ($student) {
            $student->update($request->all());
            return redirect()->back()->with('success', 'Student updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Student not found.');
        }
    }

    public function socView()
    {
        $students = Student::where('SOC', 1)->get();
        return view('admin.socLayout', ['students' => $students]);
    }

    public function sidView()
    {
        $students = Student::where('SIDD', 1)->get();
        return view('admin.sidLayout', ['students' => $students]);
    }

    //Admission SOC
    public function admissionOfficerViewSoc($INDEX_NO)
    {
        $student = Student::where('INDEX_NO', $INDEX_NO)->first();
        return view('admission.admissionOfficerViewSoc', ['student' => $student]);
    }

    //Admission Sid
    public function admissionOfficerViewSid($INDEX_NO)
    {
        $student = Student::where('INDEX_NO', $INDEX_NO)->first();
        return view('admission.admissionOfficerViewSid', ['student' => $student]);
    }
}
