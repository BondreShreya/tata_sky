@extends('admin.admin_layout.main')
@section('title', 'Product')
@section('customcss')

@endsection
@section('page_title', 'Product')
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
                <div class="card-title">Add Product</div>
            </div>
            <form method="POST" id="submitProductForm" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
            @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_name">Product Name</label>
                                <input type="text" class="form-control @error('product_name') is-invalid @enderror" id="product_name" name="product_name" placeholder="Enter Product Name" value="{{ old('product_name') }}">
                                @error('product_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_description">Product Description</label>
                                <input type="text" class="form-control @error('product_description') is-invalid @enderror" id="product_description" name="product_description" placeholder="Enter Product Description" value="{{ old('product_description') }}">
                                @error('product_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_img">Product Image</label>
                                <input type="file" class="form-control @error('product_img') is-invalid @enderror" id="product_img" name="product_img">
                                @error('product_img')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cost_price">Cost Price</label>
                                <input type="number" class="form-control @error('cost_price') is-invalid @enderror" id="cost_price" name="cost_price" placeholder="Enter Cost Price" value="{{ old('cost_price') }}">
                                @error('cost_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="selling_price">Selling Price</label>
                                <input type="number" class="form-control @error('selling_price') is-invalid @enderror" id="selling_price" name="selling_price" placeholder="Enter Selling Price" value="{{ old('selling_price') }}">
                                @error('selling_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                                    <option value="">-Select Status-</option>
                                    <option value="1" @if (old('status') == 1) selected="selected" @endif>Active</option>
                                    <option value="0" @if (old('status') == 0) selected="selected" @endif>In-active</option>
                                </select>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <button class="btn btn-success" type="submit">Submit</button>
                    <button type="button" class="btn btn-danger" id="resetButton">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Product List</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Product Description</th>
                                <th>Cost Price</th>
                                <th>Selling Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Product Description</th>
                                <th>Cost Price</th>
                                <th>Selling Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        @foreach($products as $p)
                            <tr>
                                <td><img src="{{  URL::asset('productImg/' . $p->product_img) }}" alt="" width="100px"></td>
                                <td>{{ $p->product_name }}</td>
                                <td>{{ $p->product_description }}</td>
                                <td>{{ $p->cost_price }}</td>
                                <td>{{ $p->selling_price }}</td>
                                <td>@if($p->status == 1) Active @else In-Active @endif</td>
                                <td><div class="form-button-action">
                                        <a href="{{ route('admin.product.edit', $p->id) }}">
                                        <button type="button" class="btn btn-link btn-primary btn-lg" >
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        </a>
                                        <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()">
                                        <button type="button" class="btn btn-link btn-danger">
                                            <i class="fa fa-times"></i>
                                        </button>
                                        </a>
                                        <form action="{{ route('admin.product.destroy', $p->id) }}" method="post">
                                        @method('DELETE')
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        </form>
                                    </div>
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
