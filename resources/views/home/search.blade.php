@extends('layouts.frontend-master')

@section('styles')
<style>
    .btn-search {
        display:none !important;
    }
</style>
@endsection

@section('content')
<section class="intro-single bgc-f7">
    <div class="container">
        <div class="row">
        <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
            <h1 class="title-single">Property listing</h1>
            <span class="color-text-a">Search</span>
            </div>
        </div> 
    </div>
</div>
</section>
<section class="property-grid grid bgc-f7">
    <div class="container">
        <div class="row">
            <div class="col-md-4 search-b-container">
                <form method="POST" 
                    action="{{ route('home.search') }}"
                    class="form-a search-property-form search-b bg-white">
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
                                    @if ($location->id == $selectedlocation) {{'selected="selected"'}} @endif >
                                    {{ $location['name'] }}
                                </option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <!-- Property Type -->
                        <div class="col-md-12 mb-2">
                            <div class="form-group">
                                <label for="filtertype">Property Type</label>
                                <ul class="terms-list circle-check level-0">
                                    <li class="list-item level-0">
                                        <div class="list-item-inner">
                                            <input id="filtertype-1" 
                                                type="checkbox" 
                                                name="filtertype[]" 
                                                value="1"
                                                @if (in_array(1 , $filtertype))
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
                                                @if (in_array(2 , $filtertype))
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
                                                @if (in_array(3 , $filtertype))
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
                                                value="1"
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
                                                value="2"
                                                @if (in_array(2 , $filterstatus))
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
            <div id="search-result-container" class="col-md-8">
                <div class="flex-container">
                    @foreach($properties as $item)
                        <div 
                            class="listing-style bg-white" 
                            data-uri="{{ env('APP_URL') }}{{ $item->uri }}" >
                            <div class="list-thumb">
                                <div class="proptery-tag-1">
                                {{ $item->state }}
                                </div> 
                                @php
                                    $file = explode("/", $item->banner);
                                    $filePath = $file[1];
                                    $filename = $file[2];
                                    $fileSource = $filePath . "/thumbnail/md-". $filename;
                                @endphp
                                <img 
                                    src="{!! url('storage/tmp', $fileSource) !!}"
                                    data-fallback="{!! url('storage/tmp', $item->banner) !!}"
                                    alt="{{ $item->name }}"
                                    class="w-100 cover property-banner"
                                    width="382"
                                    height="230px"
                                >
                            </div>
                            <div class="list-content">
                                <h6 class="list-title">
                                    <a href="{{ env('APP_URL') }}{{ $item->uri }}">{{ $item->name }}</a>
                                </h6>
                                <p>{{ $item->location }}</p>
                                <hr class="mt-2 mb-2">
                                <div class="list-meta2 justify-content-between align-items-center">
                                    <span class="for-what">{{ $item->price }}</span>
                                    <span class="color-text-a">{{ $item->categoryName }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
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
@endsection

@section('scripts')
<script>
    if(window.innerWidth > 999) 
        $(".float-search-container").remove();
    else {
        $("#search-result-container").addClass("col-md-12")
        $(".search-b-container").remove();
    }

    $(".listing-style").on("click", function() {
        window.location.href = $(this).data("uri");
    })
</script>
@endsection