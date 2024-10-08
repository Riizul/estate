@extends('layouts.app-master')

@section('styles')
<!-- Filepond  -->
<!-- <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" /> -->
<link rel="stylesheet" href="{{ asset('filePond/css/filepond.css')}}">
<!-- <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet"/> -->
<link rel="stylesheet" href="{{ asset('filePond/css/filepond-plugin-image-preview-4.6.12.css')}}">
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Property Information</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/content">Property</a></li>
                <li class="breadcrumb-item active">Create</li>
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
                            <form id="propertyForm" method="POST" action="{{ route('content.store') }}">
                                @csrf
                                <!-- Banner image -->
                                <div>
                                    <label for="ContentBanner" class="form-label">Profile</label>
                                    <input   
                                        type="file" 
                                        name="ContentBanner"
                                        id ="ContentBanner"
                                        accept="image/png, image/jpeg, image/gif"  
                                        required
                                        />
                                </div>
                                 <!-- Name -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input value="{{ old('name') }}" 
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
                                    <input value="{{ old('location') }}"
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
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                                        rows="2"></textarea>
                                    @if ($errors->has('price'))
                                        <span class="text-danger text-left">{{ $errors->first('price') }}</span>
                                    @endif
                                </div>
                                <!-- Category -->
                                <div class="mb-3">
                                    <label for="category" class="form-label">Category</label>
                                    <select id="category" name="category" class="form-control" >
                                        @foreach($propertyCategories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Type -->
                                <div id="type-container" class="mb-3">
                                    <label for="type" class="form-label">Type</label>
                                    <select id="type" name="type" class="form-control" >
                                        <option value="0"></option>
                                        @foreach($propertyTypes as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
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
                                        rows="5" required></textarea>
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
                                        placeholder="Description"
                                        rows="5" required></textarea>
                                    @if ($errors->has('description'))
                                        <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>
                                <!-- Featured -->
                                <div class="mb-3">
                                    <label for="featured" class="form-label">Featured</label>
                                    <select name="featured" class="form-control" >
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                                <!-- Status -->
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" class="form-control" >
                                        @foreach($propertyStatuses as $status)
                                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <input type="hidden" id="propertyToken" name="propertyToken" value="{{ $propertyToken }}">
                                <input type="hidden" id="propertyContentBuilder" name="propertyContentBuilder" >
                                <input type="hidden" id="propertyGallery" name="propertyGallery" >
                                <input type="hidden" id="propertyBanner" name="propertyBanner" >

                                <button type="submit" class="btn btn-primary btn-block"><b>Submit</b></button>
                            </form>
                        </div>
                    </div>
                    <!-- /.Profile -->
 
                </div>
                <!-- /.col -->

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
                                    <div id="content-container" class="container" data-sortable-id="0" aria-dropeffect="move"></div>
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
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->

                <div class="col-md-12 m-update-btn">
                    <button class="btn btn-primary btn-block"><b>Submit</b></button>
                </div>
                <!-- /.col -->
            </div>
        <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
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

                    <ul id="contentTypeEnumListGroup" class="list-group mb-3"  data-sortable-id="0" aria-dropeffect="move">
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
                    <!-- Type -->
                    <label class="form-label">Type</label>
                    <div class="input-group mb-3">
                        <select id="ContentTypeMediaExtension"
                            name="ContentTypeMediaExtension" 
                            class="form-control"
                        >
                            <option value="image">Image</option> 
                            <option value="video">Video</option>
                        </select>
                    </div>

                    <!-- Video media -->
                    <div id="video-media" style="display:none">
                        <label class="form-label">Video url</label>
                        <input  
                            type="text" 
                            class="form-control" 
                            name="ContentTypeMediaVideo" 
                            id="ContentTypeMediaVideo"
                        >
                    </div>

                    <!-- Image media -->
                    <div id="image-media">
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
                </div>
            </div>
            <div class="modal-footer">
                <button id="btn-delete" type="button" class="btn btn-default pull-left">Delete</button>
                <button id="btn-action" data-id="add" type="button" class="btn btn-primary">Add</button>
            </div>
        </div>
    </div>
</div>

<!-- Gallery -->
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

<!-- FilePond -->
<script src="{{asset('filePond/js/filepond-plugin-image-preview.js')}}"></script>
<script src="{{asset('filePond/js/filepond.js')}}"></script>

<!-- Content builder -->
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

    /**
     * Initialize FilePond instance content builder media
     */
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
                    updateFilePondGalleryContent() 
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
        }
    }) 

    pond.on('processfiles', () => {
        // pond.getFiles().forEach(function (item) {
        //     contentTypeMedia.push($('#propertyEntryCode').val() + "/" + item.filename);
        // })
    });

    pond.on('removefile', function(error, file) {
        removeFileContentMedia(file);
    });

    //FilePond Gallery
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
                    //populate gallery
                    contentMediaGallery = [];
                    pondGallery.getFiles().forEach(function (item) {
                        let file  = {
                            filename : item.filename,
                            source :  propertyPath + item.filename,
                            size : item.fileSize,
                            extention : item.fileExtension
                        }

                        contentMediaGallery.push(file);
                    })
                    console.log(response);
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
        }
    }) 

    pondGallery.on('removefile', function(error, file) {
        if($('#ContentGallaryModal').is(':visible')) {
            contentMediaGallery = contentMediaGallery.filter(function(item) {
                return item.source != propertyPath + file.filename;
            })
        }
    });
    //End FilePond Gallery

    //FilePond instance banner
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
        }
    }) 

    pondBanner.on('removefile', function(error, file) {
        // if($('#ContentGallaryModal').is(':visible')) {
        //     contentMediaGallery = contentMediaGallery.filter(function(item) {
        //         return item != file.source;
        //     })
        // }
    });
    //End FilePond Banner

    function contentBuilder_old (obj, arg) {
        let template = "";
        switch (obj.type) {
            //Header
            case 1:
                if(arg) {
                    template = '<div data-id='+ obj.id +'  data-type=1 data-value='+ obj.value +' class="col-md-12 item">';
                    template += '<h4>'+ obj.value +'</h4>';
                    template += '</div>';
                }
                else 
                    $(".item[data-id=" + obj.id + "] h4").text(obj.value)
                
                break;
            //Paragraph
            case 2:
                if(arg) {
                    template = '<div data-id='+ obj.id +' data-type=2 class="item">';
                    template += '<p>'+ obj.value.replaceAll('\n','<br/>') +'</p>';
                    template += '</div>';
                }
                else 
                    $(".item[data-id=" + obj.id + "] p").html(obj.value.replaceAll('\n','<br/>'))

                break;
            //Enumeration
            case 3:
                let percolumn = obj.value.length > 5 ? Math.ceil(obj.value.length / obj.model.column) : 1,
                    cola = "", colb = "", list = "";

                //build column
                obj.value.forEach(function (item, ndx) {
                    if(percolumn == 1 || ndx < percolumn)
                        cola += `<li>`+ item +`</li>`;
                    else
                        colb += `<li>` + item + `</li>`;
                })      

                //build list 
                for(let i = 0; i < obj.model.column; i++){
                    list += `<div class="col-md-` + (percolumn == 1 ? `12` : `6`) + `"><ul>`;
                    list += i == 0 ? cola : colb;
                    list += `</ul></div>`;
                }

                if(arg) 
                    template = `<div data-id=`+ obj.id +` data-type=3 class="row g-0 item">` + list + `</div>`;
                else 
                    $(".item[data-id=" + obj.id + "]")
                        .empty()
                        .append(list);
               
                break;
            //Media
            case 4:

                let imgs = "";
                obj.value.forEach(function (item) {
                    //BTK :: for deployment directory
                    // template += `<img src="{{ asset('storage/public/tmp/` + item + `') }}" alt="" title=""></a>`
                    imgs += `<img src="{{ asset('storage/tmp` + item + `') }}" alt="" title=""></a>`
                })  

                if(arg) 
                    template = `<div data-id=`+ obj.id +` data-type=4 class="row g-0 item">` + imgs + `</div>`;
                else 
                    $(".item[data-id=" + obj.id + "]")
                        .empty()
                        .append(imgs);
                break;

        }

        $("#content-container").append(template);
        $('#ContentTypeBuilderModal').modal('hide');
        // $('#ContentTypeBuilderModal').find(".close").click();
    }

    $('#btn-action').click(function () {
        addContentItem(this);

        // let item = {},
        //     type = parseInt($("#contentType").val()),
        //     action = $(this).data("id");

        // item.id = propertyContent.length;
        // item.type = type;
        // item.status = 1;

        // switch (type) {
        //     //Header
        //     case 1:
        //         item.value = $("#ContentTypeHeader").val();
        //         break;
        //     //Paragraph
        //     case 2:
        //         item.value = $("#ContentTypeParagraph").val();
        //         break;
        //     //Enumeration
        //     case 3:
        //         let raw =  $("#contentTypeEnumListGroup").find(".list-group-item"),
        //             sorted = [];

        //         raw.each(function(n, e) {
        //             let id = $(e).data('id'),
        //                 value = $(e).data('value');
        //             sorted.push(value)
        //         })
                
        //         item.value = sorted;
        //         item.model= { column: $('#ContentTypeEnumColumn').val() }
        //         break;
        //     //Media
        //     case 4:
        //         contentTypeMedia = [];
        //         pond.getFiles().forEach(function (item) {
        //             if(!contentTypeMedia.includes(item))
        //                 contentTypeMedia.push("/" + $('#propertyEntryCode').val() + "/" + item.filename);
        //         })

        //         item.value = contentTypeMedia;

        //         //BTK :: not nessesarry
        //         //populate media gallery
        //         // contentTypeMedia.forEach((file) => {
        //         //     if(!contentMediaGallery.includes(file))
        //         //         contentMediaGallery.push(file);
        //         // })

        //         break;

        // }

        // if(action == "add") {
        //     propertyContent.push(item);
        //     contentBuilder(item, true);
        // }
        // else {
        //     item.id = $(this).data("item");
        //     propertyContent[item.id] = item; 
        //     contentBuilder(item, false);
        // }
        

        // $("#alert-property-info").hide();

        // console.log(propertyContent);
    })

    $('#btn-delete').click(function () {
        let item = $(this).data("item");
        propertyContent[item].status = 0; 
        $(".item[data-id=" + item + "]").remove();
        $('#ContentTypeBuilderModal').modal('hide');
    });

    $('#contentTypeEnumBtn').click(function () {
        let input = $('#ContentTypeEnumaration');
        $('#contentTypeEnumListGroup')
            .append(`<li class="list-group-item" data-id=` + contentTypeEnumaration.length + ` data-value="` + input.val()  +`">
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

        contentTypeEnumaration.push(input.val())
        input.val("");
    })

 

    $("#btn-gallery-content").click(function () {

        let files = [];
        contentMediaGallery.forEach(function (item) {
            files.push({
                source: item.source,
                options: {
                    type: 'local',
                }
            })
        })

        pondGallery.files = files;

        
    }) 

    $('#ContentTypeBuilderModal').on('show.bs.modal', function (e) {
    })

    $("#propertyForm").on("submit", function(e) {
        let information = propertyContent.filter(function (item) { return item.status == 1 }),
            sortItem =  $("#content-container").find(".item");
        
        sortItem.each(function(n, e) {
            let id = $(e).data('id');
            information[information.map(e => e.id).indexOf(id)].sort = n; 
        })

        $("#propertyContentBuilder").attr("value", JSON.stringify(information));
        $("#propertyGallery").attr("value", JSON.stringify(contentMediaGallery));
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

</script>

<!-- jQuery -->
<!-- 
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
-->

<script src="{{asset('jQuery/jquery-1.12.4.js')}}"></script> 
<script src="{{asset('jQuery/jquery-ui.js')}}"></script>
<script>
    jQuery.noConflict();
    (function( $ ) {
        $(function() {
            $("#media-collection").sortable();
            $( "#content-container" ).sortable();
            $( "#content-container" ).disableSelection();
            $( "#contentTypeEnumListGroup" ).sortable();
            $( "#contentTypeEnumListGroup" ).disableSelection();
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