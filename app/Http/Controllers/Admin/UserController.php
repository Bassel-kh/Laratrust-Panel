<?php

namespace App\Http\Controllers\Admin;

use Hash;
use App\Models\Role;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::with('permissions')->get();
        $users = User::latest()->paginate(10);
        return view('admin.users.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::with('permissions')->latest()->get();
        $teams = Team::latest()->get();
        return view('admin.users.create', compact('roles', 'teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        $role = Role::find($request->role);
        $user->attachRole($role);

        return redirect(route('admin.users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::with('permissions')->get();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        $roles = $user->roles;

        foreach ($roles as $key => $value) {
            $user->detachRole($value);
        }

        $role = Role::find($request->input('role'));
        $user->attachRole($role);

        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $roles = $user->roles;

        foreach ($roles as $key => $value) {
            $user->detachRole($value);
        }

        $user->delete();
        return redirect(route('admin.users.index'));
    }
}
