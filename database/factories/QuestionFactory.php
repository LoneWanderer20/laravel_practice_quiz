<?php

use Faker\Generator as Faker;

$factory->define(App\Question::class, function (Faker $faker) {
    $topicId = rand(1, 10);

    return [
        'topic_id' => $topicId,
        'question' => $faker->sentence($nbWords = 15, $variableNbWords = true),
        'answer'   => $faker->word,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
