<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Courses;
use Faker\Generator as Faker;

$factory->define(Courses::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        // 'capacity' => $faker->randomElement([3,4,5,6,7,8])
        'capacity' => $faker->randomElement(['3','4','5','6','7','8'])
        // randomElements($array = array ('a','b','c'), $count = 1)
    ];
});
