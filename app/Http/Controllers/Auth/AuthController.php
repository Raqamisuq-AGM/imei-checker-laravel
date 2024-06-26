<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
        return view('pages.frontend.auth.login.login');
    }

    //signup method
    public function signup()
    {
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

        // Create the user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'type' => 'user', // Default type is 'user'
            'otp' => '',
            'status' => 'active',
        ]);

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
