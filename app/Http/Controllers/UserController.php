<?php

// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of users with profiles.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::with('profile')->get();
        return view('welcome', compact('users'));
    }

    /**
     * Display a listing of users with profiles.
     *
     * @return \Illuminate\View\View
     */
    public function indexProfiles()
    {
        $users = User::with('profile')->get();
        return view('indexProfiles', compact('users'));
    }

    /**
     * Create a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        // Add your logic for user creation here
        // This method will handle the creation of a new user

        return redirect()->route('indexProfiles')->with('success', 'User created successfully');
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Remove the specified user and associated profile from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        // Delete the associated profile and detach trophies before deleting the user
        $user->profile()->delete();
        $user->detachTrophies();
        $user->delete();

        return redirect()->route('indexProfiles')->with('success', 'User and profile deleted successfully!');
    }
}
