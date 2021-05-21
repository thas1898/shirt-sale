<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\OrderModel;
use App\Models\ProductModel;
use App\Models\RegisterModel;
use App\Models\CartModel;
use Carbon\Carbon;
use Session;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    static public function totalsales()
    {
        return OrderModel::count('id');
    }
    static public function todaysales()
    {
        $date=Carbon::now('Asia/Kolkata')->format('y-m-d');
        return OrderModel::where('created_at','LIKE',"%{$date}%")->count();
    }
    public function index()
    {
        
        $orders=OrderModel::with('register','product')->paginate(5);
        return view('/admin/vieworder',compact('orders'));
    }
    public function trackorder($id)
    {
        
        $orders=OrderModel::with('register','product')
        ->where('cid','=',$id)
        ->get();
      
            return view('/customer/trackorder',compact('orders'));
    
    }

    public function orderprint()
    {
        
        $orders=OrderModel::with('register','product')->get();
        return view('/admin/printorder',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
     $getdate=request('created_at');
     $orders=OrderModel::query()->where('created_at','LIKE',"%{$getdate}%")->paginate(5);

     return view('/admin/vieworder',compact('orders'));

    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId=Session::get('LoggedUser');
        $carts=DB::table('cart_models')
        ->where('cid','=',$userId)->get();

        foreach($carts as $cart)
        {
            $products=DB::table('product_models')
            ->where('id','=',$cart->proid)->get();
            foreach($products as $product)
            {
                $order=new OrderModel();
                $order->cid=$userId;
                $order->proid=$cart->proid;
                $order->oqty=$cart->cqty;
                $order->oprice=$product->pprice;
                $order->ototal=($cart->cqty)*($product->pprice);
                $date=Carbon::now('Asia/Kolkata');
                $order->created_at=$date; 
                $order->save(); 
                
                DB::table('product_models')
                ->where('id', $product->id)
                ->update(['pqty' => ($product->pqty-$cart->cqty)]);

                DB::table('cart_models')->delete($cart->id);
            }
        }
        return view('/customer/ordercomplete');
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
 
        $orders=OrderModel::find($id);
        return view('/admin/editstatus',compact('orders'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status'=>'required',
        ]);
        
        $order=OrderModel::find($id);
        $getstatus=request('status');

        $order->status=$getstatus;
     
        $order->save();

        return redirect('/admin/vieworder')->with('Success','Status edited successfully');;
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
