<?php

namespace Database\Seeders;

use App\Models\BoardingPoint;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusBoardingPointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // attach boarding points to buses with morning and evening times
        $boardingPoints = BoardingPoint::all();
        \App\Models\Bus::all()->each(function ($bus) use ($boardingPoints) {
            $bus->boardingPoints()->attach(
                $boardingPoints->random(rand(1, 3))->pluck('id')->toArray(),
                [
                    'morning_reach_time' => now()->addHours(rand(6, 8))->format('H:i:s'),
                    'evening_reach_time' => now()->addHours(rand(16, 18))->format('H:i:s'),
                ]
            );
        });
    }
}
