@extends('admin.admin_layout.main')
@section('title', 'Placed Order')
@section('customcss')

@endsection
@section('page_title', 'Placed Order')
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
                <h4 class="card-title">Placed Order List</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>Order Number</th>
                                <th>Username</th>
                                <th>Price</th>
                                <th>Payment Status</th>
                                <th>View Details</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Order Number</th>
                                <th>Username</th>
                                <th>Price</th>
                                <th>Payment Status</th>
                                <th>View Details</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        @foreach($order as $o)
                            <tr>
                                <td>{{ $o->order_number }}</td>
                                <?php
                                    $user = DB::table('users')->where('id', $o->user_id)->first();
                                ?>
                                <td>@if(isset($user) && !empty($user)){{ $user->name }} @endif</td>
                                <td><i class="fa fa-inr">&nbsp;</i>{{ $o->grand_total }}</td>
                                <?php
                                    $payment = DB::table('payments')->where('order_id', $o->order_number)->first();
                                ?>
                                <td>@if(isset($payment) && !empty($payment)) Paid @else Not Paid @endif</td>
                                <td>
                                    <a href="{{ route('admin.orderDetails', $o->id) }}"><button type="button" class="btn btn-link btn-primary btn-lg" >
                                        <i class="fa fa-eye"></i>
                                    </button></a>
                                </td>
                                
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
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
