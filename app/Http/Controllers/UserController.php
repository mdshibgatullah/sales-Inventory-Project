<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function registration(){
        return view('pages.auth.registration-page');
    }

    public function login(){
        return view('pages.auth.login-page');
    }

    public function reset(){
        return view('pages.auth.reset-pass-page');
    }


    public function sendOtp(){
        return view('pages.auth.send-otp-page');
    }


    public function verifyOtp(){
        return view('pages.auth.verify-otp-page');
    }


    public function profile(){
        return view('pages.dashboard.profile');
    }


    public function sale(){
        return view('pages.dashboard.sale');
    }


    public function invoice(){
        return view('pages.dashboard.invoice');
    }

}
