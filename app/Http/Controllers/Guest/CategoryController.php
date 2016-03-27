<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::all();
    	return view()->make('category.index');
    }

    public function show(Category $category)
    {
    	return view()->make('category.show');
    }
}
