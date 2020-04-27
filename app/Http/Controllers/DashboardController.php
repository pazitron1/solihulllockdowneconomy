<?php

namespace App\Http\Controllers;

use Auth;
use App\Business;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $businesses = Business::where('user_id', Auth::user()->id)->get();
        return view('pages.dashboard.index', compact('businesses'));
    }
}
