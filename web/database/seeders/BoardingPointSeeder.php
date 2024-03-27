<?php

namespace Database\Seeders;

use App\Models\BoardingPoint;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BoardingPointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed the boarding points
        BoardingPoint::factory()->count(6)->create();
    }
}
