<?php

namespace App\Http\Controllers;

use Mail;
use App\Recommendation;
use Illuminate\Http\Request;
use App\Mail\RecommendationSubmitted;
use App\Mail\RecommendationAcknowledgement;

class RecommendationController extends Controller
{
    public function create(Request $request)
    {
        return view('pages.recommend.create');
    }

    public function store(Request $request)
    {
         $validatedData = request()->validate([
            'name' => 'required | max:100',
            'email' => 'required | email',
            'business_name' => 'required | max:200',
            'business_website' => 'nullable | url',
            'description' => 'required | max:255',
            'lockdown_offer' => 'required | max:255',
            'delivery_info' => 'required | max:255'
        ]);

        $recommendation = Recommendation::create($validatedData);

        $delay = now()->addSeconds(20);
        Mail::to($request->email)
            ->later($delay, new RecommendationAcknowledgement($recommendation));

        Mail::to('hello@solihulllockdowneconomy.com')
            ->later($delay, new RecommendationSubmitted($recommendation));

        session()->flash('success', 'Your entry has been submitted and will be reviewed shortly!');

        return back();

    }
}
