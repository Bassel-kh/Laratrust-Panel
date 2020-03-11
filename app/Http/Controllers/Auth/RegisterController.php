<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Hash;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRegisterRequest;

class RegisterController extends Controller
{
    public function index()
    {
        if(Auth::check()) {
            return redirect(route('admin.board'));
        }

        return view('auth.register');
    }

    public function store(CreateRegisterRequest $request)
    {
       $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

       $user->attachRole('user');

        return redirect(route('auth.login'));
    }
}
