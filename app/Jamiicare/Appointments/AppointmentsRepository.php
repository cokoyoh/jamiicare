<?php

namespace Jamiicare\Appointments;

use Carbon\Carbon;
use Jamiicare\Models\Appointment;
use Jamiicare\Models\Doctor;

class AppointmentsRepository
{
    public function getAppointmentsById($id)
    {
        return Appointment::findOrFail($id);
    }


    public function save($input, $id = null)
    {
        $input['doctor_id'] = $this->getDoctorId($input['doctor_id']);

        if ($id) {
            $appointment = $this->getAppointmentsById($id);

            $appointment->update($input);

            return $appointment;
        }

        return Appointment::create($input);
    }


    public function getUserAppointments()
    {
        return Appointment::mine()
            ->get();
    }

    public function approve(Appointment $appointment)
    {
        $appointment->update([
            'approved_at' => Carbon::now()
        ]);
    }

    private function getDoctorId($userId)
    {
        return Doctor::where('user_id', $userId)
            ->first()
            ->id;
    }
}
