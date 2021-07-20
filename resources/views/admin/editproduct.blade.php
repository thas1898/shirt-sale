@extends("admin/admintop")
@section("content")  
   <!-- Breadcrumb Section Begin -->
   <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Product</h4>
                        <div class="breadcrumb__links">
                            <a href="/admin/adminhome">Home</a><a href="/admin/viewproduct">Product</a>
                            <span>Edit Product</span>
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
    <form action="/productupdate/{{ $products->id }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <table class="table">
       <tr>
        <td>Product Name</td>
        <td><input type="text" class="form-control" name="pname" value="{{ $products->pname }}"></td>
    </tr>
    <tr>
        <td>Category Name</td>
            <td><select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="catid" id="cats">
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->cname }}</option>
            @endforeach 
            </select>
        </td>
    </tr>

    <tr>
        <td>Brand Name</td>
        <td><select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="brandid" id="brandid" placeholder="Select brand">
  
            </select>
        </td>
    </tr>

    <tr>
        <td>Description</td>
        <td><input type="text" class="form-control" name="pdesc" value="{{ $products->pdesc }}"></td>
    </tr>
    <tr>
        <td>Size</td>
        <td><select class="form-select" aria-label=".form-select-lg example" name="size" placeholder="Select size"  >
        <option selected>{{ $products->size }}</option>
        <option value="S">S</option>
        <option value="M">M</option>
        <option value="L">L</option>
        </select>
    </tr>
    <tr>
        <td>Sleeve</td>
        <td><select class="form-select" aria-label=".form-select-lg example" name="sleeve" placeholder="Select sleeve">
        <option selected>{{ $products->sleeve }}</option>
        <option value="Full Sleeve">Full Sleeve</option>
        <option value="Half Sleeve">Half Sleeve</option>
        <option value="Roll-up Sleeve">Roll-up Sleeve</option>
        <option value="Short Sleeve">Short Sleeve</option>
        </select>
    </tr>
    <tr>
        <td>Fit</td>
        <td><select class="form-select" aria-label=".form-select-lg example" name="fit" placeholder="Select fit type">
        <option selected>{{ $products->fit }}</option>
        <option value="Regular">Regular</option>
        <option value="Loose">Loose</option>
        <option value="Slim">Slim</option>
        </select>
    </tr>
    <tr>
        <td>Price</td>
        <td><input type="text" class="form-control" name="pprice" value="{{ $products->pprice }}"></td>
    </tr>
    <tr>
        <td>Product Image</td>
        <td><input type="file" class="form-control" name="pimg1" value="{{ $products->pimg1 }}"></td>
    </tr>
    <tr>
        <td>Product Image</td>
        <td><input type="file" class="form-control" name="pimg2" value="{{ $products->pimg2 }}"></td>
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