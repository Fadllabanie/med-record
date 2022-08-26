<?php

namespace App\Traits;

use App\Models\Doctor;

trait BelongsToDoctor
{
    public function scopeTenant($query)
    {
        return $query->where('doctor_id', auth()->user()->doctor->id);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
