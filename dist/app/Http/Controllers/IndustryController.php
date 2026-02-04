<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndustryController extends Controller
{
    private $industries = [
        'healthcare' => [
            'id' => 'healthcare',
            'title' => 'Healthcare',
            'icon' => 'fa-heartbeat',
            'hero_highlight' => 'HealthTech Innovation',
            'subtitle' => 'Advanced digital solutions improving patient care and operational efficiency.',
            'hero_image' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?q=80&w=1600&auto=format&fit=crop',
            'about_image' => 'https://images.unsplash.com/photo-1584036561566-b93a58066c53?q=80&w=800&auto=format&fit=crop',
            'trust_points' => ['HIPAA Compliant', 'Telemedicine', 'Patient Care', 'Secure Data'],
            'about_text' => 'We empower healthcare providers with cutting-edge technology. From hospital management to patient engagement, our solutions ensure security, compliance, and better health outcomes.',
            'features' => [
                ['title' => 'Hospital Management Systems', 'desc' => 'Comprehensive ERP for hospital administration.', 'icon' => 'fa-hospital'],
                ['title' => 'Telemedicine Solutions', 'desc' => 'Remote video consultations and care.', 'icon' => 'fa-video-medical'],
                ['title' => 'Healthcare Mobile Apps', 'desc' => 'Patient and doctor facing mobile applications.', 'icon' => 'fa-mobile-alt'],
                ['title' => 'Wearable Health Devices', 'desc' => 'Integration with IoT health monitors.', 'icon' => 'fa-watch']
            ],
            'tech_stack' => ['Laravel', 'React Native', 'WebRTC', 'AWS HIPAA', 'PostgreSQL'],
            'process' => ['Consultation', 'Compliance Check', 'Development', 'Testing', 'Deployment'],
            'benefits' => ['Improved Care', 'Operational Efficiency', 'Data Security', 'Remote Access'],
            'faq' => [
                ['q' => 'Is it HIPAA compliant?', 'a' => 'Yes, strict adherence to all healthcare data regulations.'],
                ['q' => 'Can you integrate with existing EHR?', 'a' => 'Yes, we support HL7 and FHIR standards for integration.']
            ]
        ],
        'on-demand' => [
            'id' => 'on-demand',
            'title' => 'On-Demand',
            'icon' => 'fa-concierge-bell',
            'hero_highlight' => 'Seamless Real-time Services',
            'subtitle' => 'Scalable On-Demand platforms tailored for modern consumers.',
            'hero_image' => 'https://images.unsplash.com/photo-1521791136064-7986c2920216?q=80&w=1600&auto=format&fit=crop',
            'about_image' => 'https://images.unsplash.com/photo-1556740758-90de374c12ad?q=80&w=800&auto=format&fit=crop',
            'trust_points' => ['Real-time Tracking', 'Instant Delivery', 'Scalable Architecture', 'Multi-payment'],
            'about_text' => 'Empower your service business with On-Demand technology that bridges the gap between consumers and service providers instantly. We build robust architectures that handle spikes and provide seamless experiences.',
            'features' => [
                ['title' => 'Real-time Tracking', 'desc' => 'Monitor services and deliveries live on the map.', 'icon' => 'fa-map-marked-alt'],
                ['title' => 'Multi-Vendor Support', 'desc' => 'Manage multiple providers and shops in one place.', 'icon' => 'fa-users-cog'],
                ['title' => 'Instant Notifications', 'desc' => 'Keep users engaged with push and SMS alerts.', 'icon' => 'fa-bell'],
                ['title' => 'Secure Wallet Systems', 'desc' => 'Integrated digital wallets for fast checkouts.', 'icon' => 'fa-wallet']
            ],
            'tech_stack' => ['Node.js', 'React Native', 'Socket.io', 'Google Maps API', 'AWS'],
            'process' => ['Requirement Gathering', 'Prototype', 'Development', 'Testing', 'Market Launch'],
            'benefits' => ['Fastest Delivery', 'Better Transparency', 'Increased User Loyalty', 'Higher ROI'],
            'faq' => [
                ['q' => 'Is it scalable for heavy traffic?', 'a' => 'Absolutely, we use microservices architecture for massive scalability.'],
                ['q' => 'Does it support offline modes?', 'a' => 'Yes, certain features work offline with data syncing once back online.']
            ]
        ],
        'enterprise' => [
            'id' => 'enterprise',
            'title' => 'Enterprise',
            'icon' => 'fa-building-columns',
            'hero_highlight' => 'Corporate Digital Transformation',
            'subtitle' => 'Custom enterprise solutions designed for complexity and scale.',
            'hero_image' => 'https://images.unsplash.com/photo-1497366754035-f200968a6e72?q=80&w=1600&auto=format&fit=crop',
            'about_image' => 'https://images.unsplash.com/photo-1497366811353-6870744d04b2?q=80&w=800&auto=format&fit=crop',
            'trust_points' => ['Business Intelligence', 'Secure Infrastructure', 'Legacy Migration', '24/7 Support'],
            'about_text' => 'Unlock operational excellence with enterprise-grade software. We solve complex business challenges with robust custom ERPs, CRMs, and unified communication platforms tailored to your corporate goals.',
            'features' => [
                ['title' => 'Custom ERP Solutions', 'desc' => 'Enterprise Resource Planning built for your workflow.', 'icon' => 'fa-cogs'],
                ['title' => 'Advanced CRM Systems', 'desc' => 'Elevate customer relationships and sales pipelines.', 'icon' => 'fa-user-tie'],
                ['title' => 'Business Analytics', 'desc' => 'Data-driven insights with interactive dashboards.', 'icon' => 'fa-chart-line'],
                ['title' => 'Legacy Modernization', 'desc' => 'Migrate your old systems to the modern cloud.', 'icon' => 'fa-cloud-upload-alt']
            ],
            'tech_stack' => ['Java', 'Spring Boot', 'Angular', 'Oracle', 'Azure'],
            'process' => ['Business Analysis', 'Design', 'Agile Sprints', 'Security Audit', 'Live Deploy'],
            'benefits' => ['Optimized Operations', 'Cost Efficiency', 'Data-Level Security', 'Scalable Growth'],
            'faq' => [
                ['q' => 'Can you migrate our old data?', 'a' => 'Yes, we specialize in secure and clean data migrations.'],
                ['q' => 'Do you provide onsite training?', 'a' => 'Yes, we offer comprehensive training for your staff.']
            ]
        ],
        'finance' => [
            'id' => 'finance',
            'title' => 'Finance',
            'icon' => 'fa-university',
            'hero_highlight' => 'FinTech Revolution',
            'subtitle' => 'Secure, scalable financial technology for the modern economy.',
            'hero_image' => 'https://images.unsplash.com/photo-1563986768609-322da13575f3?q=80&w=1600&auto=format&fit=crop',
            'about_image' => 'https://images.unsplash.com/photo-1556742031-c6961e8560b0?q=80&w=800&auto=format&fit=crop',
            'trust_points' => ['Secure Transactions', 'Core Banking', 'FinTech', 'Analytics'],
            'about_text' => 'Transforming financial institutions with robust digital infrastructure. We build platforms that handle millions of transactions with bank-grade security.',
            'features' => [
                ['title' => 'Core Banking Solutions', 'desc' => 'Centralized systems for banking operations.', 'icon' => 'fa-server'],
                ['title' => 'Financial Management Systems', 'desc' => 'Tools for wealth and asset management.', 'icon' => 'fa-chart-pie'],
                ['title' => 'Digital Payments', 'desc' => 'Seamless and secure payment gateways.', 'icon' => 'fa-credit-card'],
                ['title' => 'FinTech Applications', 'desc' => 'Innovative apps for the new financial era.', 'icon' => 'fa-mobile']
            ],
            'tech_stack' => ['Java', 'Spring Boot', 'Blockchain', 'React', 'AWS'],
            'process' => ['Security Audit', 'Architecture', 'Development', 'Penetration Testing', 'Launch'],
            'benefits' => ['Security', 'Scalability', 'Customer Experience', 'Real-time Data'],
            'faq' => [
                ['q' => 'How secure are the apps?', 'a' => 'We use military-grade encryption and regular security audits.'],
                ['q' => 'Do you support blockchain?', 'a' => 'Yes, we develop smart contracts and DeFi solutions.']
            ]
        ],
        'e-commerce' => [
            'id' => 'e-commerce',
            'title' => 'E-commerce',
            'icon' => 'fa-shopping-cart',
            'hero_highlight' => 'Elevate Your Digital Store',
            'subtitle' => 'High-conversion e-commerce platforms for global brands.',
            'hero_image' => 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?q=80&w=1600&auto=format&fit=crop',
            'about_image' => 'https://images.unsplash.com/photo-1556740738-b6a63e27c4df?q=80&w=800&auto=format&fit=crop',
            'trust_points' => ['Conversion Focused', 'Mobile First', 'Secure Checkout', 'SEO Ready'],
            'about_text' => 'Dominate the online marketplace. We build custom e-commerce solutions that provide seamless shopping experiences and robust backends to manage your growing business.',
            'features' => [
                ['title' => 'Custom Storefronts', 'desc' => 'Unique designs tailored to your brand identity.', 'icon' => 'fa-palette'],
                ['title' => 'Multi-vendor Marketplaces', 'desc' => 'Platforms like Amazon or Etsy for multiple sellers.', 'icon' => 'fa-store-alt'],
                ['title' => 'Inventory System', 'desc' => 'Real-time stock management across all channels.', 'icon' => 'fa-cubes'],
                ['title' => 'Global Payments', 'desc' => 'Integration with Stripe, PayPal, and more.', 'icon' => 'fa-money-check-alt']
            ],
            'tech_stack' => ['Laravel', 'Vue.js', 'Magento', 'Shopify Plus', 'PostgreSQL'],
            'process' => ['Market Analysis', 'UX Design', 'Development', 'Payment Integration', 'Go Live'],
            'benefits' => ['Increased Sales', 'Better Analytics', 'Customer Retention', 'Global Reach'],
            'faq' => [
                ['q' => 'Can you integrate with POS?', 'a' => 'Yes, we unify brick-and-mortar and online sales.'],
                ['q' => 'Is it SEO friendly?', 'a' => 'Yes, our platforms are optimized for search engines from day one.']
            ]
        ],
        'travel' => [
            'id' => 'travel',
            'title' => 'Travel',
            'icon' => 'fa-plane',
            'hero_highlight' => 'Smart Travel',
            'subtitle' => 'Connecting the world with seamless travel technology.',
            'hero_image' => 'https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?q=80&w=1600&auto=format&fit=crop',
            'about_image' => 'https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?q=80&w=800&auto=format&fit=crop',
            'trust_points' => ['Booking Engines', 'Global Reach', 'CRM', 'Mobile First'],
            'about_text' => 'We create immersive travel experiences. From booking engines to itinerary planning, our software powers the journey of millions.',
            'features' => [
                ['title' => 'Travel Booking Systems', 'desc' => 'Engines for flights, hotels, and tours.', 'icon' => 'fa-ticket-alt'],
                ['title' => 'Tour & Hotel Management', 'desc' => 'Property and package management software.', 'icon' => 'fa-hotel'],
                ['title' => 'Travel Mobile Apps', 'desc' => 'On-the-go booking and management.', 'icon' => 'fa-mobile-alt'],
                ['title' => 'CRM for Travel Agencies', 'desc' => 'Customer relationship tools for agents.', 'icon' => 'fa-users']
            ],
            'tech_stack' => ['Node.js', 'React', 'Amadeus API', 'MySQL', 'Flutter'],
            'process' => ['Requirement Analysis', 'API Integration', 'UI/UX', 'Testing', 'Delivery'],
            'benefits' => ['Efficiency', 'Global Inventory', 'User Retention', 'Sales Growth'],
            'faq' => [
                ['q' => 'Do you integrate GDS?', 'a' => 'Yes, complete integration with Amadeus, Sabre, etc.'],
                ['q' => 'Is it customizable?', 'a' => 'Fully customizable to your brand requirements.']
            ]
        ],
        'start-up' => [
            'id' => 'start-up',
            'title' => 'Start-Up',
            'icon' => 'fa-rocket',
            'hero_highlight' => 'Launchpad',
            'subtitle' => 'Turning visionary ideas into market-ready products.',
            'hero_image' => 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?q=80&w=1600&auto=format&fit=crop',
            'about_image' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=800&auto=format&fit=crop',
            'trust_points' => ['Agile', 'MVP', 'Scalable', 'Growth'],
            'about_text' => 'We are the technical co-founders for startups. We help validate ideas, build MVPs, and scale products to meet market demand.',
            'features' => [
                ['title' => 'MVP Development', 'desc' => 'Rapid prototyping and minimum viable products.', 'icon' => 'fa-cube'],
                ['title' => 'Product Engineering', 'desc' => 'Full-cycle software product development.', 'icon' => 'fa-cogs'],
                ['title' => 'Startup Consulting', 'desc' => 'Tech strategy and roadmap planning.', 'icon' => 'fa-lightbulb'],
                ['title' => 'Cloud & DevOps Support', 'desc' => 'Scalable infrastructure from day one.', 'icon' => 'fa-cloud']
            ],
            'tech_stack' => ['MERN Stack', 'Laravel', 'Flutter', 'AWS', 'Firebase'],
            'process' => ['Idea Validation', 'Prototyping', 'MVP Build', 'Feedback Loop', 'Scale'],
            'benefits' => ['Speed to Market', 'Cost Effective', 'Scalable Tech', 'Expert Guidance'],
            'faq' => [
                ['q' => 'How fast can you build an MVP?', 'a' => 'Typically within 4-8 weeks depending on complexity.'],
                ['q' => 'Do you offer equity deals?', 'a' => 'We primarily operate on a service model but are open to discussions.']
            ]
        ],
        'entertainment' => [
            'id' => 'entertainment',
            'title' => 'Entertainment',
            'icon' => 'fa-film',
            'hero_highlight' => 'Digital Media',
            'subtitle' => 'Engaging audiences with next-gen media platforms.',
            'hero_image' => 'https://images.unsplash.com/photo-1616469829581-73993eb86b02?q=80&w=1600&auto=format&fit=crop',
            'about_image' => 'https://images.unsplash.com/photo-1598899134739-24c46f58b8c0?q=80&w=800&auto=format&fit=crop',
            'trust_points' => ['Streaming', 'High Load', 'User Experience', 'Content Mgmt'],
            'about_text' => 'The future of entertainment is digital. We build high-performance streaming platforms and media apps that captivate millions.',
            'features' => [
                ['title' => 'OTT Platforms', 'desc' => 'Video on demand and live streaming services.', 'icon' => 'fa-play-circle'],
                ['title' => 'Media Streaming Apps', 'desc' => 'Mobile and TV apps for content consumption.', 'icon' => 'fa-tv'],
                ['title' => 'Content Distribution Systems', 'desc' => 'Efficient delivery of media assets.', 'icon' => 'fa-network-wired'],
                ['title' => 'Event Management Software', 'desc' => 'Ticketing and virtual event hosting.', 'icon' => 'fa-calendar-alt']
            ],
            'tech_stack' => ['Node.js', 'React', 'FFmpeg', 'AWS MediaLive', 'CDN'],
            'process' => ['Architecture', 'CDN Setup', 'Development', 'Load Testing', 'Launch'],
            'benefits' => ['High Availability', 'Low Latency', 'Global Reach', 'Monetization'],
            'faq' => [
                ['q' => 'Can you handle high traffic?', 'a' => 'Yes, our architectures are built to auto-scale.'],
                ['q' => 'Do you support DRM?', 'a' => 'Yes, we implement standard DRM for content protection.']
            ]
        ],
        'real-estate' => [
            'id' => 'real-estate',
            'title' => 'Real Estate',
            'icon' => 'fa-building',
            'hero_highlight' => 'PropTech',
            'subtitle' => 'Digitizing property management and sales.',
            'hero_image' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=1600&auto=format&fit=crop',
            'about_image' => 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?q=80&w=800&auto=format&fit=crop',
            'trust_points' => ['Virtual Tours', 'CRM', 'Listings', 'Automation'],
            'about_text' => 'We streamline real estate operations. Our tools help agents sell faster and property managers work smarter.',
            'features' => [
                ['title' => 'Property Management Systems', 'desc' => 'Tenant and lease administration.', 'icon' => 'fa-building-user'],
                ['title' => 'Real Estate CRM', 'desc' => 'Lead tracking and agent productivity tools.', 'icon' => 'fa-user-tie'],
                ['title' => 'Property Listing Portals', 'desc' => 'Search engines for buying and renting.', 'icon' => 'fa-search-location'],
                ['title' => 'Lease & Rental Management', 'desc' => 'Digital contracts and payment collection.', 'icon' => 'fa-file-signature']
            ],
            'tech_stack' => ['Laravel', 'Vue.js', 'Google Maps', 'Stripe', 'Twilio'],
            'process' => ['Research', 'Design', 'Development', 'Integration', 'Deploy'],
            'benefits' => ['Efficiency', 'Better Leads', 'Automated workflows', 'Reduced Paperwork'],
            'faq' => [
                ['q' => 'Do you integrate with portals?', 'a' => 'Yes, we can feed data to aggregators.'],
                ['q' => 'Is 3D viewing supported?', 'a' => 'Yes, we support Matterport and other 3D libraries.']
            ]
        ],
        'wearable' => [
            'id' => 'wearable',
            'title' => 'Wearable',
            'icon' => 'fa-stopwatch-20',
            'hero_highlight' => 'IoT & Wearables',
            'subtitle' => 'Connecting users through smart wearable technology.',
            'hero_image' => 'https://images.unsplash.com/photo-1510017803434-a899398421b3?q=80&w=1600&auto=format&fit=crop',
            'about_image' => 'https://images.unsplash.com/photo-1507146426996-ef05306b995a?q=80&w=800&auto=format&fit=crop',
            'trust_points' => ['Health Tracking', 'IoT', 'Sync', 'Data Analysis'],
            'about_text' => 'Unlock the power of connected devices. We build apps for smartwatches and fitness trackers that enrich user lives with real-time data.',
            'features' => [
                ['title' => 'Fitness Tracking Apps', 'desc' => 'Step, calorie, and activity monitoring.', 'icon' => 'fa-running'],
                ['title' => 'IoT Wearable Solutions', 'desc' => 'industrial and consumer IoT applications.', 'icon' => 'fa-network-wired'],
                ['title' => 'Health Monitoring Systems', 'desc' => 'Continuous vitals tracking.', 'icon' => 'fa-heartbeat']
            ],
            'tech_stack' => ['Swift', 'Kotlin', 'Bluetooth LE', 'Node.js', 'MongoDB'],
            'process' => ['Hardware Specs', 'App Design', 'BLE Integration', 'Testing', 'Launch'],
            'benefits' => ['Real-time Data', 'User Engagement', 'Health Insights', 'Connectivity'],
            'faq' => [
                ['q' => 'Which devices do you support?', 'a' => 'Apple Watch, Android Wear, Fitbit, and custom hardware.'],
                ['q' => 'Is battery usage optimized?', 'a' => 'Yes, efficient BLE implementation is our priority.']
            ]
        ],
        'game' => [
            'id' => 'game',
            'title' => 'Game',
            'icon' => 'fa-gamepad',
            'hero_highlight' => 'Gaming Worlds',
            'subtitle' => 'Immersive gaming experiences across platforms.',
            'hero_image' => 'https://images.unsplash.com/photo-1542751371-adc38448a05e?q=80&w=1600&auto=format&fit=crop',
            'about_image' => 'https://images.unsplash.com/photo-1552820728-8b83bb6b773f?q=80&w=800&auto=format&fit=crop',
            'trust_points' => ['Mobile', 'Web', 'AR/VR', 'Multiplayer'],
            'about_text' => 'We bring fun to life. From casual mobile games to complex AR/VR experiences, we create games that entertain and engage.',
            'features' => [
                ['title' => 'Mobile Game Development', 'desc' => 'iOS and Android games with Unity/Unreal.', 'icon' => 'fa-mobile'],
                ['title' => 'Web-Based Games', 'desc' => 'HTML5 games for browser play.', 'icon' => 'fa-globe'],
                ['title' => 'AR/VR Games', 'desc' => 'Augmented and Virtual reality experiences.', 'icon' => 'fa-vr-cardboard']
            ],
            'tech_stack' => ['Unity', 'Unreal Engine', 'C#', 'WebGL', 'Photon'],
            'process' => ['Concept Art', 'Mechanics', 'Development', 'QA', 'Publishing'],
            'benefits' => ['Engagement', 'Monetization', 'Brand Awareness', 'Fun'],
            'faq' => [
                ['q' => 'Do you do multiplayer?', 'a' => 'Yes, we build scalable multiplayer backends.'],
                ['q' => 'Can you help with publishing?', 'a' => 'Yes, we assist with App Store and Play Store submission.']
            ]
        ],
        'retail' => [
            'id' => 'retail',
            'title' => 'Retail',
            'icon' => 'fa-shopping-bag',
            'hero_highlight' => 'Smart Retail',
            'subtitle' => 'Omnichannel solutions for modern commerce.',
            'hero_image' => 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?q=80&w=1600&auto=format&fit=crop',
            'about_image' => 'https://images.unsplash.com/photo-1556740738-b6a63e27c4df?q=80&w=800&auto=format&fit=crop',
            'trust_points' => ['POS', 'Inventory', 'Analytics', 'Unified Commerce'],
            'about_text' => 'Retail is everywhere. We help brands unify their physical and digital presence with integrated retail technologies.',
            'features' => [
                ['title' => 'POS Systems', 'desc' => 'Point of Sale software for stores.', 'icon' => 'fa-cash-register'],
                ['title' => 'Inventory Management', 'desc' => 'Real-time stock tracking across locations.', 'icon' => 'fa-boxes'],
                ['title' => 'Retail Analytics', 'desc' => 'Insights into sales and customer behavior.', 'icon' => 'fa-chart-bar'],
                ['title' => 'Omni-Channel Solutions', 'desc' => 'Unified experience online and offline.', 'icon' => 'fa-sync']
            ],
            'tech_stack' => ['React', 'Node.js', 'PostgreSQL', 'Stripe', 'Azure'],
            'process' => ['Analysis', 'Integration', 'Custom Dev', 'Training', 'Support'],
            'benefits' => ['Efficiency', 'Sales Growth', 'Better Inventory', 'Customer Insight'],
            'faq' => [
                ['q' => 'Does it work offline?', 'a' => 'Yes, our POS systems have offline capabilities.'],
                ['q' => 'Can it integrate with ERP?', 'a' => 'Yes, seamless integration with SAP, Oracle, etc.']
            ]
        ],
        'logistics' => [
            'id' => 'logistics',
            'title' => 'Logistics',
            'icon' => 'fa-truck',
            'hero_highlight' => 'Supply Chain',
            'subtitle' => 'Efficient logistics and supply chain management.',
            'hero_image' => 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?q=80&w=1600&auto=format&fit=crop',
            'about_image' => 'https://images.unsplash.com/photo-1566576912321-d58ddd7a6088?q=80&w=800&auto=format&fit=crop',
            'trust_points' => ['Supply Chain', 'Fleet', 'Tracking', 'Optimization'],
            'about_text' => 'Move goods faster and smarter. Our logistics software optimizes routes, tracks assets, and manages warehouses.',
            'features' => [
                ['title' => 'Supply Chain Management', 'desc' => 'End-to-end visibility of goods.', 'icon' => 'fa-link'],
                ['title' => 'Fleet Management Systems', 'desc' => 'Vehicle maintenance and routing.', 'icon' => 'fa-truck-moving'],
                ['title' => 'Warehouse Management', 'desc' => 'Inventory placement and retrieval.', 'icon' => 'fa-warehouse'],
                ['title' => 'Tracking & Monitoring', 'desc' => 'Real-time shipment tracking.', 'icon' => 'fa-map-marker-alt']
            ],
            'tech_stack' => ['Java', 'Spring', 'Google Maps API', 'IoT', 'AWS'],
            'process' => ['Strategy', 'IoT Setup', 'Development', 'Integration', 'Rollout'],
            'benefits' => ['Cost Reduction', 'On-time Delivery', 'Visibility', 'Automation'],
            'faq' => [
                ['q' => 'Do you use GPS?', 'a' => 'Yes, real-time GPS tracking for all assets.'],
                ['q' => 'Can you optimize routes?', 'a' => 'Yes, AI-driven route optimization algorithms.']
            ]
        ],
        'automotive' => [
            'id' => 'automotive',
            'title' => 'Automotive',
            'icon' => 'fa-car',
            'hero_highlight' => 'AutoTech',
            'subtitle' => 'Driving the future of automotive technology.',
            'hero_image' => 'https://images.unsplash.com/photo-1617788138017-80ad40651399?q=80&w=1600&auto=format&fit=crop',
            'about_image' => 'https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?q=80&w=800&auto=format&fit=crop',
            'trust_points' => ['Telematics', 'ERP', 'Connected Car', 'Sales'],
            'about_text' => 'From showroom to service bay. We build software that manages dealership operations and connects vehicles to the cloud.',
            'features' => [
                ['title' => 'Vehicle Tracking Systems', 'desc' => 'Telematics and diagnostics.', 'icon' => 'fa-satellite-dish'],
                ['title' => 'Automotive ERP', 'desc' => 'Dealer management systems.', 'icon' => 'fa-cogs'],
                ['title' => 'Connected Car Solutions', 'desc' => 'Infotainment and app connectivity.', 'icon' => 'fa-wifi']
            ],
            'tech_stack' => ['C++', 'Python', 'Embeded Systems', 'Cloud', 'Android Auto'],
            'process' => ['R&D', 'Prototyping', 'Testing', 'Certification', 'Launch'],
            'benefits' => ['Connectivity', 'Efficiency', 'Safety', 'User Experience'],
            'faq' => [
                ['q' => 'Do you work with OBD?', 'a' => 'Yes, we interpret OBD-II data for diagnostics.'],
                ['q' => 'Is data secure?', 'a' => 'Absolutely, vehicle data is encrypted end-to-end.']
            ]
        ],
        'electric-vehicle' => [
            'id' => 'electric-vehicle',
            'title' => 'Electric Vehicle',
            'icon' => 'fa-charging-station',
            'hero_highlight' => 'EV Tech Mobility',
            'subtitle' => 'Sustainable mobility solutions for the electric vehicle revolution.',
            'hero_image' => 'https://images.unsplash.com/photo-1593941707882-a5bba14938c7?q=80&w=1600&auto=format&fit=crop',
            'about_image' => 'https://images.unsplash.com/photo-1563953531555-cc95333d26da?q=80&w=800&auto=format&fit=crop',
            'trust_points' => ['Battery MGMT', 'EV Smart Grid', 'Charging Network', 'IoT Sync'],
            'about_text' => 'We power the future of transportation. Our EV solutions focus on smart battery management, charging infrastructure, and connected vehicle ecosystems to drive the global shift toward sustainability.',
            'features' => [
                ['title' => 'Charging Station Management', 'desc' => 'Cloud-based control for EV charging networks.', 'icon' => 'fa-plug'],
                ['title' => 'Battery Management Systems', 'desc' => 'Optimize vehicle health and range through IoT.', 'icon' => 'fa-battery-full'],
                ['title' => 'EV Fleet Management', 'desc' => 'Real-time telemetry and logistics for EV fleets.', 'icon' => 'fa-shipping-fast'],
                ['title' => 'Smart Energy Integration', 'desc' => 'Connect EV networks with renewable energy grids.', 'icon' => 'fa-leaf']
            ],
            'tech_stack' => ['Python', 'Golang', 'MQTT', 'C++', 'AWS IoT'],
            'process' => ['Requirement mapping', 'IoT Prototyping', 'Software Build', 'Field Testing', 'Go-Live'],
            'benefits' => ['Eco-Friendly', 'Operational Savings', 'Advanced Telemetry', 'Future-Ready'],
            'faq' => [
                ['q' => 'Do you support OCPP?', 'a' => 'Yes, we follow the Open Charge Point Protocol standards.'],
                ['q' => 'Can you build mobile apps for users?', 'a' => 'Yes, we create intuitive apps for finding and paying at chargers.']
            ]
        ],
        'education' => [
            'id' => 'education',
            'title' => 'Education',
            'icon' => 'fa-graduation-cap',
            'hero_highlight' => 'Smart Learning',
            'subtitle' => 'Empowering the next generation with EdTech.',
            'hero_image' => 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?q=80&w=1600&auto=format&fit=crop',
            'about_image' => 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?q=80&w=800&auto=format&fit=crop',
            'trust_points' => ['LMS', 'eLearning', 'Virtual Class', 'Mobile'],
            'about_text' => 'Making learning accessible and engaging. We build platforms for schools, universities, and corporate training.',
            'features' => [
                ['title' => 'eLearning Platforms', 'desc' => 'Custom portals for online courses.', 'icon' => 'fa-laptop-code'],
                ['title' => 'Learning Management Systems', 'desc' => 'LMS for administration and tracking.', 'icon' => 'fa-chalkboard'],
                ['title' => 'Virtual Classrooms', 'desc' => 'Live video teaching tools.', 'icon' => 'fa-video'],
                ['title' => 'Education Mobile Apps', 'desc' => 'Learning on the go.', 'icon' => 'fa-mobile-alt']
            ],
            'tech_stack' => ['Laravel', 'Vue.js', 'Moodle', 'Zoom SDK', 'Vimeo'],
            'process' => ['Curriculum', 'Design', 'Development', 'Content', 'Launch'],
            'benefits' => ['Access', 'Engagement', 'Tracking', 'Scalability'],
            'faq' => [
                ['q' => 'Can you customizing Moodle?', 'a' => 'Yes, we are experts in Moodle customization.'],
                ['q' => 'Do you support SCORM?', 'a' => 'Yes, our LMS solutions are SCORM compliant.']
            ]
        ]
    ];


    public function index()
    {
        $industries = json_decode(json_encode($this->industries));
        return view('industries.index', compact('industries'));
    }

    public function show($slug)
    {
        if (!array_key_exists($slug, $this->industries)) {
            abort(404);
        }

        $service = (object) $this->industries[$slug];

        $service->features = json_decode(json_encode($service->features));
        $service->faq = json_decode(json_encode($service->faq ?? []));

        return view('service_detail', compact('service'));
    }
}
