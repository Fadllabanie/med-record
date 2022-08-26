<?php

namespace App\Models;

use App\Traits\BelongsToPatient;
use App\Traits\HasMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surgery extends Model
{
    use HasFactory;
    use BelongsToPatient;
    use HasMedia;

    protected $fillable = [
        'patient_id',
        'pickup_time',
        'pickup_date',
        'surgery_type',
        'surgery_result',
        'doctor_name',
        'hospital_name',
        'comment',
        'status'
    ];

}
