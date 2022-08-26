<?php

namespace App\Models;

use App\Traits\HasMedia;
use App\Traits\BelongsToPatient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Temperature extends Model
{

    use HasFactory;
    use BelongsToPatient;
    use HasMedia;

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'pickup_time',
        'pickup_date',
        'temperature',
        'type',
        'comment',
        'status'
    ];
}
