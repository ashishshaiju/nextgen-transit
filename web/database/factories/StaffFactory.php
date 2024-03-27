<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Staff>
 */
class StaffFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'department' => $this->faker->randomElement(['CSE', 'CE', 'ECE', 'EEE', 'ME', 'MBA']),
            'designation' => $this->faker->randomElement(['Teacher', 'Accountant', 'Librarian', 'Lab Assistant']),
            // override the bus_id to be a random bus id if not provided
            'bus_id' => \App\Models\Bus::factory(),
            // override the user_id to be a random user id if not provided
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
