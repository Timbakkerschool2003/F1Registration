<?php
// database/factories/TeamFactory.php

namespace Database\Factories;

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Team;

class TeamFactory extends Factory
{
    protected $model = Team::class;

    public function definition()
    {
        return [
            'teamname' => $this->faker->word,
            // Voeg andere velden toe zoals nodig
        ];
    }
}


