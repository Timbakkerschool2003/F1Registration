<?php

namespace App\Http\Controllers;

use App\Models\Circuit;
use App\Models\Team;

class TeamsController extends Controller
{
    public function teamsOphalen()
    {
        $teams = Team::all();
        $circuit = Circuit::all();
        return view('teams' , ['teams' => $teams], ['circuit' => $circuit]);
    }

}
