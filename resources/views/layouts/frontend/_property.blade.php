<div class="col-md-4">
    <div class="box-shadow rounded overflow-hidden m-b-30">
        <a href="{{ env('APP_URL') }}{{ $item->uri }}" 
            class="card-box-a card-shadow">
        <div class="img-box-a" >
            <img 
                src="{!! url('storage/tmp', $item->banner) !!}" 
                alt="" 
                class="img-a img-fluid"
                height="430"
                style="width: auto;
                    height: 430px;
                    object-fit: cover;">
        </div>  
        <div class="card-overlay">
            <div class="proptery-tag-1">
            {{ $item->category->name }}
            </div> 
            <div class="card-overlay-a-content">
                <div class="card-header-a">
                    <h2 class="p-b-5 card-title-a header-1">   
                    {{ $item->name }}
                    </h2>
                    <div class="price-box d-flex">
                        <span class="property-location link-a">
                            {{ $item->price }}
                        </span>
                    </div>
                    <div class="price-box d-flex">
                        <span class="property-location link-a">
                            <!-- <i class="fa fa-map-marker"></i> -->
                            {{ $item->location }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        </a>
    </div>
</div>