<?php

namespace App\Http\Controllers\User;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Review;
use Validator;



class ProductController extends Controller
{

    public function subtmitReview(Product $product, Request $request)
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
