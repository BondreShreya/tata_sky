@extends('user.user_layout.mainlayout')
@section('title', 'Orders')
@section('page_title', 'Orders')
@section('customcss')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@endsection
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
                <div class="card-title">Placed Order</div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-title mb-3">Order Details</div>
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>Order Number</th>
                                    <td>{{ $order->order_number }}</td>
                                </tr>
                                <tr>
                                    <th>Product Count</th>
                                    <td>{{ $order->item_count }}</td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td>INR {{ $order->grand_total }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <div class="card-title mb-3">Product Details</div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orderItems as $key => $o)
                                <?php
                                    $product = DB::table('products')->where('id', $o->product_id)->first();
                                ?>
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>@if(isset($product) && !empty($product)) {{ $product->product_name }} @endif</td>
                                    <td>{{ $o->quantity }}</td>
                                    <td><i class="fa fa-rupee">&nbsp;</i>@if(isset($product) && !empty($product)) {{ $product->selling_price }} @endif</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form method="post" action="{{ route('pay', $order->id) }}">
                        @csrf
                        <button class="btn btn-success">Proceed to Pay</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('customjs')

@endsection

