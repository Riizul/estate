/**
 * Content builder editor
 */
$("#content-container").on("click", ".item" ,function (){
    let type = $("#contentType"),
        actionBtn = $("#btn-action"),
        deleteBtn = $("#btn-delete");

    let selected = $(this).data("type"),
        item = propertyContent.filter((i) => { return i.id == $(this).data("id") })[0];

    switch (selected) {
        case 1:
            $("#ContentTypeHeader").val(item.value)
            break;
        case 2:
            // $("#ContentTypeParagraph").val(item.value.replaceAll('<br/>','\n'));
            editor.setData(item.value);
            break;
        case 3:
            let container = $('#contentTypeEnumListGroup');
            container.empty();
            contentTypeEnumaration = item.value;
            contentTypeEnumaration.forEach(function (item, n) {
                container
                    .append(`<li class="list-group-item" data-id=` + n + ` data-value="` + item +`">
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

                $("#ContentTypeEnumColumn").val(item.attribute.column)

            break;
        case 4:
            console.log(item.value);

            /** 
             * Set image source filepond
             */
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

            /** Gallery Collection */
            let thumbnails = "";
            item.value.forEach(function (item) { 
                let file = item.split('/'),
                    fileName = file[2];
                thumbnails += mediaEditorContentBuilderItemTemplate(item, fileName);
            }) 

            $("#media-collection")
                .empty()
                .append(thumbnails);

            /** Column image */
            $("#ContentTypeMediaImageColumn")
                .val(item.attribute.column)
                .change();

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

/**
 * Update section content 
 */
$('#btn-action').click(function () {
    addContentItem(this);
})

/**
 * Update property content 
 */
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