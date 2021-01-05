<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Index - @yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  @include('auth_layout.link')

  @yield('customcss')
</head>

<body>

  <!-- ======= Header ======= -->
  @include('auth_layout.header')
 <!-- End Header -->


 @yield('content')
  
  <!-- ======= Footer ======= -->
  @include('auth_layout.footer')
  <!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  @include('auth_layout.script')
  @yield('customjs')

</body>

</html>