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

        \App\Models\Student::factory(2)->create();
    }

}
