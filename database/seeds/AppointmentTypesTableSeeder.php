<?php

use Illuminate\Database\Seeder;
use Jamiicare\Models\AppointmentType;

class AppointmentTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $appointmentTypes = [
           ['id' => 1, 'name' => 'Economy'],
           ['id' => 2, 'name' => 'Executive'],
        ];

        collect($appointmentTypes)
            ->each(function ($appointmentType) {
                AppointmentType::create($appointmentType);
            });
    }
}
