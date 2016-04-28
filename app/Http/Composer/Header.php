<?php

namespace App\Http\Composer;

use Illuminate\Contracts\View\View;
// use App\Repository\Repository;
use SEOMeta;

class Header
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
	$title = SEOMeta::getTitle();
	if($title){
	$view->with('title', $title);	
	}
	$title = SEOMeta::setTitle('NO PAGE TITLE!');
	$title = SEOMeta::getTitle();
	$view->with('title', $title);
	}
}