<?php

use Faker\Generator as Faker;

$factory->define(\Jamiicare\Models\Doctor::class, function (Faker $faker) {
    return [
        'user_id' => create(\Jamiicare\Models\User::class)->id,
        'moh_number' => 'MOH' . $faker->randomNumber(8, true)
    ];
});
