<?php

namespace App\Http\Composer;

use Illuminate\Contracts\View\View;


class Product
{
	
	public function compose(View $view)
	{
	$products = \App\Product::paginate(15);
	$view->with('products', $products);
	}
}