<?php

// app/Http/Controllers/PasswordController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function edit()
    {
        return view('editPassword');
    }

    public function update(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        auth()->user()->update([
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()->route('indexProfiles')->with('success', 'Password updated successfully!');
    }
}
