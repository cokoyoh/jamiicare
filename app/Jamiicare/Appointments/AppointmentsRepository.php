<?php

namespace Jamiicare\Appointments;

use Jamiicare\Models\Appointment;

class AppointmentsRepository
{
    public function getAppointmentsById($id)
    {
        return Appointment::findOrFail($id);
    }


    public function save($input, $id = null)
    {
        if ($id) {
            $appointment = $this->getAppointmentsById($id);

            $appointment->update($input);

            return $appointment;
        }

        return Appointment::create($input);
    }
}
