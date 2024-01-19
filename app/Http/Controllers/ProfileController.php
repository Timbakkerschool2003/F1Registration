<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Profile;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Ensure the user is authenticated before accessing any methods.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of all profiles.
     *
     * @return \Illuminate\View\View
     */
    public function indexProfiles()
    {
        $profiles = Profile::all();
        return view('indexProfiles', compact('profiles'));
    }

    /**
     * Show the form to create a new profile.
     *
     * @return \Illuminate\View\View
     */
    public function showCreateForm()
    {
        return view('create');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function createProfile(Request $request)
    {
        $newUser = User::create([
            'name' =>  $request->input('name'),
            'email' =>  $request->input('email'),
            'password' =>  Hash::make($request->input('password')),
        ]);

        return view('create');
    }

    /**
     * Store a newly created profile in storage.
     *
     * @param  \App\Http\Requests\StoreProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreProfileRequest $request)
    {
        $request->validate([
            'user_id' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'mobile' => 'required',
        ]);

        Profile::createProfiles($request->all());

        return redirect()->route('index')->with('success', 'Profile created successfully.');
    }

    /**
     * Display the specified profile.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\View\View
     */
    public function show(Profile $profile)
    {
        return view('show', compact('profile'));
    }

    /**
     * Show the form for editing the specified profile.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\View\View
     */
    public function edit(Profile $profile)
    {
        // Check if the authenticated user has permission to edit this profile
        if ($profile->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('edit', compact('profile'));
    }

    /**
     * Update the specified profile in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateProfileRequest $request, Profile $profile)
    {
        // Check if the authenticated user has permission to update this profile
        if ($profile->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'mobile' => 'required|string|max:15',
        ]);

        $profile->update($request->all());

        return redirect()->route('index')->with('success', 'Profile updated successfully.');
    }

    /**
     * Remove the specified profile from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();

        return redirect()->route('index')->with('success', 'Profile deleted successfully.');
    }
}
