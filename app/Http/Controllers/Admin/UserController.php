<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //all method
    public function all()
    {
        // Retrieve all users with the count of associated IMEI records
        $items = User::where('type', '!=', 'admin')->withCount('imeis')->orderBy('id', 'desc')->paginate(20);

        return view('pages.dashboard.admin.user.all', compact('items'));
    }
}
