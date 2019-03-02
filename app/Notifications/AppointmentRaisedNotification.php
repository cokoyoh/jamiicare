<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AppointmentRaisedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $appointment;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($appointment)
    {
        $this->appointment = $appointment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $appointment = $this->appointment;

        $doctor = $appointment->present()->doctor;

        $patient = $appointment->present()->patient;

        return (new MailMessage)
            ->greeting('Dear Dr. ' . $doctor . ',')
            ->line('This is to inform you that ' . $patient . ' has reserved an appointment with you on '
                . Carbon::parse($appointment->date)->toFormattedDateString() . '.')
            ->line('The description of the appointment is - ' . $appointment->description)
            ->action('View Appointment', url(route('appointments')))
            ->line('Kindly take time to approve the appointment before the appointment date.')
            ->line('Thank you.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
