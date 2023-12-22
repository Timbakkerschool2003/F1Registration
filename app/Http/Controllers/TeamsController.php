<?php

namespace App\Http\Controllers;

class TeamsController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        return view('teams', ['teams' => $teams]);
    }
}
