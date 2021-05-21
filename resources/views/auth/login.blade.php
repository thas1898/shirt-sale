@extends("auth/authtop")
@section("content")   
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Login</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>
                            <span>Login</span>
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
    <form action="/auth/check" method="post">
    @if(Session::get('fail'))
    <div class="alert alert-danger">
    {{ Session::get('fail')}}
    </div>
    @endif
    {{ csrf_field() }}
    <table class="table table-borderless">
    <tr>
        <td>email</td>
        <td><input type="text" class="form-control" name="lemail" value="{{ old('lemail') }}" >
        <span class="text-danger">@error('lemail') {{ $message }} @enderror</span></td>
    </tr>
    <tr>
        <td>password</td>
        <td><input type="password" class="form-control" name="lpassword">
        <span class="text-danger">@error('lpassword') {{ $message }} @enderror</span></td>
    </tr>
    <tr>
        <td></td>
        <td><center><button class="btn btn-success" name="lsubmit" value="lsubmit">LOGIN</button></center></td>
    </tr>
    <tr>
        <td></td>
        <td><center>New customer?<a href="/auth/register"> Sign up</a></center></td>
    </tr>

    </table>

    
    </form>
    <br>
    </div>
    <div class="col col-3 col-sm-3 col-md-3 col-lg-3"></div>
    </div>
    </div>

    @endsection