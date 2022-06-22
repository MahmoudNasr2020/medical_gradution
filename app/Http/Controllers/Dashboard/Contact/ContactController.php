<?php

namespace App\Http\Controllers\Dashboard\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show($id)
    {
        $data = Contact::findOrFail($id);
        return view('dashboard.pages.contact.show',compact('data'));
    }
}
