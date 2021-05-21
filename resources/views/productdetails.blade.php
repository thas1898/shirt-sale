@extends("top")
@section("content")

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>About Us</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>
                            <span>Product</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

                
                <!-- Shop Details Section Begin -->
    <section class="shop-details">
        <div class="product__details__pic">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__breadcrumb">
                            <a href="./index.html">Home</a>
                            <a href="/customer/product">Shop</a>
                            <span>Product Details</span>
                        </div>
                    </div>
                </div>
                <br>

                <br>
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="{{ URL::asset('assets/product_img1/'.$product->pimg1) }}">
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="{{ URL::asset('assets/product_img2/'.$product->pimg2) }}">
                                    </div>
                                </a>
                            </li>                            
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="{{ URL::asset('assets/product_img1/'.$product->pimg1) }}" alt="">
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="{{ URL::asset('assets/product_img2/'.$product->pimg2) }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product__details__content">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="product__details__text">
                            <h4><b>{{ $product->pname }}</b></h4><br>
                            <h5>Rs.{{ $product->pprice }}</h5>
                            <br>
                            <h5><b>SLEEVE TYPE : </b>{{ $product->sleeve }}</h5>
                            <br>
                            <h5><b>FIT TYPE : </b>{{ $product->fit }}</h5> <br>
                            <h4>Description</h4>
                            <p>{{ $product->pdesc }}</p>
                            <div class="product__details__option">
                                <div class="product__details__option__size">
                                    <span>Size:</span>
                                    <label for="s">S
                                     <input type="radio" id="s">
                                     </label>
                                     <label for="m">M
                                     <input type="radio" id="m">
                                     </label>
                                    <label for="l">L
                                    <input type="radio" id="l">
                                    </label> 
                                </div>
                                <div class="product__details__option__color">
                                    
                                </div>
                            </div>
   
                            @if($product->pqty>0)
                                   <h3 style='color:green;font-weight: bold;'>IN STOCK</h3>
                                   @else
                                   <h3 style='color:red;font-weight: bold;'>OUT OF STOCK</h3>
                                   @endif
                            <div class="product__details__cart__option">
                                <form action="/custcart" method="post">
                                   {{ csrf_field() }}
                                  <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="number" name="qty" value="1" min="1" max="100">
                                    </div>
                                   </div>
                                  
                                    <input type="hidden" name="pid" value={{ $product->id }}>
                                    <button class="primary-btn">Add To Cart</button>
                                </form>  
                            </div>
                           
                            <div class="product__details__last__option">
                                <h5><span>Guaranteed Safe Checkout</span></h5>
                                <img src="{{ asset('assets/img/shop-details/details-payment.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Details Section End -->

   <br><br>

    @endsection