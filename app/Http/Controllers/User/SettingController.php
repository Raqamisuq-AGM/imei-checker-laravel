<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    //change email method
    public function changeEmail()
    {
        return view('pages.dashboard.user.settings.change-email');
    }

    //change password method
    public function changePassword()
    {
        return view('pages.dashboard.user.settings.change-password');
    }

    //update email method
    public function updateEmail(Request $request)
    {
        // Validate the new email
        $validator = Validator::make($request->all(), [
            'new_email' => 'required|email|unique:users,email',
        ]);

        // Handle validation failures
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update the email of the authenticated user
        $user = Auth::user();
        $user->email = $request->new_email;
        $user->save();

        //return success message with tostr
        toastr()->success('Email updated successfully', ['timeOut' => 5000, 'closeButton' => true]);
        return redirect()->route('dashboard.setting.change-email');
    }

    //update password method
    public function updatePassword(Request $request)
    {
        // Validate the request input
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        // Handle validation failures
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Check if the old password is correct
        $user = Auth::user();
        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->withErrors(['old_password' => 'The old password is incorrect.'])->withInput();
        }

        // Update the user's password
        $user->password = Hash::make($request->new_password);
        $user->save();


        //return success message with tostr
        toastr()->success('Password updated successfully', ['timeOut' => 5000, 'closeButton' => true]);
        return redirect()->route('admin.setting.change-password');
    }
}
