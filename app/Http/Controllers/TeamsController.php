<?php

namespace App\Http\Controllers;

use App\Models\Circuit;
use App\Models\Team;

class TeamsController extends Controller
{
    public function teamsOphalen()
    {
        $teams = Team::all();
        return view('teams' , ['teams' => $teams]);
    }

    public function circuitOphalen()
    {
        $circuit = Circuit::all();
        return view('circuit' , ['circuit' => $circuit]);
    }

}
