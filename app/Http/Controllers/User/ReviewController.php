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
        return redirect()->route('guest::product@show',['slug' => $product->slug]);
        }
    return redirect()->route('guest::product@show',['slug' => $product->slug])->withErrors($validator)->withInput();
    }

    

}
