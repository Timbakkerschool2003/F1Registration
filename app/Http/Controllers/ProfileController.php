<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Profile;
use App\Models\Team;

class ProfileController extends Controller
{
    /**
     *  $this->middleware('auth'); => gebruiker moet ingelogd zijn!
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexProfiles(){
        $profiles = profile::all();
        return view('showprofiles', compact('profiles'));
    }

    /**
     * Display a listing of the resource.
     */
    public function showprofiles()
    {
        $profiles = profile::all();
        return view('showprofiles', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createProfiles()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfileRequest $request)
    {

        $request->validate([
            'user_id' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'mobile' => 'required'
        ]);

        Profile::createProfiles($request->all());

        return redirect()->route('index')->with('succes', 'Profile created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        return view('show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        if ($profile->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        if ($profile->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'firstname' => 'required|string|255',
            'lastname' => 'required|string|255',
            'mobile' => 'required|string|15'
        ]);

        $profile->update($request->all());

        return redirect()->route('index')
            ->with('success', 'Profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();

        return redirect()->route('index')
            ->with('success', 'Profile deleted successfully.');
    }
}
