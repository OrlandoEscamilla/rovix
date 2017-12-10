<?php

use App\Platform;
use Carbon\Carbon;
use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(Platform::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence($nbWords = rand(3, 6), $variableNbWords = true),
        'short_description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'description' => $faker->paragraph($nbSentences = 9, $variableNbSentences = true),
        'image' => $faker->imageUrl($width = 640, $height = 480), // 'http://lorempixel.com/640/480/'
        'link' => $faker->url,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ];
});
