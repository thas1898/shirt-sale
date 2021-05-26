@extends("admin/admintop")
@section("content")  
<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+1000+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>
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
<center><a class="btn btn-primary" href="/admin/addproduct" role="button">Add Product</a>
<a href="javascript:void(0);" onClick="popUpWindow('/admin/printproduct');" class="btn btn-danger">PRINT</a></center>
</div>
<div class="col col-4 col-sm-4 col-md-4 col-lg-4">
<div class="container-fluid">
    <form class="d-flex" method="post" action="/admin/productsearch">
    {{ csrf_field() }}
      <input class="form-control me-2" type="search" placeholder="Search by item" aria-label="Search" name="pname">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
      </div>
      <div class="col col-2 col-sm-2 col-md-2 col-lg-2"></div>
</div>
</div>
<br>

<div class="container">
<div class="row">
<div class="col col-12 col-sm-12 col-md-12 col-lg-12">
<center><span>{{ $products->links() }}</span></center>
<br>
<table class="table table-dark table-hover">
<tr>
    <th>PRODUCT NAME</th>
    <th>CATEGORY</th>
    <th>BRAND</th>
    <th>DESCRIPTION</th>
    <th>SIZE</th>
    <th>SLEEVE</th>
    <th>FIT</th>
    <th>PRICE</th>
    <th>STOCK</th>
    <th>PRODUCT IMAGE-1</th>
    <th>PRODUCT IMAGE-2</th>
    <th>UPDATE</th>
    <th>DELETE</th>
</tr>
@foreach($products as $product)
<tr>
    <td>{{ $product->pname }}</td>
    <td>{{ optional($product->category)->cname }}</td>
    <td>{{ optional($product->brand)->bname }}</td>
    <td>{{ $product->pdesc }}</td>
    <td>{{ $product->size }}</td>
    <td>{{ $product->sleeve }}</td>
    <td>{{ $product->fit }}</td>
    <td>{{ $product->pprice }}</td>
    <td>{{ $product->pqty }}</td>
    <td><img style="border-radius: 50%;height: 50px;width: 80px;" src="{{ URL::asset('assets/product_img1/'.$product->pimg1) }}" alt="Product1"></td>
    <td><img style="border-radius: 50%;height: 50px;width: 80px;" src="{{ URL::asset('assets/product_img2/'.$product->pimg2) }}" alt="Product2"></td>
    <td><a href={{"/productedit/".$product->id}}>EDIT</a></td>
    <td><a href={{"/admin/productdel/".$product->id}} onclick="return confirm('Are you sure you want to delete this product?')">DELETE</a></td>

</tr>

@endforeach

</table>

</div>

</div>
</div>

@endsection