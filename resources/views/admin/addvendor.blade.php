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
   <!-- Breadcrumb Section Begin -->
   <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Vendor</h4>
                        <div class="breadcrumb__links">
                            <a href="/admin/adminhome">Home</a>
                            <span>Vendor</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <br>
    <center>   <h3 style='color:maroon;font-weight: bold;'>ADD VENDOR</h3></center>
<br>
<div class="container">
    <div class="row">
    <div class="col col-2 col-sm-2 col-md-2 col-lg-2"></div>
    <div class="col col-8 col-sm-8 col-md-8 col-lg-8">
    <form action="/admin/addvendorread" method="post">
    {{ csrf_field() }}
    <table class="table  table-dark table-hover">
    <tr>
        <td>Vendor name</td>
        <td><input type="text" class="form-control" name="vname" value="{{ old('vname') }}">
        <span class="text-danger">@error('vname') {{ $message }} @enderror</span></td>
    </tr>
    <tr>
        <td>Company Name</td>
        <td><input type="" class="form-control" name="vcname" value="{{ old('vcname') }}">
        <span class="text-danger">@error('vcname') {{ $message }} @enderror</span></td>
    </tr>
    <tr>
        <td>Address</td>
        <td><input type="text" class="form-control" name="vaddress" value="{{ old('vaddress') }}">
        <span class="text-danger">@error('vaddress') {{ $message }} @enderror</span></td>
    </tr>
    <tr>
        <td>State</td>
        <td><input type="text" class="form-control" name="vstate" value="{{ old('vstate') }}">
        <span class="text-danger">@error('vstate') {{ $message }} @enderror</span></td>
    </tr>
    <tr>
        <td>Phone</td>
        <td><input type="text" class="form-control" name="vphone" value="{{ old('vphone') }}">
        <span class="text-danger">@error('vphone') {{ $message }} @enderror</span></td>
    </tr>   
     <tr>
        <td>Email</td>
        <td><input type="text" class="form-control" name="vemail" value="{{ old('vemail') }}">
        <span class="text-danger">@error('vemail') {{ $message }} @enderror</span></td>
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