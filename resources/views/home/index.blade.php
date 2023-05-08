@extends('layouts.frontend-master')

@section('content')
  <!--/ Carousel Star /-->
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
                        <a href="#"><span class="price-a">learn more</span></a>
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
      <!-- <div class="carousel-item-a intro-item bg-image" style="background-image: url(images/slide-1.jpg)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top">
                        Yati, Liloan Cebu
                    </p>
                    <h1 class="intro-title mb-4">
                        Aduna Beach Villas Phase 2
                    </h1>
                    <p class="intro-subtitle intro-price">
                      <a href="#"><span class="price-a">read more</span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item-a intro-item bg-image" style="background-image: url(images/slide-2.jpg)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top">Doral, Florida
                      <br> 78345</p>
                    <h1 class="intro-title mb-4">
                      <span class="color-b">204 </span> Rino
                      <br> Venda Road Five</h1>
                    <p class="intro-subtitle intro-price">
                      <a href="#"><span class="price-a">rent | $ 12.000</span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item-a intro-item bg-image" style="background-image: url(images/slide-3.jpg)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top">Doral, Florida
                      <br> 78345</p>
                    <h1 class="intro-title mb-4">
                      <span class="color-b">204 </span> Alira
                      <br> Roan Road One</h1>
                    <p class="intro-subtitle intro-price">
                      <a href="#"><span class="price-a">rent | $ 12.000</span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> -->
    </div>
  </div>
  <!--/ Carousel end /-->

  <!--/ Agent Star /-->
  <section class="section-services section-t8">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box-e">
              <h3 class="title-e" >Here's a little bit about me</h3>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <section class="agent-single">
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <div class="row">
                  <div class="col-md-6">
                    <div class="agent-avatar-box">
                      <img src="{!! url('images/agent-7.jpg')!!}" alt="" class="agent-avatar img-fluid">
                      <div class="col-md-10">
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
                  <div class="col-md-5 section-md-t3">
                    <div class="agent-info-box">
                      <div class="agent-title">
                        <div class="title-box-d">
                          <h3 class="title-d">Ebeye Jane Quijano</h3>
                        </div>
                      </div>
                      <div class="agent-content mb-3">
                        <p class="content-d color-text-a">
                        As a Realtor here in Cebu, I enthusiastically help people fill their part of the Filipino dream of home ownership. It is my privilege to service people who are looking to fill the dream. I love to share in my clients excitement when their home sells or they buy their first home or lot.
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
                            <span class="color-text-a"> +63 995 011 4098</span>
                          </p>
                          <p>
                            <strong>Email: </strong>
                            <span class="color-text-a"> ebeyejanerealestate@gmail.com</span>
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

  <!--/ Property Star /-->
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
          <div class="col-md-4">
            <div class="card-box-a card-shadow">
              <div class="img-box-a" >
                <img 
                  src="{!! url('storage/tmp', $item->banner) !!}" 
                  alt="" 
                  class="img-a img-fluid"
                  height="450"
                  style="width: auto;
                        height: 450px;
                        object-fit: cover;"
                >
              </div>
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <h2 class="pb-0 card-title-a">
                      <a href="#">{{ $item->name}}</a>
                    </h2>
                    <span class="fs-15 text-white">
                      {{ $item->location }}
                    </span>
                  </div>
                  <div class="pt-15 card-body-a">
                    <!-- <div class="description-box">
                      {{ $item->description }}
                    </div> -->
                    <div class="price-box d-flex">
                      <a href="{{ env('APP_URL') }}{{ $item->uri }}" class="link-a" style="color: #189ad3">Learn more
                        <span class="ion-ios-arrow-forward"></span>
                      </a>
                      <!-- <a href="#" class="fs-12 bg-primary price-a">
                        Click here to view 
                        <span class="ion-ios-arrow-forward"></span>
                      </a> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
  <!--/ Property End /-->

@endsection