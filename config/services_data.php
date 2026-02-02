<?php

return [
    // --- WEBSITE DEVELOPMENT ---
    'business-website' => [
        'title' => 'Business Website',
        'subtitle' => 'Professional, high-converting corporate websites tailored to your brand identity.',
        'hero_highlight' => 'Corporate Identity',
        'hero_image' => 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?q=80&w=1600&auto=format&fit=crop',
        'about_image' => 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?q=80&w=800&auto=format&fit=crop',
        'trust_points' => ['SEO Optimized', 'Mobile Responsive', 'Fast Loading', 'Secure'],
        'about_text' => 'Your website is your digital storefront. We build professional, trustworthy business websites that communicate your value proposition clearly and drive visitor engagement.',
        'features' => [
            ['title' => 'Responsive Design', 'desc' => 'Looks perfect on desktops, tablets, and mobile devices.', 'icon' => 'fa-mobile-alt'],
            ['title' => 'SEO Foundation', 'desc' => 'Built with clean code and structure for better search rankings.', 'icon' => 'fa-search'],
            ['title' => 'Fast Performance', 'desc' => 'Optimized for speed to reduce bounce rates.', 'icon' => 'fa-tachometer-alt'],
            ['title' => 'CMS Integration', 'desc' => 'Easy-to-manage content via WordPress or custom admin panels.', 'icon' => 'fa-edit'],
            ['title' => 'Lead Generation', 'desc' => 'Strategic call-to-action placement to capture inquiries.', 'icon' => 'fa-bullhorn'],
            ['title' => 'Security', 'desc' => 'SSL installation and basic firewall protection included.', 'icon' => 'fa-shield-alt']
        ],
        'tech_stack' => ['HTML5', 'CSS3', 'JavaScript', 'PHP', 'WordPress'],
        'process' => ['Discovery', 'Design', 'Development', 'Content', 'Launch'],
        'use_cases' => ['Corporate Profiles', 'Service Providers', 'Consultancy Firms', 'Local Businesses'],
        'case_studies' => [
            ['title' => 'TechCorp Global', 'desc' => 'Redesigned corporate portal resulting in 40% more leads.', 'metric_value' => '+40%', 'metric_name' => 'Lead Gen'],
            ['title' => 'Law Firm Partners', 'desc' => 'Professional site enabling online client intake.', 'metric_value' => '2x', 'metric_name' => 'Client Inquiries']
        ],
        'plans' => [
            ['name' => 'Starter', 'price' => '₹24,999', 'desc' => 'Perfect for small businesses.', 'features' => ['5 Pages', 'Contact Form', 'Mobile Ready', 'Basic SEO'], 'popular' => false],
            ['name' => 'Professional', 'price' => '₹49,999', 'desc' => 'For growing companies.', 'features' => ['10+ Pages', 'CMS Integration', 'Blog Setup', 'Advanced SEO', 'Speed Optimization'], 'popular' => true],
            ['name' => 'Enterprise', 'price' => 'Custom', 'desc' => 'Full-scale digital presence.', 'features' => ['Unlimited Pages', 'Custom Functionality', 'Priority Support', 'Dedicated Manager'], 'popular' => false]
        ],
        'faq' => [
            ['q' => 'How long does it take?', 'a' => 'Typically 2-4 weeks depending on the complexity.'],
            ['q' => 'Can I update the content myself?', 'a' => 'Yes, we provide an easy-to-use CMS implementation.']
        ]
    ],
    'custom-web-development' => [
        'title' => 'Custom Web Development',
        'subtitle' => 'Bespoke web solutions architected for your specific business logic and workflows.',
        'hero_highlight' => 'Tailored Engineering',
        'hero_image' => 'https://images.unsplash.com/photo-1555099962-4199c345e5dd?q=80&w=1600&auto=format&fit=crop',
        'about_image' => 'https://images.unsplash.com/photo-1504639725590-34d0984388bd?q=80&w=800&auto=format&fit=crop',
        'trust_points' => ['Scalable', 'Secure', 'API Integration', 'Cloud Native'],
        'about_text' => 'When off-the-shelf software isn\'t enough, we build custom web applications that solve unique challenges, streamline operations, and give you a competitive edge.',
        'features' => [
            ['title' => 'Complex Logic', 'desc' => 'Translating intricate business rules into code.', 'icon' => 'fa-cogs'],
            ['title' => 'Database Design', 'desc' => 'Efficient schema design for high-volume data.', 'icon' => 'fa-database'],
            ['title' => 'API Development', 'desc' => 'RESTful and GraphQL APIs for third-party connectivity.', 'icon' => 'fa-network-wired'],
            ['title' => 'Real-time Data', 'desc' => 'Live updates using WebSockets/Pusher.', 'icon' => 'fa-bolt'],
            ['title' => 'Cloud Hosting', 'desc' => 'Scalable deployment on AWS/Azure/GCP.', 'icon' => 'fa-cloud'],
            ['title' => 'Testing', 'desc' => 'Rigorous unit and integration testing.', 'icon' => 'fa-vial']
        ],
        'tech_stack' => ['Laravel', 'React', 'Vue.js', 'Node.js', 'MySQL', 'Redis'],
        'process' => ['Requirements', 'Architecture', 'Sprint Dev', 'QA/Testing', 'Deployment'],
        'use_cases' => ['Internal Portals', 'Booking Systems', 'Data Dashboards', 'SaaS Products'],
        'case_studies' => [
            ['title' => 'LogisticsFlow', 'desc' => 'Automated dispatch system reducing manual work.', 'metric_value' => '-60%', 'metric_name' => 'Admin Time'],
            ['title' => 'MediTrack', 'desc' => 'Secure patient management portal.', 'metric_value' => '100%', 'metric_name' => 'HIPAA Compliant']
        ],
        'plans' => [
            ['name' => 'MVP Build', 'price' => '₹1.5L+', 'desc' => 'Validate your idea fast.', 'features' => ['Core Features', 'Basic UI', 'Admin Panel', '1 Month Support'], 'popular' => false],
            ['name' => 'Full Scale', 'price' => '₹5L+', 'desc' => 'Production-grade application.', 'features' => ['Advanced Logic', 'Custom UI/UX', 'API Integrations', 'Scalable Architecture', '3 Months Support'], 'popular' => true],
            ['name' => 'Enterprise', 'price' => 'Custom', 'desc' => 'Large scale systems.', 'features' => ['Microservices', 'SLA Support', 'Audited Security', 'Dedicated Team'], 'popular' => false]
        ],
        'faq' => [
            ['q' => 'Do I own the code?', 'a' => 'Yes, you receive full intellectual property rights upon completion.'],
            ['q' => 'What tech stack do you use?', 'a' => 'We prefer Laravel + Vue for PHP stacks, or MERN for JS stacks, but we adapt to your needs.']
        ]
    ],
    'wordpress-development' => [
        'title' => 'WordPress Development',
        'subtitle' => 'Scalable, secure, and custom WordPress solutions for modern publishers and businesses.',
        'hero_highlight' => 'CMS Powerhouse',
        'hero_image' => 'https://images.unsplash.com/photo-1616469829581-73993eb86b02?q=80&w=1600&auto=format&fit=crop',
        'about_image' => 'https://images.unsplash.com/photo-1499951360447-b19be8fe80f5?q=80&w=800&auto=format&fit=crop',
        'trust_points' => ['Custom Themes', 'Plugin Dev', 'Performance-Tuned', 'Secure'],
        'about_text' => 'We go beyond basic templates. We engineer custom WordPress themes and plugins that provide uniqueness, speed, and security, giving you the flexibility of the world\'s most popular CMS without the bloat.',
        'tech_stack' => ['WordPress', 'PHP', 'MySQL', 'React (Gutenberg)', 'WooCommerce'],
        'features' => [
            ['title' => 'Custom Themes', 'desc' => 'Hand-coded themes matching your design exactly.', 'icon' => 'fa-palette'],
            ['title' => 'Plugin Development', 'desc' => 'Custom functionality when existing plugins fall short.', 'icon' => 'fa-plug'],
            ['title' => 'Speed Optimization', 'desc' => 'Caching and asset optimization for <1s load times.', 'icon' => 'fa-tachometer-alt'],
            ['title' => 'Headless WP', 'desc' => 'Using WordPress as an API for React/Vue frontends.', 'icon' => 'fa-code-branch'],
            ['title' => 'Migration', 'desc' => 'Safe transfer from other platforms to WordPress.', 'icon' => 'fa-exchange-alt'],
            ['title' => 'Security Hardening', 'desc' => 'Protecting against common WP vulnerabilities.', 'icon' => 'fa-lock']
        ],
        'process' => ['Audit', 'Theme Dev', 'Plugin Dev', 'Optimization', 'Launch'],
        'use_cases' => ['High-Traffic Blogs', 'Corporate Sites', 'Membership Sites', 'News Portals'],
        'case_studies' => [
            ['title' => 'NewsDaily', 'desc' => 'High-traffic news portal handling 1M+ views.', 'metric_value' => '0.8s', 'metric_name' => 'Load Time'],
            ['title' => 'EduLearn', 'desc' => 'Membership site with custom LMS features.', 'metric_value' => '5k+', 'metric_name' => 'Active Members']
        ],
        'plans' => [
            ['name' => 'Standard', 'price' => '₹39,999', 'desc' => 'Custom theme implementation.', 'features' => ['Custom Design', 'Essential Plugins', 'Speed Setup', 'Security Pack'], 'popular' => false],
            ['name' => 'Advanced', 'price' => '₹89,999', 'desc' => 'Custom functionality & scale.', 'features' => ['Custom Plugins', 'Adv. Custom Fields', 'Membership Features', 'API Integration', 'SEO Audits'], 'popular' => true],
            ['name' => 'Retainer', 'price' => '₹15,000/mo', 'desc' => 'Ongoing care.', 'features' => ['Updates', 'Backups', 'Uptime Monitor', 'Content Edits'], 'popular' => false]
        ],
        'faq' => [
            ['q' => 'Is WordPress secure?', 'a' => 'Yes, when properly maintained and hardened, which is part of our standard process.'],
            ['q' => 'Can you fix my hacked site?', 'a' => 'Yes, we offer emergency malware removal and recovery services.']
        ]
    ],
    'website-redesign' => [
        'title' => 'Website Redesign',
        'subtitle' => 'Modernize your digital presence with a design overhaul that improves aesthetics and performance.',
        'hero_highlight' => 'Revitalize',
        'hero_image' => 'https://images.unsplash.com/photo-1542744094-3a31f272c490?q=80&w=1600&auto=format&fit=crop',
        'about_image' => 'https://images.unsplash.com/photo-1531403009284-440f080d1e12?q=80&w=800&auto=format&fit=crop',
        'trust_points' => ['Modern UI', 'Better UX', 'SEO Retention', 'Mobile First'],
        'about_text' => 'Outdated websites cost you business. We transform legacy sites into modern, high-performance assets that reflect your current brand excellence and convert visitors.',
        'features' => [
            ['title' => 'Visual Modernization', 'desc' => 'Updating layouts to current design trends.', 'icon' => 'fa-paint-roller'],
            ['title' => 'UX Improvement', 'desc' => 'Fixing navigation and user flow issues.', 'icon' => 'fa-users'],
            ['title' => 'Mobile Optimization', 'desc' => 'Ensuring flawless usage on smartphones.', 'icon' => 'fa-mobile'],
            ['title' => 'SEO Preservation', 'desc' => '301 redirects and structure to keep rankings.', 'icon' => 'fa-map-signs'],
            ['title' => 'Speed Boost', 'desc' => 'Replacing bloated code with lean modern tech.', 'icon' => 'fa-rocket'],
            ['title' => 'Content Strategy', 'desc' => 'Reorganizing content for better clarity.', 'icon' => 'fa-paragraph']
        ],
        'tech_stack' => ['Figma', 'HTML5', 'CSS3', 'WordPress', 'React'],
        'process' => ['Audit', 'Design Concept', 'Migration', 'Testing', 'Launch'],
        'use_cases' => ['Legacy Corporate Sites', 'Low-Converting Pages', 'Rebranding', 'Merger Updates'],
        'case_studies' => [
            ['title' => 'ConsultFirm', 'desc' => 'Modernized 10-year old site.', 'metric_value' => '3x', 'metric_name' => 'Lead Volume'],
            ['title' => 'RetailBrand', 'desc' => 'Mobile-first redesign.', 'metric_value' => '-40%', 'metric_name' => 'Bounce Rate']
        ],
        'plans' => [
            ['name' => 'Refresh', 'price' => '₹35,000', 'desc' => 'Visual facelift.', 'features' => ['New UI Design', 'CSS Update', 'Mobile Fixes', 'Speed Check'], 'popular' => false],
            ['name' => 'Rebuild', 'price' => '₹75,000+', 'desc' => 'Complete overhaul.', 'features' => ['New Architecture', 'CMS Migration', 'New Content', 'Interactive Elements'], 'popular' => true],
            ['name' => 'Strategic', 'price' => 'Custom', 'desc' => 'Data-driven redesign.', 'features' => ['User Testing', 'A/B Testing', 'Conversion Strategy', 'Full Rebrand'], 'popular' => false]
        ],
        'faq' => [
            ['q' => 'Will I lose my SEO rankings?', 'a' => 'No, we implementing strict SEO migration protocols to preserve and improve rankings.'],
            ['q' => 'Can you keep my existing content?', 'a' => 'Yes, we will migrate all relevant content to the new design.']
        ]
    ],
    // --- ECOMMERCE SOLUTIONS ---
    'ecommerce-website' => [
        'title' => 'Ecommerce Website',
        'subtitle' => 'Revenue-generating online stores designed for conversion and scalability.',
        'hero_highlight' => 'Digital Retail',
        'hero_image' => 'https://images.unsplash.com/photo-1556742049-0cfed4f7a07d?q=80&w=1600&auto=format&fit=crop',
        'about_image' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=800&auto=format&fit=crop',
        'trust_points' => ['Conversion UX', 'Secure Payments', 'Inventory Sync', 'Mobile First'],
        'about_text' => 'We build robust ecommerce platforms that look stunning and perform flawlessly. From product catalogs to checkout optimization, every element is engineered to maximize sales.',
        'tech_stack' => ['Magento', 'Shopify', 'WooCommerce', 'BigCommerce', 'Stripe'],
        'features' => [
            ['title' => 'Custom Storefront', 'desc' => 'Unique brand shopping experiences.', 'icon' => 'fa-store'],
            ['title' => 'Cart Optimization', 'desc' => 'Reducing abandonment with streamlined checkout.', 'icon' => 'fa-shopping-cart'],
            ['title' => 'Product Filtering', 'desc' => 'Advanced search and filter for large catalogs.', 'icon' => 'fa-filter'],
            ['title' => 'Payment Integration', 'desc' => 'Secure gateways (Stripe, PayPal, Razorpay).', 'icon' => 'fa-credit-card'],
            ['title' => 'Inventory Mgmt', 'desc' => 'Sync with ERP/POS systems.', 'icon' => 'fa-boxes'],
            ['title' => 'Marketing Tools', 'desc' => 'Coupons, abandoned cart emails, and analytics.', 'icon' => 'fa-bullhorn']
        ],
        'process' => ['Strategy', 'UX Design', 'Platform Dev', 'Integration', 'Launch'],
        'use_cases' => ['D2C Brands', 'Multi-Vendor Marketplaces', 'B2B Portals', 'Subscription Boxes'],
        'case_studies' => [
            ['title' => 'DirectToConsumer', 'desc' => 'From zero to $50k/month in 6 months.', 'metric_value' => '$50k', 'metric_name' => 'Monthly Revenue'],
            ['title' => 'BoutiqueStore', 'desc' => 'Migration from Etsy to own site.', 'metric_value' => '+100%', 'metric_name' => 'Profit Margin']
        ],
        'plans' => [
            ['name' => 'Store Launch', 'price' => '$2,500', 'desc' => 'Get selling quickly.', 'features' => ['Shopify/Woo setup', '50 Products', 'Payment Setup', 'Basic Design'], 'popular' => false],
            ['name' => 'Brand Scale', 'price' => '$5,000+', 'desc' => 'Custom brand experience.', 'features' => ['Custom Theme', 'product Migration', 'Email Automation', 'Adv. Analytics', 'Speed Opt.'], 'popular' => true],
            ['name' => 'Enterprise', 'price' => 'Custom', 'desc' => 'High volume solutions.', 'features' => ['Headless Commerce', 'ERP Integration', 'Multi-Region', 'Dedicated Support'], 'popular' => false]
        ],
        'faq' => [
            ['q' => 'Which platform is best?', 'a' => 'Shopify is best for ease of use, WooCommerce for ownership and flexibility.'],
            ['q' => 'Do you take a commission?', 'a' => 'No, we charge flat development fees. Transaction fees depend on the payment gateway.']
        ]
    ],
    'shopify-development' => [
        'title' => 'Shopify Development',
        'subtitle' => 'Expert Shopify design and development for brands that demand excellence.',
        'hero_highlight' => 'Shopify Experts',
        'hero_image' => 'https://images.unsplash.com/photo-1563986768609-322da13575f3?q=80&w=1600&auto=format&fit=crop',
        'about_image' => 'https://images.unsplash.com/photo-1556740738-b6a63e27c4df?q=80&w=800&auto=format&fit=crop',
        'trust_points' => ['Official Partners', 'Custom Themes', 'App Development', 'Migration'],
        'about_text' => 'As Shopify experts, we unlock the full potential of the platform. From custom themes to complex app integrations, we build high-converting stores on the world\'s leading ecommerce platform.',
        'features' => [
            ['title' => 'Custom Themes', 'desc' => 'Unique Liquid designs that stand out.', 'icon' => 'fa-palette'],
            ['title' => 'App Integration', 'desc' => 'Seamless setup of reviews, loyalty, and subscriptions.', 'icon' => 'fa-plug'],
            ['title' => 'Store 2.0', 'desc' => 'Utilizing the latest Shopify 2.0 architecture.', 'icon' => 'fa-code'],
            ['title' => 'Migration', 'desc' => 'Moving from Wix/WooCommerce to Shopify.', 'icon' => 'fa-exchange-alt'],
            ['title' => 'Speed Optimization', 'desc' => 'Improving Core Web Vitals for better ranking.', 'icon' => 'fa-tachometer-alt'],
            ['title' => 'CRO', 'desc' => 'Audits to improve conversion rates.', 'icon' => 'fa-search-dollar']
        ],
        'tech_stack' => ['Shopify Liquid', 'Hydrogen', 'React', 'GraphQL', 'Tailwind'],
        'process' => ['Audit', 'Design', 'Development', 'App Setup', 'Launch'],
        'use_cases' => ['DTC Brands', 'FMCG', 'Fashion Retail', 'Dropshipping'],
        'case_studies' => [
            ['title' => 'BeautyBrand', 'desc' => 'Custom theme for beauty retailer.', 'metric_value' => '+35%', 'metric_name' => 'Conversion Rate'],
            ['title' => 'TechReseller', 'desc' => 'Complex migration with 5000+ SKUs.', 'metric_value' => '0', 'metric_name' => 'Downtime']
        ],
        'plans' => [
            ['name' => 'Theme Setup', 'price' => '$1,500', 'desc' => 'Professional configuration.', 'features' => ['Theme Customize', 'Apps Setup', 'Payment Config', 'Training'], 'popular' => false],
            ['name' => 'Custom Build', 'price' => '$5,000+', 'desc' => 'Unique brand design.', 'features' => ['Custom Liquid Dev', 'Unique UI/UX', 'Adv. Functionality', 'SEO Optimization'], 'popular' => true],
            ['name' => 'Plus Scale', 'price' => 'Custom', 'desc' => 'Shopify Plus.', 'features' => ['B2B Features', 'Checkout Scripts', 'International Markets', 'Dedicated Manager'], 'popular' => false]
        ],
        'faq' => [
            ['q' => 'Why Shopify?', 'a' => 'It is the most reliable, hosted solution, meaning you don\'t worry about servers or security.'],
            ['q' => 'Can I edit the site myself?', 'a' => 'Yes, Shopify\'s editor is extremely user-friendly.']
        ]
    ],

    // --- APP DEVELOPMENT ---
    'android-app-development' => [
        'title' => 'Android App Development',
        'subtitle' => 'Native Android applications built for performance, stability, and broad reach.',
        'hero_highlight' => 'Google Play',
        'hero_image' => 'https://images.unsplash.com/photo-1607252650355-f7fd0460ccdb?q=80&w=1600&auto=format&fit=crop',
        'about_image' => 'https://images.unsplash.com/photo-1551650992-ee4fd47df41f?q=80&w=800&auto=format&fit=crop',
        'trust_points' => ['Kotlin', 'Java', 'Material Design', 'Play Store'],
        'about_text' => 'Capture the massive Android market with a native application. We build robust, high-performance apps that adhere to Material Design guidelines and work seamlessly across thousands of device types.',
        'features' => [
            ['title' => 'Native Kotlin', 'desc' => 'Using modern language for safety and speed.', 'icon' => 'fa-code'],
            ['title' => 'Material Design', 'desc' => 'Intuitive Google-standard interfaces.', 'icon' => 'fa-layer-group'],
            ['title' => 'Device Compatibility', 'desc' => 'Testing across varying screen sizes.', 'icon' => 'fa-mobile-alt'],
            ['title' => 'Offline Mode', 'desc' => 'Local database sync for offline usage.', 'icon' => 'fa-wifi'],
            ['title' => 'Push Notifications', 'desc' => 'Firebase integration for engagement.', 'icon' => 'fa-bell'],
            ['title' => 'Hardware Access', 'desc' => 'Camera, GPS, and Bluetooth integration.', 'icon' => 'fa-microchip']
        ],
        'tech_stack' => ['Kotlin', 'Java', 'Android Studio', 'Firebase', 'Jetpack Compose'],
        'process' => ['Concept', 'Wireframe', 'Dev', 'Test Lab', 'Publish'],
        'use_cases' => ['Consumer Apps', 'Field Service Tools', 'Logistics Tracking', 'IoT Controllers'],
        'case_studies' => [
            ['title' => 'DeliveryTrack', 'desc' => 'Real-time GPS tracking for logistics.', 'metric_value' => '99%', 'metric_name' => 'Uptime'],
            ['title' => 'FitnessPro', 'desc' => 'Workout tracker with wearable integration.', 'metric_value' => '50k+', 'metric_name' => 'Downloads']
        ],
        'plans' => [
            ['name' => 'MVP App', 'price' => '$6,000+', 'desc' => 'Core features to launch.', 'features' => ['Core UI/UX', 'API Integration', 'Play Store Submission', '2 Months Support'], 'popular' => false],
            ['name' => 'Pro App', 'price' => '$12,000+', 'desc' => 'Full-featured product.', 'features' => ['Adv. Animations', 'Offline Mode', 'Social Login', 'Analytics', 'Adv. Admin Panel'], 'popular' => true],
            ['name' => 'Enterprise', 'price' => 'Custom', 'desc' => 'Complex ecosystem.', 'features' => ['Custom Security', 'Legacy Integration', 'Global Scale', 'SLA'], 'popular' => false]
        ],
        'faq' => [
            ['q' => 'Do you support tablets?', 'a' => 'Yes, we optimize layouts for both phones and tablets.'],
            ['q' => 'How do updates work?', 'a' => 'We offer maintenance packages to handle regular updates and OS compatibility.']
        ]
    ],
    'ios-app-development' => [
        'title' => 'iOS App Development',
        'subtitle' => 'Premium Swift applications for the Apple ecosystem, delivering flawless user experiences.',
        'hero_highlight' => 'Apple Ecosystem',
        'hero_image' => 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?q=80&w=1600&auto=format&fit=crop',
        'about_image' => 'https://images.unsplash.com/photo-1555774698-0b77e0d5fac6?q=80&w=800&auto=format&fit=crop',
        'trust_points' => ['Swift', 'SwiftUI', 'App Store', 'High Security'],
        'about_text' => 'iOS users expect perfection. We craft stunning, high-performance iPhone and iPad apps using native Swift technologies that leverage the full power of Apple hardware.',
        'features' => [
            ['title' => 'Native Swift', 'desc' => 'Optimized code for maximum performance.', 'icon' => 'fa-bolt'],
            ['title' => 'Human Interface', 'desc' => 'Following Apple\'s strict design guidelines.', 'icon' => 'fa-crop-alt'],
            ['title' => 'Secure Enclave', 'desc' => 'Biometric security (FaceID/TouchID).', 'icon' => 'fa-fingerprint'],
            ['title' => 'iCloud Sync', 'desc' => 'Seamless data across Apple devices.', 'icon' => 'fa-cloud'],
            ['title' => 'AR Kit', 'desc' => 'Augmented reality experiences.', 'icon' => 'fa-vr-cardboard'],
            ['title' => 'App Store Approval', 'desc' => 'Expert guidance through review process.', 'icon' => 'fa-check-double']
        ],
        'tech_stack' => ['Swift', 'SwiftUI', 'Xcode', 'CoreData', 'TestFlight'],
        'process' => ['Design', 'Prototype', 'Development', 'Beta', 'Launch'],
        'use_cases' => ['Fintech Apps', 'Premium Social', 'Health & Medical', 'Creative Tools'],
        'case_studies' => [
            ['title' => 'FinWallet', 'desc' => 'Secure crypto wallet for iOS.', 'metric_value' => '4.8', 'metric_name' => 'App Rating'],
            ['title' => 'SocialConnect', 'desc' => 'Exclusive networking app.', 'metric_value' => '10k', 'metric_name' => 'Daily Users']
        ],
        'plans' => [
            ['name' => 'MVP iOS', 'price' => '$7,000+', 'desc' => 'Market entry.', 'features' => ['Core Features', 'Standard UI', 'App Store Submit', 'Bug Fixes'], 'popular' => false],
            ['name' => 'Premium iOS', 'price' => '$15,000+', 'desc' => 'Polished experience.', 'features' => ['Custom Animations', 'Local Storage', 'Push Notif', 'Dashboard', 'Adv. Analytics'], 'popular' => true],
            ['name' => 'Flagship', 'price' => 'Custom', 'desc' => 'Industry leader.', 'features' => ['AR/ML Integration', 'Custom Encryption', 'Global CDNs', 'Dedicated Team'], 'popular' => false]
        ],
        'faq' => [
            ['q' => 'Will it work on iPad?', 'a' => 'Yes, we can build universal apps that adapt to both iPhone and iPad.'],
            ['q' => 'How long is the review process?', 'a' => 'Typically Apple takes 24-48 hours to review apps, but we prepare everything to ensure smooth approval.']
        ]
    ],

    // --- DIGITAL MARKETING ---
    'seo-services' => [
        'title' => 'SEO Services',
        'subtitle' => 'Data-driven search engine optimization to maximize visibility and revenue.',
        'hero_highlight' => 'Rank Higher',
        'hero_image' => 'https://images.unsplash.com/photo-1571786256017-aee7a0c009b6?q=80&w=1600&auto=format&fit=crop',
        'about_image' => 'https://images.unsplash.com/photo-1432888498266-38ffec3eaf0a?q=80&w=800&auto=format&fit=crop',
        'trust_points' => ['White Hat', 'Technical Audit', 'Content Marketing', 'Backlinks'],
        'about_text' => 'Visibility is the currency of the web. We use proven, white-hat strategies to improving your rankings, driving qualified organic traffic, and converting visitors into customers.',
        'features' => [
            ['title' => 'Keyword Strategy', 'desc' => 'Targeting high-intent search terms.', 'icon' => 'fa-key'],
            ['title' => 'Technical SEO', 'desc' => 'Optimizing speed, crawlability, and schema.', 'icon' => 'fa-cogs'],
            ['title' => 'On-Page SEO', 'desc' => 'Content and meta tag optimization.', 'icon' => 'fa-file-alt'],
            ['title' => 'Link Building', 'desc' => 'High-authority guest posts and outreach.', 'icon' => 'fa-link'],
            ['title' => 'Local SEO', 'desc' => 'GMB optimization for local dominance.', 'icon' => 'fa-map-marker-alt'],
            ['title' => 'Analytics', 'desc' => 'Detailed reporting on ROI and traffic.', 'icon' => 'fa-chart-line']
        ],
        'tech_stack' => ['Ahrefs', 'SEMrush', 'Google Analytics', 'Search Console', 'Screaming Frog'],
        'process' => ['Audit', 'Strategy', 'On-Page', 'Off-Page', 'Report'],
        'use_cases' => ['Local Services', 'E-commerce Stores', 'SaaS Companies', 'News Publishers'],
        'case_studies' => [
            ['title' => 'LocalPlumber', 'desc' => 'First page for all local keywords.', 'metric_value' => '+300%', 'metric_name' => 'Calls'],
            ['title' => 'NicheStore', 'desc' => 'National ranking for specific products.', 'metric_value' => '+150%', 'metric_name' => 'Organic Traffic']
        ],
        'plans' => [
            ['name' => 'Local Starter', 'price' => '$500/mo', 'desc' => 'For local businesses.', 'features' => ['GMB Opt', '5 Keywords', 'On-Page Fixes', 'Monthly Report'], 'popular' => false],
            ['name' => 'Growth', 'price' => '$1,200/mo', 'desc' => 'National reach.', 'features' => ['20 Keywords', 'Content Creation', 'Link Building', 'Tech Audit', 'Bi-Weekly Report'], 'popular' => true],
            ['name' => 'Dominance', 'price' => '$2,500/mo', 'desc' => 'Aggressive growth.', 'features' => ['Unlimited Keywords', 'PR Outreach', 'Daily Tracking', 'Competitor Attack'], 'popular' => false]
        ],
        'faq' => [
            ['q' => 'How long to see results?', 'a' => 'SEO is a long-term strategy. Significant results typically appear in 3-6 months.'],
            ['q' => 'Is it permanent?', 'a' => 'Rankings can fluctuate, but our solid foundation ensures long-term stability.']
        ]
    ],
    'hybrid-app-development' => [
        'title' => 'Hybrid App Development',
        'subtitle' => 'Cost-effective cross-platform solutions that work everywhere.',
        'hero_highlight' => 'Cross Platform',
        'hero_image' => 'https://images.unsplash.com/photo-1551650975-87deedd944c3?q=80&w=1600&auto=format&fit=crop',
        'about_image' => 'https://images.unsplash.com/photo-1555421689-d68471e189f2?q=80&w=800&auto=format&fit=crop',
        'trust_points' => ['Flutter', 'React Native', 'Single Codebase', 'Faster Launch'],
        'about_text' => 'Get the best of both worlds. We build high-quality hybrid apps using Flutter and React Native that offer native-like performance on both iOS and Android from a single codebase.',
        'features' => [
            ['title' => 'Single Codebase', 'desc' => 'Write once, run on iOS and Android.', 'icon' => 'fa-code-branch'],
            ['title' => 'Flutter/React Native', 'desc' => 'Using industry-leading frameworks.', 'icon' => 'fa-layer-group'],
            ['title' => 'Cost Efficient', 'desc' => 'Reduce development costs by up to 40%.', 'icon' => 'fa-wallet'],
            ['title' => 'Fast Performance', 'desc' => 'Near-native speed (60fps).', 'icon' => 'fa-tachometer-alt'],
            ['title' => 'Easy Maintenance', 'desc' => 'Updates are deployed simultaneously.', 'icon' => 'fa-sync'],
            ['title' => 'Native Features', 'desc' => 'Access to camera, GPS, and sensors.', 'icon' => 'fa-mobile']
        ],
        'tech_stack' => ['Flutter', 'React Native', 'Dart', 'JavaScript', 'Firebase'],
        'process' => ['Strategy', 'UI Design', 'Development', 'Testing', 'Launch'],
        'use_cases' => ['Startups', 'MVP Launches', 'Internal Enterprise Apps', 'E-commerce Apps'],
        'case_studies' => [
            ['title' => 'QuickEat', 'desc' => 'Food delivery app for both platforms.', 'metric_value' => '-40%', 'metric_name' => 'Dev Cost'],
            ['title' => 'EventPass', 'desc' => 'Event ticketing system.', 'metric_value' => '100k+', 'metric_name' => 'Users']
        ],
        'plans' => [
            ['name' => 'Hybrid MVP', 'price' => '$5,000+', 'desc' => 'Both platforms fast.', 'features' => ['Core Features', 'Standard UI', 'Both Stores', '1 Month Support'], 'popular' => true],
            ['name' => 'Custom Hybrid', 'price' => '$10,000+', 'desc' => 'Feature rich.', 'features' => ['Custom Animations', 'Backend API', 'Push Notif', 'Analytics'], 'popular' => false],
            ['name' => 'Enterprise', 'price' => 'Custom', 'desc' => 'Large scale.', 'features' => ['Complex Logic', 'ERP Integration', 'SLA Support', 'Dedicated Team'], 'popular' => false]
        ],
        'faq' => [
            ['q' => 'Is native better than hybrid?', 'a' => 'For 90% of apps, hybrid (Flutter/React Native) provides an indistinguishable experience at a lower cost.'],
            ['q' => 'Can we switch to native later?', 'a' => 'Yes, but usually it is not necessary as hybrid apps scale very well.']
        ]
    ],

    'google-ads' => [
        'title' => 'Google Ads Management',
        'subtitle' => 'Precision-targeted PPC campaigns that deliver instant ROI.',
        'hero_highlight' => 'Instant Traffic',
        'hero_image' => 'https://images.unsplash.com/photo-1533750516457-a7f992034fec?q=80&w=1600&auto=format&fit=crop',
        'about_image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=800&auto=format&fit=crop',
        'trust_points' => ['Certified Partners', 'ROI Focused', 'Data Driven', 'A/B Testing'],
        'about_text' => 'Stop wasting money on clicks that don\'t convert. Our Google Ads experts craft high-performance campaigns that put your offer in front of customers exactly when they are ready to buy.',
        'features' => [
            ['title' => 'Search Ads', 'desc' => 'Capturing intent with text ads.', 'icon' => 'fa-search'],
            ['title' => 'Shopping Ads', 'desc' => 'Showcasing products with images/prices.', 'icon' => 'fa-shopping-bag'],
            ['title' => 'Display Network', 'desc' => 'Visual ads across millions of sites.', 'icon' => 'fa-images'],
            ['title' => 'Remarketing', 'desc' => 'Bringing back visitors who left.', 'icon' => 'fa-history'],
            ['title' => 'Conversion Tracking', 'desc' => 'Measuring every lead and sale.', 'icon' => 'fa-chart-pie'],
            ['title' => 'Quality Score', 'desc' => 'Optimizing ads to lower CPC.', 'icon' => 'fa-sort-numeric-up']
        ],
        'process' => ['Audit', 'Setup', 'Launch', 'Optimize', 'Report'],
        'use_cases' => ['E-commerce', 'Service Businesses', 'Emergency Services', 'SaaS'],
        'case_studies' => [
            ['title' => 'RetailStore', 'desc' => 'Shopping campaign optimization.', 'metric_value' => '400%', 'metric_name' => 'ROAS'],
            ['title' => 'LawFirm', 'desc' => 'High-ticket lead generation.', 'metric_value' => '-50%', 'metric_name' => 'Cost Per Lead']
        ],
        'plans' => [
            ['name' => 'Starter', 'price' => '$400/mo', 'desc' => 'Ad spend <$2k.', 'features' => ['Search Network', 'Basic Tracking', 'Monthly Report', '1 Campaign'], 'popular' => false],
            ['name' => 'Growth', 'price' => '$800/mo', 'desc' => 'Ad spend <$5k.', 'features' => ['Search + Display', 'Remarketing', 'Bi-Weekly Report', 'A/B Testing'], 'popular' => true],
            ['name' => 'Performance', 'price' => '15% of Spend', 'desc' => 'Ad spend >$5k.', 'features' => ['All Networks', 'Adv. Strategies', 'Video Ads', 'Weekly Calls'], 'popular' => false]
        ],
        'faq' => [
            ['q' => 'How much should I spend?', 'a' => 'We recommend starting with at least $1000/mo ad spend to get significant data.'],
            ['q' => 'Does this include ad spend?', 'a' => 'No, our fee is for management. You pay Google directly for the ads.']
        ]
    ],

    'social-media' => [
        'title' => 'Social Media Marketing',
        'subtitle' => 'Building loyal communities and driving brand awareness across all platforms.',
        'hero_highlight' => 'Social Growth',
        'hero_image' => 'https://images.unsplash.com/photo-1611162617474-5b21e879e113?q=80&w=1600&auto=format&fit=crop',
        'about_image' => 'https://images.unsplash.com/photo-1611162616475-46b635cb6868?q=80&w=800&auto=format&fit=crop',
        'trust_points' => ['Instagram', 'LinkedIn', 'Facebook', 'Content Creation'],
        'about_text' => 'Social media is where your customers live. We create engaging content and manage your community to build trust, authority, and brand loyalty.',
        'features' => [
            ['title' => 'Content Strategy', 'desc' => 'Planning what to post and when.', 'icon' => 'fa-calendar-alt'],
            ['title' => 'Creative Design', 'desc' => 'Stunning graphics and reels.', 'icon' => 'fa-pencil-ruler'],
            ['title' => 'Community Mgmt', 'desc' => 'Responding to comments/DMs.', 'icon' => 'fa-comments'],
            ['title' => 'Paid Social Ads', 'desc' => 'Targeted campaigns on FB/Insta/LinkedIn.', 'icon' => 'fa-ad'],
            ['title' => 'Influencer Marketing', 'desc' => 'Partnering with key voices.', 'icon' => 'fa-users'],
            ['title' => 'Analytics', 'desc' => 'Tracking engagement and reach.', 'icon' => 'fa-chart-bar']
        ],
        'process' => ['Strategy', 'Content', 'Scheduling', 'Engagement', 'Reporting'],
        'use_cases' => ['B2C Brands', 'Personal Brands', 'B2B Thought Leadership', 'Local Events'],
        'case_studies' => [
            ['title' => 'LifestyleBrand', 'desc' => 'Instagram growth campaign.', 'metric_value' => '+20k', 'metric_name' => 'Followers'],
            ['title' => 'B2BTech', 'desc' => 'LinkedIn lead generation.', 'metric_value' => '50+', 'metric_name' => 'Qualified Leads']
        ],
        'plans' => [
            ['name' => 'Essential', 'price' => '$600/mo', 'desc' => 'Brand maintenance.', 'features' => ['12 Posts/mo', 'Community Mgmt', 'Basic Design', 'Monthly Report'], 'popular' => false],
            ['name' => 'Growth', 'price' => '$1,200/mo', 'desc' => 'Active growth.', 'features' => ['20 Posts (inc Reels)', 'Ad Management', 'Graphic Design', 'Bi-Weekly Report'], 'popular' => true],
            ['name' => 'Authority', 'price' => '$2,500/mo', 'desc' => 'Market leader.', 'features' => ['Daily Content', 'Video Production', 'Influencer Outreach', '24/7 Response'], 'popular' => false]
        ],
        'faq' => [
            ['q' => 'Do you create the graphics?', 'a' => 'Yes, our design team creates all static and video assets.'],
            ['q' => 'Which platforms do you cover?', 'a' => 'We specialize in Instagram, LinkedIn, Facebook, and Twitter/X.']
        ]
    ],

    // --- BRANDING & DESIGN ---
    'logo-design' => [
        'title' => 'Logo & Brand Identity',
        'subtitle' => 'Crafting memorable visual identities that resonate with your audience.',
        'hero_highlight' => 'Visual Identity',
        'hero_image' => 'https://images.unsplash.com/photo-1626785774573-4b799314348d?q=80&w=1600&auto=format&fit=crop',
        'about_image' => 'https://images.unsplash.com/photo-1561070791-2526d30994b5?q=80&w=800&auto=format&fit=crop',
        'trust_points' => ['Unique Concepts', 'Vector Files', 'Brand Guide', 'Copyright Ownership'],
        'about_text' => 'A logo is the face of your brand. We design unique, timeless logos and comprehensive identity systems that set you apart from the competition.',
        'features' => [
            ['title' => 'Logo Design', 'desc' => 'Custom marks reflecting your values.', 'icon' => 'fa-signature'],
            ['title' => 'Typography', 'desc' => 'Font selection and hierarchy.', 'icon' => 'fa-font'],
            ['title' => 'Color Palette', 'desc' => 'Strategic color psychology.', 'icon' => 'fa-palette'],
            ['title' => 'Brand Guidelines', 'desc' => 'Rules for consistent usage.', 'icon' => 'fa-book'],
            ['title' => 'Stationery', 'desc' => 'Business cards, letterheads, etc.', 'icon' => 'fa-envelope-open'],
            ['title' => 'Social Assets', 'desc' => 'Profile and banner images.', 'icon' => 'fa-hashtag']
        ],
        'tech_stack' => ['Illustrator', 'Photoshop', 'Figma', 'InDesign'],
        'process' => ['Brief', 'Research', 'Concepts', 'Refinement', 'Delivery'],
        'use_cases' => ['Startups', 'Rebranding', 'Product Launch', 'Corporate Identity'],
        'plans' => [
            ['name' => 'Startup Logo', 'price' => '$299', 'desc' => 'Quick launch.', 'features' => ['3 Concepts', '3 Revisions', 'Vector Files', 'Transparent PNG'], 'popular' => false],
            ['name' => 'Brand Identity', 'price' => '$899', 'desc' => 'Full professional look.', 'features' => ['5 Concepts', 'Unlimited Revisions', 'Brand Guidelines', 'Social Kit', 'Stationery'], 'popular' => true],
            ['name' => 'Premium Brand', 'price' => '$2,500', 'desc' => 'Strategic overhaul.', 'features' => ['Naming', 'Strategy Session', 'Full Guidelines', 'Marketing Collateral', 'Iconography'], 'popular' => false]
        ],
        'faq' => [
            ['q' => 'Do I own the copyright?', 'a' => 'Yes, full copyright is transferred to you upon final payment.'],
            ['q' => 'How many revisions?', 'a' => 'Our standard package includes unlimited revisions until you are satisfied.']
        ]
    ],

    'ui-ux-design' => [
        'title' => 'UI/UX Design',
        'subtitle' => 'Designing intuitive, user-centric digital experiences that delight and convert.',
        'hero_highlight' => 'User Experience',
        'hero_image' => 'https://images.unsplash.com/photo-1586717791821-3f44a5638d28?q=80&w=1600&auto=format&fit=crop',
        'about_image' => 'https://images.unsplash.com/photo-1545235617-9465d2a55698?q=80&w=800&auto=format&fit=crop',
        'trust_points' => ['User Research', 'Wireframing', 'Prototyping', 'Figma Experts'],
        'about_text' => 'Great design is about how it works, not just how it looks. We create seamless user journeys and pixel-perfect interfaces that make your product a joy to use.',
        'features' => [
            ['title' => 'User Research', 'desc' => 'Understanding your audience needs.', 'icon' => 'fa-user-friends'],
            ['title' => 'Wireframing', 'desc' => 'Blueprinting the structure.', 'icon' => 'fa-border-none'],
            ['title' => 'Visual Design', 'desc' => 'High-fidelity UI creation.', 'icon' => 'fa-paint-brush'],
            ['title' => 'Prototyping', 'desc' => 'Clickable interactive demos.', 'icon' => 'fa-mouse-pointer'],
            ['title' => 'Design System', 'desc' => 'Reusable component libraries.', 'icon' => 'fa-th-large'],
            ['title' => 'Handover', 'desc' => 'Dev-ready specs.', 'icon' => 'fa-file-code']
        ],
        'tech_stack' => ['Figma', 'Adobe XD', 'Sketch', 'Maze', 'Zeplin'],
        'plans' => [
            ['name' => 'Landing Page', 'price' => '$500', 'desc' => 'One page design.', 'features' => ['Desktop & Mobile', 'Figma Source', '2 Revisions', 'Asset Export'], 'popular' => false],
            ['name' => 'App/Web Design', 'price' => '$2,000+', 'desc' => 'Full project.', 'features' => ['User Flow', 'Wireframes', 'Hi-Fi UI', 'Prototype', 'Design System'], 'popular' => true],
            ['name' => 'Consultancy', 'price' => '$100/hr', 'desc' => 'Expert advice.', 'features' => ['UX Audit', 'Heuristic Analysis', 'Team Training', 'Strategy'], 'popular' => false]
        ],
        'faq' => [
            ['q' => 'Do you do the coding too?', 'a' => 'This service is design-only, but our development team can perfectly implement our designs.'],
            ['q' => 'What tools do you use?', 'a' => 'We primarily use Figma for real-time collaboration and seamless developer handoff.']
        ]
    ],

    'graphic-design' => [
        'title' => 'Graphic Design',
        'subtitle' => 'Compelling visuals for your marketing and communication needs.',
        'hero_highlight' => 'Creative Visuals',
        'hero_image' => 'https://images.unsplash.com/photo-1626785774625-ddcddc3445e9?q=80&w=1600&auto=format&fit=crop',
        'about_image' => 'https://images.unsplash.com/photo-1558655146-d09347e92766?q=80&w=800&auto=format&fit=crop',
        'trust_points' => ['Print', 'Digital', 'Brochures', 'Presentations'],
        'about_text' => 'From brochures to billboards, we create striking graphic materials that communicate your message effectively and maintain brand consistency.',
        'features' => [
            ['title' => 'Marketing Material', 'desc' => 'Flyers, brochures, posters.', 'icon' => 'fa-file-pdf'],
            ['title' => 'Presentations', 'desc' => 'Pitch decks and slide designs.', 'icon' => 'fa-slideshare'],
            ['title' => 'Packaging', 'desc' => 'Product box and label design.', 'icon' => 'fa-box-open'],
            ['title' => 'Infographics', 'desc' => 'Visualizing complex data.', 'icon' => 'fa-chart-pie'],
            ['title' => 'Email Templates', 'desc' => 'Custom newsletter designs.', 'icon' => 'fa-envelope'],
            ['title' => 'Ad Creatives', 'desc' => 'Banners for digital campaigns.', 'icon' => 'fa-ad']
        ],
        'plans' => [
            ['name' => 'Hourly', 'price' => '$50/hr', 'desc' => 'Ad-hoc tasks.', 'features' => ['Fast Turnaround', 'Source Files', 'Print Ready', 'Any Format'], 'popular' => false],
            ['name' => 'Project', 'price' => 'Custom', 'desc' => 'Fixed scope.', 'features' => ['Dedicated Designer', 'Concepts', 'Revisions', 'Full ownership'], 'popular' => true],
            ['name' => 'Monthly', 'price' => '$1,500/mo', 'desc' => 'Unlimited requests.', 'features' => ['Unlimited Tasks', 'Priority Support', 'Dedicated Designer', 'Stock Assets'], 'popular' => false]
        ],
        'faq' => [
            ['q' => 'Do you handle printing?', 'a' => 'We provide print-ready files but do not handle the physical printing process directly.']
        ]
    ],

    // --- SUPPORT & HOSTING ---
    'website-maintenance' => [
        'title' => 'Website Maintenance',
        'subtitle' => 'Keep your website secure, fast, and up-to-date with our professional care plans.',
        'hero_highlight' => 'Peace of Mind',
        'hero_image' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=1600&auto=format&fit=crop',
        'about_image' => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=800&auto=format&fit=crop',
        'trust_points' => ['24/7 Monitoring', 'Security Patches', 'Content Updates', 'Backups'],
        'about_text' => 'A website is a living entity that needs care. We handle the technical details—backups, updates, security—so you can focus on running your business.',
        'features' => [
            ['title' => 'Core Updates', 'desc' => 'WordPress/Plugin/System updates.', 'icon' => 'fa-sync-alt'],
            ['title' => 'Daily Backups', 'desc' => 'Off-site backups for disaster recovery.', 'icon' => 'fa-save'],
            ['title' => 'Security Monitor', 'desc' => 'Malware scanning and firewall.', 'icon' => 'fa-shield-virus'],
            ['title' => 'Uptime Monitor', 'desc' => 'Ensuring your site is always online.', 'icon' => 'fa-heartbeat'],
            ['title' => 'Content Edits', 'desc' => 'Small text/image changes included.', 'icon' => 'fa-edit'],
            ['title' => 'Performance', 'desc' => 'Regular speed optimization.', 'icon' => 'fa-tachometer-alt']
        ],
        'plans' => [
            ['name' => 'Basic', 'price' => '$99/mo', 'desc' => 'Essential security.', 'features' => ['Weekly Updates', 'Daily Backups', 'Security Scan', 'Uptime Monitor'], 'popular' => false],
            ['name' => 'Professional', 'price' => '$199/mo', 'desc' => 'Active management.', 'features' => ['Daily Updates', 'Real-time Security', '1hr Content Edits', 'Speed Opt'], 'popular' => true],
            ['name' => 'Enterprise', 'price' => '$499/mo', 'desc' => 'Mission critical.', 'features' => ['Priority Support', 'Unlimited Edits', 'Dev Environment', 'Consulting'], 'popular' => false]
        ],
        'faq' => [
            ['q' => 'Does this include hosting?', 'a' => 'Hosting is separate, but we can bundle it for a discount.'],
            ['q' => 'Can I cancel anytime?', 'a' => 'Yes, our plans are month-to-month with no long-term contracts.']
        ]
    ],

    'hosting-domain' => [
        'title' => 'Hosting & Domain',
        'subtitle' => 'Fast, secure, and reliable cloud hosting solutions for your business.',
        'hero_highlight' => 'Cloud Power',
        'hero_image' => 'https://images.unsplash.com/photo-1544197150-b99a580bbcbf?q=80&w=1600&auto=format&fit=crop',
        'about_image' => 'https://images.unsplash.com/photo-1558494949-ef2bb6db879c?q=80&w=800&auto=format&fit=crop',
        'trust_points' => ['AWS / DigitalOcean', 'Free SSL', 'Global CDN', '99.99% Uptime'],
        'about_text' => 'Speed affects ranking and revenue. Our premium managed hosting ensures your site loads instantly and stays online, regardless of traffic spikes.',
        'features' => [
            ['title' => 'Cloud Servers', 'desc' => 'Scalable resources on demand.', 'icon' => 'fa-server'],
            ['title' => 'Free SSL', 'desc' => 'Secure padlock for all domains.', 'icon' => 'fa-lock'],
            ['title' => 'CDN', 'desc' => 'Content delivery network for global speed.', 'icon' => 'fa-globe'],
            ['title' => 'Email Hosting', 'desc' => 'Professional @yourdomain emails.', 'icon' => 'fa-envelope'],
            ['title' => 'NVMe Storage', 'desc' => 'Fastest disk drives available.', 'icon' => 'fa-hdd'],
            ['title' => '24/7 Support', 'desc' => 'Technical experts ready to help.', 'icon' => 'fa-headset']
        ],
        'plans' => [
            ['name' => 'Shared', 'price' => '$10/mo', 'desc' => 'For small sites.', 'features' => ['1 Website', '10GB Storage', 'Free SSL', 'Email Accounts'], 'popular' => false],
            ['name' => 'Cloud VPS', 'price' => '$40/mo', 'desc' => 'High performance.', 'features' => ['Dedicated CPU', '4GB RAM', 'NVMe Storage', 'Managed Support'], 'popular' => true],
            ['name' => 'Dedicated', 'price' => '$150/mo', 'desc' => 'Maximum power.', 'features' => ['Full Server', 'Root Access', 'Premium Hardware', 'Priority Support'], 'popular' => false]
        ],
        'faq' => [
            ['q' => 'Do you help migrate?', 'a' => 'Yes, we provide free migration from your current host.'],
            ['q' => 'Are backups included?', 'a' => 'Yes, we take daily off-site automated backups.']
        ]
    ],

    'website-security' => [
        'title' => 'Website Security',
        'subtitle' => 'Protect your digital assets with enterprise-grade security protocols.',
        'hero_highlight' => 'Cyber Defense',
        'hero_image' => 'https://images.unsplash.com/photo-1563986768609-322da13575f3?q=80&w=1600&auto=format&fit=crop',
        'about_image' => 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?q=80&w=800&auto=format&fit=crop',
        'trust_points' => ['Firewall (WAF)', 'Malware Removal', 'DDoS Protection', 'Audit'],
        'about_text' => 'Security is not optional. We implement multi-layered defense strategies to protect your website, customer data, and reputation from cyber threats.',
        'features' => [
            ['title' => 'WAF', 'desc' => 'Web Application Firewall filtering.', 'icon' => 'fa-shield-alt'],
            ['title' => 'Malware Scan', 'desc' => 'Daily automated file scanning.', 'icon' => 'fa-search'],
            ['title' => 'DDoS Shield', 'desc' => 'Protection against volumetric attacks.', 'icon' => 'fa-network-wired'],
            ['title' => 'Vulnerability Audit', 'desc' => 'Identifying weak points.', 'icon' => 'fa-clipboard-check'],
            ['title' => 'SSL Config', 'desc' => 'Proper HTTPS implementation.', 'icon' => 'fa-lock'],
            ['title' => 'Hack Recovery', 'desc' => 'Emergency cleanup services.', 'icon' => 'fa-broom']
        ],
        'plans' => [
            ['name' => 'Audit', 'price' => '$299', 'desc' => 'One-time check.', 'features' => ['Full Scan', 'Vulnerability Report', 'Fix Recommendations', 'Consultation'], 'popular' => false],
            ['name' => 'Protection', 'price' => '$49/mo', 'desc' => 'Ongoing defense.', 'features' => ['WAF Setup', 'Daily Scans', 'Malware Cleanup', 'DDoS Protection'], 'popular' => true],
            ['name' => 'Enterprise', 'price' => 'Custom', 'desc' => 'Corporate security.', 'features' => ['Penetration Testing', 'Compliance (GDPR/HIPAA)', 'Training', 'SLA'], 'popular' => false]
        ],
        'faq' => [
            ['q' => 'My site is already hacked!', 'a' => 'Contact us immediately. We offer emergency cleanup services to restoring your site.'],
            ['q' => 'Do I really need this?', 'a' => 'Attacks are automated and target everyone. Prevention is much cheaper than recovery.']
        ]
    ],
    // --- MISSING KEYS ---
    'woocommerce' => [
        'title' => 'WooCommerce Store',
        'subtitle' => 'Flexible, open-source ecommerce stores built on WordPress.',
        'hero_highlight' => 'Open Commerce',
        'hero_image' => 'https://images.unsplash.com/photo-1556740758-90de2929e701?q=80&w=1600&auto=format&fit=crop',
        'about_image' => 'https://images.unsplash.com/photo-1556742044-3c52d6e88c62?q=80&w=800&auto=format&fit=crop',
        'trust_points' => ['No Licensing Fees', 'Full Ownership', 'Customizable', 'SEO Friendly'],
        'about_text' => 'WooCommerce powers over 30% of all online stores. It offers unparalleled flexibility and ownership, allowing us to build a store that matches your exact business model without platform limitations.',
        'features' => [
            ['title' => 'Custom Layouts', 'desc' => 'Unique designs not limited by themes.', 'icon' => 'fa-drafting-compass'],
            ['title' => 'Subscription', 'desc' => 'Selling recurring products/services.', 'icon' => 'fa-sync'],
            ['title' => 'Booking', 'desc' => 'Appointment and reservation systems.', 'icon' => 'fa-calendar-check'],
            ['title' => 'Payment Flexibility', 'desc' => 'Integrating any payment provider.', 'icon' => 'fa-credit-card'],
            ['title' => 'Shipping Rules', 'desc' => 'Complex logic for global logistics.', 'icon' => 'fa-truck'],
            ['title' => 'ERP connects', 'desc' => 'Syncing with external inventory tools.', 'icon' => 'fa-database']
        ],
        'plans' => [
            ['name' => 'Store Setup', 'price' => '$1,500', 'desc' => 'Turnkey solution.', 'features' => ['Woo Installation', 'Theme Setup', 'Payment/Ship Config', '10 Products'], 'popular' => false],
            ['name' => 'Custom Store', 'price' => '$3,500', 'desc' => 'Brand focused.', 'features' => ['Custom Theme', 'Adv. Functionality', 'Speed Optimization', 'SEO Pack'], 'popular' => true],
            ['name' => 'Complex', 'price' => 'Custom', 'desc' => 'Large scale.', 'features' => ['Multi-Vendor', 'Custom Plugins', 'API Integrations', 'High Availability'], 'popular' => false]
        ],
        'faq' => [
            ['q' => 'Is WooCommerce free?', 'a' => 'The software is free, but hosting, premium plugins, and development expertise have costs.']
        ]
    ],
    'payment-gateway' => [
        'title' => 'Payment Gateway Integration',
        'subtitle' => 'Secure, reliable payment processing integration for your app or website.',
        'hero_highlight' => 'Secure Payments',
        'hero_image' => 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?q=80&w=1600&auto=format&fit=crop',
        'about_image' => 'https://images.unsplash.com/photo-1559526324-4b87b5e36e44?q=80&w=800&auto=format&fit=crop',
        'trust_points' => ['Stripe', 'PayPal', 'Razorpay', 'PCI Compliant'],
        'about_text' => 'Accept payments from customers worldwide. We integrate secure payment gateways into your website or application, ensuring smooth transactions and compliance with financial regulations.',
        'features' => [
            ['title' => 'Global Gateways', 'desc' => 'Stripe, PayPal, Authorize.net.', 'icon' => 'fa-globe'],
            ['title' => 'Local Payments', 'desc' => 'Razorpay, UPI, regional wallets.', 'icon' => 'fa-wallet'],
            ['title' => 'Subscription', 'desc' => 'Recurring billing handling.', 'icon' => 'fa-sync'],
            ['title' => 'Split Payments', 'desc' => 'Marketplace commission logic.', 'icon' => 'fa-columns'],
            ['title' => 'Security', 'desc' => 'Tokenization and PCI standards.', 'icon' => 'fa-lock'],
            ['title' => 'Invoicing', 'desc' => 'Automated receipt generation.', 'icon' => 'fa-file-invoice-dollar']
        ],
        'plans' => [
            ['name' => 'Standard', 'price' => '$299', 'desc' => 'One gateway.', 'features' => ['Stripe/PayPal', 'Testing', 'Webhooks', 'Launch Support'], 'popular' => true],
            ['name' => 'Complex', 'price' => 'Custom', 'desc' => 'Advanced logic.', 'features' => ['Multi-Gateway', 'Subscriptions', 'Custom UI', 'Compliance Audit'], 'popular' => false]
        ],
        'faq' => [
            ['q' => 'Which gateway is cheapest?', 'a' => 'Stripe and Razorpay offer competitive transaction fees with no monthly cost.']
        ]
    ]
];
