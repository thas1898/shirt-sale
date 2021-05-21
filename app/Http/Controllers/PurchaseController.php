<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PurchaseModel;
use App\Models\VendorModel;
use App\Models\ProductModel;
use Carbon\Carbon;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases=PurchaseModel::with('vendor','product')->paginate(5);
        return view('/admin/viewpurchase',compact('purchases'));
    }
    public function purchaseprint()
    {
        $purchases=PurchaseModel::with('vendor','product')->get();
        return view('/admin/printpurchase',compact('purchases'));
    }
    public function search(Request $request)
    {
        
        $getdate=request('created_at');
        $purchases=PurchaseModel::query()->where('created_at','LIKE',"%{$getdate}%")->paginate(5);

     return view('/admin/viewpurchase',compact('purchases'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vendors=VendorModel::all();
        $products=ProductModel::all();
        return view('/admin/addpurchase',compact('vendors','products'));
  
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
            'pqty'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:1|max:10',
            'pprice'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:2|max:10',
            'ptotal'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:2|max:10',

        ]);
        $getvendorid=request('vendorid');
        $getproid=request('proid');
        $getpqty=request('pqty');
        $getpprice=request('pprice');
        $getptotal=request('ptotal');
        

        $purchase=new PurchaseModel();
        $purchase->vendorid=$getvendorid;
        $purchase->proid=$getproid;
        $purchase->pqty=$getpqty;
        $purchase->pprice=$getpprice;
        $purchase->ptotal=$getptotal;
        $date=Carbon::now('Asia/Kolkata');
        $purchase->created_at=$date; 
    
        $purchase->save(); 
        $pro_qty=DB::table('product_models')->select('pqty')->where('id','=',$getproid)->value('pqty');
        $add=($pro_qty)+($getpqty);
        DB::table('product_models')
        ->where('id', $getproid)
       ->update(['pqty' => $add]);

        return redirect('/admin/viewpurchase')->with('Success','Added successfully');
    }

    function delete($id)
    {
        $data=PurchaseModel::find($id);
        $data->delete();
        return redirect('/admin/viewpurchase');

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
        $vendors=VendorModel::all();
        $products=ProductModel::all();
        $purchases=PurchaseModel::find($id);
        return view('/admin/editpurchase',compact('purchases','vendors','products'));
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
            'pqty'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:1|max:10',
            'pprice'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:2|max:10',
            'ptotal'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:2|max:10',

        ]);
        $purchase=PurchaseModel::find($id);

        $getvendorid=request('vendorid');
        $getproid=request('proid');
        $getpqty=request('pqty');
        $getpprice=request('pprice');
        $getptotal=request('ptotal');

        $purchase->vendorid=$getvendorid;
        $purchase->proid=$getproid;
        $purchase->pqty=$getpqty;
        $purchase->pprice=$getpprice;
        $purchase->ptotal=$getptotal;
        $date=Carbon::now('Asia/Kolkata');
        $purchase->created_at=$date; 
    
        $purchase->save(); 
        $pro_qty=DB::table('product_models')->select('pqty')->where('id','=',$getproid)->value('pqty');
        $add=($pro_qty)+($getpqty);
        DB::table('product_models')
        ->where('id', $getproid)
       ->update(['pqty' => $add]);

       return redirect('/admin/viewpurchase');

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
