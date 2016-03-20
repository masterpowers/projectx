<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Bouncer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Bouncer::seeder(function () 
	{
   	Bouncer::allow('admin')->to(['create-users', 'update-users', 'delete-users', 'view-users', 'ban-users']);
    	Bouncer::allow('freemium')->to('edit-profile');
        Bouncer::allow('premium')->to(['view-accounts', 'add-accounts', 'edit-accounts', 'delete-accounts']);
	});
	Bouncer::cache();
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
}
