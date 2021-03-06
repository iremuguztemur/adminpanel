function handleFileSelect(evt) {
    var files = evt.target.files;
    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {
      // Only process image files.
      if (!f.type.match('image.*')) {
        continue;
      }
      var reader = new FileReader();
      // Closure to capture the file information.
      reader.onload = (function(theFile) {
        return function(e) {
          // Render thumbnail.
          var span = document.createElement('div');
          $(span).addClass("col-md-2");
          span.innerHTML =
          [
            '<img class="img-responsive" src="',
            e.target.result,
            '" title="', escape(theFile.name),
            '"/>'
          ].join('');
          document.getElementById('onizleme').insertBefore(span, null);
        };
      })(f);
      // Read in the image file as a data URL.
      reader.readAsDataURL(f);
    }
  }
  document.getElementById('files').addEventListener('change', handleFileSelect, false);
$(document).ready(function(){

var say = $("#onizleme").find("img").length;
$(".resim").on("change",function () {
    var url = $.ajaxUrl;
    $(".tamamla").trigger("click");

})
});




















// page end
