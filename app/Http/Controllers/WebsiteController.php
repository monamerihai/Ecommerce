<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    function shop(){
        return view('website.shop');
    }

}
