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
        $categories = Category::all()->toHierarchy();
        return view()->make('admin.category.index')->with(compact('categories'));
    }

    public function create()
    {
        // This will Spit Out All The Categories To Attach the Parent!
        $categories = Category::lists('id');
        return view()->make('admin.category.create')->with(compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->rules);
        $category = Category::create($request->all());
        return redirect()->route('admin::category@show', ['category' => $category->slug]);
    }
    /**
     * [show Individual Product]
     * @param  Product $product [id]
     * @return [type]           [view]
     */
    public function show(Category $category)
    {
        $category = $category->with('products')->get();
        return view()->make('admin.category.show')->with(compact('category'));
    }

    public function edit(Category $category)
    {
        return view()->make('admin.category.edit')->with(compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $this->validate($request, $this->rules);
        $category->update($request->all())->resluggify();
        return redirect()->route('admin::category@show', ['category' => $category->slug]);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin::category@index');
    }

}
