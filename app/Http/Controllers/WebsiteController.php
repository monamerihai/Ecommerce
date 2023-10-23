<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category1;
use App\Models\product;
use Illuminate\Support\Facades\DB;
use App\Models\subcategory;
class WebsiteController extends Controller
{
    public function index()
    {
        $categories = category1::with('products.subcategory')->get();
        $products = product::all();
        $data = compact('categories','products');
        return view('website.index', $data);
    }

public function shop()
{
   
    $categories = category1::with('products.subcategory')->get();
    $products = product::all();
    $data = compact('categories','products');

    return view('website.shop', $data);

} public function cart()
{
    $product = product::all();

    return view('website.cart',['product' => $product]);
}
public function show($id)
{

    $data['categorys'] = category1::get();

    $data['products'] = DB::table('products')
    ->join('category1s', 'products.categoryid', '=', 'category1s.id')
    ->join('subcategories', 'products.subcategoryid', '=', 'subcategories.id')
    ->select('products.*','category1s.slug as catslug', 'category1s.categoryname', 'subcategories.subcatname')
    ->get();

    return view('website.shop', $data);


}
}
    