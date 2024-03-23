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

        // Get a random bus
        $bus = \App\Models\Bus::inRandomOrder()->first();

        // Get a random boarding point
        $boardingPoint = \App\Models\BoardingPoint::inRandomOrder()->first();

        // Create a new bus boarding point
        $busBoardingPoint = $student->user->busBoardingPoint()->create([
            'bus_id' => $bus->id,
            'boarding_point_id' => $boardingPoint->id,
            'morning_reach_time' => '07:00:00',
            'evening_reach_time' => '17:00:00',
        ]);

        // Update the bus_boarding_point_id in the users table
        $student->user->bus_boarding_point_id = $busBoardingPoint->id;
        $student->user->save();

        // Seed the staff
        $staff = \App\Models\Staff::factory()->create([
            'department' => 'CSE',
            'designation' => 'Teacher',
            'user_id' => \App\Models\User::factory()->create([
                'name' => 'Jane Doe',
                'email' => 'staff1@gmail.com',
                'password' => bcrypt('password'),
            ])->id,
        ]);

        // assign the role of staff to the user
        $staff->user->assignRole('staff');


        // Seed the guardians
        $guardian = \App\Models\Guardian::factory()->create([
            'occupation' => 'Business',
            'user_id' => \App\Models\User::factory()->create([
                'name' => 'Guardian Doe',
                'email' => 'guardian1@gmail.com',
                'password' => bcrypt('password'),
            ])->id,
        ]);

        // assign the role of guardian to the user
        $guardian->user->assignRole('parent');

        // Seed the guardian_student
        \App\Models\GuardianStudent::factory()->create([
            'guardian_id' => $guardian->id,
            'student_id' => $student->id,
            'relationship' => 'Father',
        ]);

        // seed driver
        $driver = \App\Models\Driver::factory()->create([
            'license_number' => '123456789',
            'user_id' => \App\Models\User::factory()->create([
                'name' => 'Veerapan',
                'email' => 'driver1@gmail.com',
                'password' => bcrypt('password'),
            ])->id,
        ]);

        // assign the role of driver to the user
        $driver->user->assignRole('driver');

        // assign the bus to the driver
        $driver->bus_id = $bus->id;
        $driver->save();


        // Seed admin
        $admin = \App\Models\Admin::factory()->create([
            'user_id' => \App\Models\User::factory()->create([
                'name' => 'Administrator',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('password'),
            ])->id,
        ]);

        // assign the role of admin to the user
        $admin->user->assignRole('admin');


        \App\Models\Student::factory(2)->create();
    }

}
