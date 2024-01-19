<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Admin gebruiker 1
        DB::table('users')->insert([
            'name' => 'Ashraf',
            'email' => 'Ashrafbasnoe@gmail.com',
            'password' => Hash::make('test123'),
            'is_admin' => 1,
        ]);

        // Admin gebruiker 2
        DB::table('users')->insert([
            'name' => 'Admin2',
            'email' => 'admin2@example.com',
            'password' => Hash::make('admin123'),
            'is_admin' => 1,
        ]);

        // Normale gebruiker 1
        DB::table('users')->insert([
            'name' => 'Gebruiker1',
            'email' => 'gebruiker1@example.com',
            'password' => Hash::make('user123'),
            'is_admin' => 0,
        ]);

        // Normale gebruiker 2
        DB::table('users')->insert([
            'name' => 'Gebruiker2',
            'email' => 'gebruiker2@example.com',
            'password' => Hash::make('user456'),
            'is_admin' => 0,
        ]);

        // Normale gebruiker 3
        DB::table('users')->insert([
            'name' => 'Gebruiker3',
            'email' => 'gebruiker3@example.com',
            'password' => Hash::make('user789'),
            'is_admin' => 0,
        ]);
    }
}

