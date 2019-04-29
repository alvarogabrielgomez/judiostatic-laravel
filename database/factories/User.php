<?php

use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'client_first' => $faker->name,
        'client_last' => $faker->name,
        'active' => '1',
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});