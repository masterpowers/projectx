<?php

namespace App\Http\Controllers\Product;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Product;
use App\Review;
use Validator;



class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
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

    public function review(Product $product, Request $request)
    {
        $input = [
        'comment' => $request->input('comment'),
        'rating'  => $request->input('rating')
        ];
        $review = new Review();
        $validator = Validator::make( $input, $review->getCreateRules());
        if ($validator->passes()) {
        $review->storeReviewForProduct($product->id, $input['comment'], $input['rating']);
        return redirect()->route('product::show',['id' => $product->id]);
        }
    return redirect()->route('product::show',['id' => $product->id])->withErrors($validator)->withInput();
    }

}
