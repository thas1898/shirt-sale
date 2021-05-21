<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/* COMMON */

Route::get('/', function () { return view('index'); });
Route::get('/about', function () { return view('about'); });

Route::get('/products',[ProductController::class,'viewproducts'] );
Route::get('/productdetails/{id}',[ProductController::class,'prodetails']);
Route::get('/category/{id}',[ProductController::class,'category']);
Route::get('/brand/{id}',[ProductController::class,'brand']);
Route::get('/price/{price1}/{price2}',[ProductController::class,'price']);
Route::get('/size/{size}',[ProductController::class,'size']);

Route::post('/auth/loginread',[LoginRegisterController::class,'store'] );
Route::post('/auth/check',[LoginRegisterController::class,'check'] );
Route::post('/auth/save',[LoginRegisterController::class,'save'] );
Route::get('auth/logout',[LoginRegisterController::class,'logout'] );

/* ADMIN */
Route::group(['middleware'=>['AuthCheck']],function()
{

Route::get('admin/adminhome',[LoginRegisterController::class,'adminhome'] );
Route::get('/auth/login',[LoginRegisterController::class,'logincreate'] );
Route::get('/auth/register',[LoginRegisterController::class,'registercreate'] );
Route::get('/admin/viewcustomer',[LoginRegisterController::class,'index'] );
Route::get('/admin/printcustomer',[LoginRegisterController::class,'customerprint'] );

Route::get('/admin/addcategory',[CategoryController::class,'create'] );
Route::post('/admin/addcategoryread',[CategoryController::class,'store'] );
Route::get('/admin/viewcategory',[CategoryController::class,'index'] );
Route::get('/categoryedit/{id}',[CategoryController::class,'edit']);
Route::post('/categoryupdate/{id}',[CategoryController::class,'update']);
Route::post('/admin/categorysearch',[CategoryController::class,'search']);
Route::get('/admin/categorydel/{id}',[CategoryController::class,'delete']);

Route::get('/admin/addbrand',[BrandController::class,'create'] );
Route::post('/admin/addbrandread',[BrandController::class,'store'] );
Route::get('/admin/viewbrand',[BrandController::class,'index'] );
Route::get('/brandedit/{id}',[BrandController::class,'edit']);
Route::post('/brandupdate/{id}',[BrandController::class,'update']);
Route::post('/admin/brandsearch',[BrandController::class,'search']);
Route::get('/admin/branddel/{id}',[BrandController::class,'delete']);

Route::get('/admin/addproduct',[ProductController::class,'create'] );
Route::post('/admin/addproductread',[ProductController::class,'store'] );
Route::get('/admin/viewproduct',[ProductController::class,'index'] );
Route::get('/productedit/{id}',[ProductController::class,'edit']);
Route::post('/productupdate/{id}',[ProductController::class,'update']);
Route::post('/admin/productsearch',[ProductController::class,'search']);
Route::get('/admin/productdel/{id}',[ProductController::class,'delete']);
Route::get('/admin/printproduct',[ProductController::class,'productprint'] );
Route::get('/branddropdown/{id}',[ProductController::class,'branddropdown']);

Route::get('/admin/addvendor',[VendorController::class,'create'] );
Route::post('/admin/addvendorread',[VendorController::class,'store'] );
Route::get('/admin/viewvendor',[VendorController::class,'index'] );
Route::get('/vendoredit/{id}',[VendorController::class,'edit']);
Route::post('/vendorupdate/{id}',[VendorController::class,'update']);
Route::post('/admin/vendorsearch',[VendorController::class,'search']);
Route::get('/admin/vendordel/{id}',[VendorController::class,'delete']);
Route::get('/admin/printvendor',[VendorController::class,'vendorprint'] );


Route::get('/admin/addpurchase',[PurchaseController::class,'create'] );
Route::post('/admin/purchaseread',[PurchaseController::class,'store'] );
Route::get('/admin/viewpurchase',[PurchaseController::class,'index'] );
Route::post('/admin/purchasesearch',[PurchaseController::class,'search']);
Route::get('/admin/purchasedel/{id}',[PurchaseController::class,'delete']);
Route::get('/purchaseedit/{id}',[PurchaseController::class,'edit']);
Route::post('/purchaseupdate/{id}',[PurchaseController::class,'update']);
Route::get('/admin/printpurchase',[PurchaseController::class,'purchaseprint'] );

Route::get('/admin/vieworder',[OrderController::class,'index'] );
Route::get('/admin/printorder',[OrderController::class,'orderprint'] );
Route::post('/admin/ordersearch',[OrderController::class,'search']);
Route::get('/statusedit/{id}',[OrderController::class,'edit']);
Route::post('/statusupdate/{id}',[OrderController::class,'update']);


});


/* CUSTOMER  */
Route::group(['middleware'=>['CustCheck']],function()
{

Route::get('/customer/customerabout', function () { return view('/customer/customerabout'); });

Route::get('/customer/customerhome',[LoginRegisterController::class,'customerhome'] );
Route::get('/auth/login',[LoginRegisterController::class,'logincreate'] );
Route::get('/auth/register',[LoginRegisterController::class,'registercreate'] );
Route::get('/customeredit/{id}',[LoginRegisterController::class,'edit']);
Route::post('/customerupdate/{id}',[LoginRegisterController::class,'update']);
Route::get('/customer/updatepassword',[LoginRegisterController::class,'passwordcreate']);
Route::post('/customer/updatepasswordread/{id}',[LoginRegisterController::class,'passwordstore']);

Route::get('/customer/product',[ProductController::class,'customerproducts'] );
Route::get('/getcategory/{id}',[ProductController::class,'getcategory']);
Route::get('/getbrand/{id}',[ProductController::class,'getbrand']);
Route::get('/getprice/{price1}/{price2}',[ProductController::class,'getprice']);
Route::get('/getsize/{size}',[ProductController::class,'getsize']);
Route::get('customer/singleproduct/{id}',[ProductController::class,'singleproduct']);

Route::post('/custcart',[CartController::class,'store']);
Route::get('/customer/cartdel/{id}',[CartController::class,'delete']);
Route::get('/customer/cart', [CartController::class,'index']);
Route::get('/customer/checkout',[CartController::class,'viewcustprod']);
Route::get('/customer/updatecart',[CartController::class,'updatecart']);

Route::get('/customer/ordercomplete',[OrderController::class,'store']);
Route::get('/customer/trackorder/{id}',[OrderController::class,'trackorder']);


});