<?php

namespace App\Http\Controllers;

use Mail;
use App\Contact;
use Illuminate\Http\Request;
use App\Mail\ContactUsSubmitted;

class ContactController extends Controller
{
    public function show()
    {
        return view('pages.contact.show');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required | max:100',
            'email' => 'required | email',
            'message' => 'required | max:255'
        ]);

        $enquiry = Contact::create($validatedData);

        //Send email
        $delay = now()->addSeconds(20);

        Mail::to('hello@solihulllockdowneconomy.com')
            ->later($delay, new ContactUsSubmitted($enquiry));

        return back()->with('success', 'Your message has been sent, Thank you.');

    }
}
