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
            'subtitle' => 'Advanced digital healthcare solutions designed to enhance patient care, streamline clinical workflows, and improve operational efficiency with secure, compliant technology.',
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
                ['q' => 'Is it HIPAA compliant?', 'a' => 'Yes, we strictly adhere to healthcare data privacy and security regulations.'],
                ['q' => 'Can you integrate with existing EHR?', 'a' => 'Yes, we support HL7 and FHIR standards for seamless integration.'],
                ['q' => 'Do you implement data encryption?', 'a' => 'Yes, we use end-to-end encryption for data at rest and in transit.'],
                ['q' => 'Can you build telemedicine platforms?', 'a' => 'Yes, we develop secure telehealth and virtual consultation systems.'],
                ['q' => 'Is patient data securely stored?', 'a' => 'Yes, we use secure cloud infrastructure with strict access controls.'],
                ['q' => 'Do you provide role-based access control?', 'a' => 'Yes, we implement granular access permissions for staff and administrators.'],
                ['q' => 'Can the system scale for large hospitals?', 'a' => 'Yes, our architecture supports multi-location hospitals and high patient volumes.'],
                ['q' => 'Do you offer ongoing support and compliance updates?', 'a' => 'Yes, we provide maintenance, monitoring, and regulatory compliance updates.']
            ]
        ],
        'on-demand' => [
            'id' => 'on-demand',
            'title' => 'On-Demand',
            'icon' => 'fa-concierge-bell',
            'hero_highlight' => 'Seamless Real-time Services',
            'subtitle' => 'Scalable on-demand platforms built for modern consumers, designed to deliver seamless user experiences, real-time functionality, and rapid business growth.',
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
                ['q' => 'Is it scalable for heavy traffic?', 'a' => 'Absolutely, we use scalable cloud infrastructure and microservices architecture to handle high traffic loads.'],
                ['q' => 'Does it support offline modes?', 'a' => 'Yes, selected features can function offline with automatic data sync once reconnected.'],
                ['q' => 'Can you integrate real-time tracking?', 'a' => 'Yes, we implement real-time tracking using GPS and live data updates.'],
                ['q' => 'Does it include an admin dashboard?', 'a' => 'Yes, we build a powerful admin panel to manage users, orders, and analytics.'],
                ['q' => 'Can it support multiple vendors?', 'a' => 'Yes, we can develop multi-vendor functionality with separate dashboards and controls.'],
                ['q' => 'Is payment integration included?', 'a' => 'Yes, we integrate secure payment gateways for seamless transactions.'],
                ['q' => 'Can the platform scale globally?', 'a' => 'Yes, we design infrastructure to support multi-region deployments and global users.'],
                ['q' => 'Do you provide maintenance and updates?', 'a' => 'Yes, we offer ongoing support, feature enhancements, and performance optimization.']
            ]
        ],
        'enterprise' => [
            'id' => 'enterprise',
            'title' => 'Enterprise',
            'icon' => 'fa-building-columns',
            'hero_highlight' => 'Corporate Digital Transformation',
            'subtitle' => 'Custom enterprise solutions engineered to handle complex workflows, high-volume operations, and large-scale growth with security, performance, and long-term reliability.',
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
                ['q' => 'Can you migrate our old data?', 'a' => 'Yes, we specialize in secure, accurate, and well-structured data migrations.'],
                ['q' => 'Do you provide onsite training?', 'a' => 'Yes, we offer comprehensive onsite or remote training for your staff.'],
                ['q' => 'Is the solution customizable?', 'a' => 'Yes, we build fully customized enterprise systems tailored to your workflows.'],
                ['q' => 'Can it integrate with our existing software?', 'a' => 'Yes, we integrate ERPs, CRMs, HR systems, and other enterprise tools.'],
                ['q' => 'Is the system secure?', 'a' => 'Yes, we implement enterprise-grade security, access control, and data encryption.'],
                ['q' => 'Can the system handle high user loads?', 'a' => 'Yes, our architecture is designed to support large teams and heavy operations.'],
                ['q' => 'Do you provide long-term support?', 'a' => 'Yes, we offer dedicated support and maintenance contracts.'],
                ['q' => 'Will we receive documentation?', 'a' => 'Yes, we provide detailed technical and user documentation for smooth adoption.']
            ]
        ],
        'finance' => [
            'id' => 'finance',
            'title' => 'Finance',
            'icon' => 'fa-university',
            'hero_highlight' => 'FinTech Revolution',
            'subtitle' => 'Secure, scalable fintech solutions built for the modern economy, enabling seamless transactions, regulatory compliance, and high-performance financial operations.',
            'hero_image' => 'https://images.unsplash.com/photo-1563986768609-322da13575f3?q=80&w=1600&auto=format&fit=crop',
            'about_image' => 'https://images.unsplash.com/photo-1556742031-c6961e8560b0?q=80&w=800&auto=format&fit=crop',
            'trust_points' => ['Secure Transactions', 'Core Banking', 'FinTech', 'Analytics'],
            'about_text' => 'Transform financial institutions with resilient, high-performance digital infrastructure. We build secure fintech platforms capable of processing millions of transactions with bank-grade encryption, compliance-ready architecture, and uncompromising reliability.',
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
                ['q' => 'How secure are the apps?', 'a' => 'We implement advanced encryption, secure authentication, and conduct regular security audits.'],
                ['q' => 'Do you support blockchain?', 'a' => 'Yes, we develop smart contracts, blockchain integrations, and DeFi solutions.'],
                ['q' => 'Are your solutions compliant with regulations?', 'a' => 'Yes, we design systems aligned with financial regulations such as KYC, AML, and PCI-DSS standards.'],
                ['q' => 'Can your platform handle high transaction volumes?', 'a' => 'Yes, our architecture is built to process millions of transactions reliably.'],
                ['q' => 'Do you integrate payment gateways?', 'a' => 'Yes, we integrate global and local payment providers securely.'],
                ['q' => 'Is multi-factor authentication supported?', 'a' => 'Yes, we implement MFA and advanced identity verification systems.'],
                ['q' => 'Do you provide ongoing security monitoring?', 'a' => 'Yes, we offer continuous monitoring and proactive threat detection services.'],
                ['q' => 'Can you integrate with core banking systems?', 'a' => 'Yes, we integrate with existing banking APIs and enterprise financial systems.']
            ]
        ],
        'e-commerce' => [
            'id' => 'e-commerce',
            'title' => 'E-commerce',
            'icon' => 'fa-shopping-cart',
            'hero_highlight' => 'Elevate Your Digital Store',
            'subtitle' => 'High-conversion e-commerce platforms engineered for global brands, built to maximize sales, enhance user experience, and scale seamlessly across international markets.',
            'hero_image' => 'https://images.unsplash.com/photo-1472851294608-062f824d29cc?q=80&w=1600&auto=format&fit=crop&ixlib=rb-4.0.3',
            'about_image' => 'https://images.unsplash.com/photo-1607082348824-0a96f2a4b9da?q=80&w=800&auto=format&fit=crop&ixlib=rb-4.0.3',
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
                ['q' => 'Can you integrate with POS?', 'a' => 'Yes, we unify brick-and-mortar and online sales for seamless inventory and order management.'],
                ['q' => 'Is it SEO friendly?', 'a' => 'Yes, our platforms are optimized for search engines from day one.'],
                ['q' => 'Can you support multi-currency and multi-language?', 'a' => 'Yes, we build global-ready stores with currency and language localization.'],
                ['q' => 'Do you integrate with ERP systems?', 'a' => 'Yes, we connect ecommerce platforms with ERP, CRM, and inventory systems.'],
                ['q' => 'Is the platform scalable for high traffic?', 'a' => 'Yes, we use scalable cloud infrastructure to handle peak sales periods.'],
                ['q' => 'Do you optimize for conversions?', 'a' => 'Yes, we implement CRO best practices including optimized checkout flows.'],
                ['q' => 'Can you manage product feeds for marketplaces?', 'a' => 'Yes, we integrate with Amazon, Flipkart, and other marketplaces.'],
                ['q' => 'Do you provide analytics integration?', 'a' => 'Yes, we integrate advanced analytics tools for performance tracking and insights.']
            ]
        ],
        'travel' => [
            'id' => 'travel',
            'title' => 'Travel',
            'icon' => 'fa-plane',
            'hero_highlight' => 'Smart Travel',
            'subtitle' => 'Connecting the world through seamless travel technology, delivering smart booking systems, real-time integrations, and smooth user experiences for modern travelers.',
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
                ['q' => 'Do you integrate GDS?', 'a' => 'Yes, we provide full integration with Amadeus, Sabre, and other major GDS providers.'],
                ['q' => 'Is it customizable?', 'a' => 'Yes, the platform is fully customizable to match your brand and business needs.'],
                ['q' => 'Can you integrate flight, hotel, and car rentals?', 'a' => 'Yes, we integrate multiple travel services into a unified booking system.'],
                ['q' => 'Do you support real-time pricing and availability?', 'a' => 'Yes, we implement real-time APIs for accurate inventory and pricing updates.'],
                ['q' => 'Is multi-currency and multi-language supported?', 'a' => 'Yes, we build global-ready travel platforms with localization features.'],
                ['q' => 'Can you include payment gateway integration?', 'a' => 'Yes, we integrate secure global and local payment providers.'],
                ['q' => 'Do you provide admin dashboards?', 'a' => 'Yes, we develop powerful admin panels for bookings, commissions, and analytics.'],
                ['q' => 'Can the platform handle high booking volumes?', 'a' => 'Yes, our infrastructure is built to scale during peak travel seasons.']
            ]
        ],
        'start-up' => [
            'id' => 'start-up',
            'title' => 'Start-Up',
            'icon' => 'fa-rocket',
            'hero_highlight' => 'Launchpad',
            'subtitle' => 'Turning visionary ideas into scalable, market-ready products through strategic planning, rapid development, and growth-focused technology solutions.',
            'hero_image' => 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?q=80&w=1600&auto=format&fit=crop',
            'about_image' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=800&auto=format&fit=crop',
            'trust_points' => ['Agile', 'MVP', 'Scalable', 'Growth'],
            'about_text' => 'We act as your technical co-founder, turning ideas into real, scalable products. From market validation and MVP development to full-scale growth, we help you build, launch, and evolve with confidence.',
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
                ['q' => 'How fast can you build an MVP?', 'a' => 'Typically within 4–8 weeks depending on scope and complexity.'],
                ['q' => 'Do you offer equity deals?', 'a' => 'We primarily operate on a service model but are open to strategic discussions.'],
                ['q' => 'Can you help with product validation?', 'a' => 'Yes, we assist with market research, competitor analysis, and prototype testing.'],
                ['q' => 'Do you provide UI/UX design?', 'a' => 'Yes, we design intuitive interfaces focused on user adoption and growth.'],
                ['q' => 'Can you scale the product after launch?', 'a' => 'Yes, we build scalable architecture to support rapid growth.'],
                ['q' => 'Do you help with investor pitch tech support?', 'a' => 'Yes, we provide technical documentation and support for investor presentations.'],
                ['q' => 'Will I own the product and code?', 'a' => 'Yes, full ownership is transferred upon project completion as per agreement.'],
                ['q' => 'Do you provide post-launch support?', 'a' => 'Yes, we offer maintenance, updates, and feature enhancements.']
            ]
        ],
        'entertainment' => [
            'id' => 'entertainment',
            'title' => 'Entertainment',
            'icon' => 'fa-film',
            'hero_highlight' => 'Digital Media',
            'subtitle' => 'Next-generation media platforms designed to captivate audiences, deliver seamless streaming experiences, and power engaging digital entertainment ecosystems.',
            'hero_image' => 'https://images.unsplash.com/photo-1616469829581-73993eb86b02?q=80&w=1600&auto=format&fit=crop',
            'about_image' => 'https://images.unsplash.com/photo-1598899134739-24c46f58b8c0?q=80&w=800&auto=format&fit=crop',
            'trust_points' => ['Streaming', 'High Load', 'User Experience', 'Content Mgmt'],
            'about_text' => 'The future of entertainment is digital — and performance is everything. We build scalable streaming platforms and media applications designed to handle massive audiences, deliver seamless playback, and create immersive user experiences that keep viewers engaged.',
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
                ['q' => 'Can you handle high traffic?', 'a' => 'Yes, our cloud-native architectures are built to auto-scale during traffic spikes.'],
                ['q' => 'Do you support DRM?', 'a' => 'Yes, we implement industry-standard DRM solutions for secure content protection.'],
                ['q' => 'Do you support live streaming?', 'a' => 'Yes, we build low-latency live streaming platforms with real-time engagement features.'],
                ['q' => 'Can you integrate subscription models?', 'a' => 'Yes, we implement subscription, pay-per-view, and ad-supported monetization models.'],
                ['q' => 'Is multi-device streaming supported?', 'a' => 'Yes, we optimize platforms for mobile, web, smart TVs, and connected devices.'],
                ['q' => 'Do you provide analytics and viewer insights?', 'a' => 'Yes, we integrate advanced analytics to track user behavior and engagement metrics.'],
                ['q' => 'Can you integrate CDN services?', 'a' => 'Yes, we use global CDNs to ensure fast and reliable content delivery worldwide.'],
                ['q' => 'Do you offer ongoing support and upgrades?', 'a' => 'Yes, we provide continuous maintenance, feature enhancements, and performance optimization.']
            ]
        ],
        'real-estate' => [
            'id' => 'real-estate',
            'title' => 'Real Estate',
            'icon' => 'fa-building',
            'hero_highlight' => 'PropTech',
            'subtitle' => 'Digitizing property management and sales with smart platforms that streamline listings, automate workflows, and enhance buyer and tenant experiences.',
            'hero_image' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=1600&auto=format&fit=crop',
            'about_image' => 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?q=80&w=800&auto=format&fit=crop',
            'trust_points' => ['Virtual Tours', 'CRM', 'Listings', 'Automation'],
            'about_text' => 'We simplify and modernize real estate operations with powerful digital tools. From smart listing management and automated workflows to lead tracking and analytics, our solutions help agents close deals faster and property managers operate more efficiently.',
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
                ['q' => 'Do you integrate with portals?', 'a' => 'Yes, we can sync listings with major property aggregators and portals.'],
                ['q' => 'Is 3D viewing supported?', 'a' => 'Yes, we support Matterport and other 3D visualization technologies.'],
                ['q' => 'Can you add CRM integration?', 'a' => 'Yes, we integrate real estate CRMs for lead tracking and follow-ups.'],
                ['q' => 'Is automated lead capture available?', 'a' => 'Yes, we implement smart forms and chatbot integrations for lead generation.'],
                ['q' => 'Can agents manage listings easily?', 'a' => 'Yes, we build intuitive dashboards for listing management and updates.'],
                ['q' => 'Do you support multi-location properties?', 'a' => 'Yes, our platform can handle multiple branches and property portfolios.'],
                ['q' => 'Is the website SEO-optimized?', 'a' => 'Yes, we implement property-specific SEO strategies for better visibility.'],
                ['q' => 'Can you integrate payment gateways for bookings?', 'a' => 'Yes, we enable secure online booking and payment functionality.']
            ]

        ],
        'wearable' => [
            'id' => 'wearable',
            'title' => 'Wearable',
            'icon' => 'fa-stopwatch-20',
            'hero_highlight' => 'IoT & Wearables',
            'subtitle' => 'Connecting users through intelligent wearable technology with secure IoT integration, real-time data syncing, and seamless mobile and cloud connectivity.',
            'hero_image' => 'https://images.unsplash.com/photo-1510017803434-a899398421b3?q=80&w=1600&auto=format&fit=crop',
            'about_image' => 'https://images.unsplash.com/photo-1507146426996-ef05306b995a?q=80&w=800&auto=format&fit=crop',
            'trust_points' => ['Health Tracking', 'IoT', 'Sync', 'Data Analysis'],
            'about_text' => 'Unlock the full potential of connected devices with intelligent wearable applications. We develop secure, high-performance apps for smartwatches and fitness trackers that deliver real-time data, seamless synchronization, and meaningful user insights.',
            'features' => [
                ['title' => 'Fitness Tracking Apps', 'desc' => 'Step, calorie, and activity monitoring.', 'icon' => 'fa-running'],
                ['title' => 'IoT Wearable Solutions', 'desc' => 'industrial and consumer IoT applications.', 'icon' => 'fa-network-wired'],
                ['title' => 'Health Monitoring Systems', 'desc' => 'Continuous vitals tracking.', 'icon' => 'fa-heartbeat']
            ],
            'tech_stack' => ['Swift', 'Kotlin', 'Bluetooth LE', 'Node.js', 'MongoDB'],
            'process' => ['Hardware Specs', 'App Design', 'BLE Integration', 'Testing', 'Launch'],
            'benefits' => ['Real-time Data', 'User Engagement', 'Health Insights', 'Connectivity'],
            'faq' => [
                ['q' => 'Which devices do you support?', 'a' => 'Apple Watch, Wear OS, Fitbit, and custom wearable hardware.'],
                ['q' => 'Is battery usage optimized?', 'a' => 'Yes, we prioritize efficient BLE communication and background processing.'],
                ['q' => 'Do you support real-time health tracking?', 'a' => 'Yes, we integrate heart rate, steps, sleep, and other sensor data in real time.'],
                ['q' => 'Can you sync data with mobile apps?', 'a' => 'Yes, we ensure seamless synchronization between wearables and companion apps.'],
                ['q' => 'Is cloud integration available?', 'a' => 'Yes, we connect wearable data securely to cloud platforms for analytics and storage.'],
                ['q' => 'Do you develop custom firmware?', 'a' => 'Yes, we support firmware and embedded development for custom devices.'],
                ['q' => 'Is user data secure?', 'a' => 'Yes, all data is encrypted and handled with strict privacy standards.'],
                ['q' => 'Can you integrate with third-party health platforms?', 'a' => 'Yes, we integrate with Apple Health, Google Fit, and other APIs.']
            ]
        ],
        'game' => [
            'id' => 'game',
            'title' => 'Game',
            'icon' => 'fa-gamepad',
            'hero_highlight' => 'Gaming Worlds',
            'subtitle' => 'Immersive gaming experiences crafted for multiple platforms, delivering high-performance gameplay, stunning visuals, and engaging user interactions.',
            'hero_image' => 'https://images.unsplash.com/photo-1542751371-adc38448a05e?q=80&w=1600&auto=format&fit=crop',
            'about_image' => 'https://images.unsplash.com/photo-1552820728-8b83bb6b773f?q=80&w=800&auto=format&fit=crop',
            'trust_points' => ['Mobile', 'Web', 'AR/VR', 'Multiplayer'],
            'about_text' => 'We bring fun to life with engaging, high-performance game development. From casual mobile games to advanced AR/VR experiences, we design immersive worlds that captivate players and keep them coming back for more.',
            'features' => [
                ['title' => 'Mobile Game Development', 'desc' => 'iOS and Android games with Unity/Unreal.', 'icon' => 'fa-mobile'],
                ['title' => 'Web-Based Games', 'desc' => 'HTML5 games for browser play.', 'icon' => 'fa-globe'],
                ['title' => 'AR/VR Games', 'desc' => 'Augmented and Virtual reality experiences.', 'icon' => 'fa-vr-cardboard']
            ],
            'tech_stack' => ['Unity', 'Unreal Engine', 'C#', 'WebGL', 'Photon'],
            'process' => ['Concept Art', 'Mechanics', 'Development', 'QA', 'Publishing'],
            'benefits' => ['Engagement', 'Monetization', 'Brand Awareness', 'Fun'],
            'faq' => [
                ['q' => 'Do you do multiplayer?', 'a' => 'Yes, we build scalable multiplayer backends with real-time synchronization.'],
                ['q' => 'Can you help with publishing?', 'a' => 'Yes, we assist with App Store and Play Store submission and compliance.'],
                ['q' => 'Which game engines do you use?', 'a' => 'We primarily use Unity and Unreal Engine depending on the project requirements.'],
                ['q' => 'Do you develop AR/VR games?', 'a' => 'Yes, we create immersive AR and VR gaming experiences for modern devices.'],
                ['q' => 'Can you add in-app purchases?', 'a' => 'Yes, we integrate secure in-app purchases and monetization systems.'],
                ['q' => 'Is cross-platform play supported?', 'a' => 'Yes, we can develop games that support cross-platform compatibility.'],
                ['q' => 'Do you provide post-launch support?', 'a' => 'Yes, we offer updates, bug fixes, and feature enhancements after launch.'],
                ['q' => 'Can you design custom game assets?', 'a' => 'Yes, we create custom characters, environments, and animations.']
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
            'subtitle' => 'Efficient, technology-driven logistics and supply chain solutions designed to optimize operations, enhance visibility, and streamline end-to-end delivery management.',
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
                ['q' => 'Do you use GPS?', 'a' => 'Yes, we implement real-time GPS tracking for vehicles and assets.'],
                ['q' => 'Can you optimize routes?', 'a' => 'Yes, we use AI-driven route optimization to reduce fuel costs and delivery time.'],
                ['q' => 'Do you provide fleet management features?', 'a' => 'Yes, we develop fleet dashboards with tracking, maintenance alerts, and performance analytics.'],
                ['q' => 'Can the system handle warehouse management?', 'a' => 'Yes, we integrate inventory and warehouse management modules.'],
                ['q' => 'Is real-time shipment tracking available?', 'a' => 'Yes, customers and admins can track shipments live.'],
                ['q' => 'Can it integrate with ERP systems?', 'a' => 'Yes, we integrate logistics platforms with ERP and accounting systems.'],
                ['q' => 'Is the solution scalable for large operations?', 'a' => 'Yes, our architecture supports high shipment volumes and multi-location operations.'],
                ['q' => 'Do you provide analytics and reporting?', 'a' => 'Yes, we include advanced reporting for operational insights and decision-making.']
            ]
        ],
        'automotive' => [
            'id' => 'automotive',
            'title' => 'Automotive',
            'icon' => 'fa-car',
            'hero_highlight' => 'AutoTech',
            'subtitle' => 'Driving the future of automotive technology with intelligent digital platforms, connected vehicle solutions, and data-driven innovations that enhance performance, safety, and customer experience.',
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
                ['q' => 'Do you work with OBD?', 'a' => 'Yes, we integrate and interpret OBD-II data for advanced diagnostics and analytics.'],
                ['q' => 'Is data secure?', 'a' => 'Yes, all vehicle and user data is encrypted end-to-end with strict access controls.'],
                ['q' => 'Can you build dealership management systems?', 'a' => 'Yes, we develop DMS platforms for sales, inventory, and service management.'],
                ['q' => 'Do you support telematics integration?', 'a' => 'Yes, we integrate telematics systems for real-time vehicle tracking and insights.'],
                ['q' => 'Can you create mobile apps for customers?', 'a' => 'Yes, we build apps for service booking, vehicle monitoring, and notifications.'],
                ['q' => 'Is predictive maintenance supported?', 'a' => 'Yes, we use data analytics to enable predictive maintenance features.'],
                ['q' => 'Can the system handle multi-branch dealerships?', 'a' => 'Yes, our solutions scale to support multiple locations and franchises.'],
                ['q' => 'Do you provide ongoing technical support?', 'a' => 'Yes, we offer maintenance, updates, and system enhancements.']
            ]

        ],
        'electric-vehicle' => [
            'id' => 'electric-vehicle',
            'title' => 'Electric Vehicle',
            'icon' => 'fa-charging-station',
            'hero_highlight' => 'EV Tech Mobility',
            'subtitle' => 'Powering the electric vehicle revolution with smart, sustainable mobility solutions — from charging infrastructure platforms to fleet management and real-time energy optimization systems.',
            'hero_image' => 'https://images.unsplash.com/photo-1593941707882-a5bba14938c7?q=80&w=1600&auto=format&fit=crop',
            'about_image' => 'https://images.unsplash.com/photo-1593941707882-a5bba14938c7?q=80&w=800&auto=format&fit=crop',
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
                ['q' => 'Do you support OCPP?', 'a' => 'Yes, we implement solutions compliant with Open Charge Point Protocol (OCPP) standards.'],
                ['q' => 'Can you build mobile apps for users?', 'a' => 'Yes, we develop intuitive mobile apps for locating, booking, and paying at charging stations.'],
                ['q' => 'Do you support real-time charger monitoring?', 'a' => 'Yes, we provide live monitoring dashboards for charger status and usage analytics.'],
                ['q' => 'Can you integrate payment gateways?', 'a' => 'Yes, we integrate secure payment systems for seamless charging transactions.'],
                ['q' => 'Is fleet management supported?', 'a' => 'Yes, we build EV fleet management systems with tracking and performance insights.'],
                ['q' => 'Do you offer energy management features?', 'a' => 'Yes, we implement smart load balancing and energy optimization solutions.'],
                ['q' => 'Can the platform scale nationwide?', 'a' => 'Yes, our cloud-based architecture supports large-scale deployments.'],
                ['q' => 'Do you provide maintenance and updates?', 'a' => 'Yes, we offer ongoing support, monitoring, and feature upgrades.']
            ]

        ],
        'education' => [
            'id' => 'education',
            'title' => 'Education',
            'icon' => 'fa-graduation-cap',
            'hero_highlight' => 'Smart Learning',
            'subtitle' => 'Empowering the next generation with innovative EdTech solutions that enhance learning experiences, streamline administration, and enable scalable digital education platforms.',
            'hero_image' => 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?q=80&w=1600&auto=format&fit=crop',
            'about_image' => 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?q=80&w=800&auto=format&fit=crop',
            'trust_points' => ['LMS', 'eLearning', 'Virtual Class', 'Mobile'],
            'about_text' => 'We make learning accessible, interactive, and future-ready. From schools and universities to corporate training programs, we build scalable platforms that support online classes, assessments, content management, and seamless learner engagement.',
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
                ['q' => 'Can you customize Moodle?', 'a' => 'Yes, we are experts in Moodle customization and plugin development.'],
                ['q' => 'Do you support SCORM?', 'a' => 'Yes, our LMS solutions are fully SCORM compliant.'],
                ['q' => 'Can you integrate live classes?', 'a' => 'Yes, we integrate Zoom, Google Meet, and other live conferencing tools.'],
                ['q' => 'Is role-based access supported?', 'a' => 'Yes, we implement student, teacher, admin, and custom role permissions.'],
                ['q' => 'Do you provide assessment and quiz modules?', 'a' => 'Yes, we build advanced testing, grading, and certification systems.'],
                ['q' => 'Can the platform scale for large institutions?', 'a' => 'Yes, our architecture supports thousands of concurrent learners.'],
                ['q' => 'Do you support mobile learning?', 'a' => 'Yes, we create responsive platforms and mobile app integrations.'],
                ['q' => 'Can you migrate existing course content?', 'a' => 'Yes, we handle secure migration of courses, users, and learning data.']
            ]

        ],
        'manufacturing' => [
            'id' => 'manufacturing',
            'title' => 'Manufacturing',
            'icon' => 'fa-industry',
            'hero_highlight' => 'Industry 4.0',
            'subtitle' => 'Smart manufacturing solutions for the modern factory.',
            'hero_image' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?q=80&w=1600&auto=format&fit=crop',
            'about_image' => 'https://images.unsplash.com/photo-1537462715116-402bbd4c3862?q=80&w=800&auto=format&fit=crop',
            'trust_points' => ['IoT', 'Automation', 'Supply Chain', 'Analytics'],
            'about_text' => 'Optimizing production with digital intelligence. We build software that connects machines, data, and people to drive efficiency.',
            'features' => [
                ['title' => 'Smart Factory IoT', 'desc' => 'Connect machines for real-time monitoring.', 'icon' => 'fa-network-wired'],
                ['title' => 'Production Planning', 'desc' => 'Software to schedule and track manufacturing.', 'icon' => 'fa-tasks'],
                ['title' => 'Inventory Control', 'desc' => 'Precise tracking of raw materials and goods.', 'icon' => 'fa-boxes'],
                ['title' => 'Quality Management', 'desc' => 'Automated QA processes and reporting.', 'icon' => 'fa-check-double']
            ],
            'tech_stack' => ['Python', 'IoT', 'AWS Greengrass', 'TensorFlow', 'React'],
            'process' => ['Audit', 'IoT Sensory', 'Data Pipeline', 'Dashboard', 'Optimization'],
            'benefits' => ['Reduced Downtime', 'Higher Quality', 'Cost Savings', 'Safety'],
            'faq' => [
                ['q' => 'Can you connect legacy machines?', 'a' => 'Yes, we use retrofitting sensors for older equipment.'],
                ['q' => 'Do you offer predictive maintenance?', 'a' => 'Yes, AI models to predict failures before they happen.']
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
        // Comprehensive Slug Mapping for all URL variations (URL Slug -> Internal Key)
        $slugMapping = [
            // Transportation & Logistics variations
            'transportation-and-logistics' => 'logistics',
            'transportation-logistics' => 'logistics',

            // Utilities & On-Demand variations
            'utilities-and-on-demand' => 'on-demand',
            'utilities-on-demand' => 'on-demand',

            // Finance variations
            'finance-and-insurance' => 'finance',
            'finance-insurance' => 'finance',

            // Media & Entertainment variations
            'media-and-entertainment' => 'entertainment',
            'media-entertainment' => 'entertainment',

            // E-commerce variations
            'e-commerce-multi-vendor' => 'e-commerce',
            'ecommerce' => 'e-commerce',

            // Real Estate variations
            'real-estate-construction' => 'real-estate',
            'realestate' => 'real-estate',

            // Travel variations
            'travel-hospitality' => 'travel',
            'travel-and-hospitality' => 'travel',

            // Healthcare variations
            'medical-healthcare' => 'healthcare',
            'medical-and-healthcare' => 'healthcare',

            // Education variations
            'edtech-e-learning' => 'education',
            'edtech-elearning' => 'education',
            'e-learning' => 'education',

            // Manufacturing (direct)
            'manufacturing' => 'manufacturing',

            // Startup variations
            'startup' => 'start-up',

            // Retail variations
            'retail' => 'retail',

            // Wearable variations
            'wearable' => 'wearable',

            // Automotive variations
            'automotive' => 'automotive',

            // Electric Vehicle variations
            'electric-vehicle' => 'electric-vehicle',
            'ev' => 'electric-vehicle',

            // Game variations
            'game' => 'game',
            'gaming' => 'game'
        ];

        // Apply slug mapping if exists
        if (array_key_exists($slug, $slugMapping)) {
            $slug = $slugMapping[$slug];
        }

        // 1. Direct Match
        if (array_key_exists($slug, $this->industries)) {
            $service = (object) $this->industries[$slug];
        } else {
            // 2. Fuzzy matching by normalizing both slug and keys
            // Removes hyphens, spaces, 'and', '&' for comparison
            $foundKey = null;
            $normalizedSlug = str_replace(['-', ' ', 'and', '&'], '', strtolower($slug));

            foreach ($this->industries as $key => $data) {
                $normalizedKey = str_replace(['-', ' ', 'and', '&'], '', strtolower($key));

                if ($normalizedKey === $normalizedSlug) {
                    $foundKey = $key;
                    break;
                }
            }

            if ($foundKey) {
                $service = (object) $this->industries[$foundKey];
            } else {
                // Log the failed slug for debugging
                \Log::warning("Industry not found for slug: {$slug}");
                abort(404);
            }
        }

        $service->features = json_decode(json_encode($service->features));
        $service->faq = json_decode(json_encode($service->faq ?? []));

        return view('service_detail', compact('service'));
    }
}


