<?php

namespace App\Http\Controllers;

use App\Models\Circuit;

class CircuitController extends Controller
{
    public function circuit()
    {
        $circuit = circuit::all();
        return view('circuit' , ['circuit' => $circuit]);

    }
}
