<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndustrySeeder extends Seeder
{
    public function run()
    {
        $industries = [
            [
                'title' => 'Ecommerce',
                'description' => 'Robust online store platforms with seamless payment integrations and shopping experiences.',
                'icon' => 'fas fa-shopping-cart',
                'is_active' => true,
                'sort_order' => 1
            ],
            [
                'title' => 'Travel & Hospitality',
                'description' => 'Comprehensive booking and management systems for travel and hospitality businesses.',
                'icon' => 'fas fa-plane-departure',
                'is_active' => true,
                'sort_order' => 2
            ],
            [
                'title' => 'Healthcare',
                'description' => 'Advanced digital healthcare solutions for patient management and telemedicine.',
                'icon' => 'fas fa-heartbeat',
                'is_active' => true,
                'sort_order' => 3
            ],
            [
                'title' => 'Real Estate & Construction',
                'description' => 'Property management and construction project tracking solutions.',
                'icon' => 'fas fa-building',
                'is_active' => true,
                'sort_order' => 4
            ],
            [
                'title' => 'Education',
                'description' => 'E-learning platforms and management systems for modern educational institutions.',
                'icon' => 'fas fa-graduation-cap',
                'is_active' => true,
                'sort_order' => 5
            ],
            [
                'title' => 'Transportation & Logistics',
                'description' => 'Fleet management and logistics tracking solutions for transportation businesses.',
                'icon' => 'fas fa-truck',
                'is_active' => true,
                'sort_order' => 6
            ],
            [
                'title' => 'Utilities & On Demand',
                'description' => 'On-demand service platforms and utility management solutions.',
                'icon' => 'fas fa-bolt',
                'is_active' => true,
                'sort_order' => 7
            ],
            [
                'title' => 'Finance & Insurance',
                'description' => 'Secure and scalable fintech solutions for banking, finance, and insurance services.',
                'icon' => 'fas fa-shield-alt',
                'is_active' => true,
                'sort_order' => 8
            ],
            [
                'title' => 'Media & Entertainment',
                'description' => 'Streaming platforms and content management systems for media and entertainment.',
                'icon' => 'fas fa-photo-video',
                'is_active' => true,
                'sort_order' => 9
            ],
            [
                'title' => 'Manufacturing',
                'description' => 'Production tracking and inventory management solutions for manufacturing industries.',
                'icon' => 'fas fa-industry',
                'is_active' => true,
                'sort_order' => 10
            ],
        ];

        foreach ($industries as $industry) {
            DB::table('industries')->insert($industry);
        }
    }
}
