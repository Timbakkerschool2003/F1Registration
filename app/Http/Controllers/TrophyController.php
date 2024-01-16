<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrophyController extends Controller
{
    public function haalAlleTrophyGegevensOp() {
        // Gebruik het juiste model (vervang Trophy door het werkelijke modelnaam)
        $trophyGegevens = DB::table('users_has_trophys')->get();

        // Retourneer de opgehaalde gegevens
        return $trophyGegevens;
    }


    // Voorbeeld van het gebruik van de functie
    public function voorbeeldGebruik() {
        // Roep de functie aan om alle trophy gegevens op te halen
        $trophyGegevens = $this->haalAlleTrophyGegevensOp();
        dd($trophyGegevens);

        // Stuur de gegevens door naar de view 'trophies.blade.php'
        return view('trophies', ['trophyGegevens' => $trophyGegevens]);

    }
}
