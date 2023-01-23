<?php

namespace App\Models;

use App\Traits\HasUUID;
use Carbon\CarbonInterface;
use Ramsey\Uuid\UuidInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property UuidInterface   $id
 * @property string          $option
 * @property int             $point
 * @property CarbonInterface $created_at
 * @property CarbonInterface $updated_at
 */
class Option extends Model
{
    use HasFactory;
    use HasUUID;

    /**
     * @var array<string>
    */
    protected $fillable = ['option', 'point'];
}
