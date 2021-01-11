@extends('auth_layout.mainlayout')
@section('title', 'Index')
@section('customcss')

@endsection
@section('content')
<!-- ======= Hero Section ======= -->
<!-- End Hero -->
<main id="main">
  <!-- ======= Blog Section ======= -->
  <section id="blog" class="blog">
    <div class="container">
        <div class="col-md-6 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Registration Form</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('register') }}" method="POST">
                    @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" placeholder="Enter Full Name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Enter Email" value="{{ old('email') }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="mobile_no">Mobile No.</label>
                            <input type="number" class="form-control @error('mobile_no') is-invalid @enderror" name="mobile_no" id="mobile_no" placeholder="Enter Mobile No." value="{{ old('mobile_no') }}">
                            @error('mobile_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror">{{ old('address') }}</textarea>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" id="city" placeholder="Enter City" value="{{ old('city') }}">
                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" class="form-control @error('country') is-invalid @enderror" name="country" id="country" placeholder="Enter Country" value="{{ old('country') }}">
                            @error('country')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pincode">Pincode</label> 
                            <input type="number" class="form-control @error('pincode') is-invalid @enderror" name="pincode" id="pincode" placeholder="Enter Pincode" value="{{ old('pincode') }}">
                            @error('pincode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Enter Password" value="{{ old('password') }}">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" name="password_confirmation"  class="form-control" id="confirm_password" placeholder="Enter Confirm Password">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Sign Up</button>
                        </div>
                    </form>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-center">Have an account? <a href="{{ url('/login') }}">Sign In</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
  <!-- End Blog Section -->
</main>
<!-- End #main -->

@endsection
@section('customjs')

@endsection
