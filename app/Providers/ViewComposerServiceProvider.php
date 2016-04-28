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
        $this->composeHeader();
        $this->composeSidebar();
        $this->composeMenu();
        $this->composeProduct();
        $this->composeFilterCategoryList();
        $this->composeFilterPricing();
        $this->composeFilterReviewCount();
        $this->composeFilterPopular();
        $this->composeFilterStarrating();
        $this->composeFilterPricerange();

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

    private function composeHeader()
    {
    view()->composer('partials.header.default', 'App\Http\Composer\Header');
    }

    private function composeSidebar()
    {
    view()->composer('partials.sidebar.default', 'App\Http\Composer\Sidebar');
    }

    private function composeMenu()
    {
    view()->composer('partials.menu.default', 'App\Http\Composer\Menu');
    }

    private function composeProduct()
    {
    view()->composer('partials.content.product', 'App\Http\Composer\Product');	
    }

    private function composeFilterCategoryList()
    {
        view()->composer('forms.filters.categorylist', 'App\Http\Composer\Filters\Categorylist');
    }
    private function composeFilterPricing()
    {
        view()->composer('forms.filters.pricing', 'App\Http\Composer\Filters\Pricing');
    }
    private function composeFilterReviewCount()
    {
        view()->composer('forms.filters.reviewcount', 'App\Http\Composer\Filters\Reviewcount');
    }
    private function composeFilterPopular()
    {
        view()->composer('forms.filters.popular', 'App\Http\Composer\Filters\Popular');
    }
    private function composeFilterStarrating()
    {
        view()->composer('forms.filters.starrating', 'App\Http\Composer\Filters\Starrating');
    }
    private function composeFilterPricerange()
    {
        view()->composer('forms.filters.pricerange', 'App\Http\Composer\Filters\Pricerange');
    }




}
