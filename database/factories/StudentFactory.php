<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->realText(10),
            'subject' => $this->faker->realText(20),
            'roll' => $this->faker->numberBetween(100),
        ];
    }
}
