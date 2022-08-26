<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'code',
        'specialization_id',
        'country_id',
        'city_id',
        'full_name',
        'mobile',
        'birthday',
        'gender',
        'lng',
        'lat',
    ];

    public function getGenderLabelAttribute()
    {
        $labels = [
            'male' => 'ذكر',
            'female' => 'أنثي'
        ];

        return $labels[$this->gender] ?? 'غير معرف';
    }

    public function clinics()
    {
        return $this->hasMany(Clinic::class, 'doctor_id');
    }

    public function clinic()
    {
        return $this->hasOne(Clinic::class);
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    } 
    
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function patients()
    {
        return $this->hasMany(Patient::class, 'doctor_id', 'id');
    }

    public function printingSetting()
    {
        return $this->hasOne(PrintingSetting::class);
    }
}
