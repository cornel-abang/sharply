<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id'   => Str::uuid(),
            'name' => 'Anon_'.Str::random(10),
        ];
    }
}
