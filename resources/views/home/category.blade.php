@extends('layouts.frontend-master')
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
  </section>
  <!--/ Property Grid End /-->


<!-- <div id="outside" class="page" >
    <div class="container ">
        <div class="text-[12px] py-3 text-dark2 flex items-center capitalize">
            <a to="/" class="hover:text-yellow2 transition-all">Home</a>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
            </svg>
            <strong class="text-yellow-500">
                {{ $category }}
            </strong>
        </div>
        <div
            data-sal="fade-in"
            data-sal-delay="100"
            data-sal-duration="800"
            data-sal-easing="ease-out-quart"
            >
            <div class="text-2xl sm:text-4xl font-[800] font-raleway my-5">
                {{ $category }} Lists
            </div>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-[30px]">
            @foreach($properties as $item)
            <div class="box-shadow rounded overflow-hidden bg-white hover:!drop-shadow-md">
                <a href="{{ env('APP_URL') }}{{ $item->uri }}" class="group transition-all duration-500">
                    <div class="h-[200px] relative overflow-hidden">
                        <img
                            src="{!! url('storage/tmp' , $item->banner) !!}" 
                            class="h-full w-full object-cover object-center group-hover:scale-110 transition-all duration-500 cursor-pointer"
                            alt="{{ $item->name }}"
                        >
                    </div>
                    <div class="p-5 lg:p-7">
                        <h3 class="text-xl font-raleway font-[700] mb-1 text-dark2">
                            {{ $item->name }}
                        </h3>
                        <div class="text-lg font-[700] text-yellow2" style="display:none">
                            ₱ {{ $item->price }}
                        </div>
                        <p class="mt-2 text-dark2 text-sm">
                            {!! Str::limit($item->description, 120, ' ...') !!}
                        </p>
                        <div style="display:none" class="flex gap-4 mt-5 opacity-80 text-dark">
                            <span class="flex gap-1 items-center">
                                <img src="icons/bed.svg" width="19" alt="bed">
                                <span class="text-[14px]">5</span>
                            </span>
                            <span class="flex gap-1 items-center">
                                <img src="icons/bath.svg" alt="bath">
                                <span class="text-[14px]">5</span>
                            </span>
                            <span class="flex gap-1 items-center">
                                <img src="icons/size.svg" alt="size">
                                <span class="text-[14px]">5 ft<sup>2</sup></span>
                            </span>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div> -->

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