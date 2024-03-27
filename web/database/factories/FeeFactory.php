<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fee>
 */
class FeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_semester_id' => \App\Models\StudentSemester::factory(),
            'due_amount' => $this->faker->randomFloat(2, 0, 10000),
            'due_date' => $this->faker->date(),
        ];
    }
}
