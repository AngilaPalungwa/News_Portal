<?php

namespace App\Providers;

use App\Models\Ads;
use App\Models\Category;
use App\Models\Company;
use Illuminate\Pagination\Paginator;
use View;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        view()->composer(['backend.common.sidebar', 'backend.common.navbar', 'backend.layout.master'], function ($view) {
            $data['company'] = Company::first();
            $view->with($data);
        });
        view()->composer(['frontend.index'], function ($view) {
            $data['company'] = Company::first();
            $data['categories'] = Category::take(10)->get();
            $view->with($data);
        });

        $top_ads = Ads::where('ads_category', 'topbar_ads')->first();
        $header_ads = Ads::where('ads_category', 'header_ads')->first();
        $sidebar_ads = Ads::where('ads_category', 'sidebar_ads')->first();
        $bottom_ads = Ads::where('ads_category', 'bottom_ads')->first();
        View::share('top_ads',$top_ads);
        View::share('header_ads',$header_ads);
        View::share('sidebar_ads',$sidebar_ads);
        View::share('bottom_ads',$bottom_ads);
    }
}
