@extends("admin/admintop")
@section("content")  

<script type="text/javascript">
    function multiply(element) 
    {
    var form = element.form;
    form.ptotal.value = form.pprice.value * element.value;
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
                            <a href="/admin/adminhome">Home</a><a href="/admin/viewpurchase">Purchase</a>
                            <span>Edit Purchase</span>
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
    <form action="/purchaseupdate/{{ $purchases->id }}" method="post">
    {{ csrf_field() }}
    <table class="table">
    <tr>
        <td>Vendor Company</td>
        <td><select class="form-control" aria-label="Default select example" name="vendorid">
        <option selected>Select the vendor Company</option>
            @foreach($vendors as $vendor)
            <option value="{{ $vendor->id }}">{{ $vendor->vcname }}</option>
            @endforeach 
            </select></td>
    </tr>
    <tr>
        <td>Product</td>
        <td>
            <select class="form-control" aria-label=".form-select-lg example" name="proid">
            @foreach($products as $product)
            <option value="{{ $product->id }}">{{ $product->pname }}</option>
            @endforeach 
            </select>
        </td>
        <tr>
        <td>Price</td>
        <td><input type="text" class="form-control" name="pprice" value="{{ $purchases->pprice }}"></td>
    </tr>
        </tr>
    <tr>
        <td>Quantity</td>
        <td><input type="text" class="form-control" name="pqty" onKeyUp="multiply(this)" value="{{ $purchases->pqty }}"></td>
    </tr>

    <tr>
        <td>Total</td>
        <td><input type="text" class="form-control" name="ptotal" value="{{ $purchases->ptotal }}"></td>
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