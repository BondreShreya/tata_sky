@extends('user.user_layout.mainlayout')
@section('title', 'Orders')
@section('page_title', 'Orders')
@section('customcss')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Order Details</div>
                @if(\Cart::getTotalQuantity()>0)<div class="card-category">{{ \Cart::getTotalQuantity()}} Product(s) In Your Cart</div>
                @else
                <div class="card-category">No Product(s) In Your Cart &nbsp; <a href="{{ url('/') }}">Continue Shopping</a></div>
                @endif
            </div>
            @if(count($cartCollection)>0)
            <div class="card-body">
                <div class="row">
                    @foreach($cartCollection as $item)
                    <div class="col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/productImg/{{ $item->attributes->image }}" alt="Card image" style="width:100%">
                            <div class="card-body">
                                <p class="card-text"><b><a href="/shop/{{ $item->attributes->slug }}">{{ $item->name }}</a></b></p>
                                <p class="card-text"><b>Quantity: </b> {{ $item->quantity }}</p>
                                <p class="card-text"><b>Price: </b><i class="fa fa-rupee">&nbsp;</i>{{ $item->price }}</p>
                                <p class="card-text"><b>Sub Total: </b><i class="fa fa-rupee">&nbsp;</i>{{ \Cart::get($item->id)->getPriceSum() }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="card-footer d-flex">
            @if(count($cartCollection)>0)
                <form action="{{ route('checkout.place.order') }}" method="POST">
                    @csrf
                    <button class="btn btn-success">Placed Order</button>
                </form>
            <a href="{{ url('/') }}"><button class="btn btn-danger ml-3">Continue Shopping</button></a>
            @endif
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
@section('customjs')

@endsection

