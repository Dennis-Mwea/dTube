<?php

use Faker\Generator as Faker;

$factory->define(App\Video::class, function (Faker $faker) {
    return [
        'title' => ucfirst($faker->words(rand(5, 20), true)),
        'description' => $faker->realText(rand(80, 600)),
        'published' => $faker->boolean(95),
        'url' => $faker->url,
        'thumbnail' => $faker->imageUrl(336, 188, null, true),
        'allow_comments' => $faker->boolean(80),
        'views' => $faker->randomDigit,
        'user_id' => function () {
            return App\User::inRandomOrder()->first()->id;
        },
        'category_id' => function () {
            $category = App\Category::inRandomOrder()->first();

            return $category ? $category->id : factory(App\Category::class)->create()->id;
        },
        'created_at' => $faker->dateTimeThisMonth,
    ];
});
