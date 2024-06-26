<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ImeiLimit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


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
            'phone' => 'required|string|max:15',
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
}
