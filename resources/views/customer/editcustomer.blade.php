@extends("/customer/customertop")
@section("content")


    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Edit Customer</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>
                            <span>Edit Customer</span>
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
    <form action="/customerupdate/{{ $customers->id }}" method="post">
    @if(Session::get('Success'))
    <div class="alert alert-success">
    {{ Session::get('Success')}}
    </div>
    @endif
    @if(Session::get('fail'))
    <div class="alert alert-danger">
    {{ Session::get('fail')}}
    </div>
    @endif
    {{ csrf_field() }}
    <table class="table table-borderless">
    <tr>
        <td>Name</td>
        <td><input type="text" class="form-control" name="rname"  value="{{ $customers->rname }}">
        <span class="text-danger">@error('rname') {{ $message }} @enderror</span></td>
  
    </tr>
    <tr>
        <td>Phone Number</td>
        <td><input type="text" class="form-control" name="rphone" value="{{ $customers->rphone }}" >
        <span class="text-danger">@error('rphone') {{ $message }} @enderror</span></td>
    </tr>
    <tr>
        <td>Address</td>
        <td><input type="text" class="form-control" name="raddress" value="{{ $customers->raddress }}">
        <span class="text-danger">@error('raddress') {{ $message }} @enderror</span></td>
    </tr>
    <tr>
        <td>City</td>
        <td><input type="text" class="form-control" name="rcity" value="{{ $customers->rcity }}" >
        <span class="text-danger">@error('rcity') {{ $message }} @enderror</span></td>
    </tr>
    <tr>
        <td>State</td>
        <td><input type="text" class="form-control" name="rstate" value="{{ $customers->rstate }}" >
        <span class="text-danger">@error('rstate') {{ $message }} @enderror</span></td>
    </tr>
    <tr>
        <td>Pin</td>
        <td><input type="number" class="form-control" name="rpin" value="{{ $customers->rpin }}" >
        <span class="text-danger">@error('rpin') {{ $message }} @enderror</span></td>
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