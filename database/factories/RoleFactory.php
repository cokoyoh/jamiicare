<?php

use Faker\Generator as Faker;

$factory->define(\Jamiicare\Models\Role::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['User', 'Admin', 'Other']),
        'description' => $faker->sentence(8, false)
    ];
});
