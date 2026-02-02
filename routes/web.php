<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SocialLinkController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Professional Redirects for legacy .php extension
Route::redirect('/services.php', '/services', 301);
Route::redirect('/about.php', '/about', 301);
Route::redirect('/contact.php', '/contact', 301);
Route::redirect('/index.php', '/', 301);
Route::redirect('/careers.php', '/careers', 301);
Route::redirect('/blog.php', '/blog', 301);
Route::redirect('/solutions.php', '/solutions', 301);
Route::redirect('/industries.php', '/industries', 301);


Route::get('/', function () {
    $partners = \Illuminate\Support\Facades\Cache::remember('home_partners', 3600, function () {
        return \App\Models\Partner::where('is_active', true)->orderBy('sort_order')->get();
    });

    $industries = \Illuminate\Support\Facades\Cache::remember('home_industries', 3600, function () {
        return \App\Models\Industry::where('is_active', true)->orderBy('sort_order')->get();
    });

    $global_solutions = \Illuminate\Support\Facades\Cache::remember('home_solutions', 3600, function () {
        return \App\Models\Solution::all();
    });

    $pricing_plans = \Illuminate\Support\Facades\Cache::remember('home_pricing', 3600, function () {
        return \App\Models\PricingPlan::orderBy('sort_order')->get();
    });

    $blog_posts = \Illuminate\Support\Facades\Cache::remember('home_blogs', 3600, function () {
        return \App\Models\BlogPost::published()->latest('published_at')->limit(3)->get();
    });

    return view('home', compact('partners', 'industries', 'global_solutions', 'pricing_plans', 'blog_posts'));
});

Route::get('/about', [App\Http\Controllers\CompanyController::class, 'about'])->name('about');
Route::get('/contact', [App\Http\Controllers\CompanyController::class, 'contact'])->name('contact');
Route::get('/careers', [App\Http\Controllers\CompanyController::class, 'careers'])->name('careers');
Route::get('/privacy-policy', [App\Http\Controllers\CompanyController::class, 'privacy'])->name('privacy');
Route::get('/terms', [App\Http\Controllers\CompanyController::class, 'terms'])->name('terms');

Route::get('/services', [App\Http\Controllers\ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{slug}', [App\Http\Controllers\ServiceController::class, 'show'])->name('services.show');

// Industries Routes
Route::get('/industries', [App\Http\Controllers\IndustryController::class, 'index'])->name('industries.index');
Route::get('/industries/{slug}', [App\Http\Controllers\IndustryController::class, 'show'])->name('industries.show');

// Solutions Routes
Route::get('/solutions', [App\Http\Controllers\SolutionController::class, 'index'])->name('solutions.index');
Route::get('/solutions/{slug}', [App\Http\Controllers\SolutionController::class, 'show'])->name('solutions.show');

// Blog Routes (Public)
Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [App\Http\Controllers\BlogController::class, 'show'])->name('blog.show');


// Contact Form
Route::post('/contact/submit', [App\Http\Controllers\ContactController::class, 'submit'])->name('contact.submit');

// Deployment Helper (cPanel)
Route::get('/deploy-helper', function () {
    try {
        Artisan::call('storage:link');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('cache:clear');
        return "System Optimized and Storage Linked! <br><br> <a href='/'>Go to Home</a>";
    } catch (\Exception $e) {
        return "Error: " . $e->getMessage();
    }
});


Route::get('/sitemap.xml', [App\Http\Controllers\SitemapController::class, 'index'])->name('sitemap');

// Authentication Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Admin Routes
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect()->route('dashboard');
    });
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // Settings
    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::post('/settings', [AdminController::class, 'updateSettings'])->name('admin.settings.update');

    // WhatsApp
    Route::get('/whatsapp', [AdminController::class, 'whatsapp'])->name('admin.whatsapp');

    // SEO Manager
    Route::get('/seo', [App\Http\Controllers\SeoController::class, 'index'])->name('admin.seo');
    Route::post('/seo', [App\Http\Controllers\SeoController::class, 'store'])->name('admin.seo.store');
    Route::get('/seo/data/{page}', [App\Http\Controllers\SeoController::class, 'getData'])->name('admin.seo.data');

    // Social Links
    Route::resource('social-links', SocialLinkController::class);

    // Testimonials
    Route::resource('testimonials', TestimonialController::class);

    // Leads
    Route::resource('leads', App\Http\Controllers\Admin\LeadController::class)->names('admin.leads');

    // Solutions & Partners
    Route::resource('solutions', App\Http\Controllers\Admin\SolutionController::class)->names('admin.solutions');
    Route::resource('partners', App\Http\Controllers\PartnerController::class)->names('admin.partners');
    Route::resource('industries', App\Http\Controllers\Admin\IndustryController::class)->names('admin.industries');

    // Blog Management
    Route::resource('blog', App\Http\Controllers\Admin\BlogController::class)->names('admin.blog');

    // Career Management
    Route::resource('careers', App\Http\Controllers\Admin\CareerController::class)->names('admin.careers');

    // Team Member Management
    Route::resource('team', App\Http\Controllers\Admin\TeamMemberController::class)->names('admin.team');

    // Pricing Plans
    Route::resource('pricing', App\Http\Controllers\Admin\PricingPlanController::class)->names('admin.pricing');
});

// Demo Preview
Route::get('/demo-preview', function () {
    return view('demo_preview');
});
