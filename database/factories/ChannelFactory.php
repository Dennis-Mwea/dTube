<?php

use Faker\Generator as Faker;

$factory->define(App\Channel::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'logo' => $faker->imageUrl(60, 60),
        'cover' => $faker->imageUrl(944, 320),
        'about' => $faker->text(rand(100, 500)),
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
    ];
});
