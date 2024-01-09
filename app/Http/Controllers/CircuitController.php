<?php

namespace App\Http\Controllers;

use App\Models\Circuit;

class CircuitController extends Controller
{
    public function Circuit()
    {
        $Circuit = Team::all();
        return view('teams', ['teams' => $Circuit]);
    }
}
