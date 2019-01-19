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

        $post = make(Appointment::class, ['patient_id' => auth()->id(), 'doctor_id' => $doctor->id])->toArray();

        $response = $this->post(route('appointments.store'), $post);

        $this->assertCount(1, Appointment::all());

        $appointment = Appointment::latest()->first();

        $this->assertEquals($appointment->patient_id, auth()->id());

        $this->assertEquals($appointment->doctor_id, $doctor->id);

        $response->assertRedirect(route('appointments'));
    }

    /** @test */
    public function authorised_users_can_view_their_appointments()
    {
        $this->signUp();

        $appointment = create(Appointment::class, [
            'patient_id' => auth()->id()
        ]);

       $this->get(route('appointments'))
             ->assertSee($appointment->title)
             ->assertSee($appointment->present()->status);
    }
}
