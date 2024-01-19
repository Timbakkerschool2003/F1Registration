<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }


    public function getTimePersonalHome()
    {
        $scoreboardsPersonal = DB::table('scoreboards')
            ->join('users', 'scoreboards.users_id', '=', 'users.id')
            ->join('teams', 'scoreboards.teams_id', '=', 'teams.id')
            ->join('circuits', 'scoreboards.circuits_id', '=', 'circuits.id')
            ->select('scoreboards.time', 'users.name as driver_name', 'teams.name as team_name', 'scoreboards.date', 'circuits.name as circuit_name')
            ->orderBy('scoreboards.time', 'asc')
            ->take(5)
            ->get();

        $circuitDataHome = DB::table('scoreboards')
            ->join('circuits', 'scoreboards.circuits_id', '=', 'circuits.id')
            ->select('circuits.*')
            ->first();

        return view('home', compact('scoreboardsPersonal', 'circuitDataHome'));
    }


    public function getCircuitDataHome($scoreboardId)
    {
        $circuitDataHome = DB::table('scoreboards')
            ->join('circuits', 'scoreboards.circuits_id', '=', 'circuits.id')
            ->where('scoreboards.id', $scoreboardId)
            ->select('circuits.*')
            ->first();

        $scoreboardsPersonalHome = DB::table('scoreboards')
            ->join('users', 'scoreboards.users_id', '=', 'users.id')
            ->join('teams', 'scoreboards.teams_id', '=', 'teams.id')
            ->join('circuits', 'scoreboards.circuits_id', '=', 'circuits.id')
            ->select('scoreboards.time', 'users.name as driver_name', 'teams.name as team_name', 'scoreboards.date', 'circuits.name as circuit_name')
            ->get();

        return view('home', compact('circuitDataHome', 'scoreboardsPersonalHome'));
    }
}
