<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
