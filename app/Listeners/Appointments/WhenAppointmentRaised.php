<?php

namespace App\Listeners\Appointments;

use App\Events\Appointments\AppointmentRaised;
use App\Notifications\AppointmentRaisedNotification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class WhenAppointmentRaised
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AppointmentRaised  $event
     * @return void
     */
    public function handle(AppointmentRaised $event)
    {
        $this->sendAppointmentRaisedNotification($event->appointment);
    }

    private function sendAppointmentRaisedNotification($appointment)
    {
        Notification::send(
            $appointment->doctor->user,
            new AppointmentRaisedNotification($appointment)
        );
    }
}
