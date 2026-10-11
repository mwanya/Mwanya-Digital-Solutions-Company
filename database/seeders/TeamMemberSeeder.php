<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    /**
     * Seeds the real leadership structure from the company's organisation
     * chart. Names are placeholders ("Add Name") since individual staff
     * names/photos were not supplied — the admin can fill these in from
     * Admin → Leadership without touching any code.
     */
    public function run(): void
    {
        $positions = [
            ['position' => 'Chief Executive Officer', 'bio' => 'Leads the overall strategy and direction of HEISEN GROUP COMPANY LIMITED, overseeing all departments and ensuring the company delivers on its mission across Tanzania.'],
            ['position' => 'Finance & Procurement Manager', 'bio' => 'Oversees company finances, budgeting and procurement of equipment and supplies needed to deliver quality services to every client.'],
            ['position' => 'Manager, Human Resource', 'bio' => 'Manages staff recruitment, training and welfare, ensuring every technician is TPRI-certified and equipped to serve clients safely and professionally.'],
            ['position' => 'Operations Manager', 'bio' => 'Coordinates day-to-day field operations, scheduling and quality control across all service lines — from residential cleaning to industrial and environmental projects.'],
        ];

        foreach ($positions as $index => $item) {
            TeamMember::updateOrCreate(
                ['position' => $item['position']],
                [
                    'name' => 'Add Name',
                    'bio' => $item['bio'],
                    'photo' => null,
                    'sort_order' => $index + 1,
                    'is_active' => true,
                ]
            );
        }
    }
}
