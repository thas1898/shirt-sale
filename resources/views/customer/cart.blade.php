@extends("/customer/customertop")
@section("content")
<?php 
use App\Http\Controllers\CartController;
$tp=CartController::totalPrice();
?>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>
                            <span>Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <center>
    <br><br>
    @if(Session::get('Success'))
    <div class="alert alert-success">
    {{ Session::get('Success')}}
    </div>
    @endif
    @if(Session::get('Fail'))
    <div class="alert alert-danger">
    {{ Session::get('Fail')}}
    </div>
    <br><br>
    @endif
    </center> 
     <!-- Shopping Cart Section Begin -->
     <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($carts as $cart)
                                <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img src="img/shopping-cart/cart-1.jpg" alt="">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6>{{ optional($cart->product)->pname }}</h6>
                                            <h5>Rs. {{ optional($cart->product)->pprice }}</h5>
                                        </div>
                                    </td>
                                    <td class="quantity__item">
                                        <label >{{ $cart->cqty }}</label>
                                               
                                            
                                    </td>
                                    <td class="cart__price">Rs.<?php echo ($cart->product->pprice)*($cart->cqty)  ?></td>
                                    <td class="cart__close">
                                        <a href={{"/customer/cartdel/".$cart->id }} onclick="return confirm('Are you sure you want to delete this product from cart?')" > <i class="fa fa-close"></i></a>
                                        
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                     
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <a href="/customer/product"><i></i>Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart__discount">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Coupon code">
                            <button type="submit">Apply</button>
                        </form>
                    </div>
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Total <span>Rs. {{$tp}} </span></li>
                        </ul>
                        <a href="/customer/checkout" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

    @endsection