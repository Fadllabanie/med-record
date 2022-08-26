<?php

namespace App\Models;

use App\Support\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExaminationData extends Model
{
    use HasFactory;
    use Translatable;

    protected $fillable = [
        'examination_id',
        'name_ar',
        'name_en',
    ];

    protected $translatedAttributes = [
        'name'
    ];

    public function examination()
    {
        return $this->belongsTo(Examination::class);
    }
}
