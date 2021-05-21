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
                        <h4>Purchase</h4>
                        <div class="breadcrumb__links">
                            <a href="/admin/adminhome">Home</a>
                            <span>Purchase</span>
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
<center><a class="btn btn-primary" href="/admin/addpurchase" role="button">Add Purchase</a>
<a href="javascript:void(0);" onClick="popUpWindow('/admin/printpurchase');" class="btn btn-danger">PRINT</a></center>
</div>
<div class="col col-4 col-sm-4 col-md-4 col-lg-4">
<div class="container-fluid">
    <form class="d-flex" method="post" action="/admin/purchasesearch">
    {{ csrf_field() }}
      <input class="form-control me-2" type="search" placeholder="Search by date" aria-label="Search" name="created_at">
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
<center>
<br>
<center><span>{{ $purchases->links() }}</span></center>
<br>
<table class="table table-dark table-hover">
<tr>
    <th>VENDOR COMPANY</th>
    <th>PRODUCT</th>
    <th>QUANTITY</th>
    <th>PRICE</th>
    <th>TOTAL</th>
    <th>DATE</th>
  


</tr>
@foreach($purchases as $purchase)
<tr>
    <td>{{ optional($purchase->vendor)->vcname }}</td>
    <td>{{ optional($purchase->product)->pname }}</td>
    <td>{{ $purchase->pqty }}</td>
    <td>{{ $purchase->pprice }}</td>
    <td>{{ $purchase->ptotal }}</td>
    <td>{{ $purchase->created_at }}</td>
   <!-- <td><a href={{"/purchaseedit/".$purchase->id}}>EDIT</a></td>
    <td><a href={{"/admin/purchasedel/".$purchase->id }} onclick="return confirm('Are you sure you want to delete this purchase?')">DELETE</a></td>
-->
</tr>

@endforeach

</table>
</center>
</div>
<div class="col col-2 col-sm-2 col-md-2 col-lg-2"></div>
</div>
</div>

@endsection