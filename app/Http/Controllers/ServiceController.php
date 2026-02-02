<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    private $services = [
        'web-development' => [
            'id' => 'web-development',
            'title' => 'Web Development',
            'hero_highlight' => 'Digital Architecture',
            'subtitle' => 'Building scalable, high-performance web solutions that drive business growth.',
            'hero_image' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?q=80&w=1600&auto=format&fit=crop',
            'about_image' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=800&auto=format&fit=crop',
            'trust_points' => ['Enterprise Grade', 'Scalable Architecture', '99.9% Uptime', 'Security First'],
            'about_text' => 'We engineer robust web applications tailored to your specific business needs. From complex enterprise platforms to high-conversion marketing sites, our code is clean, secure, and built for the future.',
            'features' => [
                ['title' => 'Custom Development', 'desc' => 'Tailored solutions built from the ground up to match your exact requirements.', 'icon' => 'fa-code'],
                ['title' => 'Responsive Design', 'desc' => 'Fluid layouts that provide an optimal viewing experience across all devices.', 'icon' => 'fa-mobile-alt'],
                ['title' => 'High Performance', 'desc' => 'Optimized load times and server response for superior user engagement.', 'icon' => 'fa-tachometer-alt'],
                ['title' => 'Secure Architecture', 'desc' => 'Bank-grade security protocols to protect your data and users.', 'icon' => 'fa-shield-alt'],
                ['title' => 'API Integration', 'desc' => 'Seamless connectivity with third-party services and legacy systems.', 'icon' => 'fa-plug'],
                ['title' => 'Scalable Cloud', 'desc' => 'Cloud-native solutions designed to grow with your user base.', 'icon' => 'fa-cloud']
            ],
            'tech_stack' => ['Laravel', 'React', 'Vue.js', 'Node.js', 'Python', 'AWS'],
            'process' => ['Discovery', 'Architecture', 'Development', 'Testing', 'Deployment'],
            'benefits' => ['3x Faster Load Speeds', 'Higher Conversion Rates', 'Reduced Maintenance Costs', 'Future-Proof Tech'],
            'use_cases' => [
                'E-commerce Platforms',
                'Corporate Portals',
                'SaaS Dashboards',
                'Customer Support Systems'
            ],
            'faq' => [
                ['q' => 'Do you build custom CMS?', 'a' => 'Yes, we build tailored content management systems for specific enterprise needs.'],
                ['q' => 'How do you handle security?', 'a' => 'We implement industry-standard encryption, firewalls, and regular security audits.']
            ]
        ],
        'mobile-app-development' => [
            'id' => 'mobile-app-development',
            'title' => 'Mobile App Development',
            'hero_highlight' => 'Mobile First',
            'subtitle' => 'Native and cross-platform mobile experiences that engage and retain users.',
            'hero_image' => 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?q=80&w=1600&auto=format&fit=crop',
            'about_image' => 'https://images.unsplash.com/photo-1551650975-87deedd944c3?q=80&w=800&auto=format&fit=crop',
            'trust_points' => ['iOS & Android', 'Flutter & React Native', 'User Centric', 'App Store Optimization'],
            'about_text' => 'We create intuitive mobile applications that put your business in the palm of your customers\' hands. Our apps combine stunning design with powerful functionality.',
            'features' => [
                ['title' => 'iOS Development', 'desc' => 'Native Swift applications for the Apple ecosystem.', 'icon' => 'fa-apple'],
                ['title' => 'Android Development', 'desc' => 'Robust Kotlin/Java apps for the widest reach.', 'icon' => 'fa-android'],
                ['title' => 'Cross-Platform', 'desc' => 'Cost-effective Flutter/React Native solutions.', 'icon' => 'fa-layer-group'],
                ['title' => 'UI/UX Design', 'desc' => 'Award-winning interfaces designed for touch.', 'icon' => 'fa-paint-brush'],
                ['title' => 'Real-time Features', 'desc' => 'Chat, Geolocation, and Push Notifications.', 'icon' => 'fa-bell'],
                ['title' => 'Maintenance', 'desc' => 'Ongoing support and updates for OS compatibility.', 'icon' => 'fa-tools']
            ],
            'tech_stack' => ['Swift', 'Kotlin', 'Flutter', 'React Native', 'Firebase'],
            'process' => ['Strategy', 'Prototyping', 'Development', 'Beta Testing', 'Launch'],
            'benefits' => ['Direct Customer Channel', 'Increased Loyalty', 'Offline Functionality', 'Brand Visibility'],
            'use_cases' => [
                'On-Demand Delivery',
                'Social Networking',
                'Fitness & Health',
                'Enterprise Field Tools'
            ],
            'faq' => [
                ['q' => 'Which platform should I choose?', 'a' => 'We recommend starting with Cross-Platform for faster time-to-market.'],
                ['q' => 'Do you handle App Store submission?', 'a' => 'Yes, we manage the entire submission and approval process.']
            ]
        ],
        'custom-application' => [
            'id' => 'custom-application',
            'title' => 'Custom Application',
            'hero_highlight' => 'Tailored Software',
            'subtitle' => 'Bespoke software solutions designed to solve your unique business challenges.',
            'hero_image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=1600&auto=format&fit=crop',
            'about_image' => 'https://images.unsplash.com/photo-1504384308090-c54be3855833?q=80&w=800&auto=format&fit=crop',
            'trust_points' => ['Unique Workflows', 'Legacy Integration', 'Automated Processes', 'Data Insights'],
            'about_text' => 'Off-the-shelf software often falls short. We build custom applications that fit your workflows perfectly, eliminating inefficiencies and manual workarounds.',
            'features' => [
                ['title' => 'Business Logic', 'desc' => 'Encoding your unique operational rules into software.', 'icon' => 'fa-cogs'],
                ['title' => 'Workflow Automation', 'desc' => 'Removing manual bottlenecks through digital automation.', 'icon' => 'fa-robot'],
                ['title' => 'Legacy Modernization', 'desc' => 'Updating old systems without losing critical data.', 'icon' => 'fa-sync'],
                ['title' => 'Data Analytics', 'desc' => 'Custom dashboards to visualize your KPIs.', 'icon' => 'fa-chart-pie'],
                ['title' => 'Role-Based Access', 'desc' => 'Granular security controls for different user levels.', 'icon' => 'fa-user-lock'],
                ['title' => 'API Development', 'desc' => 'Creating interfaces for internal and external connectivity.', 'icon' => 'fa-network-wired']
            ],
            'tech_stack' => ['Python', 'Java', '.NET', 'Angular', 'Docker'],
            'process' => ['Analysis', 'Blueprint', 'Agile Dev', 'Integration', 'Support'],
            'benefits' => ['100% Fit for Purpose', 'Owned IP', 'No Licensing Fees', 'Competitive Advantage'],
            'use_cases' => [
                'Internal Workflow Tools',
                'Legacy System Wrappers',
                'Data Processing Engines',
                'Inventory Management'
            ],
            'faq' => [
                ['q' => 'Do I own the code?', 'a' => 'Yes, for custom development, you own the intellectual property.'],
                ['q' => 'Can you integrate with SAP/Oracle?', 'a' => 'Yes, we specialize in enterprise ERP integrations.']
            ]
        ],
        'web-design' => [
            'id' => 'web-design',
            'title' => 'Web Design',
            'hero_highlight' => 'Visual Identity',
            'subtitle' => 'Crafting immersive digital experiences that captivate and convert.',
            'hero_image' => 'https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?q=80&w=1600&auto=format&fit=crop',
            'about_image' => 'https://images.unsplash.com/photo-1561070791-2526d30994b5?q=80&w=800&auto=format&fit=crop',
            'trust_points' => ['Award Winning', 'User Centric', 'Conversion Focused', 'Brand Aligned'],
            'about_text' => 'Design is more than aesthetics; it is how your brand communicates. We design websites that tell your story and guide users toward action.',
            'features' => [
                ['title' => 'UI Design', 'desc' => 'Pixel-perfect interfaces that look stunning.', 'icon' => 'fa-drafting-compass'],
                ['title' => 'UX Research', 'desc' => 'Data-driven user journeys to minimize friction.', 'icon' => 'fa-users-cog'],
                ['title' => 'Wireframing', 'desc' => 'Structural blueprints to validate concepts early.', 'icon' => 'fa-border-all'],
                ['title' => 'Interaction Design', 'desc' => 'Micro-animations that delight users.', 'icon' => 'fa-mouse-pointer'],
                ['title' => 'Design Systems', 'desc' => 'Consistent component libraries for scalability.', 'icon' => 'fa-swatchbook'],
                ['title' => 'Accessibility', 'desc' => 'WCAG compliant designs usable by everyone.', 'icon' => 'fa-universal-access']
            ],
            'tech_stack' => ['Figma', 'Adobe XD', 'Sketch', 'Photoshop', 'InVision'],
            'process' => ['Research', 'Wireframes', 'Visual Design', 'Click Prototype', 'Handoff'],
            'benefits' => ['Lower Bounce Rate', 'Higher Trust', 'Stronger Brand Recall', 'Better Usability'],
            'use_cases' => [
                'Landing Pages',
                'Marketing Websites',
                'Product Prototypes',
                'Design Systems'
            ],
            'faq' => [
                ['q' => 'Do you provide the graphics?', 'a' => 'Yes, we can create custom illustrations and edit stock imagery.'],
                ['q' => 'Is the design mobile responsive?', 'a' => 'Absolutely, we design mobile-first.']
            ]
        ],
        'brand-design' => [
            'id' => 'brand-design',
            'title' => 'Brand Design',
            'hero_highlight' => 'Brand Strategy',
            'subtitle' => 'Defining your visual and verbal identity to stand out in a crowded market.',
            'hero_image' => 'https://images.unsplash.com/photo-1600607686527-6fb886090705?q=80&w=1600&auto=format&fit=crop',
            'about_image' => 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?q=80&w=800&auto=format&fit=crop',
            'trust_points' => ['Logo Design', 'Brand Guidelines', 'Typography', 'Visual Language'],
            'about_text' => 'A strong brand is your most valuable asset. We help you define who you are, what you stand for, and how you look to the world.',
            'features' => [
                ['title' => 'Logo Design', 'desc' => 'Memorable marks that embody your essence.', 'icon' => 'fa-signature'],
                ['title' => 'Brand Strategy', 'desc' => 'Positioning framework to define your niche.', 'icon' => 'fa-chess'],
                ['title' => 'Style Guides', 'desc' => 'Comprehensive manuals for consistent usage.', 'icon' => 'fa-book'],
                ['title' => 'Typography', 'desc' => 'Selecting fonts that speak your tone.', 'icon' => 'fa-font'],
                ['title' => 'Color Psychology', 'desc' => 'Palettes chosen to evoke specific emotions.', 'icon' => 'fa-palette'],
                ['title' => 'Collateral', 'desc' => 'Business cards, letterheads, and social assets.', 'icon' => 'fa-id-card']
            ],
            'tech_stack' => ['Illustrator', 'Indesign', 'Photoshop', 'After Effects', 'Canva'],
            'process' => ['Discovery', 'Concept', 'Refinement', 'Guidelines', 'Launch'],
            'benefits' => ['Premium Perception', 'Customer Trust', 'Consistent Messaging', 'Market Differentiation'],
            'use_cases' => [
                'Rebranding Campaigns',
                'Startup Launches',
                'Corporate Identity',
                'Digital Marketing Assets'
            ],
            'faq' => [
                ['q' => 'How many logo concepts do I get?', 'a' => 'Typically 3-5 distinct concepts in the initial round.'],
                ['q' => 'Do I get the source files?', 'a' => 'Yes, full vector source files are included.']
            ]
        ],
        'api-development' => [
            'id' => 'api-development',
            'title' => 'API Development',
            'hero_highlight' => 'Connectivity',
            'subtitle' => 'Building secure, scalable APIs to power your digital ecosystem.',
            'hero_image' => 'https://images.unsplash.com/photo-1558494949-ef2bb6db879c?q=80&w=1600&auto=format&fit=crop',
            'about_image' => 'https://images.unsplash.com/photo-1516116216624-53e697fedbea?q=80&w=800&auto=format&fit=crop',
            'trust_points' => ['RESTful', 'GraphQL', 'Secure Auth', 'Documentation'],
            'about_text' => 'APIs are the glue of the modern web. We build high-performance APIs that allow your systems to talk to each other and the world securely.',
            'features' => [
                ['title' => 'REST Architecture', 'desc' => 'Standardized, stateless communication.', 'icon' => 'fa-exchange-alt'],
                ['title' => 'GraphQL', 'desc' => 'Efficient data querying for frontend apps.', 'icon' => 'fa-project-diagram'],
                ['title' => 'OAuth 2.0', 'desc' => 'Industry standard security and authorization.', 'icon' => 'fa-key'],
                ['title' => 'Rate Limiting', 'desc' => 'Protecting your resources from abuse.', 'icon' => 'fa-tachometer-alt'],
                ['title' => 'Documentation', 'desc' => 'Clear Swagger/OpenAPI docs for developers.', 'icon' => 'fa-book-open'],
                ['title' => 'Microservices', 'desc' => 'Decoupling complex systems into manageable services.', 'icon' => 'fa-cubes']
            ],
            'tech_stack' => ['Node.js', 'Go', 'Python', 'Postman', 'Swagger'],
            'process' => ['Spec Design', 'Development', 'Security Audit', 'Testing', 'Publish'],
            'benefits' => ['Faster Integrations', 'Monetization Potential', 'System Decoupling', 'Developer Friendly'],
            'use_cases' => [
                'Mobile App Backends',
                'Partner Integrations',
                'Data Marketplaces',
                'Microservices Communication'
            ],
            'faq' => [
                ['q' => 'Do you support legacy system integration?', 'a' => 'Yes, we can build wrappers around legacy SOAP services.'],
                ['q' => 'How do you handle versioning?', 'a' => 'We use strict versioning policies to prevent breaking changes.']
            ]
        ],
        'saas-application' => [
            'id' => 'saas-application',
            'title' => 'SaaS Application',
            'hero_highlight' => 'Cloud Products',
            'subtitle' => 'Launch your own software product with our end-to-end SaaS development.',
            'hero_image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=1600&auto=format&fit=crop',
            'about_image' => 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?q=80&w=800&auto=format&fit=crop',
            'trust_points' => ['Multi-Tenancy', 'Subscription Billing', 'Scalable', 'Onboarding'],
            'about_text' => 'We help startups and enterprises build scalable SaaS products. From multi-tenant architecture to subscription billing, we handle the complexity.',
            'features' => [
                ['title' => 'Multi-Tenancy', 'desc' => 'Secure data segregation for multiple customers.', 'icon' => 'fa-building'],
                ['title' => 'Billing Engine', 'desc' => 'Stripe/Paddle integration for recurring payments.', 'icon' => 'fa-credit-card'],
                ['title' => 'User Management', 'desc' => 'Role-based access within tenant organizations.', 'icon' => 'fa-users'],
                ['title' => 'Dashboard', 'desc' => 'Analytics and reporting for your users.', 'icon' => 'fa-chart-area'],
                ['title' => 'Onboarding', 'desc' => 'Guided tours to activate new users.', 'icon' => 'fa-compass'],
                ['title' => 'Admin Panel', 'desc' => 'Super-admin tools to manage your platform.', 'icon' => 'fa-cogs']
            ],
            'tech_stack' => ['Laravel', 'Vue.js', 'AWS', 'Stripe', 'Redis'],
            'process' => ['MVP Scope', 'Architecture', 'Development', 'Beta', 'Scale'],
            'benefits' => ['Recurring Revenue', 'Global Scale', 'Automated Sales', 'Low Marginal Cost'],
            'use_cases' => [
                'CRM Platforms',
                'Project Management Tools',
                'Learning Management Systems',
                'Subscription Services'
            ],
            'faq' => [
                ['q' => 'Can you help with MVP?', 'a' => 'Yes, we specialize in rapid MVP development for SaaS startups.'],
                ['q' => 'Do you support cloud deployment?', 'a' => 'We are experts in AWS, Azure, and DigitalOcean deployments.']
            ]
        ],
        'seo-services' => [
            'id' => 'seo-services',
            'title' => 'SEO Services',
            'hero_highlight' => 'Organic Growth',
            'subtitle' => 'Dominate search rankings and drive qualified traffic to your business.',
            'hero_image' => 'https://images.unsplash.com/photo-1571786256017-aee7a0c009b6?q=80&w=1600&auto=format&fit=crop',
            'about_image' => 'https://images.unsplash.com/photo-1432888498266-38ffec3eaf0a?q=80&w=800&auto=format&fit=crop',
            'trust_points' => ['White Hat', 'Technical SEO', 'Content Strategy', 'Backlinking'],
            'about_text' => 'Visibility is key. Our data-driven SEO strategies ensure your brand appears exactly where your customers are looking.',
            'features' => [
                ['title' => 'Keyword Research', 'desc' => 'Finding high-intent terms your customers use.', 'icon' => 'fa-search'],
                ['title' => 'Technical SEO', 'desc' => 'Optimizing site speed, structure, and schema.', 'icon' => 'fa-code'],
                ['title' => 'On-Page Optimization', 'desc' => 'Refining content and meta tags for clarity.', 'icon' => 'fa-file-alt'],
                ['title' => 'Link Building', 'desc' => 'Acquiring high-authority backlinks safely.', 'icon' => 'fa-link'],
                ['title' => 'Local SEO', 'desc' => 'Ranking for "near me" searches and maps.', 'icon' => 'fa-map-marker-alt'],
                ['title' => 'Reporting', 'desc' => 'Transparent monthly reports on rankings and traffic.', 'icon' => 'fa-chart-line'],
            ],
            'tech_stack' => ['Google Search Console', 'Ahrefs', 'Moz', 'Screaming Frog', 'Yoast'],
            'process' => ['Audit', 'Strategy', 'Optimization', 'Content', 'Review'],
            'benefits' => ['Long-term Traffic', 'Higher Credibility', 'Better UX', 'Cost Effective'],
            'use_cases' => [
                'Local Businesses',
                'E-commerce Stores',
                'Content Publishers',
                'Service Providers'
            ],
            'faq' => [
                ['q' => 'How long does SEO take?', 'a' => 'It is a long-term game, typically showing simple results in 3-4 months.'],
                ['q' => 'Is it guaranteed #1 ranking?', 'a' => 'No one can guarantee #1, but we follow best practices to maximize chances.']
            ]
        ]
    ];

    public function index()
    {
        $services = json_decode(json_encode($this->services), true);
        return view('services.index', compact('services'));
    }

    public function show($slug)
    {
        // Load detailed service data from config
        $configServices = config('services_data', []);

        // Merge with existing controller data (Config takes precedence)
        $allServices = array_merge($this->services, $configServices);

        if (!array_key_exists($slug, $allServices)) {
            abort(404);
        }

        $service = (object) $allServices[$slug];

        // Deep decode to object properties for blade
        $service->features = json_decode(json_encode($service->features));

        // Handle optional arrays safely
        $service->trust_points = $service->trust_points ?? [];
        $service->benefits = $service->benefits ?? [];
        $service->tech_stack = $service->tech_stack ?? [];
        $service->process = $service->process ?? [];

        // New Premium Sections
        $service->plans = isset($service->plans) ? json_decode(json_encode($service->plans)) : [];
        $service->case_studies = isset($service->case_studies) ? json_decode(json_encode($service->case_studies)) : [];
        $service->faq = isset($service->faq) ? json_decode(json_encode($service->faq)) : [];

        return view('service_detail', compact('service'));
    }
}
