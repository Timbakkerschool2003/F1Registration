<?php

namespace App\Http\Controllers;

use App\Models\Circuit;
use App\Models\Team;

class TeamsController extends Controller
{
    //Hier worden alle teams opgehaald
    public function getAllTeams()
    {
        $teams = Team::all();
        return view('teams' , ['teams' => $teams]);
    }

    //Hier worden alle circuits opgehaald
    public function getCircuits()
    {
        $circuit = Circuit::all();
        return view('circuit' , ['circuit' => $circuit]);
    }

}
