<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUUID;

/**
 * @property UuidInterface   $id
 * @property string          $who
 * @property string          $contact
 * @property string          $sex
 * @property string          $service
 * @property User            $user_id
 * @property CarbonInterface $created_at
 * @property CarbonInterface $updated_at
 */

class Referral extends Model
{
    use HasFactory;
    use HasUUID;

    /**
     * @var array<string>
    */
    protected $fillable = [
        'who',
        'contact',
        'sex',
        'service',
        'user_id'
    ];
}
