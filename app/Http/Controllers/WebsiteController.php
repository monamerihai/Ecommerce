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
        $data['categorys'] = category1::get();


    $data['products'] = DB::table('products')
        ->join('category1s', 'products.categoryid', '=', 'category1s.id')
        ->join('subcategories', 'products.subcategoryid', '=', 'subcategories.id')
        ->select('products.*', 'category1s.categoryname', 'subcategories.subcatname')
        ->get();
        return view('website.index', $data);
    }

    public function product()
    {
        $data['categorys'] = category1::get();


        $data['products'] = DB::table('products')
            ->join('category1s', 'products.categoryid', '=', 'category1s.id')
            ->join('subcategories', 'products.subcategoryid', '=', 'subcategories.id')
            ->select('products.*', 'category1s.categoryname', 'subcategories.subcatname')
            ->get();

        return view('website.products', $data);

    }
    public function subcategory()
    {
        $data['categorys'] = category1::get();

        $data['subcategory'] = DB::table('subcategories')
            ->join('category1s', 'subcategories.catid', '=', 'category1s.id')
            ->select('subcategories.*', 'category1s.categoryname')
            ->get();
        // print_r($data);exit;

        return view('website.subcategory', $data);
    }
    public function category()
    {
        $Data = category1::all();
        // print_r($Data);exit;
        return view('website.category', compact('Data'));
    }

    public function getSubcategories($categoryId)
{
    $subcategories = Subcategory::where('catid', $categoryId)->pluck('subcatname', 'id');
    return response()->json($subcategories);
}
public function viewProduct($productId)
{
    $product = DB::table('products')
        ->join('category1s', 'products.categoryid', '=', 'category1s.id')
        ->join('subcategories', 'products.subcategoryid', '=', 'subcategories.id')
        ->select('products.*', 'category1s.categoryname', 'subcategories.subcatname')
        ->where('products.id', $productId)
        ->first();

    if (!$product) {
        return redirect()->route('productNotFound'); // Redirect to a "Product Not Found" page or handle the error as per your requirements.
    }

    return view('website.product_detail', ['product' => $product]);
}
public function shop()
{
    $data['categorys'] = category1::get();


    $data['products'] = DB::table('products')
        ->join('category1s', 'products.categoryid', '=', 'category1s.id')
        ->join('subcategories', 'products.subcategoryid', '=', 'subcategories.id')
        ->select('products.*', 'category1s.categoryname', 'subcategories.subcatname')
        ->get();

    return view('website.shop', $data);

}

}
