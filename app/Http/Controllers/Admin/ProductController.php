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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * [index Return Paginated View of All Products]
     * @return [type] [view]
     */
    public function index()
    {
        $products = Product::all();
        return view()->make('home')->with(compact('product'));
    }

    public function create()
    {
        //
    }

    public function store()
    {
        //
    }
    /**
     * [show Individual Product]
     * @param  Product $product [id]
     * @return [type]           [view]
     */
    public function show(Product $product, Response $response)
    {
        // return view('home')->with(['product' => $product]);
        return response()->json(view()->make('home')->with(compact('product'))->render());
    }

    public function edit()
    {
        //
    }

    public function update()
    {
        //
    }

    public function destroy()
    {
        //
    }





}
