<?php

// app/Http/Controllers/PasswordController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    /**
     * Show the form to edit the user's password.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('editPassword');
    }

    /**
     * Update the user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        // Validate the request data
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Update the user's password in the database
        auth()->user()->update([
            'password' => Hash::make($request->input('password')),
        ]);

        // Redirect to the indexProfiles route with a success message
        return redirect()->route('indexProfiles')->with('success', 'Password updated successfully!');
    }
}
