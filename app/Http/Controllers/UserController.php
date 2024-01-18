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
        return view('welcome', compact('users'));
    }
    public function indexProfiles()
    {
        $users = User::with('profile')->get();
        return view('indexProfiles', compact('users'));
    }

    public function create(Request $request)
    {
        // Add your logic for user creation here
        // This method will handle the creation of a new user

        return redirect()->route('indexProfiles')->with('success', 'User created successfully');
    }

    public function edit(User $user)
    {
        return view('edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            // Add any other validation rules as needed
        ]);

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            // Update other fields as needed
        ]);

        return redirect()->route('indexProfiles')->with('success', 'Profile updated successfully');
    }

    public function destroy(User $user)
    {
        $user->profile()->delete();
        $user->detachTrophies();
        $user->delete();

        return redirect()->route('indexProfiles')->with('success', 'User and profile deleted successfully!');
    }

}
