<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Imei;
use Illuminate\Http\Request;

class ImeiController extends Controller
{
    //all method
    public function all()
    {
        // Retrieve all IMEI records with user details
        $items = Imei::with('userImeis')->orderBy('id', 'desc')->paginate(20);

        return view('pages.dashboard.admin.imei-list.all', compact('items'));
    }
}
