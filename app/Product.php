<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Laracasts\Matryoshka\Cacheable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Category;

class Product extends Model
{
    use Cacheable, SoftDeletes, SluggableTrait, Filterable;

    protected $fillable = ['sku', 'name', 'price', 'description', 'image', 'options', 'caption', 'slug'];

    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
    ];

    protected $casts = [
        'published' => 'boolean',
        'options' => 'array',

    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function seo()
    {
        return $this->morphMany('App\Seo', 'seoble');
    }

    public function reviews()
	{
	    return $this->hasMany('App\Review');
	}

    public function recalculateRating($rating)
    {
    	$reviews =  $this->reviews()->notSpam()->approved();
	    $avgRating = $reviews->avg('rating');
		$this->rating_cache = round($avgRating,1);
		$this->rating_count = $reviews->count();
    	$this->save();
    }
    // You Can Add withPivot if you have Other Column you want to Include!
    public function categories()
  	{
    return $this->belongsToMany('App\Category')->withTimestamps();
  	}
    // Retrive a Product On Hierarchy
   public function scopeCategorized($query, Category $category=null) 
   {
    if(is_null($category)) return $query->with('categories');

    $categoryIds = $category->getDescendantsAndSelf()->lists('id');

     return $query->with('categories')
    ->join('category_product', 'category_product.product_id', '=', 'products.id')
    ->whereIn('category_product.category_id', $categoryIds);
    }

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    public function getCategorylistAttribute()
    {
        return $this->categories->lists('id')->toArray();
    }

    public static function findByName($name)
    {
        return self::where('name', $name)->firstOrFail();
    }
}
