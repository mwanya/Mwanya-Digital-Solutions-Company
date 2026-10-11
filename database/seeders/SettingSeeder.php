<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $defaults = [
            'company.name' => 'HEISEN GROUP COMPANY LIMITED',
            'company.tagline' => 'Environmental Cleaning Services & General Supply',
            'company.phone_primary' => '+255 650 552 696',
            'company.phone_secondary' => '',
            'company.email' => 'heisengroup.tz@gmail.com',
            'company.address' => 'Bibi Titi Road, Nyerere Tower, 2nd Floor, near DIT College, Dar es Salaam, Tanzania',
            'company.facebook' => 'Heisen_group',
            'company.instagram' => 'Heisen_group',
        ];

        foreach ($defaults as $key => $value) {
            // Only set on first run — don't overwrite values the admin has
            // already customised from the Settings panel on subsequent seeds.
            if (Setting::where('key', $key)->doesntExist()) {
                Setting::set($key, $value);
            }
        }
    }
}
