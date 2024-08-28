<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="@yield('meta_keywords', 'Cebu real estate, Cebu condominium for sale, house and lot in Cebu, Cebu property rentals, Cebu homes for sale, Cebu City real estate, Mandaue property for sale, Lapu-Lapu rental properties, Cebu real estate agents, Cebu property investment')">
  <meta name="description" content="@yield('meta_description', 'Find top Cebu properties with Ebeye Jane, licensed broker. Explore condo, house & lot, and rental. Contact us for expert advice and service')">
  
  <title>@yield('title', 'Ebeye Jane | Licensed real estate broker')</title>

  <!-- Favicons -->
  <link href="{!! url('images/favicon.png') !!}" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{!! url('lib/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{!! url('lib/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet">
  <link href="{!! url('lib/animate/animate.min.css') !!}" rel="stylesheet">
  <link href="{!! url('lib/ionicons/css/ionicons.min.css') !!}" rel="stylesheet">
  <link href="{!! url('lib/owlcarousel/assets/owl.carousel.min.css') !!}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{!! url('css/style.css') !!}" rel="stylesheet">
  
  @yield('styles')
</head>
<body>
  <!--Messenger chat plugin -->
  <div id="fb-root"></div>

  <!-- Your Chat Plugin code -->
  <div id="fb-customer-chat" class="fb-customerchat">
  </div>

  <script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "193789484054800");
    chatbox.setAttribute("attribution", "biz_inbox");
  </script>

  <!-- Your SDK code -->
  <script>
    
    window.fbAsyncInit = function() {
      FB.init({
        xfbml            : true,
        version          : 'v14.0'
      });
    };

    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  </script>
  <!--END - Messenger chat plugin -->

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
    class="search-button  navbar-toggle-box-collapse fadeIn animated"
    data-toggle="collapse" 
    data-target="#navbarTogglerDemo01">
    <i class="fa fa-search"></i> Search
  </a>

  <a href="#" id="backtotop" 
    class="back-to-top" 
    style="background: #94c6db">
    <i class="fa fa-chevron-up"></i>
  </a>

  <div id="preloader"></div>

  <!-- JavaScript Libraries -->
  <script src="{!! url('lib/jquery/jquery.min.js') !!}"></script>
  <script src="{!! url('lib/bootstrap/js/bootstrap.min.js') !!}"></script>
  <script src="{!! url('lib/easing/easing.min.js') !!}"></script>
  <script src="{!! url('lib/owlcarousel/owl.carousel.min.js') !!}"></script>
  <script src="{!! url('lib/scrollreveal/scrollreveal.min.js') !!}"></script>

  <!-- Main Javascript File -->
  <script src="{!! url('js/main.js') !!}"></script>

  @yield('scripts')
  </body>
</html>
