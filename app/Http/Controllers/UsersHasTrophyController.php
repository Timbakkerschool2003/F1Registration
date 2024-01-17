<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserHasTrophy; // Make sure to import the UserHasTrophy model

class UsersHasTrophyController extends Controller
{
    public function getTrophyData()
    {
        // Retrieve data from the users_has_trophys table along with user names
        $trophyData = userhastrophys::with('user')->get();

        // You can then pass $trophyData to your view or process it further as needed

        return view('trophies', ['trophyGegevens' => $trophyData]);
    }
}
