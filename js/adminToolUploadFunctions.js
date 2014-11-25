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
            var name = item.name;
            if(name == "fileBase") back.src = src;
            else if(name == "fileParticion1" || name == "fileParticion1Select") {
              part1.src = src;
              if(name == "fileParticion1") document.getElementById("nombreParticion").required = true;
            }
            else if(name == "fileParticion2" || name == "fileParticion2Select") part2.src = src;
            else if(name == "fileParticion3" || name == "fileParticion3Select") part3.src = src;
            else if(name == "fileParticion4" || name == "fileParticion4Select") part4.src = src;
          };
        })(f);

        // Read in the image file as a data URL.
          reader.readAsDataURL(f);
      }
    }
  }

  function addOnChangeToFiles() {
    document.getElementById('fileBase').addEventListener('change', function() {
      handleFileSelect(window.event, this);
    }, false);
    document.getElementById('fileParticion1').addEventListener('change', function() {
      handleFileSelect(window.event, this);
    }, false);
    document.getElementById('fileParticion2').addEventListener('change', function() {
      handleFileSelect(window.event, this);
    }, false);
    document.getElementById('fileParticion3').addEventListener('change', function() {
      handleFileSelect(window.event, this);
    }, false);
    document.getElementById('fileParticion4').addEventListener('change', function() {
      handleFileSelect(window.event, this);
    }, false);
    document.getElementById('fileParticion1Select').addEventListener('change', function() {
      handleFileSelect(window.event, this);
    }, false);
    document.getElementById('fileParticion2Select').addEventListener('change', function() {
      handleFileSelect(window.event, this);
    }, false);
    document.getElementById('fileParticion3Select').addEventListener('change', function() {
      handleFileSelect(window.event, this);
    }, false);
    document.getElementById('fileParticion4Select').addEventListener('change', function() {
      handleFileSelect(window.event, this);
    }, false);
  }

  function showTable(item) {
    if(item.value == "base") {
      $('#base').css('display','block');
      $('#sinBase').css('display','none');
      document.getElementById("nombreBase").required = true;
      document.getElementById("fileBase").required = true;
      document.getElementById("nombreParticion").required = false;
      document.getElementById("nombreBaseSelect").required = false;
      document.getElementById("nombreParticionSelect").required = false;
      document.getElementById("fileParticion1Select").required = false;
    }
    else {
      $('#base').css('display','none');
      $('#sinBase').css('display','block');
      document.getElementById("nombreBase").required = false;
      document.getElementById("fileBase").required = false;
      document.getElementById("nombreParticion").required = false;
      document.getElementById("nombreBaseSelect").required = true;
      document.getElementById("nombreParticionSelect").required = true;
      document.getElementById("fileParticion1Select").required = true;
    }
    borrarElementos();
  }

  function showBase(item) {
    if(item.value != "") {
      if(item.value != "Aleman" && item.value != "Apuntado" && item.value != "Frances" && item.value != "Ingles" 
        && item.value != "Italiano" && item.value != "Semicircular") var src = "../img/admin/bases/" + item.value + ".png";
      else var src = "../img/bases/" + item.value + ".png";
      back.src = src;
    }
    else back.src = "";
  }

  function borrarElementos() {
    $("#back").attr("src","");
    $("#part1").attr("src","");
    $("#part2").attr("src","");
    $("#part3").attr("src","");
    $("#part4").attr("src","");
    if($("#fileBase").val() != "") $("#fileBase").replaceWith($("#fileBase").val('').clone(true));
    if($("#fileParticion1").val() != "") $("#fileParticion1").replaceWith($("#fileParticion1").val('').clone(true));
    if($("#fileParticion2").val() != "") $("#fileParticion2").replaceWith($("#fileParticion2").val('').clone(true));
    if($("#fileParticion3").val() != "") $("#fileParticion3").replaceWith($("#fileParticion3").val('').clone(true));
    if($("#fileParticion4").val() != "") $("#fileParticion4").replaceWith($("#fileParticion4").val('').clone(true));
    if($("#fileParticion1Select").val() != "") $("#fileParticion1Select").replaceWith($("#fileParticion1Select").val('').clone(true));
    if($("#fileParticion2Select").val() != "") $("#fileParticion2Select").replaceWith($("#fileParticion2Select").val('').clone(true));
    if($("#fileParticion3Select").val() != "") $("#fileParticion3Select").replaceWith($("#fileParticion3Select").val('').clone(true));
    if($("#fileParticion4Select").val() != "") $("#fileParticion4Select").replaceWith($("#fileParticion4Select").val('').clone(true));
    $("#nombreBase").val("");
    $("#nombreBaseSelect").val("");
    $("#nombreParticion").val("");
    $("#nombreParticionSelect").val("");
    document.getElementById("nombreParticion").required = false;
    //Añadimos el evento onChange para que cargue las previsualizaciones de las imagenes
    addOnChangeToFiles();
  }

  function generarMiniatura() {
    var canvas = document.createElement("canvas");
    canvas.setAttribute("width","250");
    canvas.setAttribute("height","250");
    var ctx = canvas.getContext("2d");
    ctx.drawImage(back, 0, 0, 219, 242);
    ctx.drawImage(part1, 0, 0, 219, 242);
    ctx.drawImage(part2, 0, 0);
    ctx.drawImage(part3, 0, 0);
    ctx.drawImage(part4, 0, 0);
    miniatura.value = canvas.toDataURL("image/png").substr(22);
  }