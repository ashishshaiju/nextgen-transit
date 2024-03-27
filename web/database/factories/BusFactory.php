<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bus>
 */
class BusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'number_plate' => $this->faker->numberBetween(1000, 9999),
            // capacity random number between 10 and 100
            'capacity' => $this->faker->numberBetween(10, 100),
            'bus_no' => $this->faker->numberBetween(10, 100),
            'description' => $this->faker->text,
            'destination' => $this->faker->city,
        ];
    }
}

