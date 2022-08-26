<?php

namespace App\Models;

use App\Traits\HasMedia;
use App\Traits\BelongsToPatient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Family extends Model
{
    use HasFactory;
    use BelongsToPatient;
    use HasMedia;

    protected $fillable = [
        'patient_id',
        'pickup_time',
        'pickup_date',
        'relationship',
        'medical_condition',
        'comment',
        'status'
    ];
}
