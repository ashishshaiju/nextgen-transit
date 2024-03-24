<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // define the settings
        $settings = [
            [
                'key' => 'site_name',
                'value' => 'Laravel School',
                'type' => 'text',
                'description' => 'The name of the site',
            ],
            [
                'key' => 'site_email',
                'value' => 'admin@gmail.com',
                'type' => 'email',
                'description' => 'The email of the site',
            ],
            // add a setting, assigner mode. when this value is true, the user can assign the bus boarding point to the student
            [
                'key' => 'assigner_mode',
                'value' => json_encode(['student_id' => null, 'bus_id' => null]),
                'type' => 'json',
                'description' => 'When the assigner mode is on, all csbm machine for that particular bus will stop validation mode and will listen for new card to be assigned to the student mentioned in this json object',
                'is_active' => false,
                'is_json' => true,
            ],
        ];

        // insert the settings
        foreach ($settings as $setting) {
            Settings::set($setting['type'], $setting['key'], $setting['value'], $setting['is_json'] ?? false);
        }
    }
}
