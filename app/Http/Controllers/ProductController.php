<?php

namespace App\Http\Controllers;

use App\Models\category1;
use App\Models\subcategory;
use App\Models\product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $data['categorys'] = category1::get();

       
                $data['products'] = DB::table('products')
            ->join('category1s', 'products.categoryid', '=', 'category1s.id')
            ->join('subcategories', 'products.subcategoryid', '=', 'subcategories.id')
            ->select('products.*','category1s.categoryname','subcategories.subcatname')
            ->get();

        return view('admin/layout/product/product', $data);

    }
    public function productstore(Request $request)
    {
        //dd($request->all());die;
        if ($request->file('img')) {
            $images = $request->file('img');
            $StorageFileName = [];
            foreach ($images as $image) {
                $extention = date('YmdHis') . "." . $image->getClientOriginalExtension();

                $imageName = time() . "_" . uniqid() . '.' . $extention;
                $image->move(base_path('public/image'), $imageName);
                // $content->image = $filename;
                array_push($StorageFileName, $imageName);
            }
        }


        $Data = [
            'categoryid' => $request->categoryid,
            'subcategoryid' => $request->subcategoryid,
            'productname' => $request->productname,
            'price' => $request->price,
            'tittle' => $request->tittle,

            'img' => $imageName ?? ""
        ];
        // print_r($Data);die;


        $post = product::create($Data);

        return redirect()->route('product')->with('success', 'Data insert successfully.');
       
    }
    public function productdelete($id){
        $deleted = DB::table('products')->where('id', $id)->delete();

        if ($deleted) {
            return redirect()->route('product')->with('success', 'Record has been deleted successfully');
        } else {
            return redirect()->route('product')->with('error', 'Failed to delete the record');
        }
    }
    public function productedit($id){
        $data['product'] = product::where('id',$id)->first();
      
        return view('admin/layout/product/productedit',$data);
    }
    public function getcategory (Request $request){
          $cid=$request->cid; 
        $catdata=Db::table('subcategories')->where('catid',$cid)->get();
        $htmi='<option value="">Select subcategory</option>';
        
       
        foreach($catdata as $row){
        
         $htmi.="<option value={$row->id}>{$row->subcatname}</option>";
        }
        echo $htmi; 
      
     
   }

    }
    

