# ALL CODE FILES FOR COPY-PASTE

## 📁 Complete Code Listing

Copy each section below to the corresponding file on your live website.

---

## FILE 1: Product Model
**Location:** `app/Models/Product.php`
**Action:** Create new file

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title', 'slug', 'category', 'short_description', 'full_description',
        'value_proposition', 'banner_image', 'featured_image', 'features',
        'tech_stack', 'gallery', 'industry', 'demo_url', 'icon', 'color_scheme',
        'sort_order', 'is_active', 'is_featured', 'views',
    ];

    protected $casts = [
        'features' => 'array',
        'tech_stack' => 'array',
        'gallery' => 'array',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'views' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->title);
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('created_at', 'desc');
    }

    public function getBannerImageUrlAttribute()
    {
        if (empty($this->banner_image)) {
            return 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=1600&auto=format&fit=crop';
        }
        if (filter_var($this->banner_image, FILTER_VALIDATE_URL)) {
            return $this->banner_image;
        }
        return asset('storage/' . $this->banner_image);
    }

    public function getFeaturedImageUrlAttribute()
    {
        if (empty($this->featured_image)) {
            return 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=800&auto=format&fit=crop';
        }
        if (filter_var($this->featured_image, FILTER_VALIDATE_URL)) {
            return $this->featured_image;
        }
        return asset('storage/' . $this->featured_image);
    }

    public function getCategoryColorAttribute()
    {
        $colors = [
            'E-Commerce' => '#3b82f6',
            'Corporate' => '#8b5cf6',
            'FinTech' => '#10b981',
            'EdTech' => '#f59e0b',
            'Healthcare' => '#ef4444',
            'SaaS' => '#06b6d4',
        ];
        return $colors[$this->category] ?? '#3b82f6';
    }

    public function getUrlAttribute()
    {
        return route('products.show', $this->slug);
    }

    public function incrementViews()
    {
        $this->increment('views');
    }
}
```

---

## FILE 2: Product Controller (Public)
**Location:** `app/Http/Controllers/ProductController.php`
**Action:** Create new file

```php
<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::active()->ordered()->get();
        return view('products.index', compact('products'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $product->incrementViews();

        $relatedProducts = Product::active()
            ->where('category', $product->category)
            ->where('id', '!=', $product->id)
            ->ordered()
            ->limit(3)
            ->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }

    public function category($category)
    {
        $products = Product::active()
            ->where('category', $category)
            ->ordered()
            ->get();

        return view('products.index', compact('products', 'category'));
    }
}
```

---

## FILE 3: Routes Update
**Location:** `routes/web.php`
**Action:** ADD these lines (don't replace entire file)

**Add after line 70:**
```php
// Products Routes
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
Route::get('/products/category/{category}', [App\Http\Controllers\ProductController::class, 'category'])->name('products.category');
Route::get('/products/{slug}', [App\Http\Controllers\ProductController::class, 'show'])->name('products.show');
```

**Add inside admin group (before closing `});` around line 194):**
```php
    // Products Management
    Route::resource('products', App\Http\Controllers\Admin\ProductController::class)->names('admin.products');
```

---

## FILE 4: Database Migration
**Location:** `database/migrations/2026_02_09_095726_create_products_table.php`
**Action:** Create new file

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category');
            $table->text('short_description');
            $table->longText('full_description');
            $table->text('value_proposition')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('featured_image')->nullable();
            $table->json('features')->nullable();
            $table->json('tech_stack')->nullable();
            $table->json('gallery')->nullable();
            $table->string('industry')->nullable();
            $table->string('demo_url')->nullable();
            $table->string('icon')->nullable();
            $table->string('color_scheme')->default('#3b82f6');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->integer('views')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
```

---

## FILE 5: Database Seeder
**Location:** `database/seeders/ProductSeeder.php`
**Action:** Create new file

```php
<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
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
```

---

## 🔧 DEPLOYMENT COMMANDS

Run these commands on your live server:

```bash
# Navigate to project
cd /path/to/your/project

# Run migration
php artisan migrate

# Seed data
php artisan db:seed --class=ProductSeeder

# Clear caches
php artisan cache:clear
php artisan route:clear
php artisan config:clear
php artisan view:clear
```

---

**All code is ready to copy! Just paste into the correct files and run the commands.** ✅
