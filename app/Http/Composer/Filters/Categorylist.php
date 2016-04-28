<?php

namespace App\Http\Composer\Filters;

use Illuminate\Contracts\View\View;
use App\Category;
use Illuminate\Http\Request;

class Categorylist
{
	
	public function __construct(Request $request)
	{
	$this->request = $request;
	}
	public function compose(View $view)
	{
	$categorylist = Category::allLeaves()->pluck('name', 'id');
	$oldcategorylist = [];
        if($this->request->has('categorylist')){
          $oldcategorylist = array_flatten($this->request->input('categorylist'));
        }
	$view->with(compact('categorylist', 'oldcategorylist'));
	}

}