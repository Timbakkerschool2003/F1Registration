<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrophysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trophys = [
            ['id' => 1, 'trophyname' => 'Goud Australië Albert Park'],
            ['id' => 2, 'trophyname' => 'Zilver Australië Albert Park'],
            ['id' => 3, 'trophyname' => 'Brons Australië Albert Park'],
            ['id' => 4, 'trophyname' => 'Goud Bahrein International Circuit'],
            ['id' => 5, 'trophyname' => 'Zilver Bahrein International Circuit'],
            ['id' => 6, 'trophyname' => 'Brons Bahrein International Circuit'],
            ['id' => 7, 'trophyname' => 'Goud China Shanghai International Circuit'],
            ['id' => 8, 'trophyname' => 'Zilver China Shanghai International Circuit'],
            ['id' => 9, 'trophyname' => 'Brons China Shanghai International Circuit'],
            ['id' => 10, 'trophyname' => 'Goud GP Japan Suzaka Circuit'],
            ['id' => 11, 'trophyname' => 'Zilver GP Japan Suzaka Circuit'],
            ['id' => 12, 'trophyname' => 'Brons GP Japan Suzaka Circuit'],
            ['id' => 13, 'trophyname' => 'Goud GP Miami International Autodrome'],
            ['id' => 14, 'trophyname' => 'Zilver GP Miami International Autodrome'],
            ['id' => 15, 'trophyname' => 'Brons GP Miami International Autodrome'],
            ['id' => 16, 'trophyname' => 'Goud Saoedi-Arabië Jeddah Street Circuit'],
            ['id' => 17, 'trophyname' => 'Zilver Saoedi-Arabië Jeddah Street Circuit'],
            ['id' => 18, 'trophyname' => 'Brons Saoedi-Arabië Jeddah Street Circuit'],
        ];

        // Voeg de trophys toe aan de tabel
        DB::table('trophys')->insert($trophys);
    }
}
