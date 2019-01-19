<?php

use Faker\Generator as Faker;

$factory->define(\Jamiicare\Models\Appointment::class, function (Faker $faker) {
    return [
        'patient_id' => create(\Jamiicare\Models\User::class)->id,
        'doctor_id' => create(\Jamiicare\Models\Doctor::class)->id,
        'date' => \Carbon\Carbon::parse('+3 days')->toDateString(),
        'title' => $faker->sentence(8, false),
        'description' => $faker->paragraph(3, false),
        'appointment_type_id' => create(\Jamiicare\Models\AppointmentType::class)->id,
    ];
});

$factory->state(\Jamiicare\Models\Appointment::class, 'pending', function (Faker $faker) {
   return [
       'approved_at' => null
   ];
});

$factory->state(\Jamiicare\Models\Appointment::class, 'approved', function (Faker $faker) {
    return [
        'approved_at' => \Carbon\Carbon::now()
    ];
});

$factory->define(\Jamiicare\Models\AppointmentType::class, function (Faker $faker) {
   return [
       'name' => $faker->randomElement(['Economy', 'Executive'])
   ];
});
