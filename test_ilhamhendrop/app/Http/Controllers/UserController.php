<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index_user() {
        $users = User::all();

        return view('dashboard.user.index', compact('users'));
    }

    public function store_user(Request $request) {
        $request->validate([
            'username' => 'required|unique:users',
            'name' => 'required',
            'password' => 'required|confirmed',
            'role' => 'required'
        ]);

        User::create([
            'username' => $request->username,
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        return Redirect::back();
    }

    public function detail_user(User $user) {
        return view('dashboard.user.detail', compact('user'));
    }

    public function edit_user(User $user) {
        return view('dashboard.user.edit', compact('user'));
    }

    public function update_user(User $user, Request $request) {
        $request->validate([
            'username' => 'required|unique:users',
            'name' => 'required',
            'role' => 'required',
        ]);

        $user->update([
            'username' => $request->username,
            'name' => $request->name,
            'role' => $request->role
        ]);

        return Redirect::back();
    }

    public function edit_password(User $user) {
        return view('dashboard.user.edit_password', compact('user'));
    }

    public function update_password(User $user, Request $request) {
        $request->validate([
            'password' => 'required|confirmed',
        ]);

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return Redirect::back();
    }

    public function delete_user(User $user) {
        $user->delete();

        return Redirect::back();
    }
}
