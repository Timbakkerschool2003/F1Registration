<?php

// database/factories/UserFactory.php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => $faker->dateTime,
        'password' => bcrypt('password'), // Change 'password' to your desired default password
        'remember_token' => Str::random(10),
    ];
});

