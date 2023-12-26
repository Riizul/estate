
  <!--/ Form Search Star /-->
  <div class="float-search-container box-collapse">
    <div class="title-box-d">
      <h3 class="title-d">Search Property</h3>
    </div>
    <span class="close-box-collapse right-boxed ion-ios-close"></span>
    <div class="box-collapse-wrap form">
      <form method="POST" 
            action="{{ route('home.search') }}"
            class="form-a search-property-form">
        @csrf
        <div class="row">
          <!-- Keyword -->
          <div class="col-md-12 mb-2">
            <div class="form-group">
              <label for="keyword">Keyword</label>
              <input type="text"
                    id="keyword"
                    name="keyword"
                    value="{{ $keyword }}" 
                    class="form-control form-control-lg form-control-a"   
                    placeholder="Keyword">
            </div>
          </div> 
          <!-- Location -->
          <div class="col-md-12 mb-2">
            <div class="form-group">
              <label for="location">Location</label>
              <select class="form-control form-control-lg form-control-a" 
                  id="location" 
                  name="location">
                <option value="0">Any</option>
                @foreach ($locations as $location)
                <option 
                  value="{{ $location['id'] }}"
                  @if ($location->id == $selectedlocation) {{'selected="selected"'}} @endif 
                  >
                  {{ $location['name'] }}
                </option>
                @endforeach
              </select>
            </div>
          </div>
          <!-- Property Type -->
          <div class="col-md-12 mb-2">
            <div class="form-group">
              <label for="filtertype">Type</label>
              <ul class="terms-list circle-check level-0">
                <li class="list-item level-0">
                    <div class="list-item-inner">
                        <input id="filtertype-1" 
                            type="checkbox" 
                            name="filtertype[]" 
                            value="1"
                            @if(in_array(1 , $filtertype))
                                {{'checked'}}
                            @endif
                        >
                        <label for="filtertype-1">House and Lot</label>
                    </div>
                </li>
                <li class="list-item level-0">
                    <div class="list-item-inner">
                        <input id="filtertype-2" 
                            type="checkbox" 
                            name="filtertype[]" 
                            value="2"
                            @if(in_array(2 , $filtertype))
                                {{'checked'}}
                            @endif
                        >
                        <label for="filtertype-2">Condominium</label>
                    </div>
                </li>
                <li class="list-item level-0">
                    <div class="list-item-inner">
                        <input id="filtertype-3" 
                            type="checkbox" 
                            name="filtertype[]" 
                            value="3"
                            @if(in_array(3 , $filtertype))
                                {{'checked'}}
                            @endif
                        >
                        <label for="filtertype-3">For Rent</label>
                    </div>
                </li> 
              </ul>
            </div>
            
          </div>
          <!-- Listing status -->
          <div class="col-md-12 mb-2">
            <div class="form-group">
              <label for="filterstatus">Listing Status</label>
              <ul class="terms-list circle-check level-0"> 
                <li class="list-item level-0">
                    <div class="list-item-inner">
                        <input id="filterstatus-1" 
                            type="checkbox" 
                            name="filterstatus[]" 
                            value=1
                            @if(in_array(1 , $filterstatus))
                              {{'checked'}}
                            @endif
                        >
                        <label for="filterstatus-1">Pre-selling</label>
                    </div>
                </li>
                <li class="list-item level-0">
                    <div class="list-item-inner">
                        <input id="filterstatus-2" 
                            type="checkbox" 
                            name="filterstatus[]" 
                            value=2
                            @if(in_array(1 , $filterstatus))
                              {{'checked'}}
                            @endif
                        >
                        <label for="filterstatus-2">RFO (Ready for occupancy)</label>
                    </div>
                </li> 
              </ul>
            </div>
          </div>
          <div class="col-md-12">
            <button type="submit" class="btn btn-b rounded text-white">Search Property</button>
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
        <!-- <button type="button" 
          class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none btn-search" 
          data-toggle="collapse" 
          data-target="#navbarTogglerDemo01" 
          aria-expanded="false">
          <span class="fa fa-search" aria-hidden="true"></span>
        </button> -->
        <!-- <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block ml-50 btn-search" data-toggle="collapse"
          data-target="#navbarTogglerDemo01" aria-expanded="false">
          <span class="fa fa-search" aria-hidden="true"></span> Search
        </button> -->
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
          aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span></span>
          <span></span>
          <span></span>
        </button>
        
        <div class="navbar-collapse collapse justify-content-end m-t-15" id="navbarDefault">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-id="home" href="{{ env('APP_URL') }}/">Home</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" data-id="house-and-lot" 
                href="{{ env('APP_URL') }}/house-and-lot">House & Lot</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" 
                 data-id="condominium"
                 href="{{ env('APP_URL') }}/condominium">Condominium</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" 
                 data-id="for-rent"
                 href="{{ env('APP_URL') }}/for-rent">For Rent</a>
            </li> -->
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
        <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block ml-50 btn-search" data-toggle="collapse"
          data-target="#navbarTogglerDemo01" aria-expanded="false">
          <span class="fa fa-search" aria-hidden="true"></span> Search
        </button>
      </div>
    </div>
  </nav>
  <!--/ Nav End /-->