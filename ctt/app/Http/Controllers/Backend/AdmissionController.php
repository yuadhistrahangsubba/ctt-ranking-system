<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class AdmissionController extends Controller
{
    public function dashboard(){
        return view('admission.aoDashboard');
    }

    public function admissionOfficerViewStudent($INDEX_NO)
    {   //dd($INDEX_NO);
        $student = Student::where('INDEX_NO', $INDEX_NO)->first();
        // dd($student);

        return view('admission.admissionOfficerViewStudent', ['student' => $student]);
    }

    public function admissionOfficerDeleteStudent($INDEX_NO)
    {
        $student = Student::where('INDEX_NO', $INDEX_NO)->first();

        if ($student) {
            $student->delete();
            return redirect()->back()->with('success', 'Student deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Student not found.');
        }
    }

    public function admissionOfficerEditStudent($INDEX_NO)
    {
        $student = Student::where('INDEX_NO', $INDEX_NO)->first();

        return view('admission.admissionOfficerEditStudent', ['student' => $student]);
    }

    public function admissionOfficerUpdateStudent(Request $request, $INDEX_NO)
    {
        $student = Student::where('INDEX_NO', $INDEX_NO)->first();

        if ($student) {
            $student->update($request->all());
            return redirect()->back()->with('success', 'Student updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Student not found.');
        }
    }

    public function admissionOfficerSearchSoc(Request $request){
        $query = $request->input('query');
        if (!empty($query)) {
            $students = \App\Models\Student::where('INDEX_NO', 'like', '%' . $query . '%')
                ->orderBy('SOC_RANKING')
                ->get();
        } else {
            $students = \App\Models\Student::orderBy('SOC_RANKING')
                ->get();
        }

        return view('admission/admissionOfficerSocLayout', compact('students'));
    }

    public function admissionOfficerSearchSid(Request $request){
        $query = $request->input('query');
        if (!empty($query)) {
            $students = \App\Models\Student::where('INDEX_NO', 'like', '%' . $query . '%')
                ->orderBy('SIDD_RANKING')
                ->get();
        } else {
            $students = \App\Models\Student::orderBy('SIDD_RANKING')
                ->get();
        }
        return view('admission/admissionOfficerSidLayout', compact('students'));
    }


    //Admission SOC
    public function admissionOfficerViewSoc($INDEX_NO)
    {
        $student = Student::where('INDEX_NO', $INDEX_NO)->first();
        return view('admission.admissionOfficerViewSoc', ['student' => $student]);
    }

    public function admissionOfficerEditSoc($INDEX_NO)
    {
        $student = Student::where('INDEX_NO', $INDEX_NO)->first();

        return view('admission.admissionOfficerEditSoc', ['student' => $student]);
    }

    public function admissionOfficerUpdateSoc(Request $request, $INDEX_NO)
    {
        $student = Student::where('INDEX_NO', $INDEX_NO)->first();

        if ($student) {
            $student->update($request->all());
            return redirect()->back()->with('success', 'Student updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Student not found.');
        }
    }

    //Admission Sid
    public function admissionOfficerViewSid($INDEX_NO)
    {
        $student = Student::where('INDEX_NO', $INDEX_NO)->first();
        return view('admission.admissionOfficerViewSid', ['student' => $student]);
    }

    public function admissionOfficerEditSid($INDEX_NO)
    {
        $student = Student::where('INDEX_NO', $INDEX_NO)->first();

        return view('admission.admissionOfficerEditSid', ['student' => $student]);
    }

    public function admissionOfficerUpdateSid(Request $request, $INDEX_NO)
    {
        $student = Student::where('INDEX_NO', $INDEX_NO)->first();

        if ($student) {
            $student->update($request->all());
            return redirect()->back()->with('success', 'Student updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Student not found.');
        }
    }

    public function searchAoStudent(Request $request){
        $query = $request->input('query');

        $studentsQuery = Student::orderBy('TOTAL');

        if (!empty($query)) {
            $studentsQuery = $studentsQuery->where('INDEX_NO', 'like', '%' . $query . '%');
        }

        $students = $studentsQuery->get();

        return view('admission.admissionOfficerStudentLayout', compact('students'));
    }
}
