<?php

namespace App\Http\Composer\Filters;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class Popular
{
	
	public function __construct(Request $request)
	{
	$this->request = $request;
	}
	public function compose(View $view)
	{
	$oldpopular = null;
        if($this->request->has('popular')){
          $oldpopular = $this->request->input('popular');
        }
	$view->with(compact('oldpopular'));
	}
	

}