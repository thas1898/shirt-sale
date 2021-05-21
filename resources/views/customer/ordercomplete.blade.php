@extends("/customer/customertop")
@section("content")

<?php
use App\Http\Controllers\LoginRegisterController;
if(Session::has('LoggedUser'))
{
$customerid=Session::get('LoggedUser');

$name=LoginRegisterController::username();
}
?>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Checkout</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>
                            <span>Ordercomplete</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->



        <br>
        <br>
        <br>
		<div class="colorlib-product">
			<div class="container">
				
				<div class="row">
					<div class="col-sm-10 offset-sm-1 text-center">
						<p class="icon-addcart"><span><i class="icon-check"></i></span></p>
						<h2 class="mb-4">Thank you for purchasing {{$name}} , Your order is complete</h2>
						<p>
							<a href={{"/customer/trackorder/".$customerid}} class="btn btn-primary btn-primary">View Order</a>
							<a href="/customer/product"class="btn btn-primary btn-primary"><i class="icon-shopping-cart"></i> Continue Shopping</a>
						</p>
					</div>
				</div>
			</div>
		</div>

        <br>
        <br>
        <br>
        @endsection