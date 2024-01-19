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

    public function getScoreData()
    {
        $scores = Scoreboard::select('date', 'time')->orderBy('date')->get();

        $data = $scores->map(function ($score) {
            return [
                'label' => $score->date,
                'value' => $score->time,
            ];
        });

        return response()->json($data);
    }

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
            ->orderBy('scoreboards.time', 'asc') // Order by time in ascending order
            ->get();

        return view('scoreboard', compact('scoreboards'));
    }

    public function addscore()
    {
        $users = User::all();
        $teams = Team::all();
        $circuits = Circuit::all();

        return view('addscore', compact('users', 'teams', 'circuits'));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\Models\User
     */


    public function create()
    {
        $users = User::all();
        $teams = Team::all();
        $circuits = Circuit::all();

        return view('addscore.create', compact('users', 'teams', 'circuits'));
    }

    public function store(Request $request)
    {
        // Validate the request data as needed
        $request->validate([
            'users_id' => 'required',
            'time' => 'required',
            'teams_id' => 'required',
            'circuits_id' => 'required',
            'date' => 'required|date',
        ]);

        // Create a new scoreboard entry
        Scoreboard::create([
            'users_id' => $request->users_id,
            'time' => $request->time,
            'teams_id' => $request->teams_id,
            'circuits_id' => $request->circuits_id,
            'date' => $request->date,
        ]);

        return redirect()->route('scoreboard')->with('success', 'Score toegevoegd');
    }

    public function createScore(Request $request)
    {
        // Validate the request data
        $request->validate([
            'users_id' => 'required',
            'time' => 'required',
            'teams_id' => 'required',
            'circuits_id' => 'required',
            'date' => 'required|date',
        ]);

        // Create a new scoreboard entry in the database
        Scoreboard::create([
            'users_id' => $request->input('users_id'),
            'time' => $request->input('time'),
            'teams_id' => $request->input('teams_id'),
            'circuits_id' => $request->input('circuits_id'),
            'date' => $request->input('date'),
        ]);

        // Redirect back or to a success page
        return redirect()->route('addscore.create')->with('success', 'Score toegevoegd');
    }



}

