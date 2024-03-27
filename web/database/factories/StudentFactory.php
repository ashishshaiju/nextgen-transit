<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'boarding_point' => $this->faker->randomElement(['Kathmandu', 'Pokhara', 'Chitwan', 'Biratnagar', 'Butwal']),
            'drop_off_point' =>  $this->faker->randomElement(['Kathmandu', 'Pokhara', 'Chitwan', 'Biratnagar', 'Butwal']),
            // override the bus_id to be a random bus id if not provided
            'bus_id' => \App\Models\Bus::factory(),
            // override the semester_id to be a random semester id if not provided
            'semester_id' => \App\Models\Semester::factory(),
            // override the user_id to be a random user id if not provided
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
