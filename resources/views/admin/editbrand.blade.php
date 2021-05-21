@extends("admin/admintop")
@section("content")  
   <!-- Breadcrumb Section Begin -->
   <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Brand</h4>
                        <div class="breadcrumb__links">
                            <a href="/admin/adminhome">Home</a><a href="/admin/viewbrand">Brands</a>
                            <span>Edit Brand</span>
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

    <form action="/brandupdate/{{ $brands->id }}" method="post">
    {{ csrf_field() }}
    <table class="table">
    <td>Category Name</td>
            <td><select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="catid" required>
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->cname }}</option>
            @endforeach 
            </select>
        </td>
    </tr>
    <tr>
        <td>Brand name</td>
        <td><input type="" class="form-control" name="bname" value="{{ $brands->bname }}"></td>
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