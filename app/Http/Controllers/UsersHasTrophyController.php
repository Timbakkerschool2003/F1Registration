<?php

// app\Http\Controllers\UsersHasTrophyController.php

namespace App\Http\Controllers;

use App\Models\UserHasTrophy;
use Illuminate\Http\Request;

class UsersHasTrophyController extends Controller
{
    /**
     * Display a listing of users with their trophies.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Retrieve users with trophies information
        $usersWithTrophies = UserHasTrophy::with('user', 'trophy')->get();

        // Pass the data to the 'trophies' view
        return view('trophies', compact('usersWithTrophies'));
    }
}
