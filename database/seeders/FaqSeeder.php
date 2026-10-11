<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'How do I book a service?',
                'answer' => "It's simple — fill out the contact form on our Contact page, or call/WhatsApp us directly, with your location and the service you need. Our team will respond with a free quote, usually the same day.",
                'keywords' => 'book booking hire request schedule appointment',
            ],
            [
                'question' => 'How much does house cleaning cost?',
                'answer' => 'Our pricing page lists indicative costs for common jobs like house cleaning, window cleaning and laundry. Larger or more complex jobs (gardens, warehouses, sewage work) are quoted after a free site visit.',
                'keywords' => 'price cost pricing how much house cleaning fee charges',
            ],
            [
                'question' => 'Do you serve areas outside Dar es Salaam?',
                'answer' => 'Yes. While our office is based in Dar es Salaam, our certified teams are strategically positioned to respond to requests across Tanzania. Contact us with your location to confirm availability.',
                'keywords' => 'location area coverage where regions tanzania outside dar',
            ],
            [
                'question' => 'Are your products safe for children and pets?',
                'answer' => 'Yes. We use modern, eco-friendly cleaning and pest-control products and integrated pest management techniques that are safe for homes with children and pets when applied by our trained technicians.',
                'keywords' => 'safe children pets eco friendly chemicals products',
            ],
            [
                'question' => 'Is HEISEN GROUP registered and licensed?',
                'answer' => 'Yes — we are registered with the Tanzania Revenue Authority (TRA), the Occupational Safety and Health Authority (OSHA) and BRELA, and licensed under the NEST system to operate in Tanzania.',
                'keywords' => 'registered licensed legit legal tra osha brela certified',
            ],
            [
                'question' => 'How quickly can you respond to a request?',
                'answer' => 'For most areas within Dar es Salaam, our team can typically schedule a visit within 24–48 hours of your enquiry. Urgent requests are prioritised where possible — mention urgency in your message.',
                'keywords' => 'how fast quick response time urgent same day',
            ],
        ];

        foreach ($faqs as $index => $faq) {
            Faq::updateOrCreate(
                ['question' => $faq['question']],
                [
                    'answer' => $faq['answer'],
                    'keywords' => $faq['keywords'],
                    'sort_order' => $index + 1,
                    'is_active' => true,
                ]
            );
        }
    }
}
