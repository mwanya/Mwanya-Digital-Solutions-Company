<?php

namespace Database\Seeders;

use App\Models\GalleryImage;
use Illuminate\Database\Seeder;

class GalleryImageSeeder extends Seeder
{
    public function run(): void
    {
        $images = [
            ['title' => 'Coastal Cleanup', 'image' => 'images/gallery-1.jpg', 'caption' => 'Beach and coastal cleanup in Dar es Salaam', 'event_date' => '2025'],
            ['title' => 'Field Operations', 'image' => 'images/gallery-2.jpg', 'caption' => 'Our field operations team on assignment', 'event_date' => '2025'],
            ['title' => 'On-Site Technician', 'image' => 'images/gallery-3.jpg', 'caption' => 'Technician in HEISEN uniform clearing debris', 'event_date' => '2025'],
            ['title' => 'Residential Cleaning', 'image' => 'images/gallery-4.png', 'caption' => 'Residential and office cleaning in progress', 'event_date' => '2025'],
            ['title' => 'Industrial Site', 'image' => 'images/gallery-5.png', 'caption' => 'Industrial site cleaning operations', 'event_date' => '2025'],
            ['title' => 'Water Body Restoration', 'image' => 'images/gallery-6.jpg', 'caption' => 'Water body debris and waste removal', 'event_date' => '2025'],
            ['title' => 'Waterway Restoration', 'image' => 'images/gallery-7.jpg', 'caption' => 'Coastal and waterway restoration work', 'event_date' => '2025'],
            ['title' => 'Sanitation Works', 'image' => 'images/gallery-8.jpg', 'caption' => 'Sanitation and site clearance', 'event_date' => '2025'],
            ['title' => 'Parking Lot Care', 'image' => 'images/gallery-9.jpg', 'caption' => 'Parking lot cleaning and management', 'event_date' => '2025'],
            ['title' => 'Farm Maintenance', 'image' => 'images/gallery-10.jpg', 'caption' => 'Farm cleaning and maintenance', 'event_date' => '2025'],
        ];

        foreach ($images as $index => $image) {
            GalleryImage::updateOrCreate(
                ['image' => $image['image']],
                [
                    'title' => $image['title'],
                    'caption' => $image['caption'],
                    'event_date' => $image['event_date'],
                    'sort_order' => count($images) - $index,
                    'is_active' => true,
                ]
            );
        }
    }
}
