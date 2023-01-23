<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class QuestionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'question' => $this->faker->sentence()
        ];
    }
}
