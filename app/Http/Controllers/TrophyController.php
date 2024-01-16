<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trophy;
use App\Models\User;

class TrophyController extends Controller
{
    public function index()
    {
        // Note: Use 'User' instead of 'users'
        $users = User::withCount([
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

        return view('trophies', ['users' => $users]);
    }
}
