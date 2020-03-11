<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    public function index()
    {
    	Auth::logout();
    	return redirect(route('auth.login'));
    }
}
