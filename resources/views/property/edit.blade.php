@extends('layouts.app-master')

@section('styles')
<!-- Filepond  -->
<!-- <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" /> -->
<link rel="stylesheet" href="{{ asset('filePond/css/filepond.css')}}">
<!-- <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet"/> -->
<link rel="stylesheet" href="{{ asset('filePond/css/filepond-plugin-image-preview-4.6.12.css')}}">

<!-- Ekko Lightbox -->
<link rel="stylesheet" href="{!! url('assets/AdminLTE/plugins/ekko-lightbox/ekko-lightbox.css') !!}">
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ $property->name }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/content">Property</a></li>
                <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4"> 
                     <!-- Profile  -->
                     <div class="card card-primary card-outline">
                        <div class="card-body">
                            <form id="propertyForm"
                                method="post"
                                action="{{ route('content.update', $property->id) }}"
                                enctype="multipart/form-data">
                                @method('patch')
                                @csrf
                                <!-- Banner -->
                                <div id="banner-container" class="mb-3" data-src="{{ $property->banner }}">
                                    <label for="ContentBanner" class="form-label">Profile</label>
                                    <input   
                                        type="file" 
                                        name="ContentBanner"
                                        id ="ContentBanner"
                                        accept="image/png, image/jpeg, image/gif" required />
                                </div>
                                <!-- Name -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input value="{{ $property->name }}" 
                                        type="text" 
                                        class="form-control" 
                                        name="name" 
                                        placeholder="Name" required>

                                    @if ($errors->has('name'))
                                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <!-- Address -->
                                <div class="mb-3">
                                    <label for="location" class="form-label">Address</label>
                                    <input value="{{ $property->location }}"
                                        type="text" 
                                        class="form-control" 
                                        name="location" 
                                        placeholder="Address" required>

                                    @if ($errors->has('location'))
                                        <span class="text-danger text-left">{{ $errors->first('location') }}</span>
                                    @endif
                                </div>
                                <!-- Location -->
                                <div class="mb-3">
                                    <label for="locationId" class="form-label">Location</label>
                                    <select id="locationId" name="locationId" class="form-control" >
                                        @foreach($locations as $item)
                                        <option value="{{ $item->id }}"  
                                            @if ($property->locationId == $item->id)
                                            {{'selected="selected"'}}
                                            @endif 
                                        >
                                        {{ $item->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Price -->
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <textarea 
                                        class="form-control"
                                        name="price" 
                                        placeholder="Price"
                                        rows="1">{{ $property->price }}</textarea>

                                    @if ($errors->has('Price'))
                                        <span class="text-danger text-left">{{ $errors->first('price') }}</span>
                                    @endif
                                </div>
                                <!-- Category -->
                                <div class="mb-3">
                                    <label for="category" class="form-label">Category</label>
                                    <select id="category" name="category" class="form-control" >
                                        @foreach($propertyCategories as $category)
                                        <option value="{{ $category->id }}"  
                                            @if ($property->categoryId == $category->id)
                                            {{'selected="selected"'}}
                                            @endif 
                                        >
                                        {{ $category->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Type -->
                                <div id="type-container" 
                                    class="mb-3" 
                                    @if ($property->categoryId != 1) style="display:none" @endif>

                                    <label for="type" class="form-label">Type</label>
                                    <select name="type" class="form-control" >
                                        @foreach($propertyTypes as $type)
                                        <option 
                                            value="{{ $type->id }}" 
                                            @if ($property->typeId == $type->id)
                                            {{'selected="selected"'}}
                                            @endif 
                                        >
                                        {{ $type->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Meta Keywords -->
                                <div class="mb-3">
                                    <label for="keywords" class="form-label">Meta Keywords</label>
                                    <textarea 
                                        class="form-control"
                                        name="keywords" 
                                        placeholder="keywords"
                                        rows="5" required>{{ $property->keywords }}</textarea>
                                    @if ($errors->has('keywords'))
                                        <span class="text-danger text-left">{{ $errors->first('keywords') }}</span>
                                    @endif
                                </div>
                                <!-- Meta Description -->
                                <div class="mb-3">
                                    <label for="description" class="form-label">Meta Description</label>
                                    <textarea 
                                        class="form-control"
                                        name="description" 
                                        placeholder="description"
                                        rows="5" required>{{ $property->description }}</textarea>
                                    @if ($errors->has('description'))
                                        <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>
                                <!-- Featured -->
                                <div class="mb-3">
                                    <label for="featured" class="form-label">Featured</label>
                                    <select name="featured" class="form-control" >
                                        <option 
                                            value="0" 
                                            @if ($property->featured == 0)
                                                {{'selected="selected"'}}
                                            @endif>
                                            No
                                        </option>
                                        <option 
                                            value="1"
                                            @if ($property->featured == 1)
                                                {{'selected="selected"'}}
                                            @endif>
                                            Yes
                                        </option>
                                    </select>
                                </div>
                                <!-- Status -->
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" class="form-control" >
                                        @foreach($propertyStatuses as $status)
                                        <option 
                                            value="{{ $status->id }}"
                                            @if ($property->stateId == $status->id)
                                            {{'selected="selected"'}}
                                            @endif 
                                        >
                                        {{ $status->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <input type="hidden" id="propertyToken" name="propertyToken" value="{{  $property->token }}">
                                <input type="hidden" id="propertyContentBuilder" name="propertyContentBuilder" >
                                <input type="hidden" id="propertyBanner" name="propertyBanner" value="{{ $property->banner }}" >
                                <input type="hidden" id="propertyGallery" name="propertyGallery" >
                                <button type="submit" class="btn btn-primary"><b>Update</b></button>
                            </form>
                        </div>
                    </div>
                    <!-- /.Profile -->
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Content</a></li>
                                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Gallery</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity"> 
                                    <div id="alert-property-info" class="alert alert-primary m-0" role="alert">
                                        Empty property information.
                                    </div>
                                    <div class="row">
                                        <div id="content-container" 
                                            data-content="{{ $parseContent }}"
                                            class="container" 
                                            data-sortable-id="0" 
                                            aria-dropeffect="move">
                                        </div>
                                    </div>
                                    <hr>
                                    <button id="btn-create-content" type="button" class="btn btn-default mt-2" data-toggle="modal" data-target="#ContentTypeBuilderModal">
                                        Add
                                    </button> 
                                </div><!-- /.tab-pane -->

                                <div class="tab-pane" id="timeline">
                                    <input   
                                        type="file" 
                                        name="ContentGallery"
                                        id ="ContentGallery"
                                        accept="image/png, image/jpeg, image/gif"
                                        multiple />
                                </div><!-- /.tab-pane -->
                            </div><!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div><!-- /.card -->
                </div><!-- /.col -->

                <div class="col-md-12 m-update-btn">
                    <button class="btn btn-primary btn-block"><b>Update</b></button>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section><!-- /.Main content -->
</div>

 <!-- Main Modal -->
 <div class="modal fade" id="ContentTypeBuilderModal" tabindex="-1" role="dialog" aria-labelledby="ContentTypeBuilderModalLabel"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Content Builder</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="status" class="form-label">Content type</label>
                    <select id="contentType" name="contentType" class="form-control" >
                        @foreach($contentTypeBuilder as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- ContentTypeHeader -->
                <div id="type-header-container" class="mb-3 content-type-element">
                    <label for="ContentTypeHeader" class="form-label">Text</label>
                    <input  
                        type="text" 
                        class="form-control" 
                        name="ContentTypeHeader" 
                        id="ContentTypeHeader" 
                        required>
                </div>

                <!-- ContentTypeParagraph -->
                <div id="type-paragraph-container" class="mb-3 content-type-element">
                    <label for="ContentTypeParagraph" class="form-label">Content</label>
                    <textarea   
                        class="form-control" 
                        id="ContentTypeParagraph"
                        name="ContentTypeParagraph"
                        rows="10">
                    </textarea >
                </div>
                
                <!-- ContentTypeEnumaration -->
                <div id="type-enumaration-container" class="mb-3 content-type-element">
                    <label for="ContentTypeEnumaration" class="form-label">List Item</label>
                    <div class="input-group mb-3">
                        <input 
                            type="text" 
                            id="ContentTypeEnumaration"
                            name="ContentTypeEnumaration"
                            class="form-control" 
                            aria-describedby="button-addon2">
                        <button id="contentTypeEnumBtn" class="btn btn-outline-secondary" type="button" id="button-addon2">Add</button>
                    </div>

                    <ul id="contentTypeEnumListGroup" class="list-group mb-3" data-sortable-id="0" aria-dropeffect="move">
                    </ul>

                    <label for="ContentTypeEnumColumn" class="form-label">Column</label>
                    <div class="input-group mb-3">
                        <select name="ContentTypeEnumColumn" id="ContentTypeEnumColumn" class="form-control" >
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                </div>
                <!-- ContentTypeMedia -->
                <div id="type-media-container" class="mb-3 content-type-element">
                    <label class="form-label">Thumbnails</label>
                    <select 
                        name="ContentTypeMediaImageColumn" 
                        id="ContentTypeMediaImageColumn" 
                        class="form-control mb-3"
                        >
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>

                    <div class="row mt-4">
                        <nav class="w-100">
                        <div class="nav nav-tabs" id="product-tab" role="tablist">
                            <a class="nav-item nav-link active" 
                                id="product-desc-tab" 
                                data-toggle="tab" href="#product-desc" role="tab" 
                                aria-controls="product-desc" 
                                aria-selected="true">
                                Gallery
                            </a>
                            <a class="nav-item nav-link" 
                                id="product-comments-tab" 
                                data-toggle="tab" 
                                href="#product-comments" role="tab" 
                                aria-controls="product-comments" 
                                aria-selected="false">
                                Upload
                            </a>
                        </div>
                        </nav>
                        <div class="tab-content p-3  w-100" id="nav-tabContent">
                            <div class="tab-pane fade active show" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                                <div id="media-collection" 
                                    class="container-flex" 
                                    data-sortable-id="0" 
                                    aria-dropeffect="move">

                               </div>
                            </div>
                            <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> 
                                <input   
                                    type="file" 
                                    name="ContentTypeMedia"
                                    id ="ContentTypeMedia"
                                    accept="image/png, image/jpeg, image/gif" 
                                    multiple 
                                />
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="btn-delete" type="button" class="btn btn-default pull-left">Delete</button>
                <button id="btn-action" data-id="add" type="button" class="btn btn-primary">Add</button>
            </div>
        </div>
    </div>
</div>

<!-- Gallery Modal -->
<div class="modal fade" id="ContentGallaryModal" tabindex="-1" role="dialog" aria-labelledby="ContentGallaryModalLabel"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Gallery</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<!-- <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script> -->

<!-- <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.js"></script> -->

<script src="{{asset('filePond/js/filepond-plugin-image-preview.js')}}"></script>
<script src="{{asset('filePond/js/filepond.js')}}"></script>
<script src="{!! url('assets/js/property-edit.js') !!}"></script>
<script src="{!! url('assets/js/property-content-filePond.js') !!}"></script>
<script src="{!! url('assets/js/property-content-builder.js') !!}"></script>

<script>
    let propertyContent = [],
        propertyPath = "/" + $('#propertyToken').val() + "/";
        contentTypeEnumaration = [],
        contentTypeMedia = [],
        contentMediaGallery = [];

    // Register the plugin
   FilePond.registerPlugin(FilePondPluginImagePreview);

    //Create FilePond instance banner
    const pondBanner = FilePond.create(document.querySelector('input[id="ContentBanner"]'));
    pondBanner.setOptions({
        server: {
            load: '/storage/tmp',
            allowRemove: true,
            process: {
                url : '/upload?propertyEntry=' + document.querySelector('input[id="propertyToken"]').value,
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                withCredentials: false,
                onload: (response) => {

                    //set banner
                    pondBanner.getFiles().forEach(function (item) {
                        let path =  "/" + document.querySelector('input[id="propertyToken"]').value + "/" + item.filename;
                        $("#propertyBanner").attr("value", path);
                    })
                    
                    response.key
                },
                onerror: (response) => response.data,
                ondata: (formData) => {
                    return formData;
                }
            },
            revert: (uniqueFileId, load, error) => {
                // Should remove the earlier created temp file here
                console.log("remove");

                // Can call the error method if something is wrong, should exit after
                error('oh my goodness');

                // Should call the load method when done, no parameters required
                load();
            },
        },
    }) 

    pondBanner.on('removefile', function(error, file) {
        // if($('#ContentGallaryModal').is(':visible')) {
        //     contentMediaGallery = contentMediaGallery.filter(function(item) {
        //         return item != file.source;
        //     })
        // }
    });

    pondBanner.files = [{
        source: $("#banner-container").data("src"),
        options: {
            type: 'local',
        }
    }];

    /**
     * Initialize FilePond property gallery
     */
    const pondGallery = FilePond.create(document.querySelector('input[id="ContentGallery"]'));
    pondGallery.setOptions({
        server: {
            load: '/storage/tmp',
            allowRemove: true,
            process: {
                url : '/upload?propertyEntry=' + document.querySelector('input[id="propertyToken"]').value,
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                withCredentials: false,
                onload: (response) => {

                    // Update filepond images
                    contentMediaGallery = [];
                    pondGallery.getFiles().forEach(function (item) {
                        let file  = {
                            filename : item.filename,
                            source :  propertyPath + item.filename,
                            size : item.fileSize,
                            extention : item.fileExtension
                        }

                        contentMediaGallery.push(file);
                    });

                    console.log(response);

                    
                },
                onerror: (response) => {
                    console.log(response)
                },
                ondata: (formData) => {
                    console.log(formData);
                    return formData;
                }
            },
            revert: (uniqueFileId, load, error) => {
                // Should remove the earlier created temp file here
                console.log("remove");

                // Can call the error method if something is wrong, should exit after
                error('oh my goodness');

                // Should call the load method when done, no parameters required
                load();
            },
        }
    });

    pondGallery.on('removefile', function(error, file) {
        contentMediaGallery = contentMediaGallery.filter(function(item) {
            return item.source != propertyPath + file.filename;
        })
    });

    pondGallery.on('processfile', (error, file) => {
        // This event is triggered when each file is processed/uploaded
        if (!error) {
            console.log('File uploaded successfully:', file.filename);
            // Perform additional actions if needed

            console.log(file)

        } else {
            console.error('Error uploading file:', file.filename);
        }
    });
   
    // Set filepond images
    let setGalleryFiles = [];

    contentMediaGallery = JSON.parse(`<?php echo $propertyGallery; ?>`);
    contentMediaGallery.forEach(function (item) {
        setGalleryFiles.push({
            source: item.source,
            options: {
                type: 'local',
            }
        })
    })

    pondGallery.files = setGalleryFiles;
    // End
 
 
    /**
     * Initialize FilePond content builder media
     */
    
     // Register the plugin
    // FilePond.registerPlugin(FilePondPluginImageResize, FilePondPluginImageTransform);

    const pond = FilePond.create(document.querySelector('input[id="ContentTypeMedia"]'));
    pond.setOptions({
        server: {
            load: '/storage/tmp',
            allowRemove: true,
            process: {
                url : '/upload?propertyEntry=' + document.querySelector('input[id="propertyToken"]').value,
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                withCredentials: false,
                onload: (response) => {
                    response.key
                    updateFilePondGalleryContent();
                },  
                onerror: (response) => {
                    console.log(response.data)
                },
                ondata: (formData) => {
                    return formData;
                }
            },
            revert: (uniqueFileId, load, error) => {
                // Should remove the earlier created temp file here
                console.log("remove");

                // Can call the error method if something is wrong, should exit after
                error('oh my goodness');

                // Should call the load method when done, no parameters required
                load();
            },
        }
    }) 

    // Listen for addfile event
    pond.on('FilePond:addfile', function (e) {
        console.log('file added event', e);
    });

    pond.on('processfiles', () => {
        // pond.getFiles().forEach(function (item) {
        //     let src = "/" + $('#propertyToken').val() + "/" + item.filename,
        //         filetemplate = mediaEditorContentBuilderItemTemplate(src, item.filename);

        //     $("#media-collection").append(filetemplate);
        // })
    });

    pond.on('removefile', function(error, file) {
        removeFileContentMedia(file);
    });
 
</script>

<script>
    /**
     * Initiate content builder
     */
    let canvas = document.getElementById('content-container');
    propertyContent = JSON.parse(canvas.dataset.content);

    propertyContent.forEach((obj) => {
        obj.status = 1;

        if(obj.contentTypeId < 3) 
            delete obj.attribute;

        switch (obj.contentTypeId) {
            case 3:
                obj.value = JSON.parse(obj.value)
                obj.attribute = JSON.parse(obj.attribute)
                break;   
            case 4:
                obj.value = JSON.parse(obj.value)

                if(obj.attribute.length > 0)
                    obj.attribute = JSON.parse(obj.attribute)
                break;
        } 

        contentBuilder(obj, true)
    })

    // BTK:: Temporary
    // catch error property image
    var images = document.getElementsByClassName('property-images');
    for (var i = 0; i < images.length; i++) {
        images[i].onerror = function() {
            const image = this;
            var srcAttribute = image.getAttribute('data-fallback');
            this.src = srcAttribute;
        };
    }

    if(propertyContent.length > 0)
        $("#alert-property-info").hide();

    $('#contentTypeEnumBtn').click(function () {
        let input = $('#ContentTypeEnumaration');

        $('#contentTypeEnumListGroup')
            .append(`<li class="list-group-item" data-id=` + contentTypeEnumaration.length + ` data-value="` + input.val() +`">
                        <label class="form-check-label" for="firstCheckbox">`+ input.val() +`</label>
                        <button type="button" class="btn-close float-right deleteEnumarationList" data-id="`+ input.val() +`" aria-label="Close"></button>
                    </li>`);

        $('.deleteEnumarationList')
            .off()
            .on('click', function () {
                let id =  $(this).data('id');
                contentTypeEnumaration = contentTypeEnumaration.filter(function(e) { return e !== id })
                $(this).parent().remove();
            })


        
        let raw =  $("#contentTypeEnumListGroup").find(".list-group-item"),
                sorted = [];
            raw.each(function(n, e) {
                let id = $(e).data('id'),
                    value = $(e).data('value');

                sorted.push(value)
            })

        contentTypeEnumaration = sorted;
        // contentTypeEnumaration.push(input.val())
        input.val("");
    })

    $("#category").change(function() {
        let typeContainer = $("#type-container"),
            type = $("#type");

        type.val("0");

        switch (this.value)
        {
            //House & Lot
            case "1":
                typeContainer.show();
                break;
            //Condo
            //Rent
            default:
                typeContainer.hide();
                type.val("0");
                break;
        }
    })

    $('#btn-delete').click(function () {
        let item = $(this).data("item");
        propertyContent[propertyContent.map(e => e.id).indexOf(item)].status = 0; 
        $(".item[data-id=" + item + "]").remove();
        $('#ContentTypeBuilderModal').modal('hide');
    });
</script>

<!-- Ekko Lightbox -->
<script src="{!! url('assets/AdminLTE/plugins/ekko-lightbox/ekko-lightbox.js') !!}"></script>
<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });
  })
</script>

<!-- jQuery -->
<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->

<script src="{{asset('jQuery/jquery-1.12.4.js')}}"></script>
<script src="{{asset('jQuery/jquery-ui.js')}}"></script>
<script>
    jQuery.noConflict();
    (function( $ ) {
        $(function() {
            /** Sortable **/
            $( "#content-container" ).sortable();
            $( "#content-container" ).disableSelection();

            $("#media-collection").sortable();
            $("#sortable").sortable();
            $("#gallla").sortable();
            $("#gallla").disableSelection();

            $( "#contentTypeEnumListGroup" ).sortable();
            $( "#contentTypeEnumListGroup" ).disableSelection();

            /** Input mask **/
            $("input.mask").each((i,ele)=>{
                let clone=$(ele).clone(false)
                clone.attr("type","text")
                let ele1=$(ele)
                clone.val(Number(ele1.val()).toLocaleString("en"))
                $(ele).after(clone)
                $(ele).hide()
                clone.mouseenter(()=>{
                    ele1.show()
                    clone.hide()
                })
                setInterval(()=>{
                    let newv=Number(ele1.val()).toLocaleString("en")
                    if(clone.val()!=newv){
                        clone.val(newv)
                    }
                },10)
                $(ele).mouseleave(()=>{
                    $(clone).show()
                    $(ele1).hide()
                })
                
            })
        });
    })(jQuery);
</script>

<!-- CKEditor -->
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('ckeditor/samples/js/sample.js')}}"></script>
<script>
    jQuery.noConflict();
    (function( $ ) {
        $(function() {
            initSample();
            // Get the editor instance that we want to interact with.
            editor = CKEDITOR.instances.ContentTypeParagraph;
        });
    })(jQuery);
</script>
@endsection