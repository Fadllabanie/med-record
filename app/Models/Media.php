<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Media extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = [
        'full_url'
    ];

    public function getFilepathAttribute()
    {
        return 'media/' . auth()->id() . '/' . $this->created_at->format('Y') . '/' . $this->created_at->format('m');
    }

    public function getFullUrlAttribute()
    {
        return asset('storage/' . $this->filepath);
    }

    public function model(): MorphTo
    {
        return $this->morphTo();
    }
}
