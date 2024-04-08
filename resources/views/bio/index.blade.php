<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Ebeye Jane - Bio</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{!! url('bio/img/favicon.png') !!}" rel="icon">
  <link href="{!! url('bio/img/apple-touch-icon.png') !!}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{!! url('bio/vendor/aos/aos.css') !!}" rel="stylesheet">
  <link href="{!! url('bio/vendor/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">
  <link href="{!! url('bio/vendor/bootstrap-icons/bootstrap-icons.css') !!}" rel="stylesheet">
  <link href="{!! url('bio/vendor/boxicons/css/boxicons.min.css') !!}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{!! url('bio/css/style.css') !!}" rel="stylesheet">
 
</head>

<body>
  
  <div id="fb-root"></div>

  <div id="fb-customer-chat" class="fb-customerchat">
  </div>

  <script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "193789484054800");
    chatbox.setAttribute("attribution", "biz_inbox");
  </script>

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

  <!-- ======= Mobile nav toggle button ======= -->
  <!-- <button type="button" class="mobile-nav-toggle d-xl-none"><i class="bi bi-list mobile-nav-toggle"></i></button> -->
  <i class="bi bi-list mobile-nav-toggle d-lg-none"></i>
  <!-- ======= Header ======= -->
  <header id="header" class="d-flex flex-column justify-content-center">

    <nav id="navbar" class="navbar nav-menu">
      <ul>
        <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
        <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>About</span></a></li>
        <li><a href="#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contact</span></a></li>
      </ul>
    </nav><!-- .nav-menu -->

  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center">
    <div class="row">
      <div class="col-lg-6">
      </div>
      <div class="col-lg-6">
        <div class="agent-avatar-box">
          <img 
            src="{!! url('bio/img/Ebeye.png')!!}" 
            alt="Ebeye Jane Quijano" 
            class="agent-avatar img-fluid bio-avatar" 
          >
        </div>
      </div>
    </div>
    <div class="container" data-aos="zoom-in" data-aos-delay="100" style="position:absolute">
      <h1>Ebeye Jane Quijano</h1>
      <p><span class="typed" data-typed-items="Licensed Real Estate Broker, Licensed Real Estate Appraiser, DHSUD Registered Broker, Filipino Homes"></span></p>
      <div class="social-links">
        <a href="https://ebeyejane.com/" class="google-plus"><i class="bx bx-globe"></i></a>
        <a href="{{ env('GLOBAL_FACEBOOK') }}" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="{{ env('GLOBAL_TWITTER') }}" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="{{ env('GLOBAL_INSTAGRAM') }}" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="{{ env('GLOBAL_PINTEREST') }}" class="pinterest"><i class="bx bxl-pinterest"></i></a>
        <a href="https://api.whatsapp.com/message/AIMTKOAL2FHZI1?autoload=1&app_absent=0" class="whatsapp"><i class="bx bxl-whatsapp"></i></a>
        <!-- 
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a> 
        -->
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

      <div class="section-title">
          <h2>About</h2>
        </div>

        <div class="row"> 
            <div class="col-lg-12 pt-4 pt-lg-0 content about-content">
                <!-- <h2>Here's a little bit about me</h2> -->
                <p style="line-height: 30px;   "><b>Ebeye Jane Quijano</b>, as a Realtor here in Cebu, I enthusiastically help people fill their part of the Filipino dream of home ownership. It is my privilege to service people who are looking to fill the dream. I love to share in my clients excitement when their home sells or they buy their first home or lot.</p>
                <p style="line-height: 30px">With the new normal. Most properties accept online reservations, I am here to coordinate with the developers to make sure your experience is smooth and all requirements are met.</p>
                <p style="line-height: 30px">And did I mention that my services are FREE? Yes, it’s free. No need to pay me, no commitments, and no pressure. Just ask away and I will help you find and reserve your new home. I'm looking forward to working with you.</p>
            </div>
            
        </div>
      </div>
    </section><!-- End About Section -->
 
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Let's connect</h2>
        </div>

        <div class="row mt-1">
          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location</h4>
                <p>8th door, Filipino Homes Liloan Office, Poblacion Liloan Cebu,City 6002</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email</h4>
                <p>
                  <a href="mailto:{{ env('GLOBAL_MAIL') }}" class="color-text-a"> {{ env('GLOBAL_MAIL') }}</a>
                </p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call</h4>
                <p>
                  <a href="tel:{{ env('GLOBAL_MOBILE') }}" class="color-a">{{ env('GLOBAL_MOBILE') }}</a>
                </p>
              </div>
            </div>
          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">
            <iframe 
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3924.260716573787!2d124.00010239999999!3d10.400855699999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a9bbd245f7b717%3A0x965bc108619b32dc!2sEbeye%20Jane%20Quijano%2C%20REB!5e0!3m2!1sen!2sph!4v1711982224177!5m2!1sen!2sph" 
              frameborder="0" 
              style="border:0; width: 100%; height: 290px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <img 
        src="{!! url('images/erb-logo.png')!!}" 
        alt="Ebeye" 
        class="ebeye-logo img-fluid"
        style="margin-bottom: 50px"
      >
      <div class="social-links">
        <a href="https://ebeyejane.com/" class="google-plus"><i class="bx bx-globe"></i></a>
        <a href="{{ env('GLOBAL_FACEBOOK') }}" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="{{ env('GLOBAL_TWITTER') }}" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="{{ env('GLOBAL_INSTAGRAM') }}" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="{{ env('GLOBAL_PINTEREST') }}" class="pinterest"><i class="bx bxl-pinterest"></i></a>
        <a href="https://api.whatsapp.com/message/AIMTKOAL2FHZI1?autoload=1&app_absent=0" class="whatsapp"><i class="bx bxl-whatsapp"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>Ebeye</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{!! url('bio/vendor/aos/aos.js') !!}"></script>
  <script src="{!! url('bio/vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
  <script src="{!! url('bio/vendor/typed.js/typed.umd.js') !!}"></script>
  <script src="{!! url('bio/vendor/php-email-form/validate.js') !!}"></script>
 
  <!-- Template Main JS File -->
  <script src="{!! url('bio/js/main.js') !!}"></script>

  <style> 
</style>
</body>

</html>