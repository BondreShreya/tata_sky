@extends('auth_layout.mainlayout')
@section('title', 'Index')
@section('customcss')

@endsection
@section('content')
<!-- ======= Hero Section ======= -->
  @include('auth_layout.carousel')
<!-- End Hero -->
<main id="main">
  <!-- ======= Blog Section ======= -->
  <section id="blog" class="blog">
    <div class="container">
      <div class="row">
        @foreach($products as $p)
        <div class="col-lg-4  col-md-6 d-flex align-items-stretch" data-aos="">
          <article class="entry">
            <div class="entry-img">
              <img src="{{  URL::asset('productImg/' . $p->product_img) }}" alt="" class="img-fluid">
            </div>
            <h2 class="entry-title text-center">
              <a href="#">{{ $p->product_name }}</a>
            </h2>
            <div class="entry-content">
              <div class="read-more">
              <form action="{{ route('cart.store') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" value="{{ $p->id }}" id="id" name="id">
                <input type="hidden" value="{{ $p->product_name }}" id="name" name="name">
                <input type="hidden" value="{{ $p->selling_price }}" id="price" name="price">
                <input type="hidden" value="{{ $p->product_img }}" id="img" name="img">
                <input type="hidden" value="1" id="quantity" name="quantity">
                <button class="btn-success">Bye Now</button>
              </form>
              </div>
            </div>
          </article>
        </div>
        @endforeach
      </div>
      <div class="row">
        <div class="col-md-12 text-center">
        {{ $products->links() }}
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