<?php

namespace App\Http\Composer\Filters;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class Pricing
{
	
	public function __construct(Request $request)
	{
	$this->request = $request;
	}
	public function compose(View $view)
	{
	$oldpriceorder = null;
        if($this->request->has('pricing')){
          $oldpriceorder = $this->request->input('pricing');
        }
	$view->with(compact('oldpriceorder'));
	}
	

}