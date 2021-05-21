@extends("auth/authtop")
@section("content")
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Register</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>
                            <span>Register</span>
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
    <div class="col col-3 col-sm-3 col-md-3 col-lg-3"></div>
    <div class="col col-6 col-sm-6 col-md-6 col-lg-6">
    <form action="/auth/save" method="post">
    @if(Session::get('Success'))
    <div class="alert alert-success">
    {{ Session::get('Success')}}
    </div>
    @endif
    @if(Session::get('Fail'))
    <div class="alert alert-danger">
    {{ Session::get('Fail')}}
    </div>
    @endif

    {{ csrf_field() }}
    <table class="table table-borderless">
    <tr>
        <td>Name</td>
        <td><input type="text" class="form-control" name="rname"  value="{{ old('rname') }}">
        <span class="text-danger">@error('rname') {{ $message }} @enderror</span></td>
  
    </tr>
    <tr>
        <td>Phone Number</td>
        <td><input type="text" class="form-control" name="rphone" value="{{ old('rphone') }}" >
        <span class="text-danger">@error('rphone') {{ $message }} @enderror</span></td>
    </tr>
    <tr>
        <td>email</td>
        <td><input type="text" class="form-control" name="remail" value="{{ old('remail') }}" >
        <span class="text-danger">@error('remail') {{ $message }} @enderror</span></td>
    </tr>
    <tr>
        <td>Address</td>
        <td><input type="text" class="form-control" name="raddress" value="{{ old('raddress') }}" >
        <span class="text-danger">@error('raddress') {{ $message }} @enderror</span></td>
    </tr>
    <tr>
        <td>City</td>
        <td><input type="text" class="form-control" name="rcity" value="{{ old('rcity') }}" >
        <span class="text-danger">@error('rcity') {{ $message }} @enderror</span></td>
    </tr>
    <tr>
        <td>State</td>
        <td><input type="text" class="form-control" name="rstate" value="{{ old('rstate') }}" >
        <span class="text-danger">@error('rstate') {{ $message }} @enderror</span></td>
    </tr>
    <tr>
        <td>Pin</td>
        <td><input type="text" class="form-control" name="rpin" value="{{ old('rpin') }}" >
        <span class="text-danger">@error('rpin') {{ $message }} @enderror</span></td>
    </tr>
    <tr>
        <td>Password</td>
        <td><input type="password" class="form-control" name="rpassword" >
        <span class="text-danger">@error('rpassword') {{ $message }} @enderror</span></td>
    </tr>
    <tr>
        <td>Confirm Password</td>
        <td><input type="password" class="form-control" name="rcpassword" >
        <span class="text-danger">@error('rcpassword') {{ $message }} @enderror</span></td>
    </tr>
    <tr>
        <td></td>
        <td><button class="btn btn-success">Submit</button></td>
    </tr>
    </table>
    
    </form>
    <br>
    <br>

    </div>
    <div class="col col-3 col-sm-3 col-md-3 col-lg-3"></div>
    </div>
    </div>

@endsection