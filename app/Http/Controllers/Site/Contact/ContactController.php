<?php

namespace App\Http\Controllers\Site\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Contact\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function send(ContactRequest $request)
    {
        $contact = Contact::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'mobile'=>$request->mobile,
            'message'=>$request->message,
        ]);
        if($contact)
        {
            return back()->with(['msgContact'=>'success']);
        }
    }
}
