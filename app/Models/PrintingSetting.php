<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrintingSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'doctor_id',
        'left',
        'right',
        'top',
        'bottom',
        'add_signature',
        'add_diagnosis',
        'settings',
    ];

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id', 'id');
    }
}
