<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Company;
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
        view()->composer(['backend.common.sidebar', 'backend.common.navbar'], function ($view){
            $data['company']=Company::first();
            $view->with($data);
        });
        view()->composer(['frontend.index'], function ($view){
            $data['company']=Company::first();
            // $categories = Category::where('status', true)->get();
            $data['categories'] =Category::take(10)->get();
            $view->with($data);
        });
    }
}
