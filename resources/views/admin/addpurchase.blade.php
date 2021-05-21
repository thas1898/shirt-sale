@extends("admin/admintop")
@section("content")  
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
<script type="text/javascript">
    function multiply(element) 
    {
    var form = element.form;
    form.ptotal.value = form.pprice.value * element.value;
    }
    </script>
   <!-- Breadcrumb Section Begin -->
   <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>purchase</h4>
                        <div class="breadcrumb__links">
                            <a href="/admin/adminhome">Home</a>
                            <span>Purchase</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <br>
    <center>   <h3 style='color:maroon;font-weight: bold;'>ADD PURCHASE </h3></center>
<br> 
<div class="container">
    <div class="row">
    <div class="col col-2 col-sm-2 col-md-2 col-lg-2"></div>
    <div class="col col-8 col-sm-8 col-md-8 col-lg-8">
    <form action="/admin/purchaseread" method="post">
    {{ csrf_field() }}
    <table class="table table-dark table-hover">
    <tr>
        <td>Company Name</td>
        <td><select class="form-control" aria-label="Default select example" name="vendorid">
        <option selected>Select the vendor Company</option>
            @foreach($vendors as $vendor)
            <option value="{{ $vendor->id }}">{{ $vendor->vcname }}</option>
            @endforeach 
            </select>
        </td>
    </tr>
    <tr>
        <td>Product</td>
        <td>
            <select class="form-control" aria-label=".form-select-lg example" name="proid">
            @foreach($products as $product)
            <option value="{{ $product->id }}">{{ $product->pname }}</option>
            @endforeach 
            </select>
        </td>
    </tr>
    <tr>
        <td>Price</td>
        <td><input type="text" class="form-control" name="pprice"></td>
    </tr>
    <tr>
        <td>Quantity</td>
        <td><input type="text" class="form-control" name="pqty" onKeyUp="multiply(this)" ></td>
    </tr>
    <tr>
        <td>Total Amount</td>
        <td><input type="text" class="form-control" name="ptotal"></td>
    </tr>
    <tr>
        <td></td>
        <td><button class="btn btn-success">Submit</button></td>
    </tr>
    </table>
    
    </form>
    </div>
    <div class="col col-2 col-sm-2 col-md-2 col-lg-2"></div>
    </div>
    </div>
@endsection