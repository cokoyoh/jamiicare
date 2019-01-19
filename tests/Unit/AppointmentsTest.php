<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Jamiicare\Models\Appointment;
use Jamiicare\Models\AppointmentType;
use Jamiicare\Models\Doctor;
use Tests\TestCase;

class AppointmentsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_gets_user_specific_appointments()
    {
        $this->signUp();

        $appointmentA = create(Appointment::class, [
            'patient_id' => auth()->id(),
        ]);

        $appointmentB = create(Appointment::class);

        $userAppoitments = Appointment::mine()->get();

        $this->assertEquals(1, $userAppoitments->count());

        $this->assertTrue($userAppoitments->contains($appointmentA));

        $this->assertFalse($userAppoitments->contains($appointmentB));
    }

    /** @test */
    public function it_is_an_instance_of_doctor()
    {
        $appointment = create(Appointment::class);

        $this->assertInstanceOf(Doctor::class, $appointment->doctor);
    }

    /** @test */
    public function it_shows_the_status_of_an_appointment()
    {
        $pendingAppointment = state(Appointment::class, [], 'pending');

        $approvedAppointment = state(Appointment::class, [], 'approved');

        $this->assertEquals($pendingAppointment->present()->status, 'Pending');

        $this->assertEquals($approvedAppointment->present()->status, 'Approved');
    }

    /** @test */
    public function it_belongs_to_an_appointment_type()
    {
        $appointment = create(Appointment::class);

        $this->assertInstanceOf(AppointmentType::class, $appointment->appointmentType);
    }
}
