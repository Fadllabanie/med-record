<?php

namespace App\Traits;

use App\Models\Patient;

trait BelongsToPatient
{
    public function scopePatient($query)
    {
        return $query->where('patient_id', request()->get('patient_id'));
    }
}
