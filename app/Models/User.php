<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property UuidInterface   $id
 * @property string          $name
 * @property string          $email
 * @property string          $password
 * @property CarbonInterface $created_at
 * @property CarbonInterface $updated_at
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable, HasUUID;

    /**
     * @var array<string>
    */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * @var array<string>
    */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @var array<string>
    */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }

    public function referrals(): HasMany
    {
        return $this->hasMany(Referral::class);
    }
}
