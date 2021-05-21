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
                            <a href="/admin/adminhome">Home</a>
                            <span>Brand</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
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
<div class="container">
<div class="row">
<div class="col col-2 col-sm-2 col-md-2 col-lg-2"></div>
<div class="col col-4 col-sm-4 col-md-4 col-lg-4">
<center><a class="btn btn-primary" href="/admin/addbrand" role="button">Add Brand</a></center>
</div>
<div class="col col-4 col-sm-4 col-md-4 col-lg-4">
<div class="container-fluid">
    <form class="d-flex" method="post" action="/admin/brandsearch">
    {{ csrf_field() }}
      <input class="form-control me-2" type="search" placeholder="Search by brand " aria-label="Search" name="bname">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
      </div>
      <div class="col col-2 col-sm-2 col-md-2 col-lg-2"></div>
</div>
</div>



<div class="container">
<div class="row">
<div class="col col-2 col-sm-2 col-md-2 col-lg-2"></div>
<div class="col col-8 col-sm-8 col-md-8 col-lg-8">
<br><center><span>{{ $brands->links() }}</span></center>
<br>
<center>
<table class="table table-dark table-hover">
<tr>
    <th>CATEGORY</th>
    <th>BRAND NAME</th>
    <th>UPDATE BRAND</th>
    <th>DELETE BRAND</th>

</tr>
@foreach($brands as $brand)

<tr>
    <td>{{ $brand->category->cname }}</td>
    <td>{{ $brand->bname }}</td>
    <td><a href={{"/brandedit/".$brand->id}} >EDIT</a></td>
    <td><a href={{"/admin/branddel/".$brand->id }} onclick="return confirm('Are you sure you want to delete this brand?')">DELETE</a></td>


</tr>

@endforeach

</table>
</center>
</div>
<div class="col col-2 col-sm-2 col-md-2 col-lg-2"></div>
</div>
</div>

@endsection