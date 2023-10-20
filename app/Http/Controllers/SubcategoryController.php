<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\category1;
use App\Models\subcategory;

class SubcategoryController extends Controller
{
    public function index()
    {

        $categories = category1::with('subcategories')->get();
        $subcategories = subcategory::all();
        $data = compact('categories','subcategories');

        return view('admin.layout.subcategory.subcategory', $data);
    }
    public function subcatstore(Request $request)
    {

        // dd($request->all());die;
        if ($image = $request->file('img')) {
            $extention = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $imageName = time() . "_" . uniqid() . '.' . $extention;
            $image->move(base_path('public/image'), $imageName);


        }


        $Data = [
            'subcatname' => $request->subcatname,
            'catid' => $request->Catid,

            'img' => $imageName ?? ""
        ];
        // print_r($Data);die;


        $post = subcategory::create($Data);

        return redirect()->route('subcategory')->with('success', 'Data insert successfully.');

    }
    public function subdelete($id)
    {

        $deleted = DB::table('subcategories')->where('id', $id)->delete();

        if ($deleted) {
            return redirect()->route('subcategory')->with('success', 'Record has been deleted successfully');
        } else {
            return redirect()->route('subcategory')->with('error', 'Failed to delete the record');
        }
    }
    public function subcatedit($id)
    {
        
        $data['subcategory'] = subcategory::where('id', $id)->first();

        return view('admin/layout/subcategory/subcategoryedit', $data);

    }
    public function subcatupdate(Request $request)
    {
        if ($image = $request->file('img')) {
            $extention = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $imageName = time() . "_" . uniqid() . '.' . $extention;
            $image->move(base_path('public/image'), $imageName);


        } else {
            $imageName = $request->oldimg;
        }

        //dd($request);die;  

        $id = $request->id;

        $catid = $request->catid;
        $subcatname = $request->subcatname;
        $img = $request->img;

        $affected = DB::table('subcategories')
            ->where('id', $id)
            ->update([
              //  'catid' => $catid,
                'subcatname' => $subcatname,
                'img' => $imageName
            ]);

        if ($affected) {
            return redirect()->route('subcategory')->with('success', 'Data update  successfully.');

        }

    }
}