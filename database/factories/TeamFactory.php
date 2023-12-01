<?php

// database/factories/TeamFactory.php
use Faker\Generator as Faker;

$factory->define(App\Team::class, function (Faker $faker) {
    return [
        'teamname' => $faker->word,
        // Add other fields as needed
    ];
});
