<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use App\Models\Setting;
use App\Models\SocialLink;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        try {
            // Cache settings for 24 hours to reduce load
            $settings = \Illuminate\Support\Facades\Cache::remember('global_settings', 86400, function () {
                if (Schema::hasTable('settings')) {
                    return Setting::all()->pluck('value', 'key')->toArray();
                }
                return [];
            });
            View::share('global_settings', $settings);

            View::composer('*', function ($view) {
                try {
                    // Social Links
                    $socialLinks = \Illuminate\Support\Facades\Cache::remember('global_social_links', 3600, function () {
                        return Schema::hasTable('social_links') ? SocialLink::where('is_active', true)->get() : collect();
                    });
                    $view->with('global_social_links', $socialLinks);

                    // Solutions
                    $solutions = \Illuminate\Support\Facades\Cache::remember('global_solutions', 3600, function () {
                        return Schema::hasTable('solutions') ? \App\Models\Solution::where('is_active', true)->get() : collect();
                    });
                    $view->with('global_solutions', $solutions);

                } catch (\Exception $e) {
                    // Fail silently
                }
            });
        } catch (\Exception $e) {
            View::share('global_settings', []);
        }

        // Independent logic for Sidebar Notifications (always runs even if settings fail)
        View::composer('*', function ($view) {
            try {
                $pendingCvCount = 0;

                if (Schema::hasTable('job_applications')) {
                    // Reset logic: Only count applications that are NOT seen yet
                    if (Schema::hasColumn('job_applications', 'is_seen')) {
                        $pendingCvCount = \App\Models\JobApplication::where('is_seen', false)->count();
                    } else if (Schema::hasColumn('job_applications', 'status')) {
                        // Fallback: If migration hasn't run, count all pending ones
                        $pendingCvCount = \App\Models\JobApplication::where('status', 'pending')->count();
                    }
                }

                $view->with('pending_cv_count', $pendingCvCount);

                // Ensure global_social_links is shared if composer runs
                if (!isset($view->global_social_links)) {
                    $socialLinks = \Illuminate\Support\Facades\Cache::remember('global_social_links', 3600, function () {
                        return Schema::hasTable('social_links') ? \App\Models\SocialLink::where('is_active', true)->get() : collect();
                    });
                    $view->with('global_social_links', $socialLinks);
                }

            } catch (\Exception $e) {
                $view->with('pending_cv_count', 0);
            }
        });
    }
}
