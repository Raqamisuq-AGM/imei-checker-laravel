<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Imei;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //index method
    public function index()
    {
        $imeiCount = Imei::count();
        $userCount = User::where('type', '!=', 'admin')->count();
        return view('pages.dashboard.admin.index', compact('imeiCount', 'userCount'));
    }
}
