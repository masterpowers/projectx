<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Baum\Node;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laracasts\Matryoshka\Cacheable;

class Category extends Node
{
    use Cacheable, SluggableTrait, SoftDeletes;

    protected $fillable = ['name'];

    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function seo()
    {
        return $this->morphMany('App\Seo', 'seoble');
    }

    public function products()
    {
    return $this->belongsToMany('App\Product')->withTimestamps();
    }

}
