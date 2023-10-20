<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category1;
use App\Models\subcategory;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
public function cat(){ 
    $data['categorys'] = category1::get();

    $data['products'] = DB::table('products')
    ->join('category1s', 'products.categoryid', '=', 'category1s.id')
    ->join('subcategories', 'products.subcategoryid', '=', 'subcategories.id')
    ->select('products.*','category1s.slug as catslug', 'category1s.categoryname', 'subcategories.subcatname')
    ->get();
   
    // $data['subcategory'] = DB::table('subcategories')
    // ->join('category1s', 'subcategories.catid', '=', 'category1s.id')
    // ->select('subcategories.*', 'category1s.categoryname')
    // ->get();

    $subcategory = DB::table('subcategories')->get();
    foreach($subcategory as $sub){
        $data['subcategory'][$sub->catid][] = $sub;

    }

   //print_r($data['subcategory']);die();

            return view('website.index', $data);
}

public function productView($category1_slug)
    {
        $category1 = category1::where('slug', $category1_slug)->first();
       
dd($category1);
        if ($category1) {
            return view('website.index', compact('category'));
        } else {
            return redirect()->back();
        }
    }
    public function productViews(string $category_slug, string $product_slug)
    {
        $category1 = category1::where('slug', $category_slug)->first();

        if ($category1) {

            $product = $category1->products()->where('slug', $product_slug)->where('status', '0')->first();
            if ($product) {

                return view('showproducts', compact('category', 'product'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

}
