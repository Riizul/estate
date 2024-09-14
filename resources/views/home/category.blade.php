@extends('layouts.frontend-master')

@section('title', $title)

@section('meta_keywords', $meta_keywords)

@section('meta_description', $meta_description)

@section('styles')

@section('content')
   <!--/ Intro Single star /-->
   <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">{{ $category }}</h1>
            <span class="color-text-a">Properties</span>
          </div>
        </div> 
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="/">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
              {{ $category }}
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ Property Grid Star /-->
  <section class="property-grid grid">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="grid-option">
            <select id="locationDropdown" class="custom-select">
              <option value="0" selected>All</option>
              @foreach ($propertyLocations as $location)
                  <option value="{{ $location['locationId'] }}">
                    {{ $location['locationName'] }}
                  </option>
              @endforeach
            </select> 
          </div>
        </div>
        @foreach($properties as $item)
          @include('layouts.frontend._property')
        @endforeach
      </div>
    </div>
    <script>
      // BTK:: Temporary
      // Set property banner fallback image
      var images = document.getElementsByClassName('property-banner');
      for (var i = 0; i < images.length; i++) {
          images[i].onerror = function() {
          const image = this;
          var srcAttribute = image.getAttribute('data-fallback');
          this.src = srcAttribute;
        };
      }
    </script>
  </section>
  <!--/ Property Grid End /-->

  @endsection

@section('scripts')
<script>
  $(function() {

    $("#locationDropdown").change(function(){
      let properties = $(".property"),
          location = this.value;

      properties.each(function(ndx, item) {
        let element = $(item);

        if(location == "0" || location == element.data("sort")) {
          element.show();
        }
        else {
          element.hide();
        }

      });
      
    })

  });
</script>
@endsection