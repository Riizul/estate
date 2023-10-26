
//Events
function contentBuilder (obj, arg) {
    let template = "",
        toolbar = getItemContentToolbar();

    switch (obj.contentTypeId) {
        //Header
        case 1:
            if(arg) { 
                template = '<div class="item-wrapper" data-uid='+ obj.id +' data-item-sortable-id="0" draggable="true" role="option" aria-grabbed="false">';
                    template += '<div data-id='+ obj.id +' data-type=1 class="item bg-light p-3 rounded mb-1">';
                        template += '<h4>'+ obj.value +'</h4>';
                    template += '</div>';
                    template += toolbar.format(obj.id);
                template += '</div>';
            }
            else 
                $(".item[data-id=" + obj.id + "] h4").text(obj.value)
            
            break;
        //Paragraph
        case 2:
            if(arg) { 
                template = '<div class="item-wrapper" data-uid='+ obj.id +' data-item-sortable-id="0" draggable="true" role="option" aria-grabbed="false">';
                    template += '<div data-id='+ obj.id +' data-type=2 data-item-sortable-id="0" draggable="true" role="option" aria-grabbed="false" style="" class="item bg-light p-3 rounded mb-1">';
                        template += obj.value.replaceAll('\n','<br/>');
                    template += '</div>';
                    template += toolbar.format(obj.id);
                template += '</div>';
            }
            else 
                $(".item[data-id=" + obj.id + "]").html(obj.value)

            break;
        //Enumeration
        case 3:
            let enumerations = obj.value,
                enumAttribute = obj.attribute,
                percolumn = enumerations.length > 5 ? Math.ceil(enumerations.length / enumAttribute.column) : 1,
                cola = "", colb = "", list = "";

            //build column
            enumerations.forEach(function (item, ndx) {
                if(percolumn == 1 || ndx < percolumn)
                    cola += `<li>`+ item +`</li>`;
                else
                    colb += `<li>` + item + `</li>`;
            })      

            //build list 
            for(let i = 0; i < enumAttribute.column; i++){
                list += `<div class="col-md-` + (percolumn == 1 ? `12` : `6`) + `"><ul class="pl-3">`;
                list += i == 0 ? cola : colb;
                list += `</ul></div>`;
            }

            if(arg) {
                template = `<div class="item-wrapper " data-uid=`+ obj.id +`>
                                <div data-id=`+ obj.id +` data-type=3 class="item bg-light p-3 rounded mb-1">` + list + `</div>
                                ` +  toolbar.format(obj.id) +`
                            </div>`;
            }
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
                imgs += `<img src="/storage/tmp` + item + `" alt="" title=""></a>`
            })  

            if(arg)  {
                template = `<div class="item-wrapper" data-uid=`+ obj.id +`>
                                <div data-id=`+ obj.id +` data-type=4 class="item bg-light p-3 rounded mb-1">` + imgs + `</div>
                                ` +  toolbar.format(obj.id) +`
                            </div>`;
            }
            else 
                $(".item[data-id=" + obj.id + "]")
                    .empty()
                    .append(imgs);
            break;

    }

    $("#content-container").append(template);
    $('#ContentTypeBuilderModal').modal('hide');

    contentBuilderEvents();
}

function contentBuilderEvents() {
    $("#content-container .item-wrapper")
        .off( "mouseenter mouseleave" )
        .hover(function () {
                $(this).find('.item-menu').show();
            }, function () {
                $(this).find('.item-menu').hide()
        })
    
    $("#content-container .item-wrapper [edit]")
        .off()
        .on("click", function () {
            $(this).parent().parent().find('.item').click();
        })
    
    $("#content-container .item-wrapper [up]")
        .off()
        .on("click", function () {
            let uid = $(this).data('uid'),
                container =  $('div[data-uid=' + uid + ']');

            container.insertBefore(container.prev());
        })

    $("#content-container .item-wrapper [down]")
        .off()
        .on("click", function () {
            let uid = $(this).data('uid'),
                container =  $('div[data-uid=' + uid + ']');

            container.insertAfter(container.next());
        })
    
    $("#content-container .item-wrapper [add]")
        .off()
        .on( "click", function () {
            let uid = $(this).data('uid');

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
                .data("append", uid)
                .text("Add");
            $("#btn-delete").hide();

            pond.removeFiles();
        })
     
}

function addContentItem(e) {
    let item = {},
            type = parseInt($("#contentType").val()),
            action = $(e).data("id"),
            append = $(e).data('append');

        item.id = propertyContent.length;
        item.contentTypeId = type;
        item.status = 1;

        switch (type) {
            //Header
            case 1:
                item.value = $("#ContentTypeHeader").val();
                break;
            //Paragraph
            case 2:
                // item.value = $("#ContentTypeParagraph").val();
                item.value =  editor.getData();
                break;
            //Enumeration
            case 3:
                contentTypeEnumaration = [];
                let raw =  $("#contentTypeEnumListGroup").find(".list-group-item");
                raw.each(function(n, e) {
                    let id = $(e).data('id'),
                        value = $(e).data('value');

                    contentTypeEnumaration.push(value)
                })
                
                item.value = contentTypeEnumaration;
                item.attribute = { column: $('#ContentTypeEnumColumn').val() }
                break;
            //Media
            case 4:
                contentTypeMedia = [];
                pond.getFiles().forEach(function (item) {
                    if(!contentTypeMedia.includes(item))
                        contentTypeMedia.push("/" + $('#propertyToken').val() + "/" + item.filename);
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
            item.id = $(e).data("item");
            propertyContent[propertyContent.map(e => e.id).indexOf(item.id)] = item; 
            contentBuilder(item, false);
        }

        // handle item secquence 
        if(append != "0") {
            let newItem = $('div[data-uid=' + item.id + ']'),
                appendTo =  $('div[data-uid=' + append + ']');

            newItem.insertAfter(appendTo);
        }

        $("#alert-property-info").hide();
}

function getItemContentToolbar() {
    return `<div class="item-menu mb-2 hide"> 
                <button type="button" class="btn btn-sm btn-secondary" edit>
                <i class="fa fa-solid fa-pen fs-12"></i>
                </button>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-sm btn-secondary" data-uid={0} up>
                        <i class="fa fa-solid fa-caret-up"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-secondary" data-uid={0} down>
                    <i class="fas fa-solid fa-caret-down"></i>
                    </button>
                </div>
                <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#ContentTypeBuilderModal" data-uid={0} add>
                    <i class="fa fa-solid fa-plus-circle"></i>
                </button>
            </div>`;
}

// String prototype format
if (!String.prototype.format) {
    String.prototype.format = function() {
        var args = arguments;
        return this.replace(/{(\d+)}/g, function(match, number) { 
        return typeof args[number] != 'undefined'
            ? args[number]
            : match
        ;
        });
    };
}