<?php

namespace App\Models;

use App\Support\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Specialization extends Model
{
    use HasFactory;
    use Translatable;

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    protected $fillable = [
        'name_ar',
        'name_en',
        'active'
    ];

    protected $translatedAttributes = [
        'name'
    ];

    public function sopeActive($query, $status = self::STATUS_ACTIVE)
    {
        return $query->where('active', $status);
    }

    public function getStatusBadgeAttribute()
    {
        $badges = [
            self::STATUS_INACTIVE => 'danger',
            self::STATUS_ACTIVE => 'primary',
        ];

        return $badges[$this->active];
    }

    public function getStatusLabelAttribute()
    {
        $labels = [
            self::STATUS_INACTIVE => 'معطل',
            self::STATUS_ACTIVE => 'مفعل',
        ];

        return $labels[$this->active];
    }
}
