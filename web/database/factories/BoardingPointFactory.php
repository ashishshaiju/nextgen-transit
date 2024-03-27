<?php

namespace Database\Factories;

use App\Models\BoardingPoint;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<BoardingPoint>
 */
class BoardingPointFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'place' => $this->faker->randomElement(['Changanachery', 'Kumaranelloor', 'Karukachal', 'Kottayam', 'Vaikam', 'Thalayollaparambu']),
            'distance_from_college' => $this->faker->numberBetween(1, 100),
        ];
    }
}
