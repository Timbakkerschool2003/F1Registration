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
        $profiles = Profile::all(); // Use the Profile model instead of profile

        return view('showprofiles', compact('profiles'));
    }
    public function showCreateForm()
    {
        return view('create');
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function createProfile(Request $request)
    {
//        // Validate and process the form submission
//        $data = $request->validate([
//            'name' => 'required|string',
//            'email' => 'required|email',
//            'password' => 'required|min:8',
//            // Add more validation rules as needed
//        ]);
//
//        // Create a new profile based on the validated data
//        $profile = $this->createProfile($data);
//        dd($data);
//        // Redirect or perform any other actions
//        //return redirect()->route('home');

        $newUser = User::create([
            'name' =>  $request->input('name'),
            'email' =>  $request->input('email'),
            'password' =>  $request->input('password')
        ]);

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
