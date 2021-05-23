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
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}" type="text/css">
    
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
        <div id="mobile-menu-wrap"></div>
    </div>
    <!-- Offcanvas Menu End -->

    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
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
                        <a href="/admin/adminhome"><img src="{{ asset('/assets/img/logo.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-10">
                    <nav class="header__menu mobile-menu">
                        <ul>
                        <!-- class="active" -->
                            <li ><a href="/admin/adminhome">Home</a></li>
                            <li><a href="/admin/viewcategory">Categories</a></li>
                            <li><a href="/admin/viewbrand">Brands</a></li>
                            <li><a href="/admin/viewproduct">Products</a></li>
                            <li><a href="/admin/viewvendor">Vendors</a></li>
                            <li><a href="/admin/viewpurchase">Purchase</a></li>
                            <li><a href="/admin/vieworder">Orders</a></li>
                            <li><a href="/admin/viewcustomer">Customers</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>

    <!-- Header Section End -->


@yield("content")


    <!-- Js Plugins -->
 

   <!-- <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script> -->
 
    <script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('/assets/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('/assets/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('/assets/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('/assets/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('/assets/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script>
                $(document).ready(function () {
                $('#cats').on('change', function () {
                let id = $(this).val();
                $('#brandid').empty();
                $('#brandid').append(`<option value="0" disabled selected>Processing...</option>`);
                $.ajax({
                type: 'GET',
                url: '/branddropdown/' + id,
                success: function (response) {
                var response = JSON.parse(response);
                console.log(response);   
                $('#brandid').empty();
                $('#brandid').append(`<option value="0" disabled selected>Select brand</option>`);
                response.forEach(element=> {
                    $('#brandid').append(`<option value="${element['id']}">${element['bname']}</option>`);
                    });
                }
            });
        });
    });
    </script>
</body>

</html>
