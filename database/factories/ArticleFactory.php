<?php

use Faker\Generator as Faker;

$factory->define(App\Article::class, function (Faker $faker) {
    return [
        'title'=>$faker->sentence(),
        'desc'=>$faker->paragraph,
        'body'=>$faker->text(),
    ];
});
