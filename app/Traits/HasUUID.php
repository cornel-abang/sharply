<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasUUID
{
    public function getKeyType(): string
    {
        return 'string';
    }

    public function isIncrementing(): bool
    {
        return false;
    }

    public function getIncrementing(): bool
    {
        return false;
    }

    protected static function bootHasUUID()
    {
        self::creating(
            function (Model $model) {
                $column = $model->getKeyName();
                if (!$model->{$column}) {
                    $model->{$column} = Str::uuid();
                }
            }
        );
    }
}