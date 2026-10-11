<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Seed the default administrator account for Heisen Group Company Limited.
     *
     * Credentials as supplied in the official company profile document.
     * IMPORTANT: change this password after the first login in production.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@heisengroup.test'],
            [
                'name' => 'Heisen Admin',
                'password' => Hash::make('Heisen@12345'),
                'is_admin' => true,
                'email_verified_at' => now(),
            ]
        );
    }
}
