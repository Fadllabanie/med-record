<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    protected $fillable = [
        'name',
        'email',
        'avatar',
        'provider_name',
        'provider_id',
        'active',
        'role',
        'password',
        'remember_token'
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute($value)
    {
        if (is_null($value)) {
            return 'http://unavatar.now.sh/' . urlencode($this->email) . '?' . http_build_query([
                'fallback' => 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&color=1BC5BD&background=C9F7F5'
            ]);
        }

        return asset('storage/' . $value);
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

    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }

    public function isAdmin()
    {
        if ($this->role !== 'admin') {
            return false;
        }

        return true;
    }
}
