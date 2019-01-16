<?php

namespace Jamiicare\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctors';


    protected $fillable = [
        'user_id',
        'moh_number'
    ];
}
