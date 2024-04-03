<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\feedback;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function viewAo(){
        return view('admin.createAdmissionOfficer');
    }
    public function viewAdmissionOfficer($cid){
        $user = User::where('cid', $cid)->first();

        return view('admin.viewAdmissionOfficer', ['user' => $user]);
    }

    public function admissionOfficerPost(Request $request) {
        $user = new User();

        $user->cid = $request->cid;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->role = 'ao';
        $user->save();

        return redirect()->route('aoLayout')->with('success', 'Admission Officer successfully added.');
    }

    public function deleteAdmissionOfficer($cid){
        $user = User::where('cid', $cid)->first();

        if ($user) {
            $user->delete();
            return redirect()->back()->with('success', 'Admission officer deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Admission officer not found.');
        }
    }

    public function editAdmissionOfficer($cid){
        $user = User::where('cid', $cid)->first();

        return view('admin.editAdmissionOfficer', ['user' => $user]);
    }

    public function updateAdmissionOfficer(Request $request, $cid)
    {
        $user = User::where('cid', $cid)->first();

        if ($user) {
            $user->update($request->all());
            return redirect()->back()->with('success', 'User updated successfully.');
        } else {
            return redirect()->back()->with('error', 'User not found.');
        }
    }

    //student
    public function displayStudent() {
        $students = \App\Models\Student::where('ELIGIBILITY', 'Eligible')->get();
        $totalUsers = count($students);
        return view('admin.studentLayout', ['students' => $students, 'totalUsers' => $totalUsers]);
    }

    // feedback
        public function viewFeedback(){
            return view('admin.feedback');
        }

        public function deleteFeedback($id){
            $feedback = feedback::where('id', $id)->first();

            if ($feedback) {
                $feedback->delete();
                return redirect()->back()->with('success', 'Feedback deleted successfully.');
            } else {
                return redirect()->back()->with('error', 'Feedback not found.');
            }
        }

    // search all students
    public function searchAll(Request $request){
        $query = $request->input('query');

        $studentsQuery = Student::orderBy('TOTAL');

        if (!empty($query)) {
            $studentsQuery = $studentsQuery->where('INDEX_NO', 'like', '%' . $query . '%');
        }

        $students = $studentsQuery->get();

        return view('admin.viewAll', compact('students'));


    }

    public function viewAllPage()
    {
        $students = Student::all();
        return view('admin.viewAll', compact('students'));
    }

    // Delete All data
    public function deleteAllStudents(){
        try {
            Student::truncate(); // Deletes all rows from the students table
            return redirect()->route('viewAll')->with('success', 'All student data deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('viewAll')->with('error', 'Failed to delete student data.');
        }
    }


}
