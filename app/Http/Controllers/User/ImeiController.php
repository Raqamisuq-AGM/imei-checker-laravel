<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImeiController extends Controller
{
    //all method
    public function all()
    {
        $user = Auth::user();
        $items = $user->imeis()->paginate(20);
        return view('pages.dashboard.user.imei-list.all', compact('user', 'items'));
    }

    //check new method
    public function checkNew()
    {
        return view('pages.dashboard.user.imei-list.check');
    }
}
