<?php

namespace App\Models;

use App\Traits\BelongsToDoctor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;
    use BelongsToDoctor;

    protected $fillable = [
        'code',
        'doctor_id',
        'name',
        'describe_specialize',
        'email',
        'logo',
        'mobile',
        'another_mobile',
        'whatsapp_number',
        'signature_text',
        'signature_image',
        'attachment',
        'is_display',
    ];
}
