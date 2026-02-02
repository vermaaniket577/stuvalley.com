<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Solution;
use App\Models\Partner;
use App\Models\Industry;

class HighQualityDataSeeder extends Seeder
{
    public function run()
    {
        // 1. Truncate existing tables
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Solution::truncate();
        Partner::truncate();
        Industry::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 2. Seed Solutions
        $solutions = [
            [
                'title' => 'HRM Solution',
                'description' => 'Automate HR processes with our comprehensive Human Resource Management system.',
                'image' => 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?q=80&w=2670&auto=format&fit=crop',
                'is_active' => true
            ],
            [
                'title' => 'CRM Solution',
                'description' => 'Enhance customer relationships and drive sales with our intelligent CRM tools.',
                'image' => 'https://images.unsplash.com/photo-1600880292203-757bb62b4baf?q=80&w=2670&auto=format&fit=crop',
                'is_active' => true
            ],
            [
                'title' => 'ERP Solution',
                'description' => 'Integrate all business functions into a single, efficient enterprise resource planning system.',
                'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=2670&auto=format&fit=crop',
                'is_active' => true
            ],
            [
                'title' => 'LMS Solution',
                'description' => 'Empower learning with our feature-rich Learning Management System for education.',
                'image' => 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?q=80&w=2674&auto=format&fit=crop',
                'is_active' => true
            ],
            [
                'title' => 'POS Solution',
                'description' => 'Streamline transactions and inventory with our robust Point of Sales solutions.',
                'image' => 'https://images.unsplash.com/photo-1556742049-0cfed4f7a07d?q=80&w=2670&auto=format&fit=crop',
                'is_active' => true
            ],
            [
                'title' => 'CMS Solution',
                'description' => 'Manage digital content effortlessly with our customizable Content Management System.',
                'image' => 'https://images.unsplash.com/photo-1496171367470-9ed9a91ea931?q=80&w=2670&auto=format&fit=crop',
                'is_active' => true
            ]
        ];

        foreach ($solutions as $sol) {
            Solution::create($sol);
        }

        // 3. Seed Partners (Specific Clients Requested)
        // Using high-resolution generated text placeholders acting as logos
        $partners = [
            [
                'name' => 'Prayug',
                'logo' => 'https://placehold.co/200x60/transparent/white?text=PRAYUG&font=montserrat',
                'is_active' => true,
                'sort_order' => 1
            ],
            [
                'name' => 'Vidhyapun',
                'logo' => 'https://placehold.co/220x60/transparent/white?text=VIDHYAPUN&font=montserrat',
                'is_active' => true,
                'sort_order' => 2
            ],
            [
                'name' => 'Stuintern',
                'logo' => 'https://placehold.co/200x60/transparent/white?text=Stuintern&font=montserrat',
                'is_active' => true,
                'sort_order' => 3
            ],
            [
                'name' => 'Stuvalley',
                'logo' => 'https://placehold.co/250x60/transparent/white?text=STUVALLEY&font=montserrat',
                'is_active' => true,
                'sort_order' => 4
            ]
        ];

        foreach ($partners as $part) {
            Partner::create($part);
        }

        // 4. Seed Industries
        $industries = [
            ['title' => 'Healthcare', 'description' => 'Telemedicine & Digital Health.', 'icon' => 'fas fa-heartbeat', 'is_active' => true, 'sort_order' => 1],
            ['title' => 'Education', 'description' => 'LMS & E-Learning Platforms.', 'icon' => 'fas fa-graduation-cap', 'is_active' => true, 'sort_order' => 2],
            ['title' => 'Finance', 'description' => 'Fintech & Secure Banking.', 'icon' => 'fas fa-chart-line', 'is_active' => true, 'sort_order' => 3],
            ['title' => 'Retail', 'description' => 'E-Commerce & Digital Storefronts.', 'icon' => 'fas fa-shopping-bag', 'is_active' => true, 'sort_order' => 4]
        ];

        foreach ($industries as $ind) {
            Industry::create($ind);
        }
    }
}
