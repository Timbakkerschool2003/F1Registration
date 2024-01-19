<?php

namespace App\Http\Controllers;

use App\Models\Trophy;
use App\Models\User;
use App\Models\UserHasTrophy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TrophyController extends Controller
{
    /**
     * Get all trophy information along with user profiles.
     *
     * @return \Illuminate\View\View
     */
    public function getAllInfo()
    {
        // Retrieve trophy data with user information
        $trophyData = DB::table('users_has_trophies')->get();

        // Retrieve profiles of users
        $profiles = User::with('profile')->get();

        return view('trophies', compact('trophyData', 'profiles'));
    }

    // Define relationships for the UserHasTrophy model
    protected $table = 'users_has_trophies';

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function trophy()
    {
        return $this->belongsTo(Trophy::class, 'trophies_id');
    }

    // ...

    /**
     * Get all trophies for the logged-in user.
     *
     * @return \Illuminate\View\View
     */
    public function getTrophies()
    {
        $trophies = Trophy::all();

        // Check if the user is authenticated
        $userTrophies = Auth::check() ? Auth::user()->trophies : collect();

        return view('addtrophy', compact('trophies', 'userTrophies'));
    }

    /**
     * Process the trophy form submission.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function processTrophyForm(Request $request)
    {
        $selectedTrophyId = $request->input('trophy');

        // Check if the user already has the selected trophy
        if (Auth::user()->trophies->contains($selectedTrophyId)) {
            return redirect()->route('addtrophy')->with('error', 'Je hebt deze trofee al');
        }

        // If not, add the trophy to the user's trophies
        Auth::user()->trophies()->attach($selectedTrophyId);
        return redirect()->route('addtrophy')->with('success', 'Trofee toegevoegd.');
    }

    /**
     * Get all trophies for the logged-in user.
     *
     * @return \Illuminate\View\View
     */
    public function getAllTrophiesForLoggedInUser()
    {
        // Check if the user is logged in
        if (Auth::check()) {
            // Retrieve the logged-in user
            $user = Auth::user();

            // Retrieve all trophies for the logged-in user
            $userTrophies = $user->trophies()->get();

            return view('addtrophy', ['userTrophies' => $userTrophies]);
        }

        // If the user is not logged in, redirect with an error message
        return redirect()->route('login')->with('error', 'Je moet ingelogd zijn om deze pagina te bekijken.');
    }

    /**
     * Remove the specified trophy from the user's collection.
     *
     * @param  \App\Models\Trophy  $trophy
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Trophy $trophy)
    {
        // Check if the trophy belongs to the user
        if (Auth::user()->trophies->contains($trophy)) {
            Auth::user()->trophies()->detach($trophy);
            return redirect()->route('addtrophy');
        }

        return redirect()->route('addtrophy');
    }
}
