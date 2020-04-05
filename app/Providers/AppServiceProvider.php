<?php

namespace App\Providers;

use App\Model\admin\Category;
use App\Model\front\City;
use App\Model\front\District;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
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
        $categories=Category::all();
        view()->share('categories', $categories);
        $cities=City::all();
        view()->share('cities', $cities);
        $districts=District::all();
        view()->share('districts', $districts);
        Schema::defaultStringLength(191);
    }
}
