<?php

// database/seeders/TeamsTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $teams = [
            ['id' => 1, 'name' => 'Aston Martin'],
            ['id' => 2, 'name' => 'Ferarri'],
            ['id' => 3, 'name' => 'McLaren'],
            ['id' => 4, 'name' => 'Mercedes'],
            ['id' => 5, 'name' => 'Red Bull'],
        ];

        // Voeg de teams toe aan de tabel
        DB::table('teams')->insert($teams);
    }
}

