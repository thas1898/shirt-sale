@extends("/customer/customertop")
@section("content")
<?php
use App\Http\Controllers\LoginRegisterController;
if(Session::has('LoggedUser'))
{
$customerid=Session::get('LoggedUser');
}
?>

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
    <form action="/customer/updatepasswordread/{{$customerid}}" method="post">
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
<td><label>Current password:</label></td>
<td><input type="password" placeholder="enter current password" class="form-control" name="rpassword"  >
<span class="text-danger">@error('rpassword') {{ $message }} @enderror</span></td>
</tr>
<tr>
<td><label>New password:</label></td>
<td><input type="password" placeholder="enter new password" class="form-control" name="newpassword"  >
<span class="text-danger">@error('newpassword') {{ $message }} @enderror</span></td>
</tr>
<tr>
<td><label>Confirm password:</label></td>
<td><input type="password" placeholder="confirm new password" class="form-control" name="cnewpassword" value="{{ old('cnewpassword') }}" >
<span class="text-danger">@error('cnewpassword') {{ $message }} @enderror</span></td>
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