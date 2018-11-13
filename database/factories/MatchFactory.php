<?php

use Faker\Generator as Faker;

$factory->define(App\Match::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'next' => 0,
        'winner' => 0,
        'board' => [
            0, 0, 0,
            0, 0, 0,
            0, 0, 0,
        ]
    ];
});
