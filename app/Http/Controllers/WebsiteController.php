<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subcategory;
class WebsiteController extends Controller
{
    function shop(Request $request, $id){
        $product = subcategory::where('id','$request->id')->get();
        return view('website.shop', compact('product'));
    }

}
