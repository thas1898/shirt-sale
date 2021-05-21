<?php
use App\Http\Controllers\LoginRegisterController;
if(Session::has('LoggedUser'))
{

$date =LoginRegisterController::todaydate();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script language="javascript" type="text/javascript">
    function f2()
    {
    window.close();
    }ser
    function f3()
    {
    window.print(); 
    }
</script>
</head>
<body>
<div class="container">
<div class="row">
<div class="col col-2 col-sm-2 col-md-2 col-lg-2"></div>
<div class="col col-8 col-sm-8 col-md-8 col-lg-8">
<center>
 <a href="/"><img src="{{ asset('assets/img/logo.png') }}" alt=""></a> <br>
<h4 style='color:maroon;font-weight: bold;'>CUSTOMER REPORT</h4>
<h5 style='color:maroon;font-weight: bold;'>DATE OF REPORT GENERATION: {{$date}}</h5>
<center>
<table class="table" style="width:100%" >
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
<BR></BR>
<center>
<input id ="printbtn" type="button" value="Print this page" onclick="window.print();" ></input>
</center>
</div>
<div class="col col-2 col-sm-2 col-md-2 col-lg-2"></div>
</div>
</div>
</body>
</html>