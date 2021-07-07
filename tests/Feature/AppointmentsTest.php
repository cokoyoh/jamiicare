<?php

namespace Tests\Feature;

use Jamiicare\Models\Appointment;
use Jamiicare\Models\Doctor;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Jamiicare\Models\User;
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

    /** @test */
    public function a_doctor_can_approve_their_appointment()
    {
        $user = create(User::class);

        $this->signUp($user);

        $doctor = create(Doctor::class, ['user_id' => $user->id]);

        $appointment = create(Appointment::class, ['doctor_id' => $doctor->id]);

        $this->assertNull($appointment->fresh()->approved_at);

        $response = $this->get(route('appointments.approve', $appointment->id));

        $this->assertNotNull($appointment->fresh()->approved_at);

        $response->assertRedirect(route('appointments'));
    }
}
