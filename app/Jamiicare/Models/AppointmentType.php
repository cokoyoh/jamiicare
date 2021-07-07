<?php

namespace Jamiicare\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AppointmentType extends Model
{
    use SoftDeletes;

    protected $table = 'appointment_types';

    protected $fillable = [
        'name'
    ];

    protected $dates = [
        'deleted_at'
    ];
}
