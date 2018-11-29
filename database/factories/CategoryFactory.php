<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => ucfirst($faker->words(rand(5, 20), true)),
    ];
});
