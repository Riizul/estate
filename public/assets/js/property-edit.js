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