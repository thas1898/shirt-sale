<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CartModel;
use App\Models\ProductModel;
use App\Models\RegisterModel;
use Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $getuser=$request->session()->get('LoggedUser');
        $getcqty=request('qty');
        $getproid=$request->pid;
        $countproduct=DB::table('cart_models')->where('cid', $getuser)->where('proid','=',$getproid)->count();
        $pro_qty=DB::table('product_models')->select('pqty')->where('id','=',$getproid)->value('pqty');
        $diff =($pro_qty) - ($getcqty);

        if($pro_qty>=1 and $diff<0)
        {
            return back()->with ('fail','Sorry,only '.$pro_qty.' left!');
            /*return redirect('/customer/singleproduct/'.$getproid)->with('alert', 'Sorry,only '.$pro_qty.' left!');*/
        }
        elseif($countproduct>=1)
        {
            return back()->with ('fail','Product already in cart!');
           /* return redirect('/customer/singleproduct/'.$getproid)->with('alert', 'Product already in cart!');*/
        }
        elseif($pro_qty<=0)
        {
            return back()->with ('fail','Sorry,This product is currently out of stock,stay updated !');
           /* return redirect('/customer/singleproduct/'.$getproid)->with('alert', 'Sorry,This product is currently out of stock,stay updated !'); */
        }
        else
        {    
            $cart= new CartModel();
            $cart->cid=$getuser;
            $cart->proid=$getproid;
            $cart->cqty=$getcqty;
            $cart->save();
            return redirect('/customer/cart');  
        }
    }

    static public function cartItem()
    {
       $userId=Session::get('LoggedUser');
       return CartModel::where('cid',$userId)->count();
    }

    public function index()
    {
        $userId=Session::get('LoggedUser'); 
        $carts=CartModel::with('product')
        ->where('cid','=',$userId)->get();
        return view('/customer/cart',compact('carts'));
    }

    function delete($id)
    {
        $data=CartModel::find($id);
        $data->delete();
        return redirect('/customer/cart');

    }
    public function viewcustprod()
    {   
        $userId=Session::get('LoggedUser');   
        $count=DB::table('cart_models')->where('cid', $userId)->count();
        if($count==0)
        {
            return redirect('/customer/cart')->with ('Fail','Your cart is empty !');;
        }
         else
         {
        $carts=CartModel::with('product')
        ->where('cid','=',$userId)->get();
        $customers=DB::table('register_models')
        ->where('id','=',$userId)->get();
        return view('/customer/checkout',compact('customers','carts'));
         }
    }

    static public function totalPrice()
    {
        $userId=Session::get('LoggedUser');
        $carts=DB::table('cart_models')
        ->where('cid','=',$userId)->get();

        $total=0;
        foreach($carts as $cart)
        {
            
            $products=DB::table('product_models')
            ->where('id','=',$cart->proid)->get();
            foreach($products as $product)
            {
                $total= $total+($cart->cqty)*($product->pprice);
            }
        }
        return $total;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
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
        //
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
