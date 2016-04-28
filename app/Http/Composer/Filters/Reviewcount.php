<?php

namespace App\Http\Composer\Filters;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class Reviewcount
{
	
	public function __construct(Request $request)
	{
	$this->request = $request;
	}
	public function compose(View $view)
	{
	$oldreviewcount = null;
        if($this->request->has('reviewcount')){
          $oldreviewcount = $this->request->input('reviewcount');
        }
	$view->with(compact('oldreviewcount'));
	}
	

}