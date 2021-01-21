@extends('auth_layout.mainlayout')
@section('title', 'Index')
@section('customcss')
<style type="text/css">
    .read-more-show{
      cursor:pointer;
      color: #ed8323;
    }
    .read-more-hide{
      cursor:pointer;
      color: #ed8323;
    }

    .hide_content{
      display: none;
    }
</style>
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
              <img src="{{  URL::asset('productImg/' . $p->product_img) }}" alt="" width="100%" height="250px">
            </div>
            <h2 class="entry-title text-center">
              <a href="#">{{ $p->product_name }}</a>
            </h2>
            <p class="text-center">
              @if(strlen($p->product_description) > 100)
              {{substr($p->product_description,0,100)}}
              <span class="read-more-show hide_content"><a href="">Read More &nbsp;<i class="fa fa-angle-double-right"></i></a></span>
              @else
              {{$p->product_description}}
              @endif
            </p>
            <p class="text-center"><del><i class="fa fa-inr" aria-hidden="true">&nbsp;</i>{{ $p->cost_price }}</del> -  <i class="fa fa-inr" aria-hidden="true">&nbsp;</i>{{ $p->selling_price }}</p>
            
            <div class="entry-content">
              <div class="read-more">
              <form action="{{ route('cart.store') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" value="{{ $p->id }}" id="id" name="id">
                <input type="hidden" value="{{ $p->product_name }}" id="name" name="name">
                <input type="hidden" value="{{ $p->selling_price }}" id="price" name="price">
                <input type="hidden" value="{{ $p->product_img }}" id="img" name="img">
                <input type="hidden" value="1" id="quantity" name="quantity">
                <button class="btn-success">Buy Now</button>
              </form>
              </div>
            </div>
          </article>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <!-- End Blog Section -->
</main>
<!-- End #main -->

@endsection
@section('customjs')
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script type="text/javascript">
// Hide the extra content initially, using JS so that if JS is disabled, no problemo:
            $('.read-more-content').addClass('hide_content')
            $('.read-more-show, .read-more-hide').removeClass('hide_content')

            
</script>
@endsection