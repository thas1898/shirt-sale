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
<h4 style='color:maroon;font-weight: bold;'>PRODUCT REPORT</h4>
<h5 style='color:maroon;font-weight: bold;'>DATE OF REPORT GENERATION: {{$date}}</h5>
<center>
<table class="table" style="width:100%" >
<tr>
<th>PRODUCT NAME</th>
    <th>CATEGORY</th>
    <th>BRAND</th>
    <th>DESCRIPTION</th>
    <th>SIZE</th>
    <th>SLEEVE</th>
    <th>FIT</th>
    <th>PRICE</th>
    <th>QUANTITY</th>
    <th>PRODUCT IMAGE-1</th>
    <th>PRODUCT IMAGE-2</th>

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