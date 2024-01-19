<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call(CircuitsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TeamsTableSeeder::class);
        $this->call(TrophysTableSeeder::class); // Voeg deze regel toe
        \App\Models\Scoreboard::factory(20)->create();
        // Voeg andere factories toe zoals nodig
    }
}
