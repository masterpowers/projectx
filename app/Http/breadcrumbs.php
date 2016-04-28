<?php

// Home
Breadcrumbs::register('guest::home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('guest::home'));
});
// Home > Login
Breadcrumbs::register('guest::auth@showLoginForm', function($breadcrumbs)
{
	$breadcrumbs->parent('guest::home');
    $breadcrumbs->push('Login', route('guest::auth@showLoginForm'));
});
// Home > Password Reset
Breadcrumbs::register('guest::auth@showResetForm', function($breadcrumbs)
{
	$breadcrumbs->parent('guest::home');
    $breadcrumbs->push('Password Reset', route('guest::auth@showResetForm'));
});
// Home > Register
Breadcrumbs::register('guest::auth@showRegistrationForm', function($breadcrumbs)
{
	$breadcrumbs->parent('guest::home');
    $breadcrumbs->push('Register', route('guest::auth@showRegistrationForm'));
});


// Home > Dashboard
Breadcrumbs::register('user::dashboard', function($breadcrumbs)
{
    $breadcrumbs->parent('guest::home');
    $breadcrumbs->push('Dashboard', route('user::dashboard'));
});

// Home > Admin
Breadcrumbs::register('admin::dashboard', function($breadcrumbs)
{
    $breadcrumbs->parent('guest::home');
    $breadcrumbs->push('Admin Dashboard', route('admin::dashboard'));
});

// Home > Admin > Products
Breadcrumbs::register('admin::product@index', function($breadcrumbs)
{
    $breadcrumbs->parent('admin::dashboard');
    $breadcrumbs->push('Products', route('admin::product@index'));
});
// Home > Admin > Products > Create
Breadcrumbs::register('admin::product@create', function($breadcrumbs)
{
    $breadcrumbs->parent('admin::product@index');
    $breadcrumbs->push('Add New Product', route('admin::product@create'));
});
// Home > Admin > Products > Edit
// Variable $product Here is Implicit Route Model Binding
Breadcrumbs::register('admin::product@edit', function($breadcrumbs, $product)
{
    $breadcrumbs->parent('admin::product@index');
    $breadcrumbs->push($product->name, route('admin::product@edit', ['product' => $product->slug]));
});
//Home >Admin >Products > Show
Breadcrumbs::register('admin::product@show', function($breadcrumbs, $product)
{
    $breadcrumbs->parent('admin::product@index');
    $breadcrumbs->push($product->name, route('admin::product@show', ['product' => $product->slug]));
});
// Home > Products
Breadcrumbs::register('guest::product@index', function($breadcrumbs)
{
    $breadcrumbs->parent('guest::home');
    $breadcrumbs->push('Products', route('guest::product@index'));
});

// Home > Products > Product Name
Breadcrumbs::register('guest::product@show', function($breadcrumbs, $product)
{
    $breadcrumbs->parent('guest::product@index');
    $breadcrumbs->push($product->name, route('guest::product@show', ['product' => $product->slug]));
});

// Home > Categories
Breadcrumbs::register('guest::category@index', function($breadcrumbs)
{
    $breadcrumbs->parent('guest::home');
    $breadcrumbs->push('Categories', route('guest::category@index'));
});

// Home > Categories > Category Name

Breadcrumbs::register('guest::category@show', function($breadcrumbs, $category)
{
    $breadcrumbs->parent('guest::category@index');
    $breadcrumbs->push($category->name, route('guest::category@show', ['category' => $category->slug]));
});

// Home > Categories > Grandparent Category Name / Parent Category Name / Category Name
Breadcrumbs::register('guest::category@nested', function($breadcrumbs,$hierarchy){
$breadcrumbs->parent('guest::category@index');
$categories = explode('/', $hierarchy);
$category = \App\Category::where('slug', end($categories))->first();
$ancestors = $category->getAncestors();
foreach($ancestors as $i => $ancestor) {
$link = $ancestor->getAncestorsAndSelf()->lists('slug')->toArray();
$link = implode('/', $link);
$breadcrumbs->push($ancestor->name, route('guest::category@nested', $link));
}
$link = $category->getAncestorsAndSelf()->lists('slug')->toArray();
$link = implode('/', $link);
$breadcrumbs->push($category->name,route('guest::category@nested', $link));
});