<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SocialLinkController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Artisan;

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

    $featured_products = \Illuminate\Support\Facades\Cache::remember('home_featured_products', 3600, function () {
        return \App\Models\Product::where('is_featured', true)
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->limit(6)
            ->get();
    });

    $blog_posts = \App\Models\BlogPost::published()->latest('published_at')->limit(3)->get();

    return view('home', compact('partners', 'industries', 'global_solutions', 'pricing_plans', 'blog_posts', 'featured_products'));
})->name('home');

Route::get('/about', [App\Http\Controllers\CompanyController::class, 'about'])->name('about');
Route::get('/contact', [App\Http\Controllers\CompanyController::class, 'contact'])->name('contact');
Route::get('/careers', [App\Http\Controllers\CompanyController::class, 'careers'])->name('careers');
Route::get('/jobs/{slug}', [App\Http\Controllers\JobController::class, 'show'])->name('jobs.show');
Route::get('/jobs/{slug}/apply', [App\Http\Controllers\JobController::class, 'showApplyPage'])->name('jobs.apply.page');
Route::post('/jobs/{slug}/apply', [App\Http\Controllers\JobController::class, 'apply'])->name('jobs.apply');
Route::get('/privacy-policy', [App\Http\Controllers\CompanyController::class, 'privacy'])->name('privacy');
Route::get('/terms', [App\Http\Controllers\CompanyController::class, 'terms'])->name('terms');

Route::get('/services', [App\Http\Controllers\ServiceController::class, 'index'])->name('services.index');
Route::get('/services/digital-marketing', function () {
    return view('services.digital-marketing');
})->name('services.digital-marketing');
Route::get('/services/{slug}', [App\Http\Controllers\ServiceController::class, 'show'])->name('services.show');

// Industries Routes
Route::get('/industries', [App\Http\Controllers\IndustryController::class, 'index'])->name('industries.index');
Route::get('/industries/{slug}', [App\Http\Controllers\IndustryController::class, 'show'])->name('industries.show');

// Solutions Routes
Route::get('/solutions', [App\Http\Controllers\SolutionController::class, 'index'])->name('solutions.index');
Route::get('/solutions/{slug}', [App\Http\Controllers\SolutionController::class, 'show'])->name('solutions.show');

// Products Routes
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
Route::get('/products/category/{category}', [App\Http\Controllers\ProductController::class, 'category'])->name('products.category');
Route::get('/products/{slug}', [App\Http\Controllers\ProductController::class, 'show'])->name('products.show');

// Blog Routes (Public)
Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [App\Http\Controllers\BlogController::class, 'show'])->name('blog.show');


// Contact Form
Route::post('/contact/submit', [App\Http\Controllers\ContactController::class, 'submit'])->name('contact.submit');
Route::post('/enquiry-submit', [App\Http\Controllers\EnquiryController::class, 'store'])->name('enquiry.submit');

// Get a Quote
Route::get('/get-a-quote', [App\Http\Controllers\QuoteController::class, 'index'])->name('quote.index');
Route::post('/get-a-quote/submit', [App\Http\Controllers\QuoteController::class, 'store'])->name('quote.store');

Route::get('/deploy-helper', function () {
    try {
        Artisan::call('storage:link');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('cache:clear');

        $output = "<h1>Professional Deployment Diagnosis</h1>";
        $output .= "<b>Status:</b> System Optimized and Storage Linked!<br><br>";

        $output .= "<h3>Path Environment:</h3>";
        $output .= "<b>Base Path:</b> " . base_path() . "<br>";
        $output .= "<b>Public Path:</b> " . public_path() . "<br>";
        $output .= "<b>Storage Path:</b> " . storage_path() . "<br>";
        $output .= "<b>APP_URL:</b> " . env('APP_URL') . "<br>";

        $output .= "<h3>Image Logic Debug:</h3>";
        $post = \App\Models\BlogPost::latest()->first();
        if ($post) {
            $output .= "<b>Latest Post ID:</b> " . $post->id . "<br>";
            $output .= "<b>DB 'featured_image' field:</b> " . htmlspecialchars($post->featured_image) . "<br>";

            $url = $post->featured_image_url;
            $output .= "<b>Model accessor 'featured_image_url':</b> <a href='$url' target='_blank'>$url</a><br>";

            // Check various possible physical locations
            $test_paths = [
                'Direct Path' => public_path($post->featured_image),
                'Inside Public' => public_path('public/' . $post->featured_image),
                'Laravel Storage' => storage_path('app/public/' . str_replace('storage/', '', $post->featured_image)),
            ];

            $output .= "<h4>Physical File Locators:</h4>";
            foreach ($test_paths as $label => $path) {
                $exists = file_exists($path);
                $output .= "<b>$label:</b> " . ($exists ? "✅ EXISTS" : "❌ NOT FOUND") . " <small>($path)</small><br>";
            }

            // Check permissions of the directory
            $img_dir = public_path('images/blog');
            if (is_dir($img_dir)) {
                $output .= "<br><b>Images Directory Perms:</b> " . substr(sprintf('%o', fileperms($img_dir)), -4) . "<br>";
            } else {
                $output .= "<br><b>Images Directory:</b> ❌ NOT A DIRECTORY ($img_dir)<br>";
            }

        } else {
            $output .= "No blog posts found in database.";
        }

        $output .= "<br><hr><a href='/'>Go to Home</a>";
        return $output;
    } catch (\Exception $e) {
        return "Error: " . $e->getMessage() . "<br><pre>" . $e->getTraceAsString() . "</pre>";
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
    Route::get('/job-applications', [App\Http\Controllers\Admin\JobApplicationController::class, 'index'])->name('admin.job-applications.index');
    Route::get('/job-applications/download/{id}', [App\Http\Controllers\Admin\JobApplicationController::class, 'download'])->name('admin.job-applications.download');
    Route::get('/job-applications/{id}', [App\Http\Controllers\Admin\JobApplicationController::class, 'show'])->name('admin.job-applications.show');
    Route::delete('/job-applications/{id}', [App\Http\Controllers\Admin\JobApplicationController::class, 'destroy'])->name('admin.job-applications.destroy');

    // Team Member Management
    Route::resource('team', App\Http\Controllers\Admin\TeamMemberController::class)->names('admin.team');

    // Pricing Plans
    Route::resource('pricing', App\Http\Controllers\Admin\PricingPlanController::class)->names('admin.pricing');

    // Products Management
    Route::resource('products', App\Http\Controllers\Admin\ProductController::class)->names('admin.products');

    // Enquiry Management
    Route::resource('enquiries', App\Http\Controllers\Admin\EnquiryController::class)->names('admin.enquiries');
});

// Demo Preview
Route::get('/demo-preview', function () {
    return view('demo_preview');
});
