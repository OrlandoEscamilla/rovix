<?php

use Faker\Generator as Faker;

$factory->define(App\Resource::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'user_id' => rand(1,3),
        'type_id' => rand(1,6),
        'has_cost' => rand(0,1),
        'language_id' => rand(1,6),
        'link' => $faker->url,
        'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'tags' => $faker->words($nb = rand(0,5), $asText = true),
        'created_at' => $faker->dateTime($max = 'now', $timezone = null),
        'updated_at' => $faker->dateTime($max = 'now', $timezone = null),
        'deleted_at' => '2017-11-27 00:00:00',
        'short_description' => $faker->sentences($nb = 5, $asText = true)
    ];
});
