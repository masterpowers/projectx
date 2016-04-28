<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Review;
use App\Product;

class ReviewController extends Controller
{
    public function show(Product $product)
    {
    	$reviews = $product->with('reviews')->get();
        return view()->make('guest.product.show')->with(compact('reviews'));
    }
}
