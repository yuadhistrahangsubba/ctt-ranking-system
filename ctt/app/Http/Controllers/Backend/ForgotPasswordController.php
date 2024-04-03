<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function forgot(){
        return view('student.forgotpassword');
    }

    public function confirm(){
        return view('student.confirm-password');
    }
}
