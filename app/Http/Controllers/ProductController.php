<?php

namespace App\Http\Controllers;

use App\Models\category1;
use App\Models\subcategory;
use App\Models\product;
use App\Models\Multipalimg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $categories = category1::with('products.subcategory')->get();
        $products = product::all();
        $data = compact('categories','products');
        return view('admin/layout/product/product', $data);

    }
    public function productstore(Request $request)
    {
        if ($request->file('img')) {
            $images = $request->file('img');
            $StorageFileName = [];
            foreach ($images as $image) {
                $extention = date('YmdHis') . "." . $image->getClientOriginalExtension();

                $imageName = time() . "_" . uniqid() . '.' . $extention;
                $image->move(base_path('public/image'), $imageName);
                array_push($StorageFileName, $imageName);
            }
        }


        $Data = [
            'categoryid' => $request->categoryid,
            'subcategoryid' => $request->subcategoryid,
            'productname' => $request->productname,
            'price' => $request->price,
            'tittle' => $request->tittle,
            'qty' => $request->qty,
            'description' => $request->description,

            'img' => $imageName ?? ""
        ];


        $post = product::create($Data);
        if ($post) {

            $companyData = [
                'productid' => $post->id,
                'img' => implode(',', $StorageFileName) ?? ""
               
            ];

            $post = Multipalimg::create($companyData);
        }


        return redirect()->route('product')->with('success', 'Data insert successfully.');

    }
    public function productdelete($id)
    {
        $deleted = DB::table('products',)->where('id', $id)->delete();

        if ($deleted) {
            return redirect()->route('product')->with('success', 'Record has been deleted successfully');
        } else {
            return redirect()->route('product')->with('error', 'Failed to delete the record');
        }
    }
    public function productedit($id)
    {
        $data['categorys'] = category1::get();


        $data['products'] = DB::table('products')
            ->join('category1s', 'products.categoryid', '=', 'category1s.id')
            ->join('subcategories', 'products.subcategoryid', '=', 'subcategories.id')
            ->select('products.*', 'category1s.categoryname', 'subcategories.subcatname')
            ->get();
        $data['product'] = product::where('id', $id)->first();

        return view('admin/layout/product/productedit', $data);
    }
    public function getcategory(Request $request)
    {
        $cid = $request->cid;
        $catdata = Db::table('subcategories')->where('catid', $cid)->get();
        $htmi = '<option value="">Select subcategory</option>';


        foreach ($catdata as $row) {

            $htmi .= "<option value={$row->id}>{$row->subcatname}</option>";
        }
        echo $htmi;


    }
    public function getsubcategory(Request $request)
    {
        $cid = $request->cid;
        $catdata = Db::table('subcategories')->where('catid', $cid)->get();
        $htmi = '<option value="">Select subcategory</option>';


        foreach ($catdata as $row) {

            $htmi .= "<option value={$row->id}>{$row->subcatname}</option>";
        }
        echo $htmi;


    }
    public function productupdate(Request $request)
    {
        if ($image = $request->file('img')) {
            $extention = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $imageName = time() . "_" . uniqid() . '.' . $extention;
            $image->move(base_path('public/image'), $imageName);


        } else {
            $imageName = $request->oldimg;
        }




        $id = $request->id;
        $categoryid = $request->categoryid;
        $subcategoryid = $request->subcategoryid;
        $productname = $request->productname;
        $price = $request->price;
        $tittle = $request->tittle;
        $description = $request->description;
        $qty = $request->qty;
        $img = $request->img;

        $affected = DB::table('products')
            ->where('id', $id)
            ->update([
                'categoryid' => $categoryid,
                'subcategoryid' => $subcategoryid,
                'productname' => $productname,
                'price' => $price,
                'tittle' => $tittle,
                'description' => $description,
                'qty' => $qty,
                'img' => $imageName
            ]);

        if ($affected) {
            return redirect()->route('product')->with('success', 'Data update  successfully.');

        }

    }
   
}