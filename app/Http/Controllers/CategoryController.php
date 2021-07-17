<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;
use Illuminate\Support\Facades\DB;
use App\Models\ProductModel;
use App\Models\BrandModel; 

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=CategoryModel::all();
        return view('/admin/viewcategory',compact('categories'));
    }

    function delete($id)
    {
        $procount=DB::table('product_models')->where('catid','=', $id)->count();
        if($procount>0)
        {
            return redirect('/admin/viewcategory')->with('Fail','Sorry this category can not be deleted,Since it is refereed in product table ');  
        }
        $brandcount=DB::table('brand_models')->where('catid','=', $id)->count();
        if($procount>0)
        {
            return redirect('/admin/viewcategory')->with('Fail','Sorry this category can not be deleted,Since it is refereed in brand table ');  
        }
        DB::table('category_models')->where('id','=', $id)->delete();
        return redirect('/admin/viewcategory')->with('Success','Deleted successfully');


    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/addcategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cname'=>'required|regex:/^[A-Za-z\s]+$/|unique:category_models',
        ]);
        $getcname=request('cname');

        $category=new CategoryModel();
        $category->cname=$getcname;
     
        $category->save();
        return redirect('/admin/viewcategory')->with('Success','Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
 
        $categories=CategoryModel::find($id);
        return view('/admin/editcategory',compact('categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'cname'=>'required|regex:/^[A-Za-z\s]+$/',
        ]);
        
        $category=CategoryModel::find($id);
        $getcname=request('cname');

        $category->cname=$getcname;
     
        $category->save();

        return redirect('/admin/viewcategory')->with('Success','Edited successfully');
    }

    public function search(Request $request)
    {
     $getcname=request('cname');
     $categories=CategoryModel::query()->where('cname','LIKE',"%{$getcname}%")->get();

     return view('/admin/viewcategory',compact('categories'));

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
