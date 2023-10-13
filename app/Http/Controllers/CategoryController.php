<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\category1;

class CategoryController extends Controller
{
    public function index()
    {
        $Data = category1::all();
        // print_r($Data);exit;
        return view('admin/layout/category/categoryform', compact('Data'));
    }
    public function store(Request $request)
    {
        //dd($request->all());die;
        if ($image = $request->file('img')) {
            $extention = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $imageName = time() . "_" . uniqid() . '.' . $extention;
            $image->move(base_path('public/image'), $imageName);
            // array_push($StorageFileName,$imageName);

        }


        $Data = [
            'categoryname' => $request->categoryname,
            //'img' => implode(',',$StorageFileName) ?? ""
            'img' => $imageName ?? ""
        ];
        // print_r($Data);die;


        $post = category1::create($Data);

        return redirect()->route('category')->with('success', 'Data insert successfully.');
        // return redirect()->route('category');



    }
    public function delete(category1 $category1)
    {

        $category1->delete();
        return redirect()->route('category')->with('success', 'record has been deleted successfully');

    }
    public function edit($id)
    {
        $data['category1'] = category1::where('id', $id)->first();


        return view('admin/layout/category/categoryedit', $data);

    }
    public function update(Request $request)
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

        $categoryname = $request->categoryname;
        $img = $request->img;

        $affected = DB::table('category1s')
            ->where('id', $id)
            ->update([
                'categoryname' => $categoryname,
                'img' => $imageName
            ]);

        if ($affected) {
            return redirect()->route('category')->with('success', 'Data update  successfully.');

        }

    }
}