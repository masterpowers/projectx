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
    	return view()->make('guest.category.index')->with(compact('categories'));
    }

    public function show(Category $category)
    {
    	$category = $category->with('products')->get();
    	return view()->make('guest.category.show')->with(compact('category'));
    }

    public function nested($hierarchy)
    {
    $categories = explode('/', $hierarchy);

    $main = Category::where('slug', end($categories))->first();
    reset($categories);

    if ($main)
    {
        $ancestors = $main->getAncestors();

        $valid = true;

        foreach ($ancestors as $i => $category)
        {
            if ($category->slug !== $categories[$i])
            {
                $valid = false;
                break;
            }
        }

        if ($valid)
        {
            return view('admin.dashboard');
        }
    }

    return redirect()->route('guest::category@index');
    }
}
