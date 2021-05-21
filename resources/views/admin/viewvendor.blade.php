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
                        <h4>Vendor</h4>
                        <div class="breadcrumb__links">
                            <a href="/admin/adminhome">Home</a>
                            <span>Vendor</span>
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
<center><a class="btn btn-primary" href="/admin/addvendor" role="button">Add Vendor</a>
<a href="javascript:void(0);" onClick="popUpWindow('/admin/printvendor');" class="btn btn-danger">PRINT</a></center>
</div>
<div class="col col-4 col-sm-4 col-md-4 col-lg-4">
<div class="container-fluid">
    <form class="d-flex" method="post" action="/admin/vendorsearch">
    {{ csrf_field() }}
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="vname">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
      </div>
      <div class="col col-2 col-sm-2 col-md-2 col-lg-2"></div>
</div>
</div>


<div class="container">
<div class="row">
<div class="col col-1 col-sm-1 col-md-1 col-lg-1"></div>
<div class="col col-10 col-sm-10 col-md-10 col-lg-10">
<br>
<center><span>{{ $vendors->links() }}</span></center>
<br>
<center>
<table class="table table-dark table-hover">
<tr>
    <th>VENDOR NAME</th>
    <th>COMPANY NAME</th>
    <th>ADDRESS</th>
    <th>STATE</th>
    <th>PHONE</th>
    <th>EMAIL</th>
    <th>EDIT</th>
    <th>DELETE </th>
</tr>
@foreach($vendors as $vendor)
<tr>
    <td>{{ $vendor->vname }}</td>
    <td>{{ $vendor->vcname }}</td>
    <td>{{ $vendor->vaddress }}</td>
    <td>{{ $vendor->vstate }}</td>
    <td>{{ $vendor->vphone }}</td>
    <td>{{ $vendor->vemail }}</td>
    <td><a href={{"/vendoredit/".$vendor->id}}>EDIT</a></td>
    <td><a href={{"/admin/vendordel/".$vendor->id }} onclick="return confirm('Are you sure you want to delete this vendor?')">DELETE</a></td>

</tr>

@endforeach

</table>
</center>
</div>
<div class="col col-1 col-sm-1 col-md-1 col-lg-1"></div>
</div>
</div>

@endsection