<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class HelpCentreFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id'      => Str::uuid(),
            'name'    => 'Help Centre_'.Str::random(10),
            'phone'   => $this->faker->numerify('###-###-####'),
            'address' => $this->faker->address,
        ];
    }
}
