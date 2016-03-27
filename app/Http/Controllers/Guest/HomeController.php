<?php

namespace App\Http\Controllers\Guest;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class HomeController extends Controller
{
    use SEOToolsTrait;


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->seo()->setTitle('HOMEPAGE - GUEST!');
        $this->seo()->setDescription('This is my page description');
        // $this->seo()->setCanonical(route('admin::user@index'));
        $this->seo()->opengraph()->setUrl(route('guest::home'));
        $this->seo()->opengraph()->addProperty('type', 'articles');
        $this->seo()->twitter()->setSite('@iyuri305');
        return view('home');
    }
}
