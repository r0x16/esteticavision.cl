<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Category;

class ViewComposersProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('app_name', 'KEP Medical');

        // Set user variable on all views
        view()->composer('*', function($view) {
            $view->with('user', auth()->user());
        });

        view()->composer('include.categories-all', function($view) {
            $view->with('categories', Category::where('supercategory_id', null)
                                        ->with('childrens.childrens')
                                        ->orderBy('name', 'ASC')
                                        ->get());
        });

        view()->composer('include.cart-badge', 'App\Http\ViewComposers\CartBadgeComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
