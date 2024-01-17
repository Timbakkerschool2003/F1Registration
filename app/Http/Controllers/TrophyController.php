<?php

namespace App\Http\Controllers;

use App\Models\Trophy;
use App\Models\User;
use App\Models\UserHasTrophy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrophyController extends Controller
{
    public function haalAlleTrophyGegevensOp() {
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

    public function getTrophies()
    {
        $trophies = Trophy::all();

        return view('addtrophy', ['trophies' => $trophies]);
    }

    public function processTrophyForm(Request $request)
    {
        $selectedTrophyId = $request->input('trophy');

        // Doe iets met het geselecteerde trofee-id, bijvoorbeeld opslaan in de database

        return redirect()->route('add_trophy')->with('success', 'Trophy selected successfully.');
    }

}
