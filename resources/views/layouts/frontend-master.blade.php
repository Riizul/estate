<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <title>Ebeye</title>

    <!-- Favicons -->
    <link href="{!! url('images/favicon.png') !!}" rel="icon">
    <link href="{!! url('images/apple-touch-icon.png') !!}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <!-- <link href="{!! url('assets/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet"> -->

      <!-- Bootstrap CSS File -->
    <link href="{!! url('lib/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">

     <!-- Libraries CSS Files -->
    <link href="{!! url('lib/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet">
    <link href="{!! url('lib/animate/animate.min.css') !!}" rel="stylesheet">
    <link href="{!! url('lib/ionicons/css/ionicons.min.css') !!}" rel="stylesheet">
    <link href="{!! url('lib/owlcarousel/assets/owl.carousel.min.css') !!}" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="{!! url('css/style.css') !!}" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <!-- <link href="{!! url('assets/css/app.css') !!}" rel="stylesheet"> -->
    @yield('styles')
</head>
<body>
  <div class="click-closed"></div>
 
  <header class="relative z-[999]">
  
  @include('layouts.frontend.navbar')
   
</header>

  <main>
      @yield('content')
  </main>
  @include('layouts.frontend.footer')

  <a href="#" 
    id="searchButon" 
    class="back-to-top nav-search navbar-toggle-box-collapse"
    data-toggle="collapse" 
    data-target="#navbarTogglerDemo01" style="display:none !important">
    <i class="fa fa-search"></i> Search
  </a>
  <a href="#" id="searchButton" 
    class="search-button  navbar-toggle-box-collapse"
    data-toggle="collapse" 
    data-target="#navbarTogglerDemo01">
    <i class="fa fa-search"></i> Search
  </a>
  <a href="#" id="backtotop" 
  class="back-to-top" style="background: #94c6db"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  <!-- JavaScript Libraries -->
  <script src="{!! url('lib/jquery/jquery.min.js') !!}"></script>
  <!-- <script src="{!! url('lib/jquery/jquery-migrate.min.js') !!}"></script> -->
  <!-- <script src="{!! url('lib/popper/popper.min.js') !!}"></script> -->
  <script src="{!! url('lib/bootstrap/js/bootstrap.min.js') !!}"></script>
  <script src="{!! url('lib/easing/easing.min.js') !!}"></script>
  <script src="{!! url('lib/owlcarousel/owl.carousel.min.js') !!}"></script>
  <script src="{!! url('lib/scrollreveal/scrollreveal.min.js') !!}"></script>

  <!-- Template Main Javascript File -->
  <script src="{!! url('js/main.js') !!}"></script>

  @yield('scripts')


    <!-- <script src="{!! url('assets/bootstrap/js/bootstrap.bundle.min.js') !!}"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
  </body>
</html>
