//Variables para canvas
var canvas = document.createElement("canvas");
var ctx = canvas.getContext("2d");
var mainCanvas = new fabric.Canvas('mainCanvas');
fabric.Object.prototype.transparentCorners = false;
fabric.Object.prototype.cornerSize = 8;
fabric.Object.prototype.borderColor = 'black';
fabric.Object.prototype.cornerColor= 'black';
var workspace = document.getElementById("workspace");



//Variable para saber que popUp abrir
var popUpOpener;

function openPopUp(popUp) {  
  if(mainCanvas.item(0) != undefined) {
    if(popUp == "open") {
      popUpOpener = "open";
      $("#dialogConfirm").dialog("open");
    }
    else if(popUp == "load") {
      popUpOpener = "load";
      $("#dialogConfirm").dialog("open");
    }
    else if(popUp == "manage") $("#managePopUp").dialog("open");
    else {
      mainCanvas.deactivateAll().renderAll();
      var c = document.getElementById("mainCanvas");
      var mainCtx = c.getContext("2d");
      var src = c.toDataURL("image/png");
      document.getElementById("escudo").src = src;
      $("#savePopUp").dialog("open");
    } 
  }
  else {
    if(popUp == "open") $("#popUp").dialog("open");
    else if(popUp == "save") {
      $("<div title=\'Atención\'><b>No has creado ningún escudo aún.</b></div>").dialog({
        modal: true,
        buttons: {
          Ok: function() {
            $( this ).dialog( "close" );
          }
        }
      });
    } 
    else if(popUp == "load") $("#loadPopUp").dialog("open");
    else if(popUp == "manage") $("#managePopUp").dialog("open");
  }
}


$(function() {
  $( "#accordion" ).accordion({
    heightStyle: "fill" 
  });
});

function openAdminToolUpload() {
  window.location.href= document.URL + "admin/adminToolUpload.php";
}

function openAdminToolDelete() {
  window.location.href= document.URL + "admin/adminToolDelete.php";
}

function abortRead() {
  reader.abort();
}

function errorHandler() {
  $("<div title=\'Información\'><b>El archivo que has intentado subir no era una imagen.</b></div>").dialog({
      modal: true,
      buttons: {
        Ok: function() {
          $( this ).dialog( "close" );
        }
      }
    });
}

function updateProgress(evt) {
  // evt is an ProgressEvent.
  if (evt.lengthComputable) {
    var percentLoaded = Math.round((evt.loaded / evt.total) * 100);
    // Increase the progress bar length.
    if (percentLoaded < 100) {
      progress.style.width = percentLoaded + '%';
      progress.textContent = percentLoaded + '%';
    }
  }
}

function handleFileSelect(evt, item) {
  if(evt == undefined) var files = item.files;
  else var files = evt.target.files; 
  // Loop through the FileList and render image files as canvas image
  if(files[0].type.indexOf("image") == -1) errorHandler();
  else {
    for (var i = 0, f; f = files[i]; i++) {

      // Only process image files.
      if (!f.type.match('image.*')) {
        continue;
      }
        
      // Reset progress indicator on new file selection.
      $("#abortUpload").css("display","block");
      progress.style.width = '0%';
      progress.textContent = '0%';

      reader = new FileReader();
      reader.onprogress = updateProgress;
      reader.onabort = function(evt) {
        alert('File read cancelled');
      };
      reader.onloadstart = function(evt) {
        document.getElementById('progress_bar').className = 'loading';
      };
       // Closure to capture the file information.
      reader.onload = (function(theFile) {
        return function(e) {
          // Render thumbnail.
          var src = e.target.result;
          fabric.Image.fromURL(src, function(img) {
              mainCanvas.add(img.set({ left: 0, top: 0}));
            });
           progress.style.width = '100%';
          progress.textContent = '100%';
          setTimeout("document.getElementById('progress_bar').className='';", 2000);
          setTimeout("$('#abortUpload').css('display','none')", 2000);
        };
      })(f);

      // Read in the image file as a data URL.
        reader.readAsDataURL(f);
    }
  }
}

function downloadImage() {
  if(mainCanvas.item(0) == undefined) notImagePopUp();
  else{
    mainCanvas.deactivateAll().renderAll();
    var c = document.getElementById("mainCanvas");
    var mainCtx = c.getContext("2d");
    var src = c.toDataURL("image/png");

    var a = $("<a>")
    .attr("href", src)
    .attr("download", "Escudo.png")
    .appendTo("body");

    a[0].click();

    a.remove();
  }
}

function notImagePopUp() {
  $("<div title=\'Atención\'><b>No hay ninguna imagen para descargar.</b></div>").dialog({
    modal: true,
    buttons: {
      Ok: function() {
        $( this ).dialog( "close" );
      }
    }
  });
}