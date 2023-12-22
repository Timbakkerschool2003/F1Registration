<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trophy;
use App\Models\Driver;

class TrophyController extends Controller
{
    public function index()
    {
        $drivers = Driver::withCount([
            'trophies as gold_count' => function ($query) {
                $query->where('name', 'gold');
            },
            'trophies as silver_count' => function ($query) {
                $query->where('name', 'silver');
            },
            'trophies as bronze_count' => function ($query) {
                $query->where('name', 'bronze');
            },
        ])->get();

        return view('trophies', ['drivers' => $drivers]);
    }
}
