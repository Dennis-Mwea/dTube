<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'body' => $faker->realText(rand(10, 200)),
        'video_id' => function () {
            return App\Video::inRandomOrder()->first()->id;
        },
        'user_id' => function () {
            return App\User::inRandomOrder()->first()->id;
        },
        'created_at' => $faker->dateTimeThisMonth,
    ];
});
