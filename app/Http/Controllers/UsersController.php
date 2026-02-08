<?php

namespace App\Http\Controllers;

use App\Helper\JwtToken;
use App\Mail\OtpMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

use function Pest\Laravel\json;

class UsersController extends Controller
{

    // Registration
    public function userRegistration(Request $request)
    {
        $request->validate([
            'firstName' => 'required|string|max:50',
            'lastName'  => 'required|string|max:50',
            'email'     => 'required|email|unique:users,email',
            'mobile'    => 'required|numeric|unique:users,mobile',
            'password'  => 'required|min:6'
        ]);

        try {
            User::create([
                'first_name' => $request->firstName, 
                'last_name'  => $request->lastName,  
                'email'      => $request->email,
                'mobile'     => $request->mobile,
                'password'   => bcrypt($request->password)
            ]);

            return response()->json([
                'status'  => 'success',
                'message' => 'Registration Successful'
            ], 200);

        } catch (\Throwable $e) {
            return response()->json([
                'status'  => 'failed',
                'message' => 'Registration Failed: ' . $e->getMessage()
            ], 500);
        }
    }


    // Login
    public function userLogin(Request $request)
    {       
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required|min:3'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $token = JwtToken::createToken($user->email, $user->id);

            // cookie set: path '/', secure false for localhost
            return response()->json([
                'status' => 'success',
                'message' => 'User Login successful'
            ])->withCookie(cookie('token', $token, 1440, '/', null, false, true));
        }

        return response()->json([
            'status' => 'fail',
            'message' => 'Invalid email or password'
        ], 401);
    }



    // logout
    public function logout(){
        // return response()->json([
        //         'status' => 'Successfull',
        //         'message' => 'Logout Seuccessfull'
        //     ])->cookie('token', null, -1);

        return redirect('/login')->withCookie(cookie('token', null, -1));
    }



    // send otp
    public function sendOtp(Request $request){
        $request->validate([
        'email' => 'required|email'
        ]);
        $email = $request->email;
        $otp = rand(1000, 9999);
        $count = User::where('email', $email)->count();

        if($count === 1){
            Mail::to($email)->send(new OtpMail($otp));

            // save otp to the database
            User::where('email', $email)->update(['otp'=>$otp]);

            // response
            return response()->json([
                'status' => 'Success',
                'message'=> 'Otp send successfull'
            ]);
        }else{
            return response()->json([
                'status' => 'Failed',
                'message' => 'Unable to send email'
            ]);
        }
    }


    // verify otp
    public function verifyOtp(Request $request)
{
    $request->validate([
        'otp'   => 'required|numeric'
    ]);

    $email = $request->email;
    $otp   = $request->otp;

    // user + otp check
    $user = User::where([
        'email' => $email,
        'otp'   => $otp
    ])->first();

    if ($user === null) {
        return response()->json([
            'status' => 'Failed',
            'message' => 'Invalid OTP'
        ], 401);
    }

        // OTP match hole reset kore
        User::where('email', $email)->update(['otp' => 0]);

        // token generate
        $token = JwtToken::createTokenForResetPassword($email);

        return response()->json([
            'status' => 'Success',
            'message' => 'OTP verified successfully'
        ])->cookie('token', $token, 60 * 24); // minutes
    }


    // reset password

        public function resetPassword(Request $request){
            try {
                $email = $request->header('email');
                $password = $request->password;

                // bcrypt ব্যবহার করো
                User::where('email', $email)->update([
                    'password' => bcrypt($password)
                ]);

                return response()->json([
                    'status' => 'Success',
                    'message' => 'Password reset successfully'
                ], 200);

            } catch (\Throwable $e) {
                return response()->json([
                    'status' => 'Failed',
                    'message' => 'Unable to reset password',
                    'error' => $e->getMessage()
                ], 500);
            }
        }



    //Get user profile
    public function userProfile(Request $request){
        $email = $request->header('email');
        $user = User::where('email', $email)->first();
        return response()->json([
            'status' => 'success',
            'message' => 'User Profile',
            'data' => $user
        ], 200);
    }


    // User profile update
    public function updateUserProfile(Request $request){
       try{
            $email = $request->header('email');
            $first_name = $request->first_name;
            $last_name = $request->last_name;
            $mobile = $request->mobile;
            // $password = bcrypt($request->password);

            User::where('email', $email)->update([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'mobile' => $mobile,
                // 'password' => $password
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'User Profile updated successfully'
            ], 200);
       }catch(\Throwable $e){
            return response()->json([
                'status' => 'failed',
                'message' => 'Unable to update user profile'
            ], 200);
       }
    }
    
}
