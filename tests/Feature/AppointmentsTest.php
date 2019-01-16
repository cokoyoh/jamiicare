<?php

namespace Tests\Feature;

use Jamiicare\Models\Appointment;
use Jamiicare\Models\Doctor;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AppointmentsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function authorised_users_can_add_appointments()
    {
        $this->signUp();

        $doctor = create(Doctor::class);

        $post = [
            'doctor_id' => $doctor->id,
            'time' => Carbon::now()->format('H:i'),
            'description' => 'Need to see the doc',
            'patient_id' => auth()->id(),
        ];

        $this->post(route('appointments.store'), $post);

        $this->assertCount(1, Appointment::all());

        $appointment = Appointment::latest()->first();

        $this->assertEquals($appointment->patient_id, auth()->id());

        $this->assertEquals($appointment->doctor_id, $doctor->id);
    }
}
