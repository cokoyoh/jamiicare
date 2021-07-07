<?php
/**
 * Jamiicare
 *
 * @author Charles <cokoyoh@cytonn.com>
 *
 * Project CRM
 *
 * @date  2019-01-18
 *
 */

namespace Jamiicare\Appointments;

use Carbon\Carbon;
use Laracasts\Presenter\Presenter;

class AppointmentsPresenter extends Presenter
{
    public function doctor()
    {
        return $this->entity->doctor->user->fullname;
    }

    public function appointmentDate()
    {
        return Carbon::parse($this->date)->toFormattedDateString();
    }

    public function status()
    {
        return $this->approved_at ? 'Approved' : 'Pending';
    }

    public function type()
    {
        return $this->entity->appointmentType->name;
    }
}