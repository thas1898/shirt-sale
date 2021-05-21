<?php
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginRegisterController;
if(Session::has('LoggedUser'))
{
$customerid=Session::get('LoggedUser');
$total =CartController::cartItem();
$name=LoginRegisterController::username();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoppers Stop</title>
    

   <!-- Css Styles -->
   <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
</head>
<body>

<!-- Offcanvas Menu Begin -->
<div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links">
                <a href="/auth/logout">Log out</a>
            </div>
        </div>
        <div class="offcanvas__nav__option">
          <!--   <a href="#"><img src="{{ asset('assets/img/icon/heart.png') }}" alt=""></a>
            <a href="#"><img src="{{ asset('assets/img/icon/cart.jpg') }}" alt=""> <span></span></a> -->
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
    <!-- Offcanvas Menu End -->

    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                       <div class="header__top__left">
                            <p>Welcome {{$name}} </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="header__top__right">
                            <div class="header__top__links">
                                <a href="/auth/logout">Log out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="header__logo">
                        <a href="/"><img src="{{ asset('assets/img/logo.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-10">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li ><a href="/customer/customerhome">Home</a></li>

                            <li><a href="/customer/product">Shop</a>
                            </li>
                            <li><a href="/customer/customerabout">About us</a></li>
                            <li><a href="#">My Account</a>
                                <ul class="dropdown">
                                    <li><a href={{"/customeredit/".$customerid}}>Edit Profile</a></li>
                                    <li><a href="/customer/updatepassword">Change Password</a></li>
                                    
                                </ul>
                            </li>
                            <li><a href={{"/customer/trackorder/".$customerid}}>Your Orders</a></li>
                            <li><a href="/customer/cart">Cart({{$total}})</a></li>
                        </ul>
                    </nav>
                </div>
                 <!--<div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                    <a href="#" class="search-switch"><img src="{{ asset('assets/img/icon/search.png') }}" alt=""></a>
                        <a href="#"><img src="{{ asset('assets/img/icon/heart.png') }}" alt=""></a>
                        <a href="/customer/cart"><img src="{{ asset('assets/img/icon/cart.jpg') }}" alt=""> <span> {{$total}}</span></a> 
                        
                    </div>
                </div>-->
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>

    <!-- Header Section End -->


@yield("content")

<!-- Footer Section Begin -->
<footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="#"><img src="{{ asset('assets/img/logo.png') }}" alt=""></a>
                        </div>
                        <p>The customer is at the heart of our unique business model, which includes design.</p>
                        <a href="#"><img src="{{ asset('assets/img/payment.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="#">Trending styles</a></li>
                            <li><a href="#">Formal Shirts</a></li>
                            <li><a href="#">Casual Shirts</a></li>
                            <li><a href="#">Sale</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Payment Methods</a></li>
                            <li><a href="#">Delivary</a></li>
                            <li><a href="#">Return & Exchanges</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>NewLetter</h6>
                        <div class="footer__newslatter">
                            <p>Be the first to know about new arrivals, look books, sales & promos!</p>
                            <form action="#">
                                <input type="text" placeholder="Your email">
                                <button type="submit"><span class="icon_mail_alt"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                       
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->

    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('assets/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>