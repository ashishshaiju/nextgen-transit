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
        $studentRole = Role::create(['name' => 'Student']);
        $adminRole = Role::create(['name' => 'Admin']);
        $staffRole = Role::create(['name' => 'Staff']);
        $parentRole = Role::create(['name' => 'Parent']);
        $driverRole = Role::create(['name' => 'Driver']);

        // create permissions for buses
        Permission::create(['name' => 'create-bus']);
        Permission::create(['name' => 'edit-bus']);
        Permission::create(['name' => 'delete-bus']);

        //create permissions for semesters
        Permission::create(['name' => 'create-semester']);
        Permission::create(['name' => 'edit-semester']);
        Permission::create(['name' => 'delete-semester']);

        // create permissions for students
        Permission::create(['name' => 'create-student']);
        Permission::create(['name' => 'edit-student']);
        Permission::create(['name' => 'delete-student']);

        // create permissions for staff
        Permission::create(['name' => 'create-staff']);
        Permission::create(['name' => 'edit-staff']);
        Permission::create(['name' => 'delete-staff']);

        // create permissions for parents
        Permission::create(['name' => 'create-parent']);
        Permission::create(['name' => 'edit-parent']);
        Permission::create(['name' => 'delete-parent']);

        // create permissions for drivers
        Permission::create(['name' => 'create-driver']);
        Permission::create(['name' => 'edit-driver']);
        Permission::create(['name' => 'delete-driver']);


        // Assign permissions to roles
        $studentRole->givePermissionTo([
            // give your student permissions here
            'edit-student',
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
            'edit-staff',
        ]);

        $parentRole->givePermissionTo([
            // give your parent permissions here
            'edit-parent',
        ]);

        $driverRole->givePermissionTo([
            // give your driver permissions here
            'edit-driver',
        ]);


    }
}
