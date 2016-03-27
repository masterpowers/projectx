<?php

namespace App\Http\Controllers\User;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class DashboardController extends Controller
{
    use SEOToolsTrait;


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->seo()->setTitle('User Dashboard!');
        $this->seo()->setDescription('This will Show a User Dashboard');
        // $this->seo()->setCanonical(route('admin::user@index'));
        $this->seo()->opengraph()->setUrl(route('user::dashboard'));
        $this->seo()->opengraph()->addProperty('type', 'articles');
        $this->seo()->twitter()->setSite('@iyuri305');
        return view('home');
    }
}
