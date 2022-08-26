<?php

namespace App\Models;

use App\Support\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Examination extends Model
{
    use HasFactory;
    use Translatable;

    protected $fillable = [
        'name_ar',
        'name_en',
    ];
    protected $translatedAttributes = [
        'name'
    ];


}
