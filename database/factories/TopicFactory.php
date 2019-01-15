<?php

use Faker\Generator as Faker;


$factory->define(App\Topic::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'question_count' => 10,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
