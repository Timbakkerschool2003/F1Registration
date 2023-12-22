<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Team;
use App\Models\Scoreboard;




class ScoreboardController extends Controller
{
    public function storing(Request $request)
    {
        // Valideer de invoer, je kunt de validate methode gebruiken zoals hieronder of Laravel Form Request gebruiken.
        $request->validate([
            'driver_name' => 'required|string',
            'time' => 'required|date_format:H:i',
            'team_name' => 'required|exists:teams,id', // Zorg ervoor dat het team bestaat in de teams tabel
            'circuit' => 'required|string',
            'date' => 'required|date',
        ]);

        // Sla de gegevens op in de database
        Scoreboard::create($request->all());

        // Stuur de gebruiker door naar een andere pagina of voer andere logica uit
        return redirect()->route('scoreboard.index')->with('success', 'Score toegevoegd!');
    }











    public function getTime()
    {
        $scoreboards = DB::table('scoreboard')
            ->join('drivers', 'scoreboard.drivers_id', '=', 'drivers.id')
            ->join('teams', 'drivers.teams_id', '=', 'teams.id')
            ->select('scoreboard.time', 'drivers.name as driver_name', 'teams.name as team_name')
            ->get();

        return view('home', compact('scoreboards'));
    }

    public function getScoreboard()
    {
        $scoreboards = DB::table('scoreboard')
            ->join('drivers', 'scoreboard.drivers_id', '=', 'drivers.id')
            ->join('teams', 'drivers.teams_id', '=', 'teams.id')
            ->select('scoreboard.time', 'drivers.name as driver_name', 'teams.name as team_name', 'scoreboard.date')
            ->get();

        return view('scoreboard', compact('scoreboards'));
    }

    public function create()
    {
        $teams = Team::all();
        return view('addscore', ['teams' => $teams]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'time' => 'required',
            'team_name' => 'required|exists:teams,name', // Valideer de teamnaam in de teams-tabel
            'date' => 'required',
        ]);


        $team = Team::where('name', $validatedData['team_name'])->first();

        if ($team) {
            $driver = $team->driver;
            $scoreboard = new Scoreboard();
            $scoreboard->drivers_id = $driver->id;
            $scoreboard->time = $validatedData['time'];
            $scoreboard->date = $validatedData['date'];
            $scoreboard->save();

            return redirect()->route('success_route');
        } else {
            return redirect()->back()->with('error', 'Team not found');
        }
    }
}



