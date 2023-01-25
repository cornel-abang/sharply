<?php

namespace App\Models;

use App\Traits\HasUUID;
use Carbon\CarbonInterface;
use Ramsey\Uuid\UuidInterface;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property UuidInterface   $id
 * @property string          $name
 * @property string          $email
 * @property string          $password
 * @property string          $dob
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
        'dob'
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
