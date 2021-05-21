<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProductModel;
use App\Models\BrandModel; 
use App\Models\CategoryModel;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=ProductModel::with('category','brand')->paginate(5);
        return view('/admin/viewproduct',compact('products'));
    }

    public function customerproducts()
    {
        $products=ProductModel::with('category','brand')->paginate(9);
        $categories=CategoryModel::all();
        $brands=BrandModel::all();
        return view('/customer/product',compact('categories','brands','products')); 
    }
    public function prodetails($id)
    {
        $data= ProductModel::find($id);
        return view('productdetails',['product'=>$data]);
    }
    public function viewproducts()
    {
        $products=ProductModel::with('category','brand')->paginate(9);
        $categories=CategoryModel::all();
        $brands=BrandModel::all();
        return view('/products',compact('categories','brands','products')); 
    }
    public function category($id)
    {
        
        $categories=CategoryModel::all();
        $brands=BrandModel::all();
        $products= DB::table('product_models')
        ->where('catid', '=', $id)
        ->paginate(9);
        return view('/products',compact('categories','brands','products')); 
    }

    public function brand($id)
    {
        $categories=CategoryModel::all();
        $brands=BrandModel::all();
        $products= DB::table('product_models')
        ->where('brandid', '=', $id)
        ->paginate(9);
        return view('/products',compact('categories','brands','products')); 
    }
    public function price($price1,$price2)
    {
        $categories=CategoryModel::all();
        $brands=BrandModel::all();
        $products= DB::table('product_models')
        ->where('pprice', '>=', $price1)
        ->where('pprice', '<=', $price2)        
        ->paginate(9);
        return view('/products',compact('categories','brands','products')); 
    }

    public function size($size)
    {
        $categories=CategoryModel::all();
        $brands=BrandModel::all();
        $products= DB::table('product_models')
        ->where('size', '=', $size)      
        ->paginate(9);
        return view('/products',compact('products','categories','brands')); 
    }
    public function getcategory($id)
    {
        
        $categories=CategoryModel::all();
        $brands=BrandModel::all();
        $products= DB::table('product_models')
        ->where('catid', '=', $id)
        ->paginate(9);
        return view('/customer/product',compact('products','categories','brands')); 
    }

    public function getbrand($id)
    {
        $categories=CategoryModel::all();
        $brands=BrandModel::all();
        $products= DB::table('product_models')
        ->where('brandid', '=', $id)
        ->paginate(9);
        return view('/customer/product',compact('products','categories','brands')); 
    }
    public function getprice($price1,$price2)
    {
        $categories=CategoryModel::all();
        $brands=BrandModel::all();
        $products= DB::table('product_models')
        ->where('pprice', '>=', $price1)
        ->where('pprice', '<=', $price2)        
        ->paginate(9);
        return view('/customer/product',compact('products','categories','brands')); 
    }

    public function getsize($size)
    {
        $categories=CategoryModel::all();
        $brands=BrandModel::all();
        $products= DB::table('product_models')
        ->where('size', '=', $size)      
        ->paginate(9);
        return view('/customer/product',compact('products','categories','brands')); 
    }

    public function branddropdown($id)
    {
        echo json_encode(DB::table('brand_models')->where('catid', $id)->get());
    }

    public function singleproduct($id)
    {
        $data= ProductModel::find($id);
        return view('/customer/singleproduct',['product'=>$data]);
    }


    function delete($id)
    {
        $procount=DB::table('purchase_models')->where('proid','=', $id)->count();
        if($procount>0)
        {
            return redirect('/admin/viewproduct')->with('Fail','Sorry this product can not be deleted,Since it is refereed in purchases ');  
        }
        $brandcount=DB::table('order_models')->where('proid','=', $id)->count();
        if($procount>0)
        {
            return redirect('/admin/viewproduct')->with('Fail','Sorry this product can not be deleted,Since and order is placed');  
        }
        DB::table('product_models')->where('id','=', $id)->delete();
        return redirect('/admin/viewproduct')->with('Success','Deleted successfully');

    }
    public function productprint()
    {
        $products=ProductModel::with('category','brand')->get();
        return view('/admin/printproduct',compact('products'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=CategoryModel::all();
        $brands=BrandModel::all();
        /*$products=ProductModel::with('category','brand')->get(); */
        return view('/admin/addproduct',compact('categories','brands'));
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
            'pname'=>'required',
            'pdesc'=>'required',
            'size'=>'required',
            'sleeve'=>'required',
            'fit'=>'required',
            'pprice'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:2|max:10',
            'pimg1' => 'mimes:jpeg,bmp,png',
            'pimg2' => 'mimes:jpeg,bmp,png' 

        ]);

        $getpname=request('pname');
        $getcatid=request('catid');
        $getbrandid=request('brandid');
        $getpdesc=request('pdesc');
        $getsize=request('size');
        $getsleeve=request('sleeve');
        $getfit=request('fit');
        $getpprice=request('pprice');

        $getpimg1=$request->file('pimg1');
        $name1=$getpimg1->getClientOriginalName();
        $getpimg1->move(public_path('assets/product_img1'), $name1);

        $getpimg2=$request->file('pimg2');
        $name2=$getpimg2->getClientOriginalName();
        $getpimg2->move(public_path('assets/product_img2'), $name2);

        $product=new ProductModel();
        $product->pname=$getpname;
        $product->catid=$getcatid;
        $product->brandid=$getbrandid;
        $product->pdesc=$getpdesc;
        $product->size=$getsize;
        $product->sleeve=$getsleeve;
        $product->fit=$getfit;
        $product->pprice=$getpprice;
        $product->pimg1=$name1;
        $product->pimg2=$name2;
        
        $product->save(); 

        return redirect('/admin/viewproduct')->with('Success','Added successfully');
        
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
    public function search(Request $request)
    {
     $getpname=request('pname');
     $products=ProductModel::query()->where('pname','LIKE',"%{$getpname}%")->paginate(5);

     return view('/admin/viewproduct',compact('products'));

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products=ProductModel::find($id);
        $categories=CategoryModel::all();
        $brands=BrandModel::all();
        return view('/admin/editproduct',compact('categories','brands','products'));
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
            'pname'=>'required',
            'pdesc'=>'required',
            'size'=>'required',
            'sleeve'=>'required',
            'fit'=>'required',
            'pprice'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:2|max:10',
            'pimg1' => 'mimes:jpeg,bmp,png',
            'pimg2' => 'mimes:jpeg,bmp,png' 
        ]);
        
        $product=ProductModel::find($id);
        $getpname=request('pname');
        $getcatid=request('catid');
        $getbrandid=request('brandid');
        $getpdesc=request('pdesc');
        $getsize=request('size');
        $getsleeve=request('sleeve');
        $getfit=request('fit');
        $getpprice=request('pprice'); 

        $getpimg1=$request->file('pimg1');
        $name1=$getpimg1->getClientOriginalName();
        $getpimg1->move(public_path('assets/product_img1'), $name1);

        $getpimg2=$request->file('pimg2');
        $name2=$getpimg2->getClientOriginalName();
        $getpimg2->move(public_path('assets/product_img2'), $name2);

 
        $product->pname=$getpname;
        $product->catid=$getcatid;
        $product->brandid=$getbrandid;
        $product->pdesc=$getpdesc;
        $product->size=$getsize;
        $product->sleeve=$getsleeve;
        $product->fit=$getfit;
        $product->pprice=$getpprice;
        $product->pimg1=$name1;
        $product->pimg2=$name2;
     
        $product->save(); 
        
        return redirect('/admin/viewproduct')->with('Success','Edited successfully');;
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
