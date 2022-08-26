<?php

namespace App\Models;

use App\Support\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory;
    use Translatable;

    protected $translatedAttributes = [
        'name'
    ];

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
