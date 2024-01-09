<?php

namespace App\Http\Controllers;

use App\Models\Circuit;

class CircuitController extends Controller
{
    public function circuit()
    {
        return view('circuit');

    }
}
