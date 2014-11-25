  
  function errorHandler(item) {
  $("#" + item.id).replaceWith($("#" + item.id).val('').clone(true));
  addOnChangeToFiles();
  $("<div title=\'Información\'><b>El archivo que has intentado subir no era una imagen.</b></div>").dialog({
      modal: true,
      buttons: {
        Ok: function() {
          $( this ).dialog( "close" );
        }
      }
    });
}

  function handleFileSelect(evt, item) {
    if(evt == undefined) var files = item.files;
    else var files = evt.target.files; 
    // Loop through the FileList and render image files as canvas image
    if(files[0].type.indexOf("image") == -1) errorHandler(item);
    else {
      for (var i = 0, f; f = files[i]; i++) {

        // Only process image files.
        if (!f.type.match('image.*')) {
          continue;
        }

        reader = new FileReader();
        reader.onerror = errorHandler;
         // Closure to capture the file information.
        reader.onload = (function(theFile) {
          return function(e) {
            // Render thumbnail.
            var src = e.target.result;
            back.src = src;
            //Sirve para centrar la imagen en el div.
            var width = back.width;
            var height = back.height;
            $("#back").css("margin-left",-Math.abs(width/2));
            $("#back").css("margin-top",-Math.abs(height/2));
          };
        })(f);

        // Read in the image file as a data URL.
          reader.readAsDataURL(f);
      }
    }
  }

  function addOnChangeToFiles() {
    document.getElementById('fileImage').addEventListener('change', function() {
      handleFileSelect(window.event, this);
    }, false);
  }

  function reiniciarValores() {
    $("#back").attr("src","");
    $("#decorativeGroup").val("");
    $("#nameImage").val("");
    if($("#fileImage").val() != "") $("#fileImage").replaceWith($("#fileImage").val('').clone(true));
    addOnChangeToFiles();
  }