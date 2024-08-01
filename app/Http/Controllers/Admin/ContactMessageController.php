<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    //all method
    public function all()
    {

        // Retrieve all blog posts
        $items = ContactMessage::orderBy('id', 'desc')->paginate(20);

        return view('pages.dashboard.admin.contact-message.all', compact('items'));
    }
}
