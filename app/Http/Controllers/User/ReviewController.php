<?php

namespace App\Http\Controllers\User;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Review;
use Validator;



class ReviewController extends Controller
{
    public function index()
    {
        $reviews = \Auth::user()->with('reviews')->get();
        return view('user.review.index')->with(compact('reviews'));
    }
    public function create()
    {
        return view('user.review.create');
    }

    public function store(Product $product, Request $request)
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

    public function show()
    {
        return view('user.review.show');
    }

    public function edit()
    {
        return view('user.review.edit');
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
