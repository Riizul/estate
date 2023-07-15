
  <!--/ Form Search Star /-->
  <div class="box-collapse">
    <div class="title-box-d">
      <h3 class="title-d">Ebeye</h3>
    </div>
    <span class="close-box-collapse right-boxed ion-ios-close"></span>
    <div class="box-collapse-wrap form">
      <form class="form-a">
        <div class="row">
          <div class="col-md-12 mb-2">
            <div class="form-group">
              <label for="Type">Keyword</label>
              <input type="text" class="form-control form-control-lg form-control-a" placeholder="Keyword">
            </div>
          </div>
          <div class="col-md-12 mb-2">
            <div class="form-group">
              <label for="Type">Type</label>
              <select class="form-control form-control-lg form-control-a" id="Type">
                <option>All Type</option>
                <option>For Rent</option>
                <option>For Sale</option>
                <option>Open House</option>
              </select>
            </div>
          </div>
          <div class="col-md-12 mb-2">
            <div class="form-group">
              <label for="city">City</label>
              <select class="form-control form-control-lg form-control-a" id="city">
                <option>All City</option>
                <option>Alabama</option>
                <option>Arizona</option>
                <option>California</option>
                <option>Colorado</option>
              </select>
            </div>
          </div>
          
          <div class="col-md-12">
            <button type="submit" class="btn btn-b">Search Property</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!--/ Form Search End /-->

  <!--/ Nav Star /-->
  <nav class="fixed-top">
    <div class="black-header">
      <div class="container">
        <ul class="list-inline">
          <li class="list-inline-item">
            <a href="tel:{{ env('GLOBAL_MOBILE') }}" class="link-one">
              <i class="fa fa-phone" aria-hidden="true"></i> Call Now
            </a>
          </li>
          <li class="list-inline-item">
            <a href="{{ env('GLOBAL_FACEBOOK') }}" class="link-one">
              <i class="fa fa-facebook" aria-hidden="true"></i> Like us on Facebook
            </a>
          </li>
          <li class="list-inline-item">
            <a href="{{ env('GLOBAL_INSTAGRAM') }}" class="link-one">
              <i class="fa fa-instagram" aria-hidden="true"></i> Follow us on Instagram
            </a>
          </li>
        </ul>

        <!-- <a href="tel:+63 917 889 2508" class="flex gap-2 hover:text-primaryYellow transition-all" target="_blank">
          <img src="{!! url('images/icons/white/globe.svg')!!}" alt="facebook" width="15">
          <span>Call Now</span>
        </a>
        <a href="https://www.facebook.com/jayannvalduezabonjoc" class="flex gap-2 hover:text-primaryYellow transition-all" target="_blank">
          <img src="https://propertysearchph.com/images/facebook.svg" alt="facebook" width="15">
          <span>Like us on Facebook</span>
        </a>
        <a href="https://www.instagram.com/jayannhvaldueza/" class="flex gap-2 hover:text-primaryYellow transition-all" target="_blank">
          <img src="https://propertysearchph.com/images/instagram.svg" alt="Instagram" width="15">
          <span>Follow us on instagram</span>
        </a> -->
      </div>
    </div>

    <div class="navbar navbar-default navbar-trans navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand text-brand" href="{{ env('APP_URL') }}/">
          <img src="{!! url('images/erb-logo.png')!!}" class="logo">
        </a>

        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
          aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span></span>
          <span></span>
          <span></span>
        </button>
        <!-- <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" 
          data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
          <span class="fa fa-phone" aria-hidden="true"></span>
        </button> -->
        <div class="navbar-collapse collapse justify-content-end m-t-15" id="navbarDefault">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-id="home" href="{{ env('APP_URL') }}/">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a data-id="properties" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Properties
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ env('APP_URL') }}/house-and-lot">House & Lot</a>
                <a class="dropdown-item" href="{{ env('APP_URL') }}/condominium">Condominium</a>
                <a class="dropdown-item" href="{{ env('APP_URL') }}/for-rent">For Rent</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link"  data-id="contact" href="{{ env('APP_URL') }}/contact">Contact Us</a>
            </li>
          </ul>
        </div>
        <!-- <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block ml-50" data-toggle="collapse"
          data-target="#navbarTogglerDemo01" aria-expanded="false">
          <span class="fa fa-search" aria-hidden="true"></span>
        </button> -->
      </div>
    </div>
  </nav>
  <!--/ Nav End /-->