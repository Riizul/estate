@extends('layouts.frontend-master')

@section('content')
  <!--/ Carousel /-->
  <div class="intro intro-carousel">
    <div id="carousel" class="owl-carousel owl-theme">
    
      <!-- BTK -->
      <!-- DISPLAY MUST BE FLAG/STARRED STATUS -->
      @php 
        $i = 0; 
      @endphp

      @foreach($featured as $item)
        @php 
          if ($i == 3) break;
        @endphp
        <div 
          class="carousel-item-a intro-item bg-image" 
          style="background-image: url(storage/tmp{!! $item->banner !!})">
          <div class="overlay overlay-a"></div>
          <div class="intro-content display-table">
            <div class="table-cell">
              <div class="container">
                <div class="row">
                  <div class="col-lg-8">
                    <div class="intro-body">
                      <p class="intro-title-top">
                      {{ $item->location }}
                      </p>
                      <h1 class="intro-title mb-4">
                      {{ $item->name }}
                      </h1>
                      <p class="intro-title-top">
                      {{ $item->description }}
                      </p>
                      <p class="intro-subtitle intro-price">
                        <a href="{{ env('APP_URL') }}{{ $item->uri }}"><span class="price-a">learn more</span></a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @php 
          $i++;
        @endphp
      @endforeach
    </div>
  </div>
  <!--/ Carousel end /-->

  <!--/ Agent /-->
  <section class="section-services section-t6">
    <div class="container">
      
      <div class="row">
        <section class="agent-single">
          <div class="container">
          
            <div class="row">
              <div class="col-sm-12">
                <div class="row">
                  <div class="col-md-6">
                    <div class="agent-avatar-box">
                      <img src="{!! url('images/Ebeye.png')!!}" alt="" class="agent-avatar img-fluid">
                      <div class="col-md-10 d-none">
                        <div class="sinse-box">
                          <h2 class="sinse-title text-white">
                            PRC Accredited &
                            <br> 
                            DHSUD Registered Real Estate Salesperson
                          </h2>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 section-md-t5 m-t-50">
                    <div class="agent-info-box">
                      <div class="agent-title">
                        <div class="title-box-d">
                          <h3 class="title-d">Here's a little bit about me</h3>
                        </div>
                      </div>
                      <div class="agent-content mb-3">
                        <p class="content-d color-text-a">
                        <b>Ebeye Jane Quijano</b>, as a Realtor here in Cebu, I enthusiastically help people fill their part of the Filipino dream of home ownership. It is my privilege to service people who are looking to fill the dream. I love to share in my clients excitement when their home sells or they buy their first home or lot.
                        </p>
                        <p class="content-d color-text-a">
                        With the new normal. Most properties accept online reservations, I am here to coordinate with the developers to make sure your experience is smooth and all requirements are met.
                        </p>
                        <p class="content-d color-text-a">
                        And did I mention that my services are FREE? Yes, it’s free. No need to pay me, no commitments, and no pressure. Just ask away and I will help you find and reserve your new home. I'm looking forward to working with you.
                        </p>
                        <div class="info-agents color-a">
                          <p>
                            <strong>Mobile: </strong>
                            <a href="tel:{{ env('GLOBAL_MOBILE') }}" class="color-text-a"> {{ env('GLOBAL_MOBILE') }}</a>
                          </p>
                          <p>
                            <strong>Email: </strong>
                            <a href="mailto:{{ env('GLOBAL_MAIL') }}" 
                               class="color-text-a"> {{ env('GLOBAL_MAIL') }}</a>
                          </p>
                        </div>
                      </div>
                      <div class="socials-footer">
                        <ul class="list-inline">
                          <li class="list-inline-item">
                            <a href="#" class="link-one">
                              <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                          </li>
                          <li class="list-inline-item">
                            <a href="#" class="link-one">
                              <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                          </li>
                          <li class="list-inline-item">
                            <a href="#" class="link-one">
                              <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                          </li>
                          <li class="list-inline-item">
                            <a href="#" class="link-one">
                              <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                            </a>
                          </li>
                          <li class="list-inline-item">
                            <a href="#" class="link-one">
                              <i class="fa fa-dribbble" aria-hidden="true"></i>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </section>
  <!--/ Agent End /-->

  <!--/ Property /-->
  <section class="section-property section-t8">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Featured Properties</h2>
            </div>
            <!-- <div class="title-link">
              <a href="property-grid.html">All Property
                <span class="ion-ios-arrow-forward"></span>
              </a>
            </div> -->
          </div>
        </div>
      </div>
      <div class="row property-grid grid">
        @foreach($featured as $item)
          @include('layouts.frontend._property')
        @endforeach
      </div>
    </div>
  </section>
  <!--/ Property End /-->

@endsection