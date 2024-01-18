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
    public function haalAlleTrophyGegevensOp()
    {
        // Gebruik het juiste model (vervang Trophy door het werkelijke modelnaam)
        $trophyGegevens = DB::table('users_has_trophys')->get();

        // Retourneer de opgehaalde gegevens
        return $trophyGegevens;
    }

    // Voorbeeld van het gebruik van de functie
    public function haalAlleGegevensOp()
    {
        // Ophalen van trophy-gegevens met gebruikersinformatie
        $trophyData = DB::table('users_has_trophys')->get();

        // Ophalen van profielgegevens van gebruikers
        $profiles = User::with('profile')->get();

        return view('trophies', compact('trophyData', 'profiles'));
    }

    protected $table = 'users_has_trophys';

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function trophy()
    {
        return $this->belongsTo(Trophy::class, 'trophys_id');
    }

    // ...

    public function getTrophies()
    {
        $trophies = Trophy::all();

        // Check if the user is authenticated
        $userTrophies = Auth::check() ? Auth::user()->trophies : collect();

        return view('addtrophy', compact('trophies', 'userTrophies'));
    }

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

    public function getAllTrophiesForLoggedInUser()
    {
        // Controleer eerst of de gebruiker is ingelogd
        if (Auth::check()) {
            // Haal de ingelogde gebruiker op
            $user = Auth::user();

            // Haal alle trofeeën op voor de ingelogde gebruiker
            $userTrophies = $user->trophies()->get();

            return view('addtrophy', ['userTrophies' => $userTrophies]);
        }

        // Als de gebruiker niet is ingelogd, kun je hier een redirect of een foutmelding toevoegen.
        return redirect()->route('login')->with('error', 'Je moet ingelogd zijn om deze pagina te bekijken.');
    }

    public function destroy(Trophy $trophy)
    {
        // Ensure the trophy belongs to the logged-in user
        if (Auth::user()->trophies->contains($trophy)) {
            Auth::user()->trophies()->detach($trophy);
            return redirect()->route('addtrophy')->with('success', 'Trophy removed successfully!');
        }

        return redirect()->route('addtrophy')->with('error', 'Unable to remove the trophy.');
    }
}
