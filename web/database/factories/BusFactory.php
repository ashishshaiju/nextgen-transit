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
            'number_plate' => $this->faker->unique()->safeEmail,
            // capacity random number between 10 and 100
            'capacity' => $this->faker->numberBetween(10, 100),
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            // destination random city
            'destination' => $this->faker->city,
            // boarding_points random array of 5 cities
            'boarding_points' => $this->faker->randomElements(['Kathmandu', 'Pokhara', 'Chitwan', 'Biratnagar', 'Dharan'], 5),
        ];
    }
}
