<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed the roles and permissions
        $this->call(RolesAndPermissionsSeeder::class);

        // Seed the buses
        \App\Models\Bus::factory(5)->create();

        // Seed the boarding points
        $this->call(BoardingPointSeeder::class);

        // Attach boarding points to buses
        $this->call(BusBoardingPointSeeder::class);

        // Seed the semesters
        \App\Models\Semester::factory(5)->create();

        // Seed the students
         $student = \App\Models\Student::factory()->create([
            'boarding_point' => 'Kathmand',
            'drop_off_point' => 'Pokhara',
             'user_id' => \App\Models\User::factory()->create([
                 'name' => 'John Doe',
                 'email' => 'student1@gmail.com',
                 'password' => bcrypt('password'),
                ])->id,
         ]);

         // assign the role of student to the user
        $student->user->assignRole('student');

        // assign a bus boarding point to the student with morning and evening times
        $student->busBoardingPoint()->associate(\App\Models\BusBoardingPoint::factory()->create([
            'bus_id' => \App\Models\Bus::all()->random()->id,
            'boarding_point_id' => \App\Models\BoardingPoint::all()->random()->id,
        ]));

        \App\Models\Student::factory(2)->create();
    }

}
