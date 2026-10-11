<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            SettingSeeder::class,
            ServiceSeeder::class,
            PricingPackageSeeder::class,
            GalleryImageSeeder::class,
            TeamMemberSeeder::class,
            FaqSeeder::class,
        ]);
    }
}
