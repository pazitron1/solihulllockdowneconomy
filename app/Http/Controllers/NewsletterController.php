<?php

namespace App\Http\Controllers;

use Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        //Validate email
        $request->validate([
            'email' => 'required|email'
        ]);
        //Check if they already subscribed
        if (! Newsletter::isSubscribed($request->email)) {
            Newsletter::subscribe($request->email);
            return back()->with('success', 'You have been subscribed, please check your email');
        }
        $error = Newsletter::getLastError();
        //Subscribe them and give success response or give 'already subscribed' response
        return back()->with('warning', 'This emails is already subscribed');
    }

    public function show()
    {
        return view('pages.newsletter.show');
    }
}
