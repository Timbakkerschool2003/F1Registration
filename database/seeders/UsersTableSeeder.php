<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('drivers')->insert([
            'name' => 'Ashraf',
            'email' => 'Ashrafbasnoe@gmail.com',
            'password' => Hash::make('test123'),
            'teams_id' => Hash::make('1'),
        ]);

        // Voeg meer gebruikers toe zoals hierboven indien nodig.
    }
}
