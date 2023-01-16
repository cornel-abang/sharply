<?php

namespace App\Models;

use App\Traits\HasUUID;
use Carbon\CarbonInterface;
use Ramsey\Uuid\UuidInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property UuidInterface php artisan make  $id
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
 * @property bool            $optout_sms
 * @property bool            $avoid_calling
 * @property string          $covid_appt_type
 * @property bool            $covid_exposed
 * @property string          $covid_vac_status
 * @property string          $population_group
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
        'help_centre_id', 'user_id',
        'optout_sms', 'avoid_calling',
        'covid_appt_type', 'covid_exposed',
        'covid_vac_status', 'population_group'
    ];

    protected $casts = [
        'optout_sms' => 'boolean',
        'avoid_calling' => 'boolean',
        'covid_exposed' => 'boolean'
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
