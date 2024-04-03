<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentRegisterController extends Controller
{
    public function newDashboard()
    {
        return view('student.dashboard');
    }

    public function register(){
        return view('student.studentRegister');
    }

    public function registerPost(Request $request) {
        $student = Student::where('INDEX_NO', $request->SID)
            ->where('CID', $request->CID)
            ->where('DOB', $request->DOB)
            ->where('status', 'approved')
            ->first();

        if ($student) {
            $duplicateUser = User::where('cid', $request->CID)->first();

            if ($duplicateUser) {
                return redirect()->route('studentRegister')->with('error', 'A user with this credentials already exists.');
            }

            $user = new User();

            $user->cid = $request->CID;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);

            $user->save();

            return redirect()->route('studentRegister')->with('success', 'User information added successfully.');
        } else {
            return redirect()->route('studentRegister')->with('error', 'No student found with the provided credentials such Student Index No. , CID, and DOB.');
        }
    }
}
