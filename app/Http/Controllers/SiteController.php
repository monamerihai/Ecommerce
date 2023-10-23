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
public function getcat(Request $request)
{
    $cid = $request->cid;
    $catdata = Db::table('subcategories')->where('catid', $cid)->get();
    $htmi = '<option value="">Select subcategory</option>';


    foreach ($catdata as $row) {

        $htmi .= "<option value={$row->id}>{$row->subcatname}</option>";
    }
    echo $htmi;


}

}
