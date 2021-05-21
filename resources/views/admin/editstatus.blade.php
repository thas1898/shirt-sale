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
                            <a href="/admin/adminhome">Home</a><a href="/admin/vieworder">Order</a>
                            <span>Edit Order Status</span>
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
    <form action="/statusupdate/{{ $orders->id }}" method="post">
    {{ csrf_field() }}
    <table class="table">
    <tr>
        <td>Status</td>
        <td><input type="text" class="form-control" name="status" value="{{ $orders->status }}"></td>
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