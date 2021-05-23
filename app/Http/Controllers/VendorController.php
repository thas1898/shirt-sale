<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VendorModel;
use Illuminate\Support\Facades\DB;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors=VendorModel::paginate(5);
        return view('/admin/viewvendor',compact('vendors'));
    }
    public function search(Request $request)
    {
     $getvname=request('vname');
     $vendors=VendorModel::query()->where('vname','LIKE',"%{$getvname}%")->paginate(5);

     return view('/admin/viewvendor',compact('vendors'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/addvendor');
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
            'vname'=>'required|regex:/^[A-Za-z\s]+$/',
            'vcname'=>'required|regex:/^[A-Za-z\s]+$/',
            'vaddress'=>'required',
            'vstate'=>'required|regex:/^[A-Za-z\s]+$/',
            'vphone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10|unique:vendor_models',
            'vemail'=>'required|email|unique:vendor_models'
        ]);

        $getvname=request('vname');
        $getvcname=request('vcname');
        $getvaddress=request('vaddress');
        $getvstate=request('vstate');
        $getvphone=request('vphone');
        $getvemail=request('vemail');
 
        $vendor=new vendorModel();
        $vendor->vname=$getvname;
        $vendor->vcname=$getvcname;
        $vendor->vaddress=$getvaddress;
        $vendor->vstate=$getvstate;
        $vendor->vphone=$getvphone;
        $vendor->vemail=$getvemail;

        $vendor->save(); 

        return redirect('/admin/viewvendor')->with('Success','Added successfully');
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
    function delete($id)
    {
        $procount=DB::table('purchase_models')->where('vendorid','=', $id)->count();
        if($procount>0)
        {
            return redirect('/admin/viewvendor')->with('Fail','Sorry this product can not be deleted,Since it is refereed in purchases ');  
        }
        $data=VendorModel::find($id);
        $data->delete();
        return redirect('/admin/viewvendor')->with('Success','Deleted successfully');;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vendors=VendorModel::find($id);
        return view('/admin/editvendor',compact('vendors'));
    }
    public function vendorprint()
    {
        $vendors=VendorModel::all();
        return view('/admin/printvendor',compact('vendors'));   

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
            'vname'=>'required|regex:/^[A-Za-z\s]+$/',
            'vcname'=>'required|regex:/^[A-Za-z\s]+$/',
            'vaddress'=>'required',
            'vstate'=>'required|regex:/^[A-Za-z\s]+$/',
            'vphone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10',
            'vemail'=>'required|email'
        ]);
        
        $vendor=VendorModel::find($id);
        $getvname=request('vname');
        $getvcname=request('vcname');
        $getvaddress=request('vaddress');
        $getvstate=request('vstate');
        $getvphone=request('vphone');
        $getvemail=request('vemail');

        $vendor->vname=$getvname;
        $vendor->vcname=$getvcname;
        $vendor->vaddress=$getvaddress;
        $vendor->vstate=$getvstate;
        $vendor->vphone=$getvphone;
        $vendor->vemail=$getvemail;

        $vendor->save(); 

        return redirect('/admin/viewvendor')->with('Success','Edited successfully');;
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
