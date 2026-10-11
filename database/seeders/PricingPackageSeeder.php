<?php

namespace Database\Seeders;

use App\Models\PricingPackage;
use Illuminate\Database\Seeder;

class PricingPackageSeeder extends Seeder
{
    public function run(): void
    {
        $packages = [
            // House cleaning
            ['category' => 'House Cleaning', 'package_name' => 'Inside House Cleanliness', 'description' => 'Full interior cleaning (per room)', 'unit' => 'per day', 'price' => '40,000/=', 'sort_order' => 1],
            ['category' => 'House Cleaning', 'package_name' => 'Outdoor Area (roof, floor, balcony)', 'description' => 'Outer roof, floor and balcony cleaning', 'unit' => 'per day', 'price' => '25,000/=', 'sort_order' => 2],

            // Window cleaning
            ['category' => 'Window Cleaning', 'package_name' => 'Small Window', 'description' => 'Standard-size window', 'unit' => 'per window', 'price' => '10,000/=', 'sort_order' => 1],
            ['category' => 'Window Cleaning', 'package_name' => 'Big Window', 'description' => 'Large or specialty window', 'unit' => 'negotiable', 'price' => 'Negotiable', 'sort_order' => 2],

            // Laundry & home equipment
            ['category' => 'Laundry & Home Equipment', 'package_name' => 'Normal Clothes', 'description' => 'Everyday laundry item', 'unit' => 'per item', 'price' => '2,500/=', 'sort_order' => 1],
            ['category' => 'Laundry & Home Equipment', 'package_name' => 'Full Suit', 'description' => 'Suit cleaning', 'unit' => 'per item', 'price' => '8,000/=', 'sort_order' => 2],
            ['category' => 'Laundry & Home Equipment', 'package_name' => 'Blanket', 'description' => 'Blanket cleaning', 'unit' => 'per item', 'price' => '10,000/=', 'sort_order' => 3],
            ['category' => 'Laundry & Home Equipment', 'package_name' => 'Cooking Utensils (all small)', 'description' => 'Pots, pans and small kitchenware', 'unit' => 'per set', 'price' => '5,000/=', 'sort_order' => 4],
            ['category' => 'Laundry & Home Equipment', 'package_name' => 'Utensils / Equipment (by item)', 'description' => 'Priced according to utensil or equipment type', 'unit' => 'negotiable', 'price' => 'From 1,500/=', 'sort_order' => 5],

            // Toilet & sanitary
            ['category' => 'Toilet & Sanitary', 'package_name' => 'Sink & Teeth-brush Area', 'description' => 'Sink and surrounding area', 'unit' => 'per unit', 'price' => '10,000/=', 'sort_order' => 1],
            ['category' => 'Toilet & Sanitary', 'package_name' => 'Full Toilet, Tiles & Sink', 'description' => 'Complete bathroom cleaning', 'unit' => 'per unit', 'price' => '50,000 - 100,000/=', 'sort_order' => 2],

            // Garden
            ['category' => 'Garden', 'package_name' => 'Garden Field Cleaning', 'description' => 'Full garden field clearance', 'unit' => 'on inspection', 'price' => 'Negotiable (site visit required)', 'sort_order' => 1],

            // Drainage
            ['category' => 'Sewage & Drainage', 'package_name' => 'Unblocking of Sewage', 'description' => 'Clogged drains and water channels', 'unit' => 'on inspection', 'price' => 'Negotiable (site visit required)', 'sort_order' => 1],

            // Warehouse
            ['category' => 'Warehouse Cleaning', 'package_name' => 'Full Warehouse Cleaning', 'description' => 'Complete warehouse cleanup', 'unit' => 'on inspection', 'price' => 'Negotiable (site visit required)', 'sort_order' => 1],

            // Farm
            ['category' => 'Farm Cleaning & Maintenance', 'package_name' => 'Farm Cleaning', 'description' => 'Waste removal and clearance', 'unit' => 'per hectare', 'price' => '250,000/=', 'sort_order' => 1],
            ['category' => 'Farm Cleaning & Maintenance', 'package_name' => 'Farm Maintenance', 'description' => 'Ongoing maintenance service', 'unit' => 'per hectare', 'price' => '200,000/=', 'sort_order' => 2],
            ['category' => 'Farm Cleaning & Maintenance', 'package_name' => 'Tree Stump Uprooting', 'description' => 'Uprooting a stump in the field', 'unit' => 'per stump', 'price' => '10,000/=', 'sort_order' => 3],
        ];

        foreach ($packages as $package) {
            PricingPackage::updateOrCreate(
                [
                    'category' => $package['category'],
                    'package_name' => $package['package_name'],
                ],
                $package + ['is_active' => true]
            );
        }
    }
}
