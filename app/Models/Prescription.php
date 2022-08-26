<?php

namespace App\Models;

use App\Traits\BelongsToPatient;
use App\Traits\HasMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Prescription extends Model
{
    use HasFactory;
    use BelongsToPatient;
    use HasMedia;

    protected $fillable = [
        'patient_id',
        'pickup_time',
        'pickup_date',
        'test_type',
        'test_result',
        'normal_test_percentage',
        'doctor_name',
        'lab_name',
        'comment',
        'status'
    ];
}
