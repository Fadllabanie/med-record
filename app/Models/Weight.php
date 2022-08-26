<?php

namespace App\Models;

use App\Traits\HasMedia;
use App\Traits\BelongsToPatient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Weight extends Model
{
    use HasFactory;
    use BelongsToPatient;
    use HasMedia;
  
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'pickup_time',
        'pickup_date',
        'weight',
        'perfect_weight',
        'perfect_weight_unit',
        'height',
        'height_unit',
        'comment',
        'status'
    ];
}
