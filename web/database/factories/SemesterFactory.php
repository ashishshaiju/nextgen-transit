<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Semester>
 */
class SemesterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => $this->faker->randomElement(['s1-2024', 's2-2024', 's3-2024', 's4-2024', 's5-2024', 's6-2024', 's7-2024', 's8-2024']),
            'name' => $this->faker->randomElement(['s1', 's2', 's3', 's4', 's5', 's6', 's7', 's8']),
            'start_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'end_date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'year' => $this->faker->numberBetween(2020, 2025),
            'is_active' => $this->faker->boolean(),
        ];
    }
}
