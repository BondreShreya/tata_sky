@extends('admin.admin_layout.main')
@section('title', 'Order Detail')
@section('customcss')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('page_title', 'Order Detail')
@section('content')
<div class="row">
    <div class="col-md-12">
        @if ($message = Session::get('success'))
		<div class="alert alert-success alert-block mt-3">
			<button type="button" class="close" data-dismiss="alert">×</button>	
				<strong><i class="fa fa-check text-white">&nbsp;</i>{{ $message }}</strong>
		</div>
		@endif
		@if ($message = Session::get('danger'))
		<div class="alert alert-danger alert-block mt-3">
			<button type="button" class="close" data-dismiss="alert">×</button>	
				<strong>{{ $message }}</strong>
		</div>
		@endif
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">{{ $order->order_number }}</div>
            </div>
            <div class="card-body">
                <?php
                    $user = DB::table('users')->where('id', $order->user_id)->first();
                ?>
                <div class="card-body">
                    <p class="card-text"><b>Name :</b> {{ $user->name }}</p>
                    <p class="card-text"><b>Email :</b> {{ $user->email }}</p>
                    <p class="card-text"><b>Address :</b> {{ $user->address }}</p>
                    <p class="card-text"><b>Order Date :</b> {{ $order->created_at }}</p>
                </div>
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info mt-4">
                    <thead>
                        <tr>
                            <th scope="col">Product Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orderItem as $o)
                        <?php
                            $product = DB::table('products')->where('id', $o->product_id)->first();
                        ?>
                        <tr>
                            <td>@if(isset($product) && !empty($product)) {{ $product->product_name }} @endif</td>
                            <td>{{ $o->quantity }}</td>
                            <td><i class="fa fa-inr">&nbsp;</i>{{ $o->price }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="2">Total</td>
                            <td><i class="fa fa-inr">&nbsp;</i>{{ $order->grand_total }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('customjs')
<!-- Datatables -->
<script src="{{ asset('adminAsset/js/plugin/datatables/datatables.min.js') }}"></script>
<script>
$(document).ready(function(){
    $('#basic-datatables').DataTable({
	});
    $('#resetButton').click(function(){
        $('#submitProductForm').get(0).reset();
    });
});
</script>
@endsection
