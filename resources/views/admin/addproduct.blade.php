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
                        <h4>Product</h4>
                        <div class="breadcrumb__links">
                            <a href="/admin/adminhome">Home</a>
                            <span>Product</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <br>
    <center>   <h3 style='color:maroon;font-weight: bold;'>ADD PRODUCT</h3></center>
<br>
<div class="container">
    <div class="row">
    <div class="col col-1 col-sm-1 col-md-1 col-lg-1"></div>
    <div class="col col-10 col-sm-10 col-md-10 col-lg-10">
    <form action="/admin/addproductread" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <table class="table table-dark table-hover">
       <tr>
        <td>Product Name</td>
        <td><input type="text" class="form-control" name="pname" value="{{ old('pname') }}">
        <span class="text-danger">@error('pname') {{ $message }} @enderror</span></td>
    </tr>
    <tr>
        <td>Category Name</td>
            <td><select class="form-select" aria-label=".form-select-lg example"  name="catid" id="cats">
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->cname }}</option>
            @endforeach 
            </select>
        </td>
    </tr>
    <tr>
        <td>Brand Name</td>
        
        <td><select class="form-select" aria-label=".form-select-lg example" name="brandid" id="brandid" placeholder="Select brand">
        </select>
        </td>
    </tr>

    <tr>
        <td>Description</td>
        <td><input type="text" class="form-control" name="pdesc" value="{{ old('pdesc') }}">
        <span class="text-danger">@error('pdesc') {{ $message }} @enderror</span></td>
    </tr>
    <tr>
        <td>Size</td>
        <td><select class="form-select" aria-label=".form-select-lg example" name="size" placeholder="Select size">
        <option value="S">S</option>
        <option value="M">M</option>
        <option value="L">L</option>
        </select></td>
    </tr>
    <tr>
        <td>Sleeve</td>
        <td><select class="form-select" aria-label=".form-select-lg example" name="sleeve" placeholder="Select sleeve">
        <option value="Full Sleeve">Full Sleeve</option>
        <option value="Half Sleeve">Half Sleeve</option>
        <option value="Roll-up Sleeve">Roll-up Sleeve</option>
        <option value="Short Sleeve">Short Sleeve</option>
        </select></td>
    </tr>
    <tr>
        <td>Fit</td>
        <td><select class="form-select" aria-label=".form-select-lg example" name="fit" placeholder="Select fit type">
        <option value="Regular">Regular</option>
        <option value="Loose">Loose</option>
        <option value="Slim">Slim</option>
        </select></td>
    </tr>
    <tr>
        <td>Price</td>
        <td><input type="text" class="form-control" name="pprice" value="{{ old('pprice') }}">
        <span class="text-danger">@error('pprice') {{ $message }} @enderror</span></td>
    </tr>
    <tr>
        <td>Product Image-1</td>
        <td><input type="file" class="form-control" name="pimg1" value="{{ old('pimg1') }}">
        <span class="text-danger">@error('pimg1') {{ $message }} @enderror</span></td>
    </tr>
    <tr>
        <td>Product Image-2</td>
        <td><input type="file" class="form-control" name="pimg2" value="{{ old('pimg2') }}">
        <span class="text-danger">@error('pimg2') {{ $message }} @enderror</span></td>
    </tr>
    <tr>
        <td></td>
        <td><button class="btn btn-success">Submit</button></td>
    </tr>
    </table>
    
    </form>
    </div>
    <div class="col col-1 col-sm-1 col-md-1 col-lg-1"></div>
    </div>
    </div>

   
@endsection