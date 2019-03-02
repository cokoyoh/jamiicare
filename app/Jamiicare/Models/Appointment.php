<?php

namespace Jamiicare\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jamiicare\Appointments\AppointmentsPresenter;
use Laracasts\Presenter\PresentableTrait;

class Appointment extends Model
{
    use PresentableTrait,
        SoftDeletes;

    protected $table = 'appointments';

    protected $presenter = AppointmentsPresenter::class;

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'appointment_type_id',
        'date',
        'title',
        'description',
        'approved_at'
    ];

    protected $dates = [
        'deleted_at'
    ];

    public function scopeMine($query)
    {
        return $query
            ->where('patient_id', auth()->id())
            ->orWhere('doctor_id', auth()->user()->doctor->id);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function appointmentType()
    {
        return $this->belongsTo(AppointmentType::class);
    }

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
}
