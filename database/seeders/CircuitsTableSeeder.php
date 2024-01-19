<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CircuitsTableSeeder extends Seeder
{
    public function run()
    {
        $circuits = [
            ['id' => 1, 'name' => 'Australië Albert Park'],
            ['id' => 2, 'name' => 'Bahrein International Circuit'],
            ['id' => 3, 'name' => 'China Shanghai International Circuit'],
            ['id' => 4, 'name' => 'GP Japan Suzaka Circuit'],
            ['id' => 5, 'name' => 'GP Miami International Autodrome'],
            ['id' => 6, 'name' => 'Saoëdi-Arabië Jeddah Street Circuit'],
        ];

        // Voeg de circuits toe aan de tabel
        DB::table('circuits')->insert($circuits);
    }
}
