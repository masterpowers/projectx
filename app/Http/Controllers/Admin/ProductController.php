<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
        return view()->make('admin.product.index')->with(compact('products'));
    }

    public function create()
    {
        return view()->make('admin.product.create');
    }

    public function store(Request $request)
    {
        // Create Form Request
    }
    /**
     * [show Individual Product]
     * @param  Product $product [id]
     * @return [type]           [view]
     */
    public function show(Product $product)
    {
        return view()->make('admin.product.show');
        // Response $response
        // return response()->json(view()->make('home')->with(compact('product'))->render());
    }

    public function edit(Product $product)
    {
        return view()->make('admin.product.edit');
    }

    public function update()
    {
        // Create Form Request
    }

    public function destroy()
    {
        // Create Form Request
    }





}
