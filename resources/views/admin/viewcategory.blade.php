@extends("admin/admintop")
@section("content")  
   <!-- Breadcrumb Section Begin -->
   <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Category</h4>
                        <div class="breadcrumb__links">
                            <a href="/admin/adminhome">Home</a>
                            <span>Category</span>
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
<center><a class="btn btn-primary" href="/admin/addcategory" role="button">Add Category</a></center>
</div>
<div class="col col-4 col-sm-4 col-md-4 col-lg-4">
<div class="container-fluid">
    <form class="d-flex" method="post" action="/admin/categorysearch">
    {{ csrf_field() }}
      <input class="form-control me-2" type="search" placeholder="Search by category" aria-label="Search" name="cname">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
      </div>
      <div class="col col-2 col-sm-2 col-md-2 col-lg-2"></div>
</div>
</div>
<br><br>

<div class="container">
<div class="row">
<div class="col col-2 col-sm-2 col-md-2 col-lg-2"></div>
<div class="col col-8 col-sm-8 col-md-8 col-lg-8">
<center>
<table class="table table-dark table-hover">
<tr>
    <th>CATEGORY NAME</th>
    <th>UPDATE CATEGORY</th>
    <th>DELETE CATEGORY</th>
</tr>
@foreach($categories as $category)
<tr>
    <td>{{ $category->cname }}</td>
    <td><a href={{"/categoryedit/".$category->id}}>EDIT</a></td>
    <td><a href={{"/admin/categorydel/".$category->id }} onclick="return confirm(' Are you sure you want to delete this category?')">DELETE</a></td>

</tr>

@endforeach

</table>
</center>
</div>
<div class="col col-2 col-sm-2 col-md-2 col-lg-2"></div>
</div>
</div>

@endsection