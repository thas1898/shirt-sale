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
                        <h4>Customer</h4>
                        <div class="breadcrumb__links">
                            <a href="/admin/adminhome">Home</a>
                            <span>Customer</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <br>
    <br>
    <center><a href="javascript:void(0);" onClick="popUpWindow('/admin/printcustomer');" class="btn btn-danger">PRINT</a></center>
 
    
<div class="container">
<div class="row">
<div class="col col-2 col-sm-2 col-md-2 col-lg-2"></div>
<div class="col col-8 col-sm-8 col-md-8 col-lg-8">
<br>
    <center><span>{{ $customers->links() }}</span></center>
<br>
<center>
<table class="table table-dark table-hover">
<tr>
    <th>NAME</th>
    <th>PHONE NUMBER</th>
    <th>EMAIL</th>
    <th>ADDRESS</th>
    <th>CITY</th>
    <th>STATE</th>
    <th>PIN</th>
</tr>
@foreach($customers as $customer)
<tr>
    <td>{{ $customer->rname }}</td>
    <td>{{ $customer->rphone }}</td>
    <td>{{ $customer->remail }}</td>
    <td>{{ $customer->raddress }}</td>
    <td>{{ $customer->rcity }}</td>
    <td>{{ $customer->rstate }}</td>
    <td>{{ $customer->rpin }}</td>

</tr>

@endforeach

</table>
</center>
</div>
<div class="col col-2 col-sm-2 col-md-2 col-lg-2"></div>
</div>
</div>



@endsection