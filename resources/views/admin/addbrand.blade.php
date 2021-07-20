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
                        <h4>Brand</h4>
                        <div class="breadcrumb__links">
                            <a href="/admin/adminhome">Home</a>
                            <span>Brand</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

<br>
<center>   <h3 style='color:maroon;font-weight: bold;'>ADD BRAND</h3></center>

<br>
<div class="container">
    <div class="row">
    <div class="col col-2 col-sm-2 col-md-2 col-lg-2"></div>
    <div class="col col-8 col-sm-8 col-md-8 col-lg-8">
    <form action="/admin/addbrandread" method="post">
    {{ csrf_field() }}
    <table class="table table-dark table-hover">
    <tr>
        <td>category name</td>

        <td><select class="form-select" aria-label=".form-select-lg example" name="catid">
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->cname }}</option>
            @endforeach 
            </select>
        </td>
    </tr>
    <tr>
        <td>Brand name</td>
        <td><input type="text" class="form-control" name="bname" value="{{ old('bname') }}">
        <span class="text-danger">@error('bname') {{ $message }} @enderror</span></td>
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