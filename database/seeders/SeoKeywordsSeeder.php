<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeoKeywordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = ['Mumbai', 'Delhi', 'Bangalore', 'Pune', 'Hyderabad', 'Chennai', 'Kolkata', 'Ahmedabad', 'Surat', 'Jaipur', 'Lucknow', 'Kanpur', 'Nagpur', 'Indore', 'Thane', 'Bhopal', 'Visakhapatnam', 'Pimpri-Chinchwad', 'Patna', 'Vadodara'];

        $pages = [
            'home' => [
                'title' => 'Stuvalley Technology - Best Web Development & Digital Marketing Company in India',
                'description' => 'Stuvalley Technology is a top-rated software and digital marketing company providing web development, mobile apps, and SEO services in Mumbai, Bangalore, Delhi, and across India.',
                'keywords' => 'web development company, digital marketing agency, SEO services, software development, best IT company in India, web design India, Stuvalley Technology'
            ],
            'about' => [
                'title' => 'About Us - Stuvalley Technology | Leading IT Solutions Provider',
                'description' => 'Learn more about Stuvalley Technology. We are a team of experts dedicated to providing high-quality IT solutions and digital marketing services to global clients.',
                'keywords' => 'about stuvalley, tech company india, professional web developers, expert digital marketers'
            ],
            'services' => [
                'title' => 'Our Services - Web, Mobile & Digital Marketing Solutions',
                'description' => 'Explore our range of services including Custom Web Development, Android & iOS Apps, SEO, Google Ads, and Social Media Marketing tailored for your business growth.',
                'keywords' => 'software services, mobile app development, e-commerce solutions, digital branding'
            ],
            'contact' => [
                'title' => 'Contact Us - Get a Quote for Your Digital Project',
                'description' => 'Get in touch with Stuvalley Technology for your next web or mobile project. We offer free consultations and custom quotes for businesses of all sizes.',
                'keywords' => 'contact stuvalley, hire web developer, digital marketing consultation'
            ]
        ];

        // Service Mapping from config/services_data.php
        $serviceList = [
            'business-website' => 'Business Website Development',
            'custom-web-development' => 'Custom Web Development',
            'wordpress-development' => 'WordPress Development',
            'website-redesign' => 'Website Redesign Services',
            'ecommerce-website' => 'E-commerce Website Development',
            'shopify-development' => 'Shopify Store Development',
            'android-app-development' => 'Android App Development',
            'ios-app-development' => 'iOS App Development',
            'seo-services' => 'Professional SEO Services',
            'hybrid-app-development' => 'Hybrid App Development',
            'google-ads' => 'Google Ads & PPC Management',
            'social-media' => 'Social Media Marketing',
            'logo-design' => 'Professional Logo Design',
            'ui-ux-design' => 'UI/UX Design Services',
            'graphic-design' => 'Graphic Design Services',
            'website-maintenance' => 'Website Maintenance',
            'hosting-domain' => 'Cloud Hosting & Domain',
            'website-security' => 'Website Security & SSL',
            'woocommerce' => 'WooCommerce Development',
            'payment-gateway' => 'Payment Gateway Integration',
            'digital-marketing' => 'Full Service Digital Marketing'
        ];

        // Industry Mapping from IndustryController.php
        $industryList = [
            'healthcare' => 'Healthcare Tech Solutions',
            'on-demand' => 'On-Demand App Solutions',
            'enterprise' => 'Enterprise Software Solutions',
            'finance' => 'FinTech & Banking Solutions',
            'e-commerce' => 'E-commerce & Multi-vendor Solutions',
            'travel' => 'Travel & Hospitality Tech',
            'start-up' => 'Startup MVP Development',
            'entertainment' => 'Media & Entertainment Tech',
            'real-estate' => 'Real Estate & PropTech Solutions',
            'wearable' => 'Wearable & IoT Solutions',
            'game' => 'Game Development Services',
            'retail' => 'Retail & Omnichannel Solutions',
            'logistics' => 'Logistics & Supply Chain Tech',
            'automotive' => 'Automotive & Telematics Solutions',
            'electric-vehicle' => 'EV & Mobility Solutions',
            'education' => 'EdTech & Learning Management',
            'manufacturing' => 'Manufacturing & Industry 4.0'
        ];

        foreach ($industryList as $slug => $name) {
            $pageKey = 'industries-' . $slug;

            $localKeywords = [];
            foreach ($cities as $city) {
                $localKeywords[] = "$name in $city";
            }

            $pages[$pageKey] = [
                'title' => "$name - Industry Specialized IT Solutions",
                'description' => "Expert $name by Stuvalley Technology. We deliver high-performance digital solutions for the " . strtolower($name) . " sector in " . implode(', ', array_slice($cities, 0, 5)) . ".",
                'keywords' => "$name, industry IT solutions, specialized software, " . implode(', ', array_slice($localKeywords, 0, 10))
            ];
        }

        foreach ($serviceList as $slug => $name) {
            $pageKey = 'services-' . $slug;

            // Compose keywords with cities for local SEO
            $localKeywords = [];
            foreach ($cities as $city) {
                $localKeywords[] = "$name in $city";
                $localKeywords[] = "Best $name $city";
            }

            $pages[$pageKey] = [
                'title' => "$name - Best $name Company in India",
                'description' => "High-quality $name by Stuvalley Technology. We provide expert $name services for businesses in " . implode(', ', array_slice($cities, 0, 5)) . " and across India.",
                'keywords' => "$name, best $name company, hire $name experts, " . implode(', ', array_slice($localKeywords, 0, 15))
            ];
        }

        foreach ($pages as $identifier => $data) {
            \App\Models\SeoPage::updateOrCreate(
                ['page_identifier' => $identifier],
                [
                    'title' => $data['title'],
                    'description' => $data['description'],
                    'keywords' => $data['keywords']
                ]
            );
        }
    }
}
