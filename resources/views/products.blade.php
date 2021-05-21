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

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">
                            
                        </div>
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                                    @foreach($categories as $category)
                                                    <li><a href="/category/{{$category->id}}">{{ $category->cname }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseTwo">Branding</a>
                                    </div>
                                    <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__brand">
                                                <ul>
                                                @foreach($brands as $brand)
                                                    <li><a href="/brand/{{$brand->id}}">{{ $brand->bname }}</a></li>
                                                @endforeach    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseThree">Filter Price</a>
                                    </div>
                                    <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__price">
                                                <ul>
                                                     <li><a href="/price/0/500">Rs 0 - Rs 500</a></li>
                                                    <li><a href="/price/500/1000">Rs 500 - Rs 1000</a></li>
                                                    <li><a href="/price/1000/1500">Rs 1000 - Rs 1500</a></li>
                                                    <li><a href="/price/1500/2000">Rs 1500 - Rs 2000</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseFour">Size</a>
                                    </div>
                                    <div id="collapseFour" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__size">
                                                <label for="s"><a href="/size/s">S</a></label>
                                                <label for="m"><a href="/size/m">M</a></label>
                                                <label for="l"><a href="/size/l">L</a></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="shop__product__option">
                        <div class="row">
                            
                            <div class="col-lg-6 col-md-6 col-sm-6">
                             
                            </div>
                        </div>
                    </div>



                    <div class="row">
                    @foreach($products as $product)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ URL::asset('assets/product_img1/'.$product->pimg1) }}">
                                </div>
                                <div class="product__item__text">
                                    <h6>{{ $product->pname }}</h6>
                                    <a href="/productdetails/{{$product->id}}" class="add-cart">View Product</a>

                                    <h5>Rs.{{ $product->pprice }}</h5>
                                    @if($product->pqty>0)
                                   <h6 style='color:green;font-weight: bold;'>IN STOCK</h6>
                                   @else
                                   <h6 style='color:red;font-weight: bold;'>OUT OF STOCK</h6>
                                   @endif
                                   
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>    
                    <center><span>{{ $products->links() }}</span></center>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product__pagination">
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

    @endsection