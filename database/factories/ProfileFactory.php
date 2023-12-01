<?php

// database/factories/ProfileFactory.php

use Faker\Generator as Faker;

$factory->define(App\Models\Profile::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\Models\User::class),
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'mobile' => $faker->phoneNumber,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
    ];
});

