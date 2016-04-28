<?php
namespace App;
use Illuminate\Database\Eloquent\Builder;

class ProductFilters extends QueryFilters
{
    /**
     * Filter by Price Default Cheapest First
     *
     * @param  string $order
     * @return Builder
     */
    public function pricing($order = 'asc')
    {
      return $this->builder->orderBy('price', $order);
    }
    /**
     * Filter by popularity with the Highest Product Rating Reviews
     *
     * @param  string $order
     * @return Builder
     */
    public function popular($order = 'desc')
    {
        return $this->builder->orderBy('views', $order);
    }
    /**
     * Filter by Category.
     *
     * @param  string $level
     * @return Builder
     */
    public function categorylist($categorylist = [])
    {

        if(!is_array($categorylist)){
            return $this;
        }

        return $this->builder
        ->join('category_product', 'category_product.product_id', '=', 'products.id')
        ->whereIn('category_product.category_id', $categorylist);
        
    }
    /**
     * Filter by No of Star Review.
     *
     * @param  string $order
     * @return Builder
     */
    public function starrating($order)
    {
        return $this->builder->whereBetween('rating_cache', array($order, $order + .99));
    }
    /**
     * Filter by Product With Most No of Reviews
     *
     * @param  string $order
     * @return Builder
     */
    public function reviewcount($order = 'desc')
    {
      return $this->builder->orderBy('rating_count', $order);
    }



    public function priceRange($priceRange = [])
    {
      if(!is_array($priceRange)){
            return $this;
        }
      return $this->builder->whereBetween('price', $priceRange);
    }
    
    /**
     * Enable Us to ?page querry string
     * Uses Paginate Method Instead
     * This is to Whitelist the Page Method
     *
     * @param  string $page
     * @return void
     */
    public function page($page)
    {
        
    }
}