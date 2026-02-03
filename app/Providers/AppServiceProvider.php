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
                    // Cache social links for 1 hour
                    $socialLinks = \Illuminate\Support\Facades\Cache::remember('global_social_links', 3600, function () {
                        if (Schema::hasTable('social_links')) {
                            return SocialLink::where('is_active', true)->get();
                        }
                        return collect();
                    });
                    $view->with('global_social_links', $socialLinks);

                    // Cache solutions for 1 hour
                    $solutions = \Illuminate\Support\Facades\Cache::remember('global_solutions', 3600, function () {
                        if (Schema::hasTable('solutions')) {
                            return \App\Models\Solution::where('is_active', true)->get();
                        }
                        return collect();
                    });
                    $view->with('global_solutions', $solutions);

                } catch (\Exception $e) {
                    // Fail silently
                }
            });
        } catch (\Exception $e) {
            View::share('global_settings', []);
        }
    }
}
