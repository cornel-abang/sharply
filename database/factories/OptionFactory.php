<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OptionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id'     => Str::uuid(),
            'option' => $this->faker->sentence(),
            'point'  => 0,
        ];
    }
}
