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

    /**
     * Display the home page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Get the personal scoreboard data for the home page.
     *
     * @return \Illuminate\View\View
     */
    public function getTimePersonalHome()
    {
        // Retrieve personal scoreboard data
        $scoreboardsPersonal = DB::table('scoreboards')
            ->join('users', 'scoreboards.users_id', '=', 'users.id')
            ->join('teams', 'scoreboards.teams_id', '=', 'teams.id')
            ->join('circuits', 'scoreboards.circuits_id', '=', 'circuits.id')
            ->select('scoreboards.time', 'users.name as driver_name', 'teams.name as team_name', 'scoreboards.date', 'circuits.name as circuit_name')
            ->orderBy('scoreboards.time', 'asc')
            ->take(5)
            ->get();

        // Retrieve circuit data for the home page
        $circuitDataHome = DB::table('scoreboards')
            ->join('circuits', 'scoreboards.circuits_id', '=', 'circuits.id')
            ->select('circuits.*')
            ->first();

        return view('home', compact('scoreboardsPersonal', 'circuitDataHome'));
    }

    /**
     * Get circuit data and personal scoreboard data for a specific scoreboard ID.
     *
     * @param  int  $scoreboardId
     * @return \Illuminate\View\View
     */
    public function getCircuitDataHome($scoreboardId)
    {
        // Retrieve circuit data for a specific scoreboard ID
        $circuitDataHome = DB::table('scoreboards')
            ->join('circuits', 'scoreboards.circuits_id', '=', 'circuits.id')
            ->where('scoreboards.id', $scoreboardId)
            ->select('circuits.*')
            ->first();

        // Retrieve personal scoreboard data for the home page
        $scoreboardsPersonalHome = DB::table('scoreboards')
            ->join('users', 'scoreboards.users_id', '=', 'users.id')
            ->join('teams', 'scoreboards.teams_id', '=', 'teams.id')
            ->join('circuits', 'scoreboards.circuits_id', '=', 'circuits.id')
            ->select('scoreboards.time', 'users.name as driver_name', 'teams.name as team_name', 'scoreboards.date', 'circuits.name as circuit_name')
            ->get();

        return view('home', compact('circuitDataHome', 'scoreboardsPersonalHome'));
    }
}
