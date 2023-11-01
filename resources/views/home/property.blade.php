@extends('layouts.frontend-master')

@section('styles')
<!-- Lightbox -->
<link href="{!! url('lightbox/css/lightbox.min.css') !!}" rel="stylesheet">
@endsection

@section('content')
<!--/ Intro Single star /-->
<section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-6">
          <div class="title-single-box">
            <h1 class="title-single">{{ $property->name }}</h1>
            <span class="color-text-a">{{ $property->location }}</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-6">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{ env('APP_URL') }}/">Home</a>
              </li>
              <li class="breadcrumb-item">
                <a href="{{ env('APP_URL') }}/{!! $property->category->slug !!}">
                {{ $property->category->name }}
                </a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                {{$property->name}}
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ Property Single Star /-->
  <section class="property-single nav-arrow-b">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property">
            @foreach($property->gallery as $item)
                <div class="carousel-item-b">
                  <img src="{!! url('storage/tmp' , $item->source) !!}" alt="{{ $property->name }}">
                </div>
            @endforeach
          </div>
          <div class="row justify-content-between">
            <div class="col-md-7 col-lg-12 section-md-t3">
              @foreach($property->contents as $item)
                @switch($item->contentTypeId)
                  @case(1)
                    <div class="title-box-d m-t-50">
                      <h3 class="title-d">
                        {!!html_entity_decode( nl2br(e($item->value)) )!!}
                      </h3>
                    </div>
                  @break
                  @case(2)
                    <div class="property-description m-t-50">
                      {!!html_entity_decode( nl2br(e($item->value)) )!!}
                    </div>
                  @break
                  @case(3)
                    <div class="amenities-list color-text-a">
                      <ul class="list-unstyled">
                        @foreach(json_decode($item->value, true) as $item)
                          <li class="item-list-a">
                            <i class="fa fa-angle-right"></i> {{ $item }}
                          </li>
                        @endforeach
                      </ul>
                    </div>
                  @break
                  @case(4)
                    @php
                        $column = isset( json_decode($item->attribute,true)['column']) ?  json_decode($item->attribute,true)['column'] : 1;
                    @endphp
                    <div class="container-flex w-full">
                      @foreach(json_decode($item->value, true) as $item)
                        @php
                          $filename = explode("/", $item)[2];
                        @endphp
                        <div class="column-{{$column}}">
                          <div class="box-shadow rounded overflow-hidden bg-white hover:!drop-shadow-md">
                            <a class="group transition-all duration-500 media-img" 
                              href="{!! url('storage/tmp' , $item) !!}"
                              data-lightbox="gallery-set" 
                            >
                              <div class="thumbnails-{{$column}} relative overflow-hidden">
                                <img 
                                  src="{!! url('storage/tmp' , $item) !!}" 
                                  alt="" 
                                  class="h-full w-full object-cover object-center group-hover:scale-110 transition-all duration-500 cursor-pointer">
                              </div>
                            </a>
                          </div>
                        </div> 
                      @endforeach
                    </div>
                  @break
                @endswitch
              @endforeach
            </div>
          </div>
        </div>
     
      </div>
    </div>
  </section>
  <!--/ Property Single End /-->
@endsection

@section('scripts')
<!-- Lightbox -->
<script src="{!! url('lightbox/js/lightbox-plus-jquery.min.js') !!}"></script>
<script>
  $(".media-img").on("click", function() {
      $("body").addClass("overflow-hidden")
  });
 
  function lightboxClose() {
    $("body").removeClass("overflow-hidden")
  }
</script>
@endsection