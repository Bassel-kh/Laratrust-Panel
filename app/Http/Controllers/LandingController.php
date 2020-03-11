<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
    	if(Auth::check()) {
    		return back();
    	}

    	return view('landing');
    }
}
