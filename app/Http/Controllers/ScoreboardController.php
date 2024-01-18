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
            ->join('users', 'scoreboards.users_id', '=', 'users.id')
            ->join('teams', 'scoreboards.teams_id', '=', 'teams.id')
            ->select('scoreboards.time', 'users.name as users_name', 'teams.name as team_name')
            ->get();

        return view('home', compact('scoreboards'));
    }

    public function getTimePersonal()
    {
        $scoreboardsPersonal = DB::table('scoreboards')
            ->join('users', 'scoreboards.users_id', '=', 'users.id')
            ->join('teams', 'scoreboards.teams_id', '=', 'teams.id')
            ->select('scoreboards.time', 'users.name as driver_name', 'teams.name as team_name', 'scoreboards.date')
            ->get();

        return view('scoreboard', compact('scoreboardsPersonal'));
    }

    public function getScoreboards()
    {
        $scoreboards = Scoreboard::join('users', 'scoreboards.users_id', '=', 'users.id')
            ->join('teams', 'scoreboards.teams_id', '=', 'teams.id')
            ->join('circuits', 'scoreboards.circuits_id', '=', 'circuits.id')
            ->select(
                'scoreboards.time',
                'users.name as driver_name',
                'teams.name as team_name',
                'circuits.name as circuit_name',
                'scoreboards.date'
            )
            ->get();

        return view('scoreboard', compact('scoreboards'));
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
