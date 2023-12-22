<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}

