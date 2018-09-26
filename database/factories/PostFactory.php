<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(20),
        'slug' => $faker->url(20),
        'body' => $faker->paragraph(30)
    ];
});
