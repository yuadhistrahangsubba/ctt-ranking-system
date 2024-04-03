<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\feedback;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class StudentApplicationController extends Controller
{
    public function apply(){
        return view('student.application');
    }

    public function applicationPost(Request $request) {

            $student = new Student();

            $student->INDEX_NO = $request->sid;
            $student->CID = $request->cid;
            $student->NAME = $request->name;
            $student->DOB = $request->dob;
            $student->email = $request->email;
            $student->phone = $request->phone;
            $student->SCHOOL = $request->school;
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
            $student->status = 'pending';

            $values = [$request->dzo, $request->sub4, $request->sub5, $request->sub6];

            rsort($values);
            $top3Values = array_slice($values, 0, 3);
            $totalMarks = ($request->math * 5) + ($request->eng * 2) + array_sum($top3Values);
            // $totalMarks = ($request->math * 5) + ($request->eng * 2) + max($request->dzo, $request->sub4, $request->sub5, $request->sub6);
            $student->TOTAL = $totalMarks;

            $student->save();

            return redirect()->route('application')->with('success', 'User request successfully sended.');

            $student->total = $request->total;

    }


    //feedback from user
    public function feedback(){
        return view('student.contactUs');
    }

    public function feedbackPost(Request $request) {

            $feedback = new feedback();
            $feedback->name = $request->name;
            $feedback->email = $request->email;
            $feedback->message = $request->message;

            $feedback->save();
            return redirect()->route('contactUs')->with('success', 'Feedback successfully send.');
    }

    // Rank
    public function rank(){
        return view('student.studentDashboard');
    }

    public function rankPost(Request $request) {
        $loggedInUserId = Auth::id();
        $user = User::find($loggedInUserId);

        if ($user) {
            $userCid = $user->cid;
            $student = Student::where('CID', $userCid)->first();

            if ($student) {
                // Check if SOC and Interactive Design are sent in the request
                $student->SOC = $request->has('SOC') ? $request->SOC : false;
                $student->SIDD = $request->has('SIDD') ? $request->SIDD : false;

                // Convert null values to false
                if ($student->SOC === null) {
                    $student->SOC = false;
                }

                if ($student->SIDD === null) {
                    $student->SIDD = false;
                }

                $student->save();
                return redirect()->route('studentDashboard')->with('success', "Ranked successfully");
            } else {
                return redirect()->route('studentDashboard')->with('error', 'Student not found for the logged-in user: ' . $userCid);
            }
        } else {
            return redirect()->route('studentDashboard')->with('error', 'User CID not found.');
        }
    }

}
