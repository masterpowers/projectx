<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Laracasts\Matryoshka\Cacheable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use Cacheable, SoftDeletes, SluggableTrait;

    protected $fillable = ['sku', 'name', 'price', 'description', 'image', 'options'];

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

    public function categories()
  	{
    return $this->belongsToMany('App\Category')->withTimestamps();
  	}
}
