<?php

return [
    // --- WEBSITE DEVELOPMENT ---
    'business-website' => [
        'title' => 'Business Website',
        'subtitle' => 'Professional, high-converting corporate websites designed to reflect your brand and turn visitors into customers.',
        'hero_highlight' => 'Corporate Identity',
        'hero_image' => 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?q=80&w=1600&auto=format&fit=crop',
        'about_image' => 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?q=80&w=800&auto=format&fit=crop',
        'trust_points' => ['SEO Optimized', 'Mobile Responsive', 'Fast Loading', 'Secure'],
        'about_text' => 'Your website is your digital storefront. We create professional, trustworthy websites that clearly showcase your brand, communicate your value, and engage visitors to drive real business growth.',
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
            ['q' => 'Can I update the content myself?', 'a' => 'Yes, we provide an easy-to-use CMS implementation.'],
            ['q' => 'Will my website be mobile-friendly?', 'a' => 'Yes, all our websites are fully responsive and optimized for all devices.'],
            ['q' => 'Do you provide SEO services?', 'a' => 'Yes, we build SEO-friendly websites and offer advanced SEO optimization services.'],
            ['q' => 'Can you redesign my existing website?', 'a' => 'Yes, we can revamp your current site to improve design, speed, and performance.'],
            ['q' => 'Is my website secure?', 'a' => 'Absolutely, we follow best security practices including SSL integration and secure coding standards.'],
            ['q' => 'Do you offer ongoing support?', 'a' => 'Yes, we provide maintenance and support plans to keep your website updated and secure.'],
            ['q' => 'Can you integrate third-party tools?', 'a' => 'Yes, we can integrate payment gateways, CRMs, APIs, and other business tools.'],
            ['q' => 'Will my website be fast?', 'a' => 'Yes, we optimize every website for speed and high performance.'],
            ['q' => 'Do you offer custom web development?', 'a' => 'Yes, we build fully customized web applications tailored to your business needs.']
        ]
    ],
    'custom-web-development' => [
        'title' => 'Custom Web Development',
        'subtitle' => 'Tailor-made web solutions built to match your unique business needs, workflows, and goals — scalable, efficient, and built for performance.',
        'hero_highlight' => 'Tailored Engineering',
        'hero_image' => 'https://images.unsplash.com/photo-1555099962-4199c345e5dd?q=80&w=1600&auto=format&fit=crop',
        'about_image' => 'https://images.unsplash.com/photo-1504639725590-34d0984388bd?q=80&w=800&auto=format&fit=crop',
        'trust_points' => ['Scalable', 'Secure', 'API Integration', 'Cloud Native'],
        'about_text' => 'When standard solutions fall short, we build powerful custom web applications tailored to your exact business needs. Our solutions streamline operations, improve efficiency, and give you a strong competitive advantage.',
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
            ['q' => 'What tech stack do you use?', 'a' => 'We prefer Laravel + Vue for PHP stacks, or MERN for JS stacks, but we adapt to your needs.'],
            ['q' => 'Can you work with our existing system?', 'a' => 'Yes, we can integrate with or enhance your current system without disrupting operations.'],
            ['q' => 'Is the solution scalable?', 'a' => 'Yes, we design systems that are scalable and ready to grow with your business.'],
            ['q' => 'Do you provide API integrations?', 'a' => 'Yes, we integrate third-party APIs, payment gateways, CRMs, and other tools.'],
            ['q' => 'Will the application be secure?', 'a' => 'Yes, we follow best security practices including secure authentication and data protection measures.'],
            ['q' => 'Do you offer post-launch support?', 'a' => 'Yes, we provide maintenance and ongoing technical support after deployment.'],
            ['q' => 'Can you build custom dashboards?', 'a' => 'Yes, we develop tailored dashboards and admin panels based on your workflow needs.'],
            ['q' => 'How do you ensure performance?', 'a' => 'We optimize database queries, caching, and architecture for high performance and speed.'],
            ['q' => 'Do you sign NDAs?', 'a' => 'Yes, we are happy to sign an NDA to protect your business confidentiality.']
        ]
    ],
    'wordpress-development' => [
        'title' => 'WordPress Development',
        'subtitle' => 'Scalable, secure, and fully customized WordPress solutions built to power modern businesses and content-driven websites.',
        'hero_highlight' => 'CMS Powerhouse',
        'hero_image' => 'https://images.unsplash.com/photo-1616469829581-73993eb86b02?q=80&w=1600&auto=format&fit=crop',
        'about_image' => 'https://images.unsplash.com/photo-1499951360447-b19be8fe80f5?q=80&w=800&auto=format&fit=crop',
        'trust_points' => ['Custom Themes', 'Plugin Dev', 'Performance-Tuned', 'Secure'],
        'about_text' => 'We go beyond templates to build custom WordPress themes and plugins tailored to your needs. Enjoy a fast, secure, and flexible website — without unnecessary bloat.',
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
            ['q' => 'Can you fix my hacked site?', 'a' => 'Yes, we offer emergency malware removal and recovery services.'],
            ['q' => 'Do you build custom WordPress themes?', 'a' => 'Yes, we create fully custom themes tailored to your brand and business needs.'],
            ['q' => 'Can you develop custom plugins?', 'a' => 'Yes, we build custom plugins to add specific functionality without unnecessary bloat.'],
            ['q' => 'Will my website be fast?', 'a' => 'Yes, we optimize WordPress with caching, performance tuning, and clean code practices.'],
            ['q' => 'Do you provide ongoing maintenance?', 'a' => 'Yes, we offer regular updates, backups, and security monitoring services.'],
            ['q' => 'Can you migrate my existing website?', 'a' => 'Yes, we handle seamless WordPress migrations with zero data loss.'],
            ['q' => 'Is the website SEO-friendly?', 'a' => 'Yes, we implement SEO best practices including clean URLs, schema, and optimized structure.'],
            ['q' => 'Can I manage content easily?', 'a' => 'Yes, WordPress provides an intuitive dashboard for easy content management.'],
            ['q' => 'Do you integrate third-party tools?', 'a' => 'Yes, we integrate payment gateways, CRMs, marketing tools, and APIs as needed.']
        ]
    ],
    'website-redesign' => [
        'title' => 'Website Redesign',
        'subtitle' => 'Refresh your digital presence with a modern redesign that enhances visuals, performance, and user experience.',
        'hero_highlight' => 'Revitalize',
        'hero_image' => 'https://images.unsplash.com/photo-1542744094-3a31f272c490?q=80&w=1600&auto=format&fit=crop',
        'about_image' => 'https://images.unsplash.com/photo-1531403009284-440f080d1e12?q=80&w=800&auto=format&fit=crop',
        'trust_points' => ['Modern UI', 'Better UX', 'SEO Retention', 'Mobile First'],
        'about_text' => 'Outdated websites can hold your business back. We transform old sites into modern, high-performance platforms that reflect your brand and turn visitors into customers.',
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
            ['q' => 'Will I lose my SEO rankings?', 'a' => 'No, we implement strict SEO migration protocols to preserve and improve your rankings.'],
            ['q' => 'Can you keep my existing content?', 'a' => 'Yes, we migrate all relevant content to the new design seamlessly.'],
            ['q' => 'Will my website experience downtime?', 'a' => 'We minimize downtime by staging and testing the new site before launch.'],
            ['q' => 'Do you improve website speed during redesign?', 'a' => 'Yes, performance optimization is a key part of our redesign process.'],
            ['q' => 'Can you improve user experience?', 'a' => 'Yes, we restructure layouts and navigation to enhance usability and engagement.'],
            ['q' => 'Will the new design be mobile-friendly?', 'a' => 'Absolutely, every redesign is fully responsive across all devices.'],
            ['q' => 'Can you update the branding during redesign?', 'a' => 'Yes, we align the new website with your updated brand identity and messaging.'],
            ['q' => 'Do you provide post-launch support?', 'a' => 'Yes, we offer support and maintenance after the redesigned site goes live.']
        ]
    ],
    // --- ECOMMERCE SOLUTIONS ---
    'ecommerce-website' => [
        'title' => 'Ecommerce Website',
        'subtitle' => 'High-converting ecommerce websites built to drive sales, streamline operations, and scale with your business. We design secure, user-friendly online stores optimized for performance, seamless checkout, and maximum revenue growth.',
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
            ['title' => 'DirectToConsumer', 'desc' => 'From zero to ₹40L/month in 6 months.', 'metric_value' => '₹40L', 'metric_name' => 'Monthly Revenue'],
            ['title' => 'BoutiqueStore', 'desc' => 'Migration from Etsy to own site.', 'metric_value' => '+100%', 'metric_name' => 'Profit Margin']
        ],
        'plans' => [
            ['name' => 'Store Launch', 'price' => '₹1,99,999', 'desc' => 'Get selling quickly.', 'features' => ['Shopify/Woo setup', '50 Products', 'Payment Setup', 'Basic Design'], 'popular' => false],
            ['name' => 'Brand Scale', 'price' => '₹3,99,999+', 'desc' => 'Custom brand experience.', 'features' => ['Custom Theme', 'product Migration', 'Email Automation', 'Adv. Analytics', 'Speed Opt.'], 'popular' => true],
            ['name' => 'Enterprise', 'price' => 'Custom', 'desc' => 'High volume solutions.', 'features' => ['Headless Commerce', 'ERP Integration', 'Multi-Region', 'Dedicated Support'], 'popular' => false]
        ],
        'faq' => [
            ['q' => 'Which platform is best?', 'a' => 'Shopify is best for ease of use, WooCommerce for ownership and flexibility.'],
            ['q' => 'Do you take a commission?', 'a' => 'No, we charge flat development fees. Transaction fees depend on the payment gateway.'],
            ['q' => 'Can you integrate payment gateways?', 'a' => 'Yes, we integrate Razorpay, Stripe, PayPal, and other major gateways.'],
            ['q' => 'Will my store be mobile-friendly?', 'a' => 'Yes, all our ecommerce websites are fully responsive and optimized for mobile shopping.'],
            ['q' => 'Do you provide product upload support?', 'a' => 'Yes, we can upload products and set up categories, filters, and variations.'],
            ['q' => 'Is the website SEO-friendly?', 'a' => 'Yes, we implement ecommerce SEO best practices for better product visibility.'],
            ['q' => 'Can you integrate shipping APIs?', 'a' => 'Yes, we integrate shipping providers for real-time rates and order tracking.'],
            ['q' => 'Do you offer ongoing maintenance?', 'a' => 'Yes, we provide support plans to keep your store secure and updated.'],
            ['q' => 'Can the store scale as my business grows?', 'a' => 'Yes, we build scalable ecommerce solutions designed for long-term growth.']
        ]

    ],
    'shopify-development' => [
        'title' => 'Shopify Development',
        'subtitle' => 'Expert Shopify design and development tailored for ambitious brands that demand performance, precision, and premium online experiences.',
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
            ['name' => 'Theme Setup', 'price' => '₹1,19,999', 'desc' => 'Professional configuration.', 'features' => ['Theme Customize', 'Apps Setup', 'Payment Config', 'Training'], 'popular' => false],
            ['name' => 'Custom Build', 'price' => '₹3,99,999+', 'desc' => 'Unique brand design.', 'features' => ['Custom Liquid Dev', 'Unique UI/UX', 'Adv. Functionality', 'SEO Optimization'], 'popular' => true],
            ['name' => 'Plus Scale', 'price' => 'Custom', 'desc' => 'Shopify Plus.', 'features' => ['B2B Features', 'Checkout Scripts', 'International Markets', 'Dedicated Manager'], 'popular' => false]
        ],
        'faq' => [
            ['q' => 'Why Shopify?', 'a' => 'It is the most reliable hosted solution, so you don’t have to worry about servers or security.'],
            ['q' => 'Can I edit the site myself?', 'a' => 'Yes, Shopify’s editor is extremely user-friendly and easy to manage.'],
            ['q' => 'Can you create custom Shopify themes?', 'a' => 'Yes, we design and develop fully custom Shopify themes tailored to your brand.'],
            ['q' => 'Do you integrate third-party apps?', 'a' => 'Yes, we integrate apps for payments, shipping, marketing, and automation.'],
            ['q' => 'Is Shopify good for scaling?', 'a' => 'Yes, Shopify supports businesses from startups to enterprise-level brands.'],
            ['q' => 'Do you optimize for conversions?', 'a' => 'Yes, we design stores with CRO best practices to maximize sales.'],
            ['q' => 'Can you migrate my store to Shopify?', 'a' => 'Yes, we handle seamless migration from other platforms without data loss.'],
            ['q' => 'Do you provide ongoing support?', 'a' => 'Yes, we offer maintenance and growth support after launch.']
        ]


    ],

    // --- APP DEVELOPMENT ---
    'android-app-development' => [
        'title' => 'Android App Development',
        'subtitle' => 'Native Android applications engineered for high performance, long-term stability, and maximum reach across the Android ecosystem.',
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
            ['name' => 'MVP App', 'price' => '₹4,79,999+', 'desc' => 'Core features to launch.', 'features' => ['Core UI/UX', 'API Integration', 'Play Store Submission', '2 Months Support'], 'popular' => false],
            ['name' => 'Pro App', 'price' => '₹9,59,999+', 'desc' => 'Full-featured product.', 'features' => ['Adv. Animations', 'Offline Mode', 'Social Login', 'Analytics', 'Adv. Admin Panel'], 'popular' => true],
            ['name' => 'Enterprise', 'price' => 'Custom', 'desc' => 'Complex ecosystem.', 'features' => ['Custom Security', 'Legacy Integration', 'Global Scale', 'SLA'], 'popular' => false]
        ],
        'faq' => [
            ['q' => 'Do you support tablets?', 'a' => 'Yes, we optimize layouts for both phones and tablets.'],
            ['q' => 'How do updates work?', 'a' => 'We offer maintenance packages to handle regular updates and OS compatibility.'],
            ['q' => 'Will my app be published on Google Play?', 'a' => 'Yes, we handle the complete deployment process including Play Store submission.'],
            ['q' => 'Do you build custom features?', 'a' => 'Yes, we develop fully customized features based on your business requirements.'],
            ['q' => 'Is the app secure?', 'a' => 'Yes, we implement secure authentication, data encryption, and best coding practices.'],
            ['q' => 'Can you integrate APIs and third-party services?', 'a' => 'Yes, we integrate payment gateways, CRMs, maps, and other APIs as needed.'],
            ['q' => 'Do you provide UI/UX design for the app?', 'a' => 'Yes, our design team creates intuitive and modern app interfaces.'],
            ['q' => 'Can the app scale as users grow?', 'a' => 'Yes, we build scalable architecture to support future growth and high traffic.']
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
            ['name' => 'MVP iOS', 'price' => '₹5,59,999+', 'desc' => 'Market entry.', 'features' => ['Core Features', 'Standard UI', 'App Store Submit', 'Bug Fixes'], 'popular' => false],
            ['name' => 'Premium iOS', 'price' => '₹11,99,999+', 'desc' => 'Polished experience.', 'features' => ['Custom Animations', 'Local Storage', 'Push Notif', 'Dashboard', 'Adv. Analytics'], 'popular' => true],
            ['name' => 'Flagship', 'price' => 'Custom', 'desc' => 'Industry leader.', 'features' => ['AR/ML Integration', 'Custom Encryption', 'Global CDNs', 'Dedicated Team'], 'popular' => false]
        ],
        'faq' => [
            ['q' => 'Will it work on iPad?', 'a' => 'Yes, we can build universal apps that adapt seamlessly to both iPhone and iPad.'],
            ['q' => 'How long is the review process?', 'a' => 'Apple typically takes 24–48 hours for review, and we prepare everything to ensure smooth approval.'],
            ['q' => 'Will you handle App Store submission?', 'a' => 'Yes, we manage the complete submission process including compliance and metadata setup.'],
            ['q' => 'Do you support future iOS updates?', 'a' => 'Yes, we offer maintenance plans to ensure compatibility with future iOS versions.'],
            ['q' => 'Can you integrate Apple Pay?', 'a' => 'Yes, we can integrate Apple Pay and other secure payment solutions.'],
            ['q' => 'Is the app optimized for performance?', 'a' => 'Yes, we follow native development best practices for speed and stability.'],
            ['q' => 'Do you provide UI/UX design?', 'a' => 'Yes, our team designs intuitive interfaces aligned with Apple’s Human Interface Guidelines.'],
            ['q' => 'Can the app scale as users grow?', 'a' => 'Yes, we build scalable architecture to support increasing user demand.']
        ]
    ],

    // --- DIGITAL MARKETING ---
    'seo-services' => [
        'title' => 'SEO Services',
        'subtitle' => 'Strategic SEO that boosts visibility and drives targeted traffic.
We optimize your site for better rankings and real business growth.',
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
            ['name' => 'Local Starter', 'price' => '₹39,999/mo', 'desc' => 'For local businesses.', 'features' => ['GMB Opt', '5 Keywords', 'On-Page Fixes', 'Monthly Report'], 'popular' => false],
            ['name' => 'Growth', 'price' => '₹95,999/mo', 'desc' => 'National reach.', 'features' => ['20 Keywords', 'Content Creation', 'Link Building', 'Tech Audit', 'Bi-Weekly Report'], 'popular' => true],
            ['name' => 'Dominance', 'price' => '₹1,99,999/mo', 'desc' => 'Aggressive growth.', 'features' => ['Unlimited Keywords', 'PR Outreach', 'Daily Tracking', 'Competitor Attack'], 'popular' => false]
        ],
        'faq' => [
            ['q' => 'How long to see results?', 'a' => 'SEO is a long-term strategy. Significant results typically appear in 3-6 months.'],
            ['q' => 'Is it permanent?', 'a' => 'Rankings can fluctuate, but our solid foundation ensures long-term stability.'],
            ['q' => 'Do you guarantee #1 rankings?', 'a' => 'No ethical SEO agency can guarantee rankings, but we follow proven strategies to achieve strong, sustainable growth.'],
            ['q' => 'Do you perform keyword research?', 'a' => 'Yes, we conduct in-depth keyword and competitor research to target high-value search terms.'],
            ['q' => 'Will SEO increase my sales?', 'a' => 'SEO brings qualified traffic, which significantly improves your chances of generating leads and sales.'],
            ['q' => 'Do you provide SEO reports?', 'a' => 'Yes, we provide regular performance reports with clear metrics and insights.'],
            ['q' => 'Is local SEO included?', 'a' => 'Yes, we optimize Google Business profiles and local listings for better regional visibility.'],
            ['q' => 'Can you optimize an existing website?', 'a' => 'Yes, we audit and improve existing websites to enhance performance and rankings.']
        ]
    ],
    'hybrid-app-development' => [
        'title' => 'Hybrid App Development',
        'subtitle' => 'Cost-effective hybrid app solutions built to run seamlessly across Android and iOS, delivering consistent performance, faster development cycles, and wider market reach.',
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
            ['name' => 'Hybrid MVP', 'price' => '₹3,99,999+', 'desc' => 'Both platforms fast.', 'features' => ['Core Features', 'Standard UI', 'Both Stores', '1 Month Support'], 'popular' => true],
            ['name' => 'Custom Hybrid', 'price' => '₹7,99,999+', 'desc' => 'Feature rich.', 'features' => ['Custom Animations', 'Backend API', 'Push Notif', 'Analytics'], 'popular' => false],
            ['name' => 'Enterprise', 'price' => 'Custom', 'desc' => 'Large scale.', 'features' => ['Complex Logic', 'ERP Integration', 'SLA Support', 'Dedicated Team'], 'popular' => false]
        ],
        'faq' => [
            ['q' => 'Is native better than hybrid?', 'a' => 'For most apps, hybrid frameworks like Flutter or React Native deliver near-native performance at a lower cost.'],
            ['q' => 'Can we switch to native later?', 'a' => 'Yes, migration is possible, but modern hybrid apps scale efficiently for long-term growth.'],
            ['q' => 'Will the app run on both Android and iOS?', 'a' => 'Yes, hybrid development allows a single codebase to run smoothly on both platforms.'],
            ['q' => 'Is performance compromised in hybrid apps?', 'a' => 'No, with proper architecture and optimization, performance is highly competitive.'],
            ['q' => 'Do you handle app store submissions?', 'a' => 'Yes, we manage deployment on both Google Play and Apple App Store.'],
            ['q' => 'Can you integrate third-party APIs?', 'a' => 'Yes, we integrate payment gateways, maps, CRMs, and other services as needed.'],
            ['q' => 'Is hybrid development cost-effective?', 'a' => 'Yes, it reduces development time and cost by using a shared codebase.'],
            ['q' => 'Do you provide ongoing maintenance?', 'a' => 'Yes, we offer support packages for updates, bug fixes, and feature enhancements.']
        ]
    ],

    'google-ads' => [
        'title' => 'Google Ads Management',
        'subtitle' => 'Precision-targeted PPC campaigns designed to drive immediate traffic, qualified leads, and measurable ROI from day one.',
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
            ['name' => 'Starter', 'price' => '₹31,999/mo', 'desc' => 'Ad spend <₹1.6L.', 'features' => ['Search Network', 'Basic Tracking', 'Monthly Report', '1 Campaign'], 'popular' => false],
            ['name' => 'Growth', 'price' => '₹63,999/mo', 'desc' => 'Ad spend <₹4L.', 'features' => ['Search + Display', 'Remarketing', 'Bi-Weekly Report', 'A/B Testing'], 'popular' => true],
            ['name' => 'Performance', 'price' => '15% of Spend', 'desc' => 'Ad spend >₹4L.', 'features' => ['All Networks', 'Adv. Strategies', 'Video Ads', 'Weekly Calls'], 'popular' => false]
        ],
        'faq' => [
            ['q' => 'How much should I spend?', 'a' => 'We recommend starting with at least ₹80,000/mo ad spend to gather meaningful performance data.'],
            ['q' => 'Does this include ad spend?', 'a' => 'No, our fee covers campaign strategy and management. You pay the ad platform directly.'],
            ['q' => 'How quickly will I see results?', 'a' => 'PPC campaigns can start generating traffic and leads within days of launch.'],
            ['q' => 'Which platforms do you manage?', 'a' => 'We manage Google Ads, Meta Ads, LinkedIn Ads, and other major PPC platforms.'],
            ['q' => 'Do you provide performance reports?', 'a' => 'Yes, we share detailed reports covering clicks, conversions, and ROI metrics.'],
            ['q' => 'Can you optimize existing campaigns?', 'a' => 'Yes, we audit and optimize underperforming campaigns to improve ROI.'],
            ['q' => 'What type of businesses benefit from PPC?', 'a' => 'Any business looking for fast, measurable lead generation can benefit from PPC advertising.'],
            ['q' => 'Do you handle landing page optimization?', 'a' => 'Yes, we can optimize or build high-converting landing pages to maximize campaign results.']
        ]
    ],

    'social-media' => [
        'title' => 'Social Media Marketing',
        'subtitle' => 'Building engaged communities and amplifying your brand presence across all major social media platforms.',
        'hero_highlight' => 'Social Growth',
        'hero_image' => 'https://images.unsplash.com/photo-1611162617474-5b21e879e113?q=80&w=1600&auto=format&fit=crop',
        'about_image' => 'https://images.unsplash.com/photo-1611162616475-46b635cb6868?q=80&w=800&auto=format&fit=crop',
        'trust_points' => ['Instagram', 'LinkedIn', 'Facebook', 'Content Creation'],
        'about_text' => 'Your customers are active on social media — and so should your brand be. We create compelling content, manage engagement, and build meaningful connections that strengthen trust, boost authority, and grow long-term brand loyalty.',
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
            ['name' => 'Essential', 'price' => '₹47,999/mo', 'desc' => 'Brand maintenance.', 'features' => ['12 Posts/mo', 'Community Mgmt', 'Basic Design', 'Monthly Report'], 'popular' => false],
            ['name' => 'Growth', 'price' => '₹95,999/mo', 'desc' => 'Active growth.', 'features' => ['20 Posts (inc Reels)', 'Ad Management', 'Graphic Design', 'Bi-Weekly Report'], 'popular' => true],
            ['name' => 'Authority', 'price' => '₹1,99,999/mo', 'desc' => 'Market leader.', 'features' => ['Daily Content', 'Video Production', 'Influencer Outreach', '24/7 Response'], 'popular' => false]
        ],
        'faq' => [
            ['q' => 'Do you create the graphics?', 'a' => 'Yes, our design team creates all static and video assets.'],
            ['q' => 'Which platforms do you cover?', 'a' => 'We specialize in Instagram, LinkedIn, Facebook, and Twitter/X.'],
            ['q' => 'Do you handle content planning?', 'a' => 'Yes, we create a monthly content calendar aligned with your brand goals.'],
            ['q' => 'Will you manage comments and messages?', 'a' => 'Yes, we monitor engagement and respond to comments and DMs professionally.'],
            ['q' => 'Do you run paid social campaigns?', 'a' => 'Yes, we manage paid ads to boost reach, engagement, and lead generation.'],
            ['q' => 'How often will you post?', 'a' => 'Posting frequency depends on your plan, typically 3–5 times per week.'],
            ['q' => 'Do you provide performance reports?', 'a' => 'Yes, we share detailed monthly reports with growth and engagement metrics.'],
            ['q' => 'Can you grow my followers?', 'a' => 'Yes, we use organic strategies and paid promotions to grow a targeted audience.']
        ]
    ],

    // --- BRANDING & DESIGN ---
    'logo-design' => [
        'title' => 'Logo & Brand Identity',
        'subtitle' => 'We design distinctive logos and cohesive brand identities that capture your vision, communicate your values, and leave a lasting impression on your audience.',
        'hero_highlight' => 'Visual Identity',
        'hero_image' => 'https://images.unsplash.com/photo-1626785774573-4b799314348d?q=80&w=1600&auto=format&fit=crop',
        'about_image' => 'https://images.unsplash.com/photo-1561070791-2526d30994b5?q=80&w=800&auto=format&fit=crop',
        'trust_points' => ['Unique Concepts', 'Vector Files', 'Brand Guide', 'Copyright Ownership'],
        'about_text' => 'Your logo is the foundation of your brand presence. We create unique, timeless logos and complete brand identity systems that reflect your vision, build recognition, and differentiate you from competitors.',
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
            ['name' => 'Startup Logo', 'price' => '₹24,999', 'desc' => 'Quick launch.', 'features' => ['3 Concepts', '3 Revisions', 'Vector Files', 'Transparent PNG'], 'popular' => false],
            ['name' => 'Brand Identity', 'price' => '₹71,999', 'desc' => 'Full professional look.', 'features' => ['5 Concepts', 'Unlimited Revisions', 'Brand Guidelines', 'Social Kit', 'Stationery'], 'popular' => true],
            ['name' => 'Premium Brand', 'price' => '₹1,99,999', 'desc' => 'Strategic overhaul.', 'features' => ['Naming', 'Strategy Session', 'Full Guidelines', 'Marketing Collateral', 'Iconography'], 'popular' => false]
        ],
        'faq' => [
            ['q' => 'Do I own the copyright?', 'a' => 'Yes, full copyright is transferred to you upon final payment.'],
            ['q' => 'How many revisions?', 'a' => 'Our standard package includes unlimited revisions until you are satisfied.'],
            ['q' => 'What files will I receive?', 'a' => 'You will receive high-resolution files in formats like AI, EPS, PNG, JPG, and PDF.'],
            ['q' => 'Do you provide brand guidelines?', 'a' => 'Yes, we can create a complete brand guideline document covering colors, typography, and usage rules.'],
            ['q' => 'Can you redesign my existing logo?', 'a' => 'Yes, we can modernize and refine your existing logo while preserving brand recognition.'],
            ['q' => 'How long does the process take?', 'a' => 'Initial concepts are typically delivered within 5–7 business days.'],
            ['q' => 'Will I get multiple concepts?', 'a' => 'Yes, we present multiple creative concepts to choose from.'],
            ['q' => 'Do you design full brand identity systems?', 'a' => 'Yes, we design complete identity systems including stationery, social media kits, and more.']
        ]
    ],

    'ui-ux-design' => [
        'title' => 'UI/UX Design',
        'subtitle' => 'Designing intuitive, user-focused digital experiences that enhance usability, strengthen engagement, and drive meaningful conversions.',
        'hero_highlight' => 'User Experience',
        'hero_image' => 'https://images.unsplash.com/photo-1586717791821-3f44a5638d28?q=80&w=1600&auto=format&fit=crop',
        'about_image' => 'https://images.unsplash.com/photo-1545235617-9465d2a55698?q=80&w=800&auto=format&fit=crop',
        'trust_points' => ['User Research', 'Wireframing', 'Prototyping', 'Figma Experts'],
        'about_text' => 'Great design goes beyond visuals — it’s about functionality and flow. We craft seamless user journeys and pixel-perfect interfaces that enhance usability, improve engagement, and make your product effortless and enjoyable to use.',
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
            ['name' => 'Landing Page', 'price' => '₹39,999', 'desc' => 'One page design.', 'features' => ['Desktop & Mobile', 'Figma Source', '2 Revisions', 'Asset Export'], 'popular' => false],
            ['name' => 'App/Web Design', 'price' => '₹1,59,999+', 'desc' => 'Full project.', 'features' => ['User Flow', 'Wireframes', 'Hi-Fi UI', 'Prototype', 'Design System'], 'popular' => true],
            ['name' => 'Consultancy', 'price' => '₹7,999/hr', 'desc' => 'Expert advice.', 'features' => ['UX Audit', 'Heuristic Analysis', 'Team Training', 'Strategy'], 'popular' => false]
        ],
        'faq' => [
            ['q' => 'Do you do the coding too?', 'a' => 'This service is design-only, but our development team can seamlessly implement the approved designs.'],
            ['q' => 'What tools do you use?', 'a' => 'We primarily use Figma for real-time collaboration and smooth developer handoff.'],
            ['q' => 'Do you conduct user research?', 'a' => 'Yes, we perform user research and competitor analysis to inform design decisions.'],
            ['q' => 'Will I receive design files?', 'a' => 'Yes, you will receive organized Figma files ready for development.'],
            ['q' => 'Do you create prototypes?', 'a' => 'Yes, we build interactive prototypes to visualize user flows before development.'],
            ['q' => 'Can you redesign an existing app or website?', 'a' => 'Yes, we audit and redesign existing products to improve usability and performance.'],
            ['q' => 'Do you design for mobile and web?', 'a' => 'Yes, we create responsive designs optimized for both mobile and desktop experiences.'],
            ['q' => 'How long does a design project take?', 'a' => 'Timelines vary, but most UI/UX projects take 2–6 weeks depending on scope.']
        ]

    ],

    'graphic-design' => [
        'title' => 'Graphic Design',
        'subtitle' => 'Compelling, high-impact visuals crafted to elevate your marketing campaigns and strengthen your brand communication across all channels.',
        'hero_highlight' => 'Creative Visuals',
        'hero_image' => 'https://images.unsplash.com/photo-1626785774625-ddcddc3445e9?q=80&w=1600&auto=format&fit=crop',
        'about_image' => 'https://images.unsplash.com/photo-1558655146-d09347e92766?q=80&w=800&auto=format&fit=crop',
        'trust_points' => ['Print', 'Digital', 'Brochures', 'Presentations'],
        'about_text' => 'From brochures to billboards, we design impactful graphic materials that clearly communicate your message while ensuring strong brand consistency across every touchpoint.',
        'features' => [
            ['title' => 'Marketing Material', 'desc' => 'Flyers, brochures, posters.', 'icon' => 'fa-file-pdf'],
            ['title' => 'Presentations', 'desc' => 'Pitch decks and slide designs.', 'icon' => 'fa-slideshare'],
            ['title' => 'Packaging', 'desc' => 'Product box and label design.', 'icon' => 'fa-box-open'],
            ['title' => 'Infographics', 'desc' => 'Visualizing complex data.', 'icon' => 'fa-chart-pie'],
            ['title' => 'Email Templates', 'desc' => 'Custom newsletter designs.', 'icon' => 'fa-envelope'],
            ['title' => 'Ad Creatives', 'desc' => 'Banners for digital campaigns.', 'icon' => 'fa-ad']
        ],
        'plans' => [
            ['name' => 'Hourly', 'price' => '₹3,999/hr', 'desc' => 'Ad-hoc tasks.', 'features' => ['Fast Turnaround', 'Source Files', 'Print Ready', 'Any Format'], 'popular' => false],
            ['name' => 'Project', 'price' => 'Custom', 'desc' => 'Fixed scope.', 'features' => ['Dedicated Designer', 'Concepts', 'Revisions', 'Full ownership'], 'popular' => true],
            ['name' => 'Monthly', 'price' => '₹1,19,999/mo', 'desc' => 'Unlimited requests.', 'features' => ['Unlimited Tasks', 'Priority Support', 'Dedicated Designer', 'Stock Assets'], 'popular' => false]
        ],
        'faq' => [
            ['q' => 'Do you handle printing?', 'a' => 'We provide print-ready files but do not handle the physical printing process directly.'],
            ['q' => 'What file formats will I receive?', 'a' => 'You will receive high-resolution, print-ready files in formats such as PDF, AI, and PNG.'],
            ['q' => 'Can you follow our brand guidelines?', 'a' => 'Yes, we strictly adhere to your existing brand guidelines to ensure consistency.'],
            ['q' => 'Do you offer revisions?', 'a' => 'Yes, we include revisions to ensure the final design meets your expectations.'],
            ['q' => 'Can you design for both print and digital?', 'a' => 'Yes, we create designs optimized for both print materials and digital platforms.'],
            ['q' => 'How long does a design project take?', 'a' => 'Most graphic design projects are completed within 3–7 business days, depending on scope.']
        ]
    ],

    // --- SUPPORT & HOSTING ---
    'website-maintenance' => [
        'title' => 'Website Maintenance',
        'subtitle' => 'Keep your website secure, optimized, and running at peak performance with our proactive maintenance and support plans.',
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
            ['name' => 'Basic', 'price' => '₹7,999/mo', 'desc' => 'Essential security.', 'features' => ['Weekly Updates', 'Daily Backups', 'Security Scan', 'Uptime Monitor'], 'popular' => false],
            ['name' => 'Professional', 'price' => '₹15,999/mo', 'desc' => 'Active management.', 'features' => ['Daily Updates', 'Real-time Security', '1hr Content Edits', 'Speed Opt'], 'popular' => true],
            ['name' => 'Enterprise', 'price' => '₹39,999/mo', 'desc' => 'Mission critical.', 'features' => ['Priority Support', 'Unlimited Edits', 'Dev Environment', 'Consulting'], 'popular' => false]
        ],
        'faq' => [
            ['q' => 'Does this include hosting?', 'a' => 'Hosting is separate, but we can bundle it at a discounted rate.'],
            ['q' => 'Can I cancel anytime?', 'a' => 'Yes, our plans are month-to-month with no long-term contracts.'],
            ['q' => 'What does maintenance include?', 'a' => 'Our plans include updates, backups, security monitoring, and performance optimization.'],
            ['q' => 'Do you provide emergency support?', 'a' => 'Yes, we offer priority support for urgent technical issues.'],
            ['q' => 'Will you update plugins and themes?', 'a' => 'Yes, we regularly update plugins, themes, and core files to maintain security.'],
            ['q' => 'Do you monitor website uptime?', 'a' => 'Yes, we use monitoring tools to ensure your website stays online and operational.'],
            ['q' => 'Can you make small content changes?', 'a' => 'Yes, minor content updates are included in most maintenance plans.'],
            ['q' => 'Do you provide performance optimization?', 'a' => 'Yes, we continuously optimize speed and performance for the best user experience.']
        ]
    ],

    'hosting-domain' => [
        'title' => 'Hosting & Domain',
        'subtitle' => 'Fast, secure, and scalable cloud hosting solutions designed to keep your business online, protected, and performing at its best 24/7.',
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
            ['name' => 'Shared', 'price' => '₹799/mo', 'desc' => 'For small sites.', 'features' => ['1 Website', '10GB Storage', 'Free SSL', 'Email Accounts'], 'popular' => false],
            ['name' => 'Cloud VPS', 'price' => '₹3,199/mo', 'desc' => 'High performance.', 'features' => ['Dedicated CPU', '4GB RAM', 'NVMe Storage', 'Managed Support'], 'popular' => true],
            ['name' => 'Dedicated', 'price' => '₹11,999/mo', 'desc' => 'Maximum power.', 'features' => ['Full Server', 'Root Access', 'Premium Hardware', 'Priority Support'], 'popular' => false]
        ],
        'faq' => [
            ['q' => 'Do you help migrate?', 'a' => 'Yes, we provide free migration from your current host.'],
            ['q' => 'Are backups included?', 'a' => 'Yes, we take daily off-site automated backups.'],
            ['q' => 'Is SSL included?', 'a' => 'Yes, we provide free SSL certificates to ensure secure data transmission.'],
            ['q' => 'Do you offer scalable plans?', 'a' => 'Yes, our cloud hosting plans can scale as your traffic and business grow.'],
            ['q' => 'What about uptime guarantee?', 'a' => 'We provide a 99.9% uptime guarantee for maximum reliability.'],
            ['q' => 'Is technical support available?', 'a' => 'Yes, our support team is available to assist with any hosting-related issues.'],
            ['q' => 'Do you provide CDN integration?', 'a' => 'Yes, we integrate CDN services to improve global loading speed.'],
            ['q' => 'Is server security managed?', 'a' => 'Yes, we implement firewalls, malware scanning, and proactive security monitoring.']
        ]
    ],

    'website-security' => [
        'title' => 'Website Security',
        'subtitle' => 'Safeguard your digital assets with advanced, enterprise-grade security measures designed to prevent threats, detect vulnerabilities, and ensure continuous protection.',
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
            ['name' => 'Audit', 'price' => '₹24,999', 'desc' => 'One-time check.', 'features' => ['Full Scan', 'Vulnerability Report', 'Fix Recommendations', 'Consultation'], 'popular' => false],
            ['name' => 'Protection', 'price' => '₹3,999/mo', 'desc' => 'Ongoing defense.', 'features' => ['WAF Setup', 'Daily Scans', 'Malware Cleanup', 'DDoS Protection'], 'popular' => true],
            ['name' => 'Enterprise', 'price' => 'Custom', 'desc' => 'Corporate security.', 'features' => ['Penetration Testing', 'Compliance (GDPR/HIPAA)', 'Training', 'SLA'], 'popular' => false]
        ],
        'faq' => [
            ['q' => 'My site is already hacked!', 'a' => 'Contact us immediately. We offer emergency cleanup services to restore your site quickly and securely.'],
            ['q' => 'Do I really need this?', 'a' => 'Yes. Cyber attacks are automated and target websites of all sizes. Prevention is far more affordable than recovery.'],
            ['q' => 'What security measures do you implement?', 'a' => 'We implement firewalls, malware scanning, login protection, and proactive monitoring.'],
            ['q' => 'Do you provide ongoing security monitoring?', 'a' => 'Yes, we continuously monitor your website for threats and vulnerabilities.'],
            ['q' => 'Will security slow down my website?', 'a' => 'No, we optimize security configurations to ensure protection without compromising performance.'],
            ['q' => 'Do you offer SSL installation?', 'a' => 'Yes, we install and configure SSL certificates for secure data encryption.'],
            ['q' => 'Can you secure ecommerce websites?', 'a' => 'Yes, we implement additional protection layers for payment and customer data security.'],
            ['q' => 'How often do you scan for vulnerabilities?', 'a' => 'We perform regular automated and manual scans to detect and fix vulnerabilities promptly.']
        ]
    ],
    // --- MISSING KEYS ---
    'woocommerce' => [
        'title' => 'WooCommerce Store',
        'subtitle' => 'Flexible, open-source ecommerce stores powered by WordPress, offering full ownership, customization, and scalable growth for your online business.',
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
            ['name' => 'Store Setup', 'price' => '₹1,19,999', 'desc' => 'Turnkey solution.', 'features' => ['Woo Installation', 'Theme Setup', 'Payment/Ship Config', '10 Products'], 'popular' => false],
            ['name' => 'Custom Store', 'price' => '₹2,79,999', 'desc' => 'Brand focused.', 'features' => ['Custom Theme', 'Adv. Functionality', 'Speed Optimization', 'SEO Pack'], 'popular' => true],
            ['name' => 'Complex', 'price' => 'Custom', 'desc' => 'Large scale.', 'features' => ['Multi-Vendor', 'Custom Plugins', 'API Integrations', 'High Availability'], 'popular' => false]
        ],
        'faq' => [
            ['q' => 'Is WooCommerce free?', 'a' => 'The core software is free, but hosting, premium plugins, and professional development may involve costs.'],
            ['q' => 'Do I fully own my store?', 'a' => 'Yes, WooCommerce gives you complete ownership and control over your website and data.'],
            ['q' => 'Can WooCommerce handle large stores?', 'a' => 'Yes, with proper hosting and optimization, WooCommerce can scale to handle large product catalogs.'],
            ['q' => 'Can you integrate payment gateways?', 'a' => 'Yes, we integrate Stripe, Razorpay, PayPal, and other major payment providers.'],
            ['q' => 'Is WooCommerce SEO-friendly?', 'a' => 'Yes, it is built on WordPress, which offers strong SEO capabilities.'],
            ['q' => 'Will my store be mobile-friendly?', 'a' => 'Yes, we design fully responsive WooCommerce stores for seamless mobile shopping.'],
            ['q' => 'Do you provide maintenance support?', 'a' => 'Yes, we offer ongoing updates, backups, and security monitoring.'],
            ['q' => 'Can you customize features?', 'a' => 'Yes, we develop custom themes and plugins to match your business requirements.']
        ]
    ],
    'payment-gateway' => [
        'title' => 'Payment Gateway Integration',
        'subtitle' => 'Secure and reliable payment gateway integration designed to ensure smooth transactions, data protection, and a seamless checkout experience for your app or website.',
        'hero_highlight' => 'Secure Payments',
        'hero_image' => 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?q=80&w=1600&auto=format&fit=crop',
        'about_image' => 'https://images.unsplash.com/photo-1559526324-4b87b5e36e44?q=80&w=800&auto=format&fit=crop',
        'trust_points' => ['Stripe', 'PayPal', 'Razorpay', 'PCI Compliant'],
        'about_text' => 'Accept payments from customers anywhere in the world with confidence. We integrate trusted, secure payment gateways into your website or application to ensure seamless transactions, encrypted data protection, and full compliance with financial regulations.',
        'features' => [
            ['title' => 'Global Gateways', 'desc' => 'Stripe, PayPal, Authorize.net.', 'icon' => 'fa-globe'],
            ['title' => 'Local Payments', 'desc' => 'Razorpay, UPI, regional wallets.', 'icon' => 'fa-wallet'],
            ['title' => 'Subscription', 'desc' => 'Recurring billing handling.', 'icon' => 'fa-sync'],
            ['title' => 'Split Payments', 'desc' => 'Marketplace commission logic.', 'icon' => 'fa-columns'],
            ['title' => 'Security', 'desc' => 'Tokenization and PCI standards.', 'icon' => 'fa-lock'],
            ['title' => 'Invoicing', 'desc' => 'Automated receipt generation.', 'icon' => 'fa-file-invoice-dollar']
        ],
        'plans' => [
            ['name' => 'Standard', 'price' => '₹24,999', 'desc' => 'One gateway.', 'features' => ['Stripe/PayPal', 'Testing', 'Webhooks', 'Launch Support'], 'popular' => true],
            ['name' => 'Complex', 'price' => 'Custom', 'desc' => 'Advanced logic.', 'features' => ['Multi-Gateway', 'Subscriptions', 'Custom UI', 'Compliance Audit'], 'popular' => false]
        ],
        'faq' => [
            ['q' => 'Which gateway is cheapest?', 'a' => 'Stripe and Razorpay offer competitive transaction fees with no monthly cost.']
        ]
    ]
];



