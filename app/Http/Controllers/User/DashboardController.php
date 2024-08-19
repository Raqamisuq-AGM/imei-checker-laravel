<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Credit;
use App\Models\Imei;
use App\Models\ImeiLimit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //index method
    public function index()
    {
        $user = Auth::user();
        $credit = 0;
        $checked = 0;

        // Get Credits
        if ($user) {
            // Query the credits table to get the credit of the logged-in user
            $credit = Credit::where('user_id', $user->id)->first();

            if ($credit) {
                // Access the credit value
                $credit = $credit->credit;
                // Now you have $userCredit which contains the credit value for the logged-in user
            } else {
                // Handle case where no credit record is found for the user
                $credit = 0;
            }
        } else {
            $credit = 0; //
        }

        // Get total checked
        if ($user) {
            // Query the credits table to get the credit of the logged-in user
            $checked = Imei::where('user_id', $user->id)->count();
        } else {
            $checked = 0; //
        }

        $items = $user->imeis()->orderBy('id', 'desc')->paginate(5);

        return view('pages.dashboard.user.index', compact('credit', 'checked', 'items'));
    }
}
