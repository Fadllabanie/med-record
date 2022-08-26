<?php

namespace App\Models;

use App\Traits\BelongsToPatient;
use App\Traits\HasMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sugar extends Model
{
    use HasFactory;
    use BelongsToPatient;
    use HasMedia;

    protected $fillable = [
        'patient_id',
        'pickup_time',
        'pickup_date',
        'test_type',
        'sugar_level',
        'measuring_unit',
        'comment',
        'status'
    ];

}
