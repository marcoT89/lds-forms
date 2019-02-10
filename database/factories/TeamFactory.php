<?php

use App\Models\Team;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Team::class, function (Faker $faker) {
    return [
        'name'     => $faker->company,
    ];
});
