<?php

namespace App\Http\Controllers;

use App\Models\Team;

class TeamsController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        return view('teams', ['teams' => $teams]); 
}
