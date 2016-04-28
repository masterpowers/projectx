<?php

namespace App\Http\Composer\Filters;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class Starrating
{
	
	public function __construct(Request $request)
	{
	$this->request = $request;
	}
	public function compose(View $view)
	{
	$oldstarrating = null;
        if($this->request->has('starrating')){
          $oldstarrating = $this->request->input('starrating');
        }
	$view->with(compact('oldstarrating'));
	}
	

}