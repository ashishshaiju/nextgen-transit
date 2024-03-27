<?php

namespace Database\Factories;

use App\Models\BoardingPoint;
use App\Models\Bus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<BoardingPoint>
 */
class BusBoardingPointFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bus_id' => Bus::factory()->create(),
            'boarding_point_id' => BoardingPoint::factory()->create(),
            'morning_reach_time' => $this->faker->time(),
            'evening_reach_time' => $this->faker->time(),
        ];
    }
}
