# Road to Million Request Per Hour Set Up!

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

This was Made With the Frustration of Building Apps With All the Latest Technology, Best Practices and Scalability. 

Environment Set Up :
[x] Laravel 5.2
[x] HHVM 3.12.1
[x] Nginx 1.9.11
[x] Redis 3.0.7 + Predis/Predis
[x] MariaDB  10.1.12
[x] Socket.io 1.3.5
[x] Beanstalkd 1.9 + Pda/Phenstalk
[x] Supervisord 3.0b2


Best Practices:
[x] Google Page Speed
[x] SEO
[x] Email Inline CSS + Email Queueing
[x] BrowserSync
[x] SSL Secured Sites
[x] Anti-DDOS with Cloudflare
[x] Cache Busting
[x] Real Time Apps
[x] PHP Unit Test
[x] Russian Doll Caching
[x] Facebook Ready

## Homestead Set Up in Windows Users

Majority of the Tutorials are Made using MAC OS Users, Such as Laracast. As a Windows OS User You Find it Hard to Get Same Approach as the Cool Kids. Not Anymore.

[x] Homestead NFS Enable. Improve Response of Your Local Machine.
[x] Correcting the Set Up if HHVM + MariaDB are chosen. 
[x] Running Multiple Instance of Homestead Each Project Easily.
[x] Setting Up Homestead in Windows and Fixing Usual Bug.
- Long Path Issue with Ruby on Windows
- NPM Install Issue.
[x] Setting Up Cmder as Your terminal
[x] Setting Up Vim in Windows.
[x] Common Commands to Include in Windows Environmental Variables.

## Homestead Set Up
[x] Windows 8 OS
[x] Vagrant 1.7.4
[x] Virtual Box 4.3
[x] Laravel/Homestead 3.0

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Customisation

After you Install it, You Will be given a Fresh install of laravel, You may Want to Override its META, SEO, FONT , CSS and, ABOVE FOLD CONTENT
all default file is at resources->view->partials->head/*
<!-- Default Header of Fresh Laravel Installation -->
@section('meta')

@endsection
@section('seo')

@endsection
@section('font')

@endsection
@section('css')

@endsection
@section('critical')

@endsection
<!-- End Header -->

There are Magic Task to Use To Give you Critical CSS and UNCSS or the Trimmed Version of Your CSS.

gulp compress = html minifier of your view storage
gulp uncss = remove unneccessary bloat of css from your vendor css 
gulp critical = outputs the critical above fold content css to your view storage
gulp inlinecss = inlinecss for you email blade 

you should run uncss + critical then last is the compress for google optimization of your site

You may include the uncss using 
@include('partials.version.uncss')
@include('partials.version.allcss')
@include('partials.version.bundlejs')

## deploy commands
you may need to create your own database or edit as per you .env file
php artisan migrate = Migrate the Database
php artisan bouncer:seed = Seed the Roles and Permission
php artisan db:seed = Seed the Admin Account

## Variables Always Available in your view
Go to your ViewComposerServiceProvider and Edit...

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
