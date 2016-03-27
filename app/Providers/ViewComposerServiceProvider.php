<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap Variables to Specified View
     *
     * @return void
     */
    public function boot()
    {
        $this->composeNavBar();
        $this->composeFooter();
        $this->composeSidebar();
        // $this->composeCart();
        // $this->composeUserWidget();
        // $this->composeProductWidget();
        // $this->composeReviewWidget();
        // $this->composeCategoryWidget();
        // $this->composeSalesWidget();
        // $this->composeOrderWidget();
        // $this->composeReferralWidget();
        // $this->composePackageWidget();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function composeNavBar()
    {
    view()->composer('partials.navbar', 'App\Http\Composer\Navbar');
    }

    private function composeFooter()
    {
    view()->composer('partials.footer', 'App\Http\Composer\Footer');
    }

    private function composeSidebar()
    {
    view()->composer('partials.footer', 'App\Http\Composer\Sidebar');
    }
}
