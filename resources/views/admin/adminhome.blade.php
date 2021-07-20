@extends("admin/admintop")
@section("content")  
<?php
use App\Http\Controllers\OrderController;
if(Session::has('LoggedUser'))
{

$total =OrderController::totalsales();
$today =OrderController::todaysales();
}
?>

   <!-- Breadcrumb Section Begin -->
   <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Home</h4>
                        <div class="breadcrumb__links">
                            <a href="/admin/adminhome">Home</a>
                  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End {{ $LoggedUserInfo['type'] }}-->


   <br>
   <br>
    <center>   <h3 style='color:maroon;font-weight: bold;'>Welcome Admin </h3></center>
    <br><br>
<!-- Categories Section Begin -->
<section class="categories spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="categories__text">
                        <h2 style='color:maroon;'>Formal Shirt <br />Casual Shirt<br /> Brands</h2>
                    </div>
                </div>
  
                <div class="col-lg-5">
                    <div class="categories__deal__countdown">
                        <span>Mens Shirts</span>
                        <h2>SHOPPERS STOP</h2>
                        <a href="/admin/vieworder" class="primary-btn">View Sales </a> <br>
                        <a href="/admin/addproduct" class="primary-btn">Add Products</a> <br>
                        <a href="/admin/addpurchase" class="primary-btn">Make Purchase</a>

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories__deal__countdown">
                        <h3><span>Total Sales</span></h3>
                        <h4>  {{$total}}</h4>
                        <br><br>
                        <h3><span>Todays Sales</span></h3>
                        <h4>  {{$today}}</h4>
                      
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->
    <br><br>
    
@endsection