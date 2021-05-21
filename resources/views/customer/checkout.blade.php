@extends("/customer/customertop")
@section("content")
<script type="text/javascript"> 
    function displayForm(c)
    {
        if (c.value == "1")
         {
            document.getElementById("ccformContainer").style.visibility = 'visible';
			document.getElementById("paypalformContainer").style.visibility = 'hidden';
        } 
		else if (c.value == "2") 
		{
             document.getElementById("paypalformContainer").style.visibility = 'visible';
			 document.getElementById("ccformContainer").style.visibility = 'hidden';
        }
		else
		{}
    }

    </script>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Checkout</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

 <!-- Checkout Section Begin -->
 <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h6 class="checkout__title">Billing Details</h6>
                            @foreach($customers as $customer)
                            <div class="row">
                                    <div class="checkout__input">
                                        <p>Name<span>*</span></p>
                                        <input type="text" class="form-control" name="rname" value="{{ $customer->rname }}" readonly>
                                    </div>
                            </div> 
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" class="form-control"  name="raddress" value="{{ $customer->raddress }}" readonly>
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="" class="form-control" name="rcity" value="{{ $customer->rcity }}" readonly>
                            </div>
                            <div class="checkout__input">
                                <p>Country/State<span>*</span></p>
                                <input type="" class="form-control" name="rstate" value="{{ $customer->rstate }}" readonly>
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="" class="form-control" name="rpin" value="{{ $customer->rpin }}" readonly>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" class="form-control" name="rphone" value="{{ $customer->rphone }}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" class="form-control" name="remail" value="{{ $customer->remail }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="diff-acc">
                                    Note about your order, e.g, special note for delivery
                                    <input type="checkbox" id="diff-acc">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input">
                                <p>Order notes</p>
                                <input type="text"
                                placeholder="Notes about your order, e.g. special notes for delivery.">
                            </div>
                        @endforeach
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4 class="order__title">Your order</h4>
                                <div class="checkout__order__products">Product <span>Total</span></div>
                                <ul class="checkout__total__products">
                                @foreach($carts as $cart)
                                    <li>{{ optional($cart->product)->pname }}<span>Rs {{ ($cart->cqty)*($cart->product)->pprice }}</span></li>
                                    @endforeach
                                </ul>
                                <ul class="checkout__total__all">
                                    <li>Subtotal <span>Rs <?php 
                                    use App\Http\Controllers\CartController;
                                    echo CartController::totalPrice();
                                    ?></span></li>
                                </ul>
                                <p>Choose payment mode</p>
                                <div class="form-group">
									<div class="radio">
										<form action="" method="POST">
											<label><input type="radio" value="1" name="formselector" onClick="displayForm(this)"><b>Credit/Debit/ATM card<b></label>
											<br>
											<label><input type="radio" value="2" name="formselector" onClick="displayForm(this)"><b>Cash on delivery<b></label>
										</form>
										<div style="visibility:hidden; position:relative" id="ccformContainer">
											<form class="form-group">
												<input type="text" id="myInput" class="form-control" placeholder="enter card number" required>
												<input type="text" id="myInput" class="form-control" name="cccvc" placeholder="enter CVV Number" required><BR>
												<b>CREDIT EXPIRY DATE</b><BR>
												<input type="date" id="myInput" class="form-control" required><br>
												<b>TOTAL AMOUNT:</b> <br>
												<input type="text" id="myInput" class="form-control" value="">
                                                <br><br>
												<a href="/customer/ordercomplete" class="site-btn"><center>PLACE ORDER</center></a>
											</form>
										</div>
										<div style="visibility:hidden; position:relative;top:-260px;margin-top:-110px" id="paypalformContainer">
											<form class="form-group">
                                            <a href="/customer/ordercomplete" class="site-btn"><center>PLACE ORDER</center></a>

											</form>
										</div>
									</div>
								</div>	
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

    @endsection