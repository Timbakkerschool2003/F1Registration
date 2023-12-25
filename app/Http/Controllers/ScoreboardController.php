<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Team;
use App\Models\Driver;
use App\Models\Scoreboard;

class ScoreboardController extends Controller
{

    public function storen(Request $request)
    {
        // Valideer de invoergegevens indien nodig
        $request->validate([
            'driver_name' => 'required|string',
            'time' => 'required|date_format:H:i',
            'team_name' => 'required|exists:teams,id',
            'circuit' => 'required|string',
            'date' => 'required|date',
        ]);

        // Haal de driver op basis van de naam
        $driver = Driver::where('name', $request->input('driver_name'))->first();

        // Controleer of de driver is gevonden
        if (!$driver) {
            // Driver niet gevonden, terug met foutmelding
            return redirect()->back()->with('error', 'Driver not found');
        }

        // Maak een nieuw Score-model aan en vul het met de gegevens van het formulier
        $score = new Scoreboard();
        $score->drivers_id = $driver->id; // Gebruik de ID van de driver
        $score->time = $request->input('time');
        $score->circuit = $request->input('circuit');
        $score->date = $request->input('date');

        // Sla het score-object op in de database
        $score->save();

        // Keer terug naar een bepaalde weergave of route
        return redirect()->route('scoreboard.index')->with('success', 'Score is succesvol toegevoegd!');
    }

    public function getTime()
    {
        $scoreboards = DB::table('scoreboard')
            ->join('drivers', 'scoreboard.drivers_id', '=', 'drivers.id')
            ->join('teams', 'drivers.teams_id', '=', 'teams.id')
            ->select('scoreboard.time', 'drivers.name as driver_name', 'teams.name as team_name')
            ->get();

        return view('home', compact('scoreboards'));
    }

    public function getScoreboard()
    {
        $scoreboards = DB::table('scoreboard')
            ->join('drivers', 'scoreboard.drivers_id', '=', 'drivers.id')
            ->join('teams', 'drivers.teams_id', '=', 'teams.id')
            ->select('scoreboard.time', 'drivers.name as driver_name', 'teams.name as team_name', 'scoreboard.date')
            ->get();

        return view('scoreboard', compact('scoreboards'));
    }

    public function create()
    {
        $teams = Team::all();
        return view('addscore', ['teams' => $teams]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'time' => 'required',
            'team_name' => 'required|exists:teams,name', // Valideer de teamnaam in de teams-tabel
            'date' => 'required|date',
        ]);

        $team = Team::where('name', $validatedData['team_name'])->first();

        if ($team) {
            $driver = $team->driver;
            $scoreboard = new Scoreboard();
            $scoreboard->drivers_id = $driver->id;
            $scoreboard->time = $validatedData['time'];
            $scoreboard->date = $validatedData['date'];
            $scoreboard->save();

            return redirect()->route('scoreboard.index')->with('success', 'Score is succesvol toegevoegd!');
        } else {
            return redirect()->back()->with('error', 'Team not found');
        }
    }
}
