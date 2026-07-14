<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        // Share the active category tree with the header menu on every page.
        View::composer('layouts.main-headerbar', function ($view): void {
            $navCategories = Cache::remember('nav_categories', 300, function () {
                return Category::query()
                    ->where('is_active', true)
                    ->with(['activeSubcategories'])
                    ->orderBy('sort_order')
                    ->orderBy('name')
                    ->get();
            });

            $navBrands = Cache::remember('nav_brands', 300, function () {
                return Brand::query()
                    ->where('is_active', true)
                    ->orderBy('sort_order')
                    ->orderBy('name')
                    ->get();
            });

            $view->with('navCategories', $navCategories);
            $view->with('navBrands', $navBrands);
        });
    }
}
