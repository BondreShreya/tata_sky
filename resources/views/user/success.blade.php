@extends('user.user_layout.mainlayout')
@section('title', 'Payment Success')
@section('page_title', 'Payment Success')
@section('customcss')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@endsection
@section('content')
<div class="row">
    <div class="col-md-6 m-auto">
        <div class="card">
            <div class="card-body text-center">
                <img src="{{ asset('assets/img/icons8-checked-48.png') }}" width="90px">
                <h6 class="card-title">Transaction is Successfully Done!</h6>
            </div>
        </div>
    </div>
</div>
@endsection
@section('customjs')

@endsection

