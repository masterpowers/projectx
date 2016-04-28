<?php

namespace App\Http\Composer\Filters;

use Illuminate\Contracts\View\View;
use App\Product;
use Illuminate\Http\Request;

class Pricerange
{
	
	public function __construct(Request $request)
	{
	$this->request = $request;
	}
	public function compose(View $view)
	{
	$products = Product::all();
	$minRange = round($products->min('price') / 10) * 10;
	$maxRange = ceil($products->max('price') / 10) * 10;
	$minStart = $minRange;
	$maxStart = $maxRange;
	$step = floor(($minRange / $maxRange)*$maxRange);
	$oldpricerange = [];
        if($this->request->has('pricerange')){
          $oldpricerange = array_flatten($this->request->input('pricerange'));
          $minStart = $oldpricerange[0];
		  $maxStart = $oldpricerange[1];
        }
    
	$view->with(compact('minRange', 'maxRange', 'oldpricerange', 'step', 'minStart', 'maxStart'));
	}

}