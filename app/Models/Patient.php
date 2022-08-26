<?php

namespace App\Models;

use App\Traits\BelongsToDoctor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory;
    use BelongsToDoctor;

    protected $fillable = [
        'code',
        'doctor_id',
        'full_name',
        'email',
        'password',
        'mobile',
        'insurance_number',
        'birthday',
        'gender',
        'country_id',
        'city_id',
        'lng',
        'lat',
        'avatar',
        'blood_type',
        'allergy',
        'immunity',
        'chronic_diseases',
        'surgery',
        'note',
        'last_visit'
    ];

    public function setCodeAttribute($value)
    {
        $this->attributes['code'] = generateRandomCode('PNT');
    }

    public function medicalTests()
    {
        return $this->hasMany(MedicalTest::class);
    }
}
