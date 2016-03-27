<?php

namespace App\Http\Composer;

use Illuminate\Contracts\View\View;
// use App\Repository\Repository;
use App\User;

class Sidebar
{
	// public function __construct(Repository $repository)
	// {
	// $this->repository = $repository
	// }

	// compose is the default method.. if you override the name
	// make sure you change it on the viewcomposerviceprovider
	// by appending @customMethod
	public function compose(View $view)
	{
	
	$view->with('auth', User::latest()->first());
	}
}