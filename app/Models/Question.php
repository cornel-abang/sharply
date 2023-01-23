<?php

namespace App\Models;

use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int             $id
 * @property string          $question
 * @property CarbonInterface $created_at
 * @property CarbonInterface $updated_at
 */
class Question extends Model
{
    use HasFactory;

    /**
     * @var array<string>
    */
    protected $fillable = ['id', 'question'];

    public function options(): HasMany
    {
        return $this->hasMany(Option::class);
    }
}
