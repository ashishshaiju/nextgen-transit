<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * Run the database seeds.
         */
        // reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Roles for the application
        $studentRole = Role::create(['name' => 'Student', 'guard_name' => 'web']);
        $adminRole = Role::create(['name' => 'Admin', 'guard_name' => 'admin']);
        $staffRole = Role::create(['name' => 'Staff', 'guard_name' => 'staff']);
        $parentRole = Role::create(['name' => 'Parent', 'guard_name' => 'parent']);
        $driverRole = Role::create(['name' => 'Driver', 'guard_name' => 'driver']);

        // create permissions for buses
        Permission::create(['name' => 'create-bus', 'guard_name' => 'admin']);
        Permission::create(['name' => 'edit-bus', 'guard_name' => 'admin']);
        Permission::create(['name' => 'delete-bus', 'guard_name' => 'admin']);

        //create permissions for semesters
        Permission::create(['name' => 'create-semester', 'guard_name' => 'admin']);
        Permission::create(['name' => 'edit-semester', 'guard_name' => 'admin']);
        Permission::create(['name' => 'delete-semester', 'guard_name' => 'admin']);

        // create permissions for students
        Permission::create(['name' => 'create-student', 'guard_name' => 'admin']);
        Permission::create(['name' => 'edit-student', 'guard_name' => 'admin']);
        Permission::create(['name' => 'delete-student', 'guard_name' => 'admin']);

        // create permissions for staff
        Permission::create(['name' => 'create-staff', 'guard_name' => 'admin']);
        Permission::create(['name' => 'edit-staff', 'guard_name' => 'admin']);
        Permission::create(['name' => 'delete-staff', 'guard_name' => 'admin']);

        // create permissions for parents
        Permission::create(['name' => 'create-parent', 'guard_name' => 'admin']);
        Permission::create(['name' => 'edit-parent', 'guard_name' => 'admin']);
        Permission::create(['name' => 'delete-parent', 'guard_name' => 'admin']);

        // create permissions for drivers
        Permission::create(['name' => 'create-driver', 'guard_name' => 'admin']);
        Permission::create(['name' => 'edit-driver', 'guard_name' => 'admin']);
        Permission::create(['name' => 'delete-driver', 'guard_name' => 'admin']);


        // Assign permissions to roles
        $studentRole->givePermissionTo([
            // give your student permissions here
        ]);

        $adminRole->givePermissionTo([
            // give your admin permissions here
            'create-bus',
            'edit-bus',
            'delete-bus',
            'create-semester',
            'edit-semester',
            'delete-semester',
            'create-student',
            'edit-student',
            'delete-student',
            'create-staff',
            'edit-staff',
            'delete-staff',
            'create-parent',
            'edit-parent',
            'delete-parent',
            'create-driver',
            'edit-driver',
            'delete-driver',
        ]);

        $staffRole->givePermissionTo([
            // give your staff permissions here
        ]);

        $parentRole->givePermissionTo([
            // give your parent permissions here
        ]);

        $driverRole->givePermissionTo([
            // give your driver permissions here
        ]);


    }
}
