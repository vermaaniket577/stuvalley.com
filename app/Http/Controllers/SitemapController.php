<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Industry;
use App\Models\Solution;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

class SitemapController extends Controller
{
    /**
     * Generate the sitemap.xml
     */
    public function index(): Response
    {
        $urls = [];

        // 1. Static Pages
        $staticPages = [
            '',
            '/about',
            '/contact',
            '/careers',
            '/privacy-policy',
            '/terms',
            '/services',
            '/industries',
            '/solutions',
            '/blog',
        ];

        foreach ($staticPages as $page) {
            $urls[] = [
                'loc' => url($page),
                'lastmod' => now()->startOfMonth()->toAtomString(),
                'changefreq' => 'monthly',
                'priority' => ($page === '' ? '1.0' : '0.8'),
            ];
        }

        // 2. Dynamic Services (from ServiceController and Config)
        $serviceController = new \App\Http\Controllers\ServiceController();
        $reflection = new \ReflectionClass($serviceController);
        $property = $reflection->getProperty('services');
        $property->setAccessible(true);
        $defaultServices = $property->getValue($serviceController);
        $configServices = config('services_data', []);
        $allServices = array_merge($defaultServices, $configServices);

        foreach (array_keys($allServices) as $slug) {
            $urls[] = [
                'loc' => route('services.show', $slug),
                'lastmod' => now()->startOfMonth()->toAtomString(),
                'changefreq' => 'monthly',
                'priority' => '0.7',
            ];
        }

        // 3. Dynamic Industries (from IndustryController)
        $industryController = new \App\Http\Controllers\IndustryController();
        $reflection = new \ReflectionClass($industryController);
        $property = $reflection->getProperty('industries');
        $property->setAccessible(true);
        $allIndustries = $property->getValue($industryController);

        foreach (array_keys($allIndustries) as $slug) {
            $urls[] = [
                'loc' => route('industries.show', $slug),
                'lastmod' => now()->startOfMonth()->toAtomString(),
                'changefreq' => 'monthly',
                'priority' => '0.7',
            ];
        }

        // 4. Dynamic Solutions (from SolutionController)
        $solutionController = new \App\Http\Controllers\SolutionController();
        $reflection = new \ReflectionClass($solutionController);
        $property = $reflection->getProperty('solutions');
        $property->setAccessible(true);
        $allSolutions = $property->getValue($solutionController);

        foreach (array_keys($allSolutions) as $slug) {
            $urls[] = [
                'loc' => route('solutions.show', $slug),
                'lastmod' => now()->startOfMonth()->toAtomString(),
                'changefreq' => 'monthly',
                'priority' => '0.7',
            ];
        }

        // 5. Dynamic Blog Posts
        $posts = BlogPost::where('is_published', true)->get();
        foreach ($posts as $post) {
            $urls[] = [
                'loc' => route('blog.show', $post->slug),
                'lastmod' => $post->updated_at->toAtomString(),
                'changefreq' => 'weekly',
                'priority' => '0.6',
            ];
        }

        return response()->view('sitemap', compact('urls'))
            ->header('Content-Type', 'text/xml');
    }
}
