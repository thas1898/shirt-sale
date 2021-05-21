@extends("admin/admintop")
@section("content")  
   <!-- Breadcrumb Section Begin -->
   <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Vendor</h4>
                        <div class="breadcrumb__links">
                            <a href="/admin/adminhome">Home</a><a href="/admin/viewvendor">Vendor</a>
                            <span>Edit Vendor</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <br>
<br>
    <div class="container">
    <div class="row">
    <div class="col col-12 col-sm-12 col-md-12 col-lg-12">
    <form action="/vendorupdate/{{ $vendors->id }}" method="post">
    {{ csrf_field() }}
    <table class="table">
    <tr>
        <td>Vendor name</td>
        <td><input type="text" class="form-control" name="vname" value="{{ $vendors->vname }}"></td>
    </tr>
    <tr>
        <td>Company Name</td>
        <td><input type="" class="form-control" name="vcname" value="{{ $vendors->vcname }}"></td>
    </tr>
    <tr>
        <td>Address</td>
        <td><input type="text" class="form-control" name="vaddress" value="{{ $vendors->vaddress }}"></td>
    </tr>
    <tr>
        <td>State</td>
        <td><input type="text" class="form-control" name="vstate" value="{{ $vendors->vstate }}"></td>
    </tr>
    <tr>
        <td>Phone</td>
        <td><input type="text" class="form-control" name="vphone" value="{{ $vendors->vphone }}"></td>
    </tr>   
     <tr>
        <td>Email</td>
        <td><input type="text" class="form-control" name="vemail" value="{{ $vendors->vemail }}"></td>
    </tr>
    <tr>
        <td></td>
        <td><button class="btn btn-success">Submit</button></td>
    </tr>
    </table>
    
    </form>
    </div>
    </div>
    </div>
@endsection