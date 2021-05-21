@extends("/customer/customertop")
@section("content")

<section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Order</h4>
                        <div class="breadcrumb__links">
                            <a href="/customer/customerhome">Home</a>
                            <span> Your Orders</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Breadcrumb Section End-->

<section class="checkout spad">
    @forelse($orders as $order)
  
        <div class="container">
            <div class="checkout__form">
                <div class="row">
                   <h4 class="checkout__title">{{ optional($order->product)->pname }}</h4>
                    <div class="col col-5 col-sm-5 col-md-5 col-lg-5">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ URL::asset('assets/product_img1/'.optional($order->product)->pimg1) }}"></div>
                        </div>
                    </div>  
                    <div class="col col-7 col-sm-7 col-md-7 col-lg-7">
                                <ul class="checkout__total__products">
                                    <li><b>PRICE</b><span>{{ $order->oprice }}</span></li>
                                    <li><b>QUANTITY</b><span>{{ $order->oqty }}</span></li>
                                    <li><b>TOTAL</b><span>{{ $order->ototal }}</span></li>
                                    <li><b>ORDER PLACED AT</b><span>{{ $order->created_at }}</span></li>
                                    <li><b>STATUS</b><span>{{ $order->status }}</span></li>
                                </ul>
                    </div> 
                </div>
                <div class="row">
                      <h4 class="checkout__title">Shipping Details</h4> 
                             <div class="col col-12 col-sm-12 col-md-12 col-lg-12">
                            <!-- <table class="table table-dark table-hover">
                             <tr><td>{{ optional($order->register)->rname }}</td></tr>
                             <tr><td>{{ optional($order->register)->raddress }}</td></tr>
                             <tr><td>{{ optional($order->register)->rcity }}</td></tr>
                             <tr><td>{{ optional($order->register)->rstate }}-{{ optional($order->register)->rpin }}</td></tr> -->
                                <ul class="checkout__total__products">
                                <li>{{ optional($order->register)->rname }}<span></span></li>
                                    
                                    <li>{{ optional($order->register)->raddress }}</li>
                                    <li>{{ optional($order->register)->rcity }}</li>
                                    <li>{{ optional($order->register)->rstate }}-{{ optional($order->register)->rpin }}</li>
                                   
                                </ul> 
                             </div> 
                            
                </div>
             
            </div>
        </div>
        @empty
       <center> <h2>YOU HAVENT MADE ANY ORDERS</h2> <br>
       <a href="/"class="btn btn-primary btn-primary">Home</a>
		<a href="/customer/product"class="btn btn-primary btn-primary"><i class="icon-shopping-cart"></i> Continue Shopping</a>
       </center>
        @endforelse
</section>
    

@endsection 

 

 