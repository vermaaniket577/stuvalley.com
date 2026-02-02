<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SolutionController extends Controller
{
    private $solutions = [
        'erp-solution' => [
            'id' => 'erp-solution',
            'title' => 'ERP Solution',
            'hero_highlight' => 'Enterprise Resource Planning',
            'subtitle' => 'Integrated management of main business processes, often in real-time and mediated by software.',
            'hero_image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=1600&auto=format&fit=crop',
            'about_image' => 'https://images.unsplash.com/photo-1504384308090-c54be3855833?q=80&w=800&auto=format&fit=crop',
            'trust_points' => ['Centralized Data', 'Automated Workflows', 'Real-time Reporting', 'Scalable Modules'],
            'about_text' => 'Our ERP solutions unify your business data into a single source of truth. From supply chain to HR, finance to sales, we connect every department for seamless operations.',
            'features' => [
                ['title' => 'Finance & Accounting', 'desc' => 'General ledger, accounts payable/receivable, and forecasting.', 'icon' => 'fa-coins'],
                ['title' => 'Supply Chain', 'desc' => 'Inventory management, procurement, and logistics optimization.', 'icon' => 'fa-truck'],
                ['title' => 'HR Management', 'desc' => 'Payroll, recruitment, and employee performance tracking.', 'icon' => 'fa-users'],
                ['title' => 'CRM Integration', 'desc' => 'Connect sales and support directly to operations.', 'icon' => 'fa-handshake'],
                ['title' => 'Project Management', 'desc' => 'Resource allocation and timeline tracking.', 'icon' => 'fa-tasks'],
                ['title' => 'Business Intelligence', 'desc' => 'Advanced analytics and custom reporting dashboards.', 'icon' => 'fa-chart-line']
            ],
            'tech_stack' => ['Laravel', 'Python', 'PostgreSQL', 'Redis', 'Docker'],
            'process' => ['Requirement Analysis', 'Module Selection', 'Customization', 'Data Migration', 'Training'],
            'benefits' => ['360° Business View', 'Reduced Operational Costs', 'Improved Efficiency', 'Data Security'],
            'faq' => [
                ['q' => 'Is it cloud-based?', 'a' => 'Yes, we offer both cloud-hosted and on-premise ERP solutions.'],
                ['q' => 'Can it integrate with existing tools?', 'a' => 'Absolutely, our ERP connects with APIs from Salesforce, Slack, etc.']
            ]
        ],
        'cms-solution' => [
            'id' => 'cms-solution',
            'title' => 'CMS Solution',
            'hero_highlight' => 'Content Management',
            'subtitle' => 'Empower your team to manage digital content without writing a single line of code.',
            'hero_image' => 'https://images.unsplash.com/photo-1432888498266-38ffec3eaf0a?q=80&w=1600&auto=format&fit=crop',
            'about_image' => 'https://images.unsplash.com/photo-1499951360447-b19be8fe80f5?q=80&w=800&auto=format&fit=crop',
            'trust_points' => ['Headless CMS', 'SEO Ready', 'Multi-Language', 'Role Management'],
            'about_text' => 'We build flexible Content Management Systems that give you total control over your website. Whether you need a headless CMS for omnichannel delivery or a traditional monolithic setup.',
            'features' => [
                ['title' => 'Visual Editor', 'desc' => 'Drag-and-drop page builders for easy editing.', 'icon' => 'fa-edit'],
                ['title' => 'Headless Architecture', 'desc' => 'Decoupled frontend for faster performance.', 'icon' => 'fa-network-wired'],
                ['title' => 'Media Library', 'desc' => 'Centralized asset management for images and videos.', 'icon' => 'fa-images'],
                ['title' => 'SEO Tools', 'desc' => 'Built-in meta tags, sitemaps, and schema generation.', 'icon' => 'fa-search'],
                ['title' => 'User Roles', 'desc' => 'Granular permissions for editors, authors, and admins.', 'icon' => 'fa-user-lock'],
                ['title' => 'Versioning', 'desc' => 'Track changes and rollback to previous versions.', 'icon' => 'fa-history']
            ],
            'tech_stack' => ['WordPress', 'Strapi', 'Laravel Nova', 'Contentful', 'React'],
            'process' => ['Audit', 'Migration Strategy', 'Theme Dev', 'Plugin Dev', 'Training'],
            'benefits' => ['Faster Content Velocity', 'Reduced Dev Dependency', 'Better SEO', 'Omnichannel Ready'],
            'faq' => [
                ['q' => 'Is WordPress secure?', 'a' => 'With our hardened security protocols and custom hosting, yes.'],
                ['q' => 'Can I migrate from another CMS?', 'a' => 'Yes, we specialize in data migration from Drupal, Joomla, etc.']
            ]
        ],
        'crm-solution' => [
            'id' => 'crm-solution',
            'title' => 'CRM Solution',
            'hero_highlight' => 'Customer Relations',
            'subtitle' => 'Build stronger relationships and close more deals with intelligent CRM software.',
            'hero_image' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?q=80&w=1600&auto=format&fit=crop',
            'about_image' => 'https://images.unsplash.com/photo-1556761175-5973dc0f32e7?q=80&w=800&auto=format&fit=crop',
            'trust_points' => ['Sales Pipeline', 'Automation', 'Lead Scoring', 'Email Integration'],
            'about_text' => 'Stop losing leads. Our Customer Relationship Management solutions help you track every interaction, automate follow-ups, and visualize your sales pipeline.',
            'features' => [
                ['title' => 'Contact Management', 'desc' => '360-degree view of every customer interaction.', 'icon' => 'fa-address-book'],
                ['title' => 'Sales Pipeline', 'desc' => 'Visual kanban boards to track deal stages.', 'icon' => 'fa-funnel-dollar'],
                ['title' => 'Email Integration', 'desc' => 'Sync with Gmail/Outlook for seamless logging.', 'icon' => 'fa-envelope'],
                ['title' => 'Lead Scoring', 'desc' => 'AI-driven prioritization of high-value prospects.', 'icon' => 'fa-star'],
                ['title' => 'Automation', 'desc' => 'Trigger emails and tasks based on user behavior.', 'icon' => 'fa-robot'],
                ['title' => 'Mobile App', 'desc' => 'Access your data on the go.', 'icon' => 'fa-mobile-alt']
            ],
            'tech_stack' => ['Laravel', 'Vue.js', 'MySQL', 'SendGrid', 'Twilio'],
            'process' => ['Workflow Mapping', 'Data Import', 'Customization', 'Integration', 'Onboarding'],
            'benefits' => ['30% Higher Conversion', 'Better Retention', 'Team Alignment', 'Data Insights'],
            'faq' => [
                ['q' => 'Is it expensive?', 'a' => 'We build custom CRMs that are often cheaper than Enterprise Salesforce licenses.'],
                ['q' => 'Can it integrate with my website?', 'a' => 'Yes, we capture leads directly from your web forms.']
            ]
        ],
        'lms-solution' => [
            'id' => 'lms-solution',
            'title' => 'LMS Solution',
            'hero_highlight' => 'E-Learning',
            'subtitle' => 'Deliver engaging online courses and training programs.',
            'hero_image' => 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?q=80&w=1600&auto=format&fit=crop',
            'about_image' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=800&auto=format&fit=crop',
            'trust_points' => ['Interactive Courses', 'Certificates', 'Quizzes', 'Performance Tracking'],
            'about_text' => 'Whether for corporate training or selling courses online, our Learning Management Systems provide a robust environment for education.',
            'features' => [
                ['title' => 'Course Builder', 'desc' => 'Drag-and-drop curriculum creation.', 'icon' => 'fa-layer-group'],
                ['title' => 'Live Classes', 'desc' => 'Integration with Zoom/Teams for webinars.', 'icon' => 'fa-video'],
                ['title' => 'Gamification', 'desc' => 'Badges, points, and leaderboards to boost engagement.', 'icon' => 'fa-trophy'],
                ['title' => 'Certificates', 'desc' => 'Auto-generate certificates upon completion.', 'icon' => 'fa-certificate'],
                ['title' => 'Quizzes & Assignments', 'desc' => 'Assessment tools to verify knowledge.', 'icon' => 'fa-clipboard-check'],
                ['title' => 'Student Portal', 'desc' => 'Dashboard for progress tracking.', 'icon' => 'fa-user-graduate']
            ],
            'tech_stack' => ['Laravel', 'Moodle', 'React', 'AWS S3', 'Vimeo'],
            'process' => ['Curriculum Design', 'Platform Setup', 'Content Upload', 'UAT', 'Launch'],
            'benefits' => ['Scalable Learning', 'Passive Income', 'Employee Upskilling', 'Global Reach'],
            'faq' => [
                ['q' => 'Do you support SCORM?', 'a' => 'Yes, our LMS is SCORM compliant.'],
                ['q' => 'Can I sell courses?', 'a' => 'Yes, we integrate payment gateways like Stripe and PayPal.']
            ]
        ],
        'hrm-solution' => [
            'id' => 'hrm-solution',
            'title' => 'HRM Solution',
            'hero_highlight' => 'Human Resources',
            'subtitle' => 'Automate HR processes and focus on your people.',
            'hero_image' => 'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?q=80&w=1600&auto=format&fit=crop',
            'about_image' => 'https://images.unsplash.com/photo-1551836022-d5d88e9218df?q=80&w=800&auto=format&fit=crop',
            'trust_points' => ['Payroll', 'Attendance', 'Recruitment', 'Employee Self-Service'],
            'about_text' => 'From hiring to retiring, manage the entire employee lifecycle with our Human Resource Management software. Reduce paperwork and improve compliance.',
            'features' => [
                ['title' => 'Payroll Processing', 'desc' => 'Automated salary calculation and tax generation.', 'icon' => 'fa-file-invoice-dollar'],
                ['title' => 'Leave Management', 'desc' => 'Approval workflows for time-off requests.', 'icon' => 'fa-calendar-check'],
                ['title' => 'Recruitment', 'desc' => 'ATS to manage job postings and candidates.', 'icon' => 'fa-user-plus'],
                ['title' => 'Performance', 'desc' => 'KPI tracking and appraisal systems.', 'icon' => 'fa-chart-bar'],
                ['title' => 'Document Vault', 'desc' => 'Secure storage for employee contracts.', 'icon' => 'fa-folder-open'],
                ['title' => 'Biometric Sync', 'desc' => 'Link with attendance devices.', 'icon' => 'fa-fingerprint']
            ],
            'tech_stack' => ['Laravel', 'Vue.js', 'MySQL', 'AWS', 'Redis'],
            'process' => ['Policy Config', 'Data Migration', 'Integration', 'Training', 'Go Live'],
            'benefits' => ['Error-Free Payroll', 'Compliance', 'Better Culture', 'Time Saving'],
            'faq' => [
                ['q' => 'Is data secure?', 'a' => 'Yes, we use bank-level encryption for all sensitive HR data.'],
                ['q' => 'Can employees access it?', 'a' => 'Yes, via a dedicated mobile-friendly employee portal.']
            ]
        ],
        'pos-solution' => [
            'id' => 'pos-solution',
            'title' => 'POS Solution',
            'hero_highlight' => 'Retail Tech',
            'subtitle' => 'Speed up checkout and manage inventory with cloud-based POS.',
            'hero_image' => 'https://images.unsplash.com/photo-1556742049-0cfed4f7a07d?q=80&w=1600&auto=format&fit=crop',
            'about_image' => 'https://images.unsplash.com/photo-1528698827591-e19ccd7bc23d?q=80&w=800&auto=format&fit=crop',
            'trust_points' => ['Offline Mode', 'Multi-Store', 'Barcode Sync', 'Analytics'],
            'about_text' => 'Simplify your retail operations. Our POS software handles sales, inventory, and customer loyalty in one intuitive interface.',
            'features' => [
                ['title' => 'Fast Billing', 'desc' => 'Quick scan and print for high-volume stores.', 'icon' => 'fa-cash-register'],
                ['title' => 'Inventory Sync', 'desc' => 'Real-time stock updates across all locations.', 'icon' => 'fa-box-open'],
                ['title' => 'Offline Support', 'desc' => 'Keep selling even when the internet goes down.', 'icon' => 'fa-wifi'],
                ['title' => 'Loyalty Program', 'desc' => 'Points and rewards to retain customers.', 'icon' => 'fa-gift'],
                ['title' => 'Hardware Support', 'desc' => 'Compatible with scanners, printers, and weights.', 'icon' => 'fa-print'],
                ['title' => 'Reporting', 'desc' => 'Daily sales, profit, and tax reports.', 'icon' => 'fa-file-invoice']
            ],
            'tech_stack' => ['Electron', 'React', 'Node.js', 'SQLite', 'Firebase'],
            'process' => ['Setup', 'Catalog Upload', 'Staff Training', 'Hardware Setup', 'Launch'],
            'benefits' => ['Faster Checkout', 'No Stockouts', 'Data Accuracy', 'Customer Insights'],
            'faq' => [
                ['q' => 'Do I need special hardware?', 'a' => 'It works on standard PCs, tablets, and specialized POS machines.'],
                ['q' => 'Is it compatible with iPad?', 'a' => 'Yes, we have a dedicated iPad application.']
            ]
        ]
    ];

    public function index()
    {
        $solutions = json_decode(json_encode($this->solutions));
        return view('solutions.index', compact('solutions'));
    }

    public function show($slug)
    {
        if (!array_key_exists($slug, $this->solutions)) {
            abort(404);
        }

        $service = (object) $this->solutions[$slug];

        // Deep decode
        $service->features = json_decode(json_encode($service->features));
        $service->faq = json_decode(json_encode($service->faq ?? []));

        // Reuse service_detail view
        return view('service_detail', compact('service'));
    }
}
