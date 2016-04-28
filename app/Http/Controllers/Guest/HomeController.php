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
       
        return view('guest.home');
    }
}
