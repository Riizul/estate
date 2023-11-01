 

/**
 * updateFilePondGalleryContent
 */
function updateFilePondGalleryContent() {
    pond.getFiles().forEach(function (item) {
        let src = "/" + $('#propertyToken').val() + "/" + item.filename,
            imgElement = $(`[data-imgsource='${src}']`),
            filetemplate = mediaEditorContentBuilderItemTemplate(src, item.filename);
            
        if(!imgElement.length) {
            $("#media-collection").append(filetemplate);
        }
        
    }) 
}


function removeFileContentMedia(file) {
    if($('#ContentTypeBuilderModal').is(':visible')) {
        contentTypeMedia = contentTypeMedia.filter(function(item) {
            return item != file.source;
        })

        let imgsoure =  "/" + $('#propertyToken').val() + "/"  + file.filename
        $(`[data-imgsource='${imgsoure}']`).remove()
    }
}
  
function checkIfImageExists(url, callback) {
    const img = new Image();
    img.src = url;

    if (img.complete) {
      callback(true);
    } else {
      img.onload = () => {
        callback(true);
      };
      
      img.onerror = () => {
        callback(false);
      };
    }
  }