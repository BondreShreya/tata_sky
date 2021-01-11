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
                    <h3 class="text-center">Login Form</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('login') }}" method="POST">
                    @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Enter Password">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Sign In</button>
                        </div>
                    </form>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-center">Don't have an account? <a href="{{ url('/register') }}">Sign Up</a></p>
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
