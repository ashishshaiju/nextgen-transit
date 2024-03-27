<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Driver>
 */
class DriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'license_number' => $this->faker->unique()->randomNumber(8),
            'license_expiry_date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'license_image' => $this->faker->imageUrl(),
            'bus_id' => \App\Models\Bus::factory(),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
