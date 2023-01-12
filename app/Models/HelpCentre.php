<?php

namespace App\Models;

use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property UuidInterface   $id
 * @property string          $name
 * @property string          $phone
 * @property string          $address
 * @property ?string          $image
 * @property CarbonInterface $created_at
 * @property CarbonInterface $updated_at
 */
class HelpCentre extends Model
{
    use HasFactory;
    use HasUUID;

    /**
     * @var array<string>
    */
    protected $fillable = [
        'name',
        'phone',
        'address',
        'image',
    ];
}
