<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'General Cleaning Services',
                'icon' => 'sparkles',
                'short_description' => 'Deep cleaning for both residential and commercial spaces.',
                'description' => "We provide deep cleaning services for both residential and commercial spaces. Whether it's routine house cleaning, window cleaning, office sanitation, or post-construction cleaning, we deliver excellence at every level.",
            ],
            [
                'title' => 'Residential & Office Cleaning',
                'icon' => 'home',
                'short_description' => 'Thorough cleaning for homes and office spaces with flexible packages.',
                'description' => 'We deliver thorough cleaning services for homes and office spaces, including furniture dusting, floor mopping, window cleaning and restroom sanitation. Our flexible packages ensure your environment stays fresh, safe, and presentable at all times.',
            ],
            [
                'title' => 'Industrial Cleaning',
                'icon' => 'factory',
                'short_description' => 'Specialized cleaning for industrial and mining sites.',
                'description' => 'We provide specialized cleaning services tailored for industrial and mining sites. Our team is trained to handle hazardous dust, chemical residues, grease and grime that accumulate in factories, production plants and mining environments, following strict safety protocols.',
            ],
            [
                'title' => 'Water Bodies Cleaning (Rivers, Lakes & Seas)',
                'icon' => 'water-drop',
                'short_description' => 'Cleaning and restoring polluted rivers, lakes and coastal areas.',
                'description' => 'We engage in cleaning and restoring polluted water bodies such as rivers, lakes and coastal areas. Our services include removal of solid waste, oil spills, algae control and debris management, contributing to the health of aquatic ecosystems and the communities relying on them.',
            ],
            [
                'title' => 'Warehouse Cleaning',
                'icon' => 'archive-box',
                'short_description' => 'Hygienic, organized storage environments for your goods.',
                'description' => 'Our warehouse cleaning services are designed to ensure hygienic and organized storage environments. We remove dust, mold and debris from shelves, floors and loading areas, improving operational efficiency and ensuring compliance with hygiene standards for goods and materials.',
            ],
            [
                'title' => 'Unblocking of Sewage Drains & Water Channels',
                'icon' => 'wrench',
                'short_description' => 'Expert unblocking and maintenance for clogged sewage systems.',
                'description' => 'We offer expert unblocking and maintenance services for clogged sewage systems and drainage channels. Our solutions prevent health hazards, flooding and bad odors, ensuring that water flows smoothly in residential, commercial and public areas.',
            ],
            [
                'title' => 'Parking Lot Cleaning & Management',
                'icon' => 'car',
                'short_description' => 'Spotless, well-maintained and welcoming parking areas.',
                'description' => 'We provide professional cleaning services for parking areas, ensuring a spotless, well-maintained and welcoming environment for vehicles and visitors. Our specialized equipment and eco-friendly cleaning solutions guarantee safety, durability of parking surfaces, and a well-organized environment.',
            ],
            [
                'title' => 'Farm Cleaning & Maintenance',
                'icon' => 'leaf',
                'short_description' => 'Reliable farm cleaning, waste removal and maintenance.',
                'description' => 'We offer reliable farm cleaning and maintenance services, including removal of waste, clearing unwanted vegetation, uprooting tree stumps, and maintaining plant and shade trees to uphold hygiene standards. Our goal is a safe, productive, healthy farming environment that supports both crops and livestock.',
            ],
            [
                'title' => 'Safe & Environmentally Friendly Pest Control',
                'icon' => 'bug',
                'short_description' => 'Eco-friendly pest control approved by regulatory authorities.',
                'description' => 'We use modern, eco-friendly pest control methods that eliminate insects and rodents while protecting human health and the environment. Our treatments are effective for homes, businesses and industrial areas, and are approved by regulatory authorities such as TPRI. Our technicians are skilled in identifying and eliminating harmful pests using techniques tailored to your needs.',
            ],
            [
                'title' => 'Fumigation Services',
                'icon' => 'spray',
                'short_description' => 'Structural and commodity fumigation for homes, stores and containers.',
                'description' => 'We offer structural and commodity fumigation to eradicate pests in homes, storage facilities, offices, grain stores and containers. Every fumigation is carefully handled using industry-approved fumigants that ensure complete extermination while preserving human health and structural safety.',
            ],
        ];

        foreach ($services as $index => $service) {
            Service::updateOrCreate(
                ['slug' => Str::slug($service['title'])],
                [
                    'title' => $service['title'],
                    'icon' => $service['icon'],
                    'short_description' => $service['short_description'],
                    'description' => $service['description'],
                    'image' => null,
                    'sort_order' => $index + 1,
                    'is_active' => true,
                ]
            );
        }
    }
}
