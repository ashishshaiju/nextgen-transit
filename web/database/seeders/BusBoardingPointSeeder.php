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
        $buses = \App\Models\Bus::all();
        $boardingPoints = BoardingPoint::all();


    }
}
