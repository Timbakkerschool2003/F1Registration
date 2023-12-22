<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Team;
use App\Models\Scoreboard;


class ScoreboardController extends Controller
{
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
            'team_name' => 'required',
            'date' => 'required',
        ]);

        $team = Team::where('name', $validatedData['team_name'])->first();

        if ($team) {
            $driver = $team->driver;
            $scoreboard = new Scoreboard();
            $scoreboard->drivers_id = $driver->id;
            $scoreboard->time = $validatedData['time'];
            $scoreboard->date = $validatedData['date'];
            $scoreboard->save();

            return redirect()->route('success_route');
        } else {
            return redirect()->back()->with('error', 'Team not found');
        }
    }
}



