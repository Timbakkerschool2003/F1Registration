<?php

// app\Http\Controllers\YourController.php

namespace App\Http\Controllers;

use App\Models\UserHasTrophy;
use Illuminate\Http\Request;

class UsersHasTrophyController extends Controller
{
    public function index()
    {
        $usersWithTrophies = UserHasTrophy::with('user', 'trophy')->get();

        return view('trophies', compact('usersWithTrophies'));
    }
}
