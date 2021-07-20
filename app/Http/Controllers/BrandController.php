<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\BrandModel; 
use App\Models\CategoryModel;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $brands=BrandModel::with('category')->paginate(5);
        return view('/admin/viewbrand',compact('brands'));
    }

    public function search(Request $request)
    {
     $getbname=request('bname');
     $brands=BrandModel::query()->where('bname','LIKE',"%{$getbname}%")->paginate(5);

     return view('/admin/viewbrand',compact('brands'));

    }
    function delete($id)
    {
        
        $procount=DB::table('product_models')->where('brandid','=', $id)->count();
        if($procount>0)
        {
            return redirect('/admin/viewbrand')->with('Fail','Sorry this brand can not be deleted,Since it is refereed in product table ');  
        }
        DB::table('brand_models')->where('id','=', $id)->delete();
        return redirect('/admin/viewbrand')->with('Success','Deleted successfully');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {       
        $categories=CategoryModel::all();
        return view('/admin/addbrand',compact('categories'));

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
            'bname'=>'required|regex:/^[A-Za-z\s]+$/',
        ]);

        $getcid=request('catid');
        $getbname=request('bname');
  
        $brand=new BrandModel();
        $brand->catid=$getcid;
        $brand->bname=$getbname;

        $brand->save();

        return redirect('/admin/viewbrand')->with('Success','Added successfully');

  
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
        $brands=BrandModel::find($id);
        $categories=CategoryModel::all();
        return view('/admin/editbrand',compact('categories','brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'bname'=>'required|regex:/^[A-Za-z\s]+$/',
        ]);
        
        $brand=BrandModel::find($id);
        $getcid=request('catid');
        $getbname=request('bname');
  
        $brand->catid=$getcid;
        $brand->bname=$getbname;

        $brand->save();

              return redirect('/admin/viewbrand')->with('Success','Edited successfully');

    }

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
