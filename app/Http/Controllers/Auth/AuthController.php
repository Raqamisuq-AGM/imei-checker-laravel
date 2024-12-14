<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\OtpEmail;
use App\Models\Credit;
use App\Models\ImeiLimit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;


class AuthController extends Controller
{
    //login method
    public function login()
    {
        $userIp = request()->ip();
        $user = User::where('ip', $userIp)->first();
        if ($user == null) {
            // Create the user
            $user = new User();
            $user->ip = $userIp;
            $user->type = 'user';
            $user->save();

            // Create the user limit
            $limit = new ImeiLimit();
            $limit->user_id = $user->id;
            $limit->ip = $userIp;
            $limit->limit = '5';
            $limit->save();

            // Create the user limit
            $credit = new Credit();
            $credit->user_id = $user->id;
            $credit->credit = '0';
            $credit->ip = $userIp;
            $credit->save();
        }
        return view('pages.frontend.auth.login.login');
    }

    //signup method
    public function signup()
    {
        $userIp = request()->ip();
        $user = User::where('ip', $userIp)->first();
        if ($user == null) {
            // Create the user
            $user = new User();
            $user->ip = $userIp;
            $user->type = 'user';
            $user->save();

            // Create the user limit
            $limit = new ImeiLimit();
            $limit->user_id = $user->id;
            $limit->ip = $userIp;
            $limit->limit = '5';
            $limit->save();

            // Create the user limit
            $credit = new Credit();
            $credit->user_id = $user->id;
            $credit->credit = '0';
            $credit->ip = $userIp;
            $credit->save();
        }
        return view('pages.frontend.auth.signup.signup');
    }

    //auth user method
    public function authUser(Request $request)
    {
        // Validate the request input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Attempt to authenticate the user
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed, get the authenticated user
            $user = Auth::user();

            // Check the type of the user and redirect accordingly
            if ($user->type === 'admin') {
                //return success message with tostr
                toastr()->success('Login successful', ['timeOut' => 5000, 'closeButton' => true]);
                return redirect()->route('admin.index');
            } elseif ($user->type === 'user') {
                //return success message with tostr
                toastr()->success('Login successful', ['timeOut' => 5000, 'closeButton' => true]);
                return redirect()->route('dashboard.index');
            } else {
                // Handle other user types if necessary
                return redirect()->route('home');
            }
        } else {
            // Authentication failed
            return redirect()->back()->withErrors(['email' => 'Invalid credentials.']);
        }
    }

    //create user method
    public function createUser(Request $request)
    {
        // Validate the request input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'name' => 'required|string|max:255',
            // 'phone' => 'required|string|max:15',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Handle validation failures
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $userIp = request()->ip();
        $user = User::where('ip', $userIp)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->type = 'user';
        $user->otp = '';
        $user->status = 'active';
        $user->save();

        //return success message with tostr
        toastr()->success('Account created successfully. Please login.', ['timeOut' => 5000, 'closeButton' => true]);
        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        // Log out the user
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the session token
        $request->session()->regenerateToken();

        //return success message with tostr
        toastr()->success('You have been logged out successfully.', 'success', ['timeOut' => 5000, 'closeButton' => true]);
        return redirect()->route('login');
    }

    public function forgetPassword(Request $request)
    {
        return view('pages.frontend.auth.login.forget-password');
    }

    public function forgetPasswordOtp(Request $request)
    {
        return view('pages.frontend.auth.login.otp');
    }

    public function forgetUpdatePassword(Request $request)
    {
        return view('pages.frontend.auth.login.change-password');
    }

    public function forgetPasswordCheckEmail(Request $request)
    {

        // Validate the request input
        $validator = Validator::make($request->all(), [
            'email' => 'required',
        ]);

        // Handle validation failures
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Check if the email exists in the database
        $user = User::where('email', $request->email)->first();

        if ($user == null) {
            return redirect()->back()->withErrors(['email' => 'Email not found.']);
        }

        // Generate a random OTP and send it to the user's email
        $otp = mt_rand(1000, 9999);
        $user->otp = $otp;
        $user->save();

        $request->session()->put('forgetEmail', $request->email);
        $request->session()->put('forgetOtp', $otp);

        // Send the OTP via email
        Mail::to($user->email)->send(new OtpEmail($otp));

        //return success message with tostr
        toastr()->success('Please check your email inbox, we have sent OTP', ['timeOut' => 5000, 'closeButton' => true]);
        return redirect()->route('auth.forget.password.otp');
    }

    public function forgetPasswordCheckOtp(Request $request)
    {

        // Validate the request input
        $validator = Validator::make($request->all(), [
            'otp' => 'required',
        ]);

        // Handle validation failures
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Retrieve the OTP from the session
        $sessionOtp = $request->session()->get('forgetOtp');

        // Retrieve the OTP from the request input
        $inputOtp = $request->input('otp');

        // Check if the OTPs match
        if ($sessionOtp == $inputOtp) {
            return redirect()->route('auth.forget.password.change');
        } else {
            return redirect()->back()->withErrors(['otp' => 'Wrong OTP']);
        }
        //return success message with tostr
        // toastr()->success('You have been logged out successfully.', 'success', ['timeOut' => 5000, 'closeButton' => true]);
        // return redirect()->route('login');
    }

    public function forgetPasswordUpdatePWD(Request $request)
    {
        // Validate the request input
        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'cnf_password' => 'required|same:password',
        ]);

        // Handle validation failures
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $sessionEmail = $request->session()->get('forgetEmail');

        $user = User::where('email', $sessionEmail)->first();
        $user->password = Hash::make($request->new_password);
        $user->save();

        $request->session()->forget('forgetEmail');
        $request->session()->forget('forgetOtp');

        //return success message with tostr
        toastr()->success('Password updated successfully.', 'success', ['timeOut' => 5000, 'closeButton' => true]);
        return redirect()->route('login');
    }
}
