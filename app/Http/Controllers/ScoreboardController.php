<?php

namespace App\Http\Controllers;

use App\Models\Circuit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Team;
use App\Models\Driver;
use App\Models\Scoreboard;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;


class ScoreboardController extends Controller
{

    public function storen(Request $request)
    {
    }

    public function getTime()
    {
        $scoreboards = DB::table('scoreboards')
            ->join('drivers', 'scoreboards.drivers_id', '=', 'drivers.id')
            ->join('teams', 'drivers.teams_id', '=', 'teams.id')
            ->select('scoreboards.time', 'drivers.name as driver_name', 'teams.name as team_name')
            ->get();

        return view('home', compact('scoreboards'));
    }

    public function getScoreboards()
    {

    }

    public function addscore(Request $request)
    {
        $teams = $this->teamsOphalen();
        $circuit = $this->circuitOphalen();
        return view('addscore', compact('teams', 'circuit'));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function CreateNewScoreboard(Request $request)
    {
        return Scoreboard::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
    }



    public function teamsOphalen()
    {
        $teams = Team::all();
        return $teams;
    }

    public function circuitOphalen()
    {
        $circuit = Circuit::all();
        return $circuit;
    }



    public function store(Request $request)
    {
    }
}
