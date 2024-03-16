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

        // create permissions for your applications
        Permission::create(['name' => 'create-amenities']);
        Permission::create(['name' => 'edit-amenities']);
        Permission::create(['name' => 'delete-amenities']);

        // permissions for admin to manage users
        Permission::create(['name' => 'promote-to-premium']);
        Permission::create(['name' => 'demote-to-user']);

        // permission which is only assigned to upgraded users
        Permission::create(['name' => 'is-upgraded']);

        $userRole = Role::create(['name' => 'User']);
        $premiumRole = Role::create(['name' => 'Premium']);
        $adminRole = Role::create(['name' => 'Admin']);

        $userRole->givePermissionTo([
            // give your permissions here
        ]);

        $userRole->givePermissionTo([
            'is-upgraded'
        ]);

        $premiumRole->givePermissionTo([
            // give your premium permissions here
        ]);

        $adminRole->givePermissionTo([
            // give your admin permissions here
            'create-amenities',
            'edit-amenities',
            'delete-amenities',
            'promote-to-premium',
            'demote-to-user',
        ]);
    }
}
