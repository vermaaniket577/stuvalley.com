<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'title' => 'SIMAURA',
                'slug' => 'simaura',
                'category' => 'E-Commerce',
                'short_description' => 'Next-generation multi-vendor e-commerce platform with AI-powered recommendations and seamless payment integration.',
                'full_description' => "SIMAURA is a comprehensive e-commerce solution designed for modern online businesses. Built with scalability in mind, it supports multi-vendor marketplaces, advanced inventory management, and intelligent product recommendations.\n\nThe platform features a robust admin panel, real-time analytics, and seamless integration with popular payment gateways. Whether you're running a small boutique or a large marketplace, SIMAURA adapts to your needs.\n\nKey highlights include mobile-first design, SEO optimization, automated marketing tools, and 24/7 customer support integration.",
                'value_proposition' => 'Transform your online store into a revenue-generating powerhouse',
                'banner_image' => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?q=80&w=1600&auto=format&fit=crop',
                'featured_image' => 'https://images.unsplash.com/photo-1563986768609-322da13575f3?q=80&w=800&auto=format&fit=crop',
                'features' => [
                    ['title' => 'Multi-Vendor Support', 'description' => 'Manage multiple sellers with individual dashboards and commission tracking'],
                    ['title' => 'AI Product Recommendations', 'description' => 'Increase sales with machine learning-powered product suggestions'],
                    ['title' => 'Advanced Analytics', 'description' => 'Real-time insights into sales, customer behavior, and inventory'],
                    ['title' => 'Payment Gateway Integration', 'description' => 'Support for Stripe, PayPal, Razorpay, and more'],
                    ['title' => 'Inventory Management', 'description' => 'Track stock levels, set alerts, and automate reordering'],
                    ['title' => 'Mobile App Ready', 'description' => 'API-first architecture for seamless mobile app integration'],
                ],
                'tech_stack' => ['Laravel', 'Vue.js', 'MySQL', 'Redis', 'Stripe API', 'AWS S3'],
                'gallery' => [
                    'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=800&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=800&auto=format&fit=crop',
                ],
                'industry' => 'Retail & E-Commerce',
                'demo_url' => null,
                'icon' => 'fa-shopping-cart',
                'color_scheme' => '#3b82f6',
                'sort_order' => 1,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'MENBITA',
                'slug' => 'menbita',
                'category' => 'Corporate',
                'short_description' => 'Enterprise-grade ERP system for streamlined business operations, HR management, and financial reporting.',
                'full_description' => "MENBITA is a powerful enterprise resource planning (ERP) solution designed for medium to large corporations. It unifies all business processes into a single, integrated system.\n\nFrom HR and payroll to accounting and project management, MENBITA provides a 360-degree view of your organization. The system is highly customizable and can be tailored to fit your specific industry requirements.\n\nWith advanced security features, role-based access control, and comprehensive audit trails, MENBITA ensures your business data remains secure and compliant with industry regulations.",
                'value_proposition' => 'Unify your entire organization under one intelligent platform',
                'banner_image' => 'https://images.unsplash.com/photo-1497366754035-f200968a6e72?q=80&w=1600&auto=format&fit=crop',
                'featured_image' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?q=80&w=800&auto=format&fit=crop',
                'features' => [
                    ['title' => 'HR & Payroll Management', 'description' => 'Complete employee lifecycle management with automated payroll processing'],
                    ['title' => 'Financial Accounting', 'description' => 'General ledger, accounts payable/receivable, and financial reporting'],
                    ['title' => 'Project Management', 'description' => 'Track projects, allocate resources, and monitor budgets in real-time'],
                    ['title' => 'CRM Integration', 'description' => 'Manage customer relationships and sales pipelines effectively'],
                    ['title' => 'Business Intelligence', 'description' => 'Interactive dashboards and custom reports for data-driven decisions'],
                    ['title' => 'Workflow Automation', 'description' => 'Automate approvals, notifications, and routine business processes'],
                ],
                'tech_stack' => ['Java', 'Spring Boot', 'Angular', 'PostgreSQL', 'Elasticsearch', 'Docker'],
                'gallery' => [
                    'https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=800&auto=format&fit=crop',
                ],
                'industry' => 'Enterprise & Corporate',
                'demo_url' => null,
                'icon' => 'fa-building',
                'color_scheme' => '#8b5cf6',
                'sort_order' => 2,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'FINCORP',
                'slug' => 'fincorp',
                'category' => 'FinTech',
                'short_description' => 'Secure digital banking platform with blockchain integration, real-time transactions, and advanced fraud detection.',
                'full_description' => "FINCORP is a cutting-edge financial technology platform that brings banking into the digital age. Built with security and compliance at its core, it offers a complete suite of banking services.\n\nThe platform supports real-time payments, multi-currency transactions, and blockchain-based settlements. Advanced AI algorithms detect and prevent fraudulent activities before they occur.\n\nFINCORP is fully compliant with international banking regulations including PCI-DSS, GDPR, and local financial authority requirements. It's the perfect solution for neo-banks, credit unions, and financial institutions looking to modernize their operations.",
                'value_proposition' => 'Banking reimagined for the digital era',
                'banner_image' => 'https://images.unsplash.com/photo-1563986768609-322da13575f3?q=80&w=1600&auto=format&fit=crop',
                'featured_image' => 'https://images.unsplash.com/photo-1579621970563-ebec7560ff3e?q=80&w=800&auto=format&fit=crop',
                'features' => [
                    ['title' => 'Digital Wallet', 'description' => 'Secure digital wallets with instant fund transfers and QR payments'],
                    ['title' => 'Blockchain Integration', 'description' => 'Transparent and immutable transaction records using blockchain'],
                    ['title' => 'Fraud Detection AI', 'description' => 'Machine learning algorithms to identify suspicious activities'],
                    ['title' => 'Multi-Currency Support', 'description' => 'Handle transactions in 150+ currencies with real-time exchange rates'],
                    ['title' => 'Regulatory Compliance', 'description' => 'Built-in KYC/AML compliance and automated reporting'],
                    ['title' => 'Open Banking APIs', 'description' => 'RESTful APIs for third-party integrations and fintech partnerships'],
                ],
                'tech_stack' => ['Node.js', 'React', 'MongoDB', 'Blockchain', 'AWS', 'Microservices'],
                'gallery' => [],
                'industry' => 'Banking & Finance',
                'demo_url' => null,
                'icon' => 'fa-university',
                'color_scheme' => '#10b981',
                'sort_order' => 3,
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'title' => 'EDULEASE',
                'slug' => 'edulease',
                'category' => 'EdTech',
                'short_description' => 'Comprehensive learning management system with virtual classrooms, AI tutoring, and student performance analytics.',
                'full_description' => "EDULEASE revolutionizes education delivery with a complete learning management system (LMS) designed for schools, universities, and corporate training programs.\n\nThe platform features live virtual classrooms with HD video, interactive whiteboards, and breakout rooms. AI-powered tutoring provides personalized learning paths for each student based on their performance and learning style.\n\nEducators can create engaging courses with multimedia content, quizzes, and assignments. Advanced analytics help track student progress and identify areas needing improvement. EDULEASE makes quality education accessible to everyone, anywhere.",
                'value_proposition' => 'Empowering education through intelligent technology',
                'banner_image' => 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?q=80&w=1600&auto=format&fit=crop',
                'featured_image' => 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?q=80&w=800&auto=format&fit=crop',
                'features' => [
                    ['title' => 'Virtual Classrooms', 'description' => 'HD video conferencing with screen sharing and recording capabilities'],
                    ['title' => 'AI-Powered Tutoring', 'description' => 'Personalized learning recommendations based on student performance'],
                    ['title' => 'Course Builder', 'description' => 'Drag-and-drop course creation with multimedia support'],
                    ['title' => 'Assessment Tools', 'description' => 'Create quizzes, assignments, and automated grading systems'],
                    ['title' => 'Student Analytics', 'description' => 'Track engagement, progress, and identify struggling students'],
                    ['title' => 'Mobile Learning', 'description' => 'Native iOS and Android apps for learning on the go'],
                ],
                'tech_stack' => ['Laravel', 'Vue.js', 'WebRTC', 'TensorFlow', 'MySQL', 'Firebase'],
                'gallery' => [
                    'https://images.unsplash.com/photo-1588072432836-e10032774350?q=80&w=800&auto=format&fit=crop',
                ],
                'industry' => 'Education & Training',
                'demo_url' => null,
                'icon' => 'fa-graduation-cap',
                'color_scheme' => '#f59e0b',
                'sort_order' => 4,
                'is_active' => true,
                'is_featured' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
