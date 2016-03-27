<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Category;




class CategoryController extends Controller
{

    /**
     * [index Return Paginated View of All Products]
     * @return [type] [view]
     */
    public function index()
    {
        $categories = Category::all();
        return view()->make('admin.category.index')->with(compact('categories'));
    }

    public function create()
    {
        return view()->make('admin.category.create');
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
    public function show(Category $category)
    {
        return view()->make('admin.category.show');
        // Response $response
        // return response()->json(view()->make('home')->with(compact('product'))->render());
    }

    public function edit(Category $category)
    {
        return view()->make('admin.category.edit');
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
