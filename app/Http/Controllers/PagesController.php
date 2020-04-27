<?php

namespace App\Http\Controllers;

use App\Business;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $listings = Business::take(8)->inRandomOrder()->get();

        return view('home', compact('listings'));
    }

    public function about()
    {
        return view('pages.about');
    }
}
