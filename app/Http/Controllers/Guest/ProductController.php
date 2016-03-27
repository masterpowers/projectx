<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{
    /**
     * [index Return Paginated View of All Products]
     * @return [type] [view]
     */
    public function index()
    {
        $products = Product::all();
        return view()->make('product.index')->with(compact('products'));
    }
    /**
     * [show Individual Product]
     * @param  Product $product [id]
     * @return [type]           [view]
     */
    public function show(Product $product)
    {
        // return view('home')->with(['product' => $product]);
        return view()->make('product.show')->with(compact('product'));
    }

    public function getReview()
    {
    	$reviews = Review::all();
        return view()->make('product.review')->with(compact('reviews'));
    }
}
