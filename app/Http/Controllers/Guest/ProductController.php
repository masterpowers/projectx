<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Product;
use App\ProductFilters;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    /**
     * [index Return All Products by Default , and Result by Filters]
     * @return [type] [view]
     */
    public function index(ProductFilters $filters)
    {

        $queries = Product::filter($filters)->published()->distinct();
        $products = $queries->select('id', 'name', 'description', 'caption', 'price', 'image', 'slug', 'sku', 'thumbnail', 'options', 'rating_cache', 'rating_count', 'views')->paginate();
        $this->appendQueryStrings($products);
        return view()->make('guest.product.index')->with(compact('products'));

    }
    /**
     * [show Individual Product]
     * @param  Product $product [id]
     * @return [type]           [view]
     */
    public function show(Product $product)
    {
        $categories = $product->categories;

        return view()->make('guest.product.show')->with(compact('product', 'categories'));
    }

    private function appendQueryStrings($products)
    {
        foreach ($this->queries() as $key => $value) {
            $products->appends([$key => $value]);
        }
    }
    private function queries()
    {
        return $this->request->all();
    }

}
