<?php
// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('profile')->get();
        return view('indexProfiles', compact('users'));
    }


    public function edit(User $user)
    {
        return view('editprofile', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->only(['name', 'email']));
        $user->profile()->update($request->only(['firstname', 'lastname', 'mobile']));

        return redirect()->route('indexProfiles')->with('success', 'Profile updated successfully!');
    }

    public function destroy(User $user)
    {
        $user->profile()->delete();
        $user->delete();

        return redirect()->route('indexProfiles')->with('success', 'User and profile deleted successfully!');
    }
}
