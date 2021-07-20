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
        <td><select class="form-control" aria-label=".form-select-lg example" name="vstate">
            <option value="Andhra Pradesh">Andhra Pradesh</option>
            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
            <option value="Assam">Assam</option>
            <option value="Bihar">Bihar</option>
            <option value="Chandigarh">Chandigarh</option>
            <option value="Chhattisgarh">Chhattisgarh</option>
            <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
            <option value="Daman and Diu">Daman and Diu</option>
            <option value="Delhi">Delhi</option>
            <option value="Lakshadweep">Lakshadweep</option>
            <option value="Puducherry">Puducherry</option>
            <option value="Goa">Goa</option>
            <option value="Gujarat">Gujarat</option>
            <option value="Haryana">Haryana</option>
            <option value="Himachal Pradesh">Himachal Pradesh</option>
            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
            <option value="Jharkhand">Jharkhand</option>
            <option value="Karnataka">Karnataka</option>
            <option value="Kerala">Kerala</option>
            <option value="Madhya Pradesh">Madhya Pradesh</option>
            <option value="Maharashtra">Maharashtra</option>
            <option value="Manipur">Manipur</option>
            <option value="Meghalaya">Meghalaya</option>
            <option value="Mizoram">Mizoram</option>
            <option value="Nagaland">Nagaland</option>
            <option value="Odisha">Odisha</option>
            <option value="Punjab">Punjab</option>
            <option value="Rajasthan">Rajasthan</option>
            <option value="Sikkim">Sikkim</option>
            <option value="Tamil Nadu">Tamil Nadu</option>
            <option value="Telangana">Telangana</option>
            <option value="Tripura">Tripura</option>
            <option value="Uttar Pradesh">Uttar Pradesh</option>
            <option value="Uttarakhand">Uttarakhand</option>
            <option value="West Bengal">West Bengal</option>
        </select>
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