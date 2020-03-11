<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateLoginRequest;

class LoginController extends Controller
{
    public function index()
    {
    	if(Auth::check()) {
    		return back();
    	}
    	return view('auth.login');
    }

    public function authenticate(CreateLoginRequest $request)
    {
    	if(Auth::attempt([
    		'username' => $request->input('username'),
    		'password' => $request->input('password')
    	])) {
    		return redirect(route('admin.board'));
    	} else {
    		return redirect(route('auth.login'));
    	}
    }
}