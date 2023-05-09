@extends('layouts.app-master')

@section('styles')
<!-- <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet"/> -->
<link rel="stylesheet" href="{{asset('filePond/css/filepond-plugin-image-preview.css')}}">
<link rel="stylesheet" href="{{asset('filePond/css/filepond.css')}}">
<style>
    .pull-left { float: left !important;}
    .pull-right {float: right !important}
    .content-type-element { display:none }
    #content-container { margin-bottom: 10px}
    #content-container p, #content-container ul {margin-bottom:0}
    #content-container .item h4 { margin:0 !important}
    #content-container .item img { margin:5px}
    #content-container .item:hover {
        cursor: pointer;
        border-radius: 3px; 
        --bs-bg-opacity: 1;
        background-color: rgba(var(--bs-light-rgb),var(--bs-bg-opacity))!important;
    }
</style>
@endsection

@section('content')
<div class="row">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('content.index') }}">Property</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </nav>

    <div class="bg-light p-4 rounded col-md-4">
        <form id="propertyForm" method="POST" action="{{ route('content.store') }}">
            @csrf
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
            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <input value="{{ old('location') }}"
                    type="text" 
                    class="form-control" 
                    name="location" 
                    placeholder="location" required>
                @if ($errors->has('location'))
                    <span class="text-danger text-left">{{ $errors->first('location') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea 
                    class="form-control"
                    name="description" 
                    placeholder="description"
                    rows="5" required></textarea>
                <!-- <input value="{{ old('description') }}"
                    type="text" 
                    class="form-control" 
                    name="description" 
                    placeholder="description" required> -->
                @if ($errors->has('description'))
                    <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                @endif
            </div>
            <!-- <div class="mb-3 d-none">
                <label for="price" class="form-label">price</label>
                <input value="{{ old('price') }}"
                    type="text" 
                    class="form-control" 
                    name="price" 
                    placeholder="price" required>
                @if ($errors->has('price'))
                    <span class="text-danger text-left">{{ $errors->first('price') }}</span>
                @endif
            </div> -->
            <!-- Banner image -->
            <div>
                <label for="ContentBanner" class="form-label">Banner</label>
                <input   
                    type="file" 
                    name="ContentBanner"
                    id ="ContentBanner"
                    class="form-control" 
                    accept="image/png, image/jpeg, image/gif"  
                    required
                    />
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
            
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-control" >
                    @foreach($propertyStatuses as $status)
                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Featured -->
            <div class="mb-3">
                <label for="featured" class="form-label">Featured</label>
                <select name="featured" class="form-control" >
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
            </div>

            <input type="hidden" id="propertyEntryCode" name="propertyEntryCode" value="{{ $propertyEntryCode }}">
            <input type="hidden" id="propertyContentBuilder" name="propertyContentBuilder" >
            <input type="hidden" id="propertyGallery" name="propertyGallery" >
            <input type="hidden" id="propertyBanner" name="propertyBanner" >

            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('content.index') }}" class="btn btn-default">Back</a>
        </form>
    </div>

    <div class="rounded col-md-8">
        <!-- Button trigger modal -->
        <button id="btn-create-content" type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#ContentTypeBuilderModal">
            Add
        </button>
        <button id="btn-gallery-content" type="button" class="btn btn-default" data-toggle="modal" data-target="#ContentGallaryModal">
            Gallery
        </button>
        <hr>
        <div id="alert-property-info" class="alert alert-primary m-0" role="alert">
            Empty property information.
        </div>

        <div class="row">
            <div id="content-container" class="container" data-sortable-id="0" aria-dropeffect="move"></div>
        </div>

        
    <div>
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
                    <label for="ContentTypeMedia" class="form-label">File upload</label>
                    <input   
                        type="file" 
                        name="ContentTypeMedia"
                        id ="ContentTypeMedia"
                        class="form-control" 
                        accept="image/png, image/jpeg, image/gif"
                        multiple />
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
                <input   
                    type="file" 
                    name="ContentGallery"
                    id ="ContentGallery"
                    class="form-control" 
                    accept="image/png, image/jpeg, image/gif"
                    multiple />

            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@endsection

@section('scripts')
<!-- <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script> -->

<script src="{{asset('filePond/js/filepond-plugin-image-preview.js')}}"></script>
<script src="{{asset('filePond/js/filepond.js')}}"></script>
<script>

    let propertyContent = [],
        propertyPath = "/" + $('#propertyEntryCode').val() + "/";
        contentTypeEnumaration = [],
        contentTypeMedia = [],
        contentMediaGallery = [];
        

    // File uploader
    // Get a reference to the file input element
    const inputElement = document.querySelector('input[id="ContentTypeMedia"]');
          
    // Register the plugin
    FilePond.registerPlugin(FilePondPluginImagePreview);

    //Create a FilePond instance
    const pond = FilePond.create(inputElement);

    pond.setOptions({
        server: {
            //url : '/upload?propertyEntry=' + document.querySelector('input[id="propertyEntryCode"]').value,
            // headers: {
            //     'X-CSRF-TOKEN': '{{ csrf_token() }}'
            // },
            load: '/storage/tmp',
            allowRemove: true,
            process: {
                url : '/upload?propertyEntry=' + document.querySelector('input[id="propertyEntryCode"]').value,
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                withCredentials: false,
                onload: (response) => {console.log(response); response.key},
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
        if($('#ContentTypeBuilderModal').is(':visible')) {
            contentTypeMedia = contentTypeMedia.filter(function(item) {
                return item != file.source;
            })
        }
    });

    //FilePond Gallery
    const pondGallery = FilePond.create(document.querySelector('input[id="ContentGallery"]'));
    pondGallery.setOptions({
        server: {
            load: '/storage/tmp',
            allowRemove: true,
            process: {
                url : '/upload?propertyEntry=' + document.querySelector('input[id="propertyEntryCode"]').value,
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
                url : '/upload?propertyEntry=' + document.querySelector('input[id="propertyEntryCode"]').value,
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                withCredentials: false,
                onload: (response) => {

                    //set banner
                    pondBanner.getFiles().forEach(function (item) {
                        let path =  "/" + document.querySelector('input[id="propertyEntryCode"]').value + "/" + item.filename;
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

    function contentBuilder (obj, arg) {
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
        let item = {},
            type = parseInt($("#contentType").val()),
            action = $(this).data("id");

        item.id = propertyContent.length;
        item.type = type;
        item.status = 1;

        switch (type) {
            //Header
            case 1:
                item.value = $("#ContentTypeHeader").val();
                break;
            //Paragraph
            case 2:
                item.value = $("#ContentTypeParagraph").val();
                break;
            //Enumeration
            case 3:
                let raw =  $("#contentTypeEnumListGroup").find(".list-group-item"),
                    sorted = [];

                raw.each(function(n, e) {
                    let id = $(e).data('id'),
                        value = $(e).data('value');
                    sorted.push(value)
                })
                
                item.value = sorted;
                item.model= { column: $('#ContentTypeEnumColumn').val() }
                break;
            //Media
            case 4:
                contentTypeMedia = [];
                pond.getFiles().forEach(function (item) {
                    if(!contentTypeMedia.includes(item))
                        contentTypeMedia.push("/" + $('#propertyEntryCode').val() + "/" + item.filename);
                })

                item.value = contentTypeMedia;

                //BTK :: not nessesarry
                //populate media gallery
                // contentTypeMedia.forEach((file) => {
                //     if(!contentMediaGallery.includes(file))
                //         contentMediaGallery.push(file);
                // })

                break;

        }

        if(action == "add") {
            propertyContent.push(item);
            contentBuilder(item, true);
        }
        else {
            item.id = $(this).data("item");
            propertyContent[item.id] = item; 
            contentBuilder(item, false);
        }
        

        $("#alert-property-info").hide();

        console.log(propertyContent);
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

    $("#btn-create-content").click(function () {
        contentTypeEnumaration = [];
        contentTypeMedia= [];

        $("#contentType")
            .val(1)
            .attr("disabled", false);
        $("#ContentTypeHeader").val("");
        $("#ContentTypeParagraph").val("");
        $(".content-type-element").hide();
        $("#type-header-container").show();
        $("#contentTypeEnumListGroup").empty();
        $("#btn-action")
            .data("id", "add")
            .text("Add");
        $("#btn-delete").hide();

        pond.removeFiles();

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

    $("#contentType").change(function () {

        $(".content-type-element").hide();
        $("#ContentTypeHeader").empty();
        $("#ContentTypeParagraph").empty();

        switch (this.value) {
            //Header
            case "1":
                $("#type-header-container").show();
                break;
            //Paragraph
            case "2":
                $("#type-paragraph-container").show();
                break;
            //Enumeration
            case "3":
                $("#type-enumaration-container").show();
                break;
            //Media
            case "4":
                $("#type-media-container").show();
                break;

        }
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

    $("#content-container").on("click", ".item" ,function (){

        let type = $("#contentType"),
            actionBtn = $("#btn-action"),
            deleteBtn = $("#btn-delete");

        let selected = $(this).data("type"),
            item = propertyContent[$(this).data("id")];

        switch (selected) {
            case 1:
                $("#ContentTypeHeader").val(item.value)
                break;
            case 2:
                $("#ContentTypeParagraph").val(item.value)
                break;
            case 3:
                console.log(item.value);
                let container = $('#contentTypeEnumListGroup');
                container.empty();
                contentTypeEnumaration = item.value;
                contentTypeEnumaration.forEach(function (item) {
                    container
                        .append(`<li class="list-group-item" data-id=` + n + ` data-value="` + item +`>
                                    <label class="form-check-label" for="firstCheckbox">`+ item +`</label>
                                    <button type="button" class="btn-close float-right deleteEnumarationList" data-id="`+ item +`" aria-label="Close"></button>
                                </li>`);
                })

                $('.deleteEnumarationList')
                        .off()
                        .on('click', function () {
                            let id =  $(this).data('id');
                            contentTypeEnumaration = contentTypeEnumaration.filter(function(e) { return e !== id })
                            $(this).parent().remove();
                        })
                
                $("#ContentTypeEnumColumn").val(item.model.column)

                break;
            case 4:
                 let files = [];
                 item.value.forEach(function (item) {
                    files.push({
                        source: item,
                        options: {
                            type: 'local',
                        }
                    })
                 })

                 pond.removeFiles();
                 pond.files = files;

                // pond.files = [
                //     {
                //         source: '/6325d65ec5015_1663424094/banner.jpg',
                //         options: {
                //             type: 'local',
                //             metadata: {
                //                 poster: 'http://127.0.0.1:8000/storage/tmp/6325d65ec5015_1663424094/banner.jpg'
                //             }
                //         }
                //     },
                //     {
                //         source: '/ 63132ae652ec4_1662200550/upload.jpg',
                //         options: {
                //             type: 'local',
                //             metadata: {
                //                 poster: 'http://127.0.0.1:8000/storage/tmp/63132ae652ec4_1662200550/upload.jpg'
                //             }
                //         }
                //     }
                // ];
                break;
        }

        type.attr("disabled", true);
        actionBtn
            .data("id", "update")
            .data("item", $(this).data("id"))
            .text("Update");
        deleteBtn
            .data("item", $(this).data("id"))
            .show();

        $('#ContentTypeBuilderModal').modal('show');
        $("#contentType").val(parseInt(selected)).trigger("change");

    })

</script>

<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
<script src="{{asset('jQuery/jquery-1.12.4.js')}}"></script>
<script src="{{asset('jQuery/jquery-ui.js')}}"></script>
<script>
    jQuery.noConflict();
    (function( $ ) {
        $(function() {
            $( "#content-container" ).sortable();
            $( "#content-container" ).disableSelection();

            $( "#contentTypeEnumListGroup" ).sortable();
            $( "#contentTypeEnumListGroup" ).disableSelection();
        });
    })(jQuery);
</script>
@endsection