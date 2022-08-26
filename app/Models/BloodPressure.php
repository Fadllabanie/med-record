<?php

namespace App\Models;

use App\Traits\HasMedia;
use App\Traits\BelongsToPatient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BloodPressure extends Model
{
    use HasFactory;
    use BelongsToPatient;
    use HasMedia;

    protected $fillable = [
        'patient_id',
        'pickup_time',
        'pickup_date',
        'upper_bound',
        'lower_bound',
        'lower_bound_beats',
        'comment',
        'status'
    ];
}
