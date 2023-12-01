<?php
// database/factories/ScoreboardFactory.php
use Faker\Generator as Faker;

$factory->define(App\Scoreboard::class, function (Faker $faker) {
    return [
        'time' => $faker->time,
        'teams_id' => function () {
            return factory(App\Team::class)->create()->id;
        },
        // Add other fields as needed
    ];
});
