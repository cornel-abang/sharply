<?php

namespace App\Models;

use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property UuidInterface   $id
 * @property string          $type
 * @property string          $day
 * @property string          $time
 * @property date            $dob
 * @property string          $gender_at_birth
 * @property string          $gender_today
 * @property string          $appt_for
 * @property string          $name
 * @property string          $phone
 * @property string          $location
 * @property CarbonInterface $created_at
 * @property CarbonInterface $updated_at
 * @property HelpCentre      $helpCentre
 * @property User            $user
 */
class Appointment extends Model
{
    use HasFactory, HasUUID;

    /**
     * @var array<string>
     */
    protected $fillable = [
        'type', 'day', 'time',
        'dob', 'gender_at_birth',
        'gender_today', 'appt_for',
        'name', 'phone', 'location',
        'help_centre_id', 'user_id'
    ];

    public function helpCentre(): HasOne
    {
        return $this->hasOne(HelpCentre::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
