<!DOCTYPE HTML>
<meta charset="utf-8"> 
<html>
  <head>
  	  <script src="./lib/js/jquery-1.11.0.min.js"></script>
  	  <link rel="stylesheet" href="./lib/css/redmond/jquery-ui-1.10.4.custom.css">
  	  <link rel="stylesheet" type="text/css" href="./lib/css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="./lib/css/jquery.simplecolorpicker.css">
      <link rel="stylesheet" type="text/css" href="./lib/css/jquery.simplecolorpicker-glyphicons.css">

  	  <script src="./lib/js/bootstrap.js"></script>
  	  <script src="./lib/js/jquery-ui-1.10.4.custom.js"></script>
      <script src="./lib/js/jquery.simplecolorpicker.js"></script>
      <script src="./lib/js/fabric.js"></script>
      <script src="./lib/js/jquery.ui.widget.js"></script>
      <script src="./lib/js/jquery.iframe-transport.js"></script>
      <script src="./lib/js/jquery.fileupload.js"></script>

  	  <style>
      html {
        max-width: 1500px;
      }
  		.container {
  			background-color: grey;
  			width: 800px;
  		}
  		.page-header {
  			text-align: center;
  		}
  		#designs {
  			height: 100%;
  		}
  		img.design {
  			width: 100%;
  			cursor: pointer;
        padding-bottom: 5px;
  		}
      img {
        max-width: 100%;
        max-height: 100%;
      }
  		#imagenesFormas {
  			background-color: white;
  			height: 100px;
  			width: 100%;
  			overflow-y: scroll;
  		}
  		.particiones {
  			display: none;
  		}
  		#imagenesParticiones {
  			background-color: white;
  			height: 100px;
  			width: 100%;
  			overflow-y: scroll;
  		}
  		.colores {
  			display: none;
  		}
  		#imagenesColores {
  			background-color: white;
  			height: 100px;
  			width: 100%;
  			overflow-y: scroll;
        margin-bottom: 10px;
  		}
  		
      #back {
        position: absolute;
        left: 50%;
        top: 50%; 
        margin-left: -110px;
        margin-top: -110px;
      }
      #part1 {
        position: absolute;
        left: 50%;
        top: 50%; 
        margin-left: -110px;
        margin-top: -110px;
      }
      #part2 {
        position: absolute;
        left: 50%;
        top: 50%; 
        margin-left: -110px;
        margin-top: -110px;
      }
      #part3 {
        position: absolute;
        left: 50%;
        top: 50%; 
        margin-left: -110px;
        margin-top: -110px;
      }
      #colorParticion1 {
        padding: 5px;
        display: none;
      }
      #colorParticion2 {
        padding: 5px;
        display: none;
      }
      #colorParticion3 {
        padding: 5px;
        display: none;
      }
      #colorParticion4 {
        padding: 5px;
        display: none;
      }
      #workspace {
        width: 800px;
        height: 350px;
        margin-top: 150px;
        background-color: white;
        display: inline-block;
      }
      #shield {
        display: block;
        margin-left: auto;
        margin-right: auto;
        margin-top: 50px;
      }
      #accordion {
        padding: 10px;
        margin-top: 100px;
        width: 100%;
        height: 100%;
        font-size: 12px;
      }
      img.figures {
        height: 100px;
        padding: 5px;
        cursor: pointer;
      }
      .controls { 
        float: left;
        background: #EAF5FE; 
        padding-bottom: 15px; 
        padding-left: 15px; 
        padding-right: 15px; 
        border-right: 5px solid #333333; 
        border-top: 5px solid #333333; 
        border-bottom: 5px solid #333333; 
        height: 350px 
      }
      #mainCanvas {
        border-style: solid;
        border-width: 5px;
      }
      .canvas-container {
        float: left;
      }
      .icons {
        height: 30px;
        width: 30px;
        cursor: pointer;
      }
      .button {
        float: left;
        background: #77AEFF; 
        margin-left: 2px;
        margin-right: 2px;
        margin-bottom: 30px;
        border-bottom: 2px solid;
        border-left: 2px solid;
        border-right: 2px solid;
      }
      #images {
        background-color: #F2F9FF;
      }
      #fileUploadDiv {
        border-style: groove;
        width: 325px;
        margin-left: 10px;
      }
      #progress_bar {
        margin: 10px 0;
        padding: 3px;
        border: 1px solid #000;
        font-size: 14px;
        clear: both;
        opacity: 0;
        -moz-transition: opacity 1s linear;
        -o-transition: opacity 1s linear;
        -webkit-transition: opacity 1s linear;
      }
      #progress_bar.loading {
        opacity: 1.0;
      }
      #progress_bar .percent {
        background-color: #99ccff;
        height: auto;
        width: 0;
      }
      #files {
        font-size: 13px;
        margin: 5px;
      }
      #abortUpload {
        font-size: 13px;
        margin: 5px;
        display: none;
      }
      #uploadButtons {
        padding: 5px;
      }

      /*----------------------------------------------------------------------------------------------------------------------------------------*/

      #uploadFiles {
        margin-top: 250px;
      }
      td {
        padding: 6px;
      }
      #buttons {
        margin-left: 230px;
        margin-top: 20px;
      }
      #previsualization {
        background-color: #C2C1BD;
        height: 350px;
        width: 533px;
        margin-top: 200px;
        margin-left: 70px;
        float: left;
        border: 5px solid #333333;
      }
      #previsualizationMiniature {
        height: 64px;
        width: 72px;
        float: right;
        border: 3px solid #333333;
      }
      #miniaturaTitulo {
        margin-top: 300px;
        margin-left: 645px;
      }

  	</style>

  </head>
  <body>

    <div id="adminTool">

      <div class="col-md-4">
        <form id="uploadFiles">
          <table>
            <tr>
              <td>
                <b>Nombre Base:</b>
              </td>
              <td>
                <input type="text" id="nombreBase" name="nombreBase" />
              </td>
            </tr>
            <tr>
              <td>
                <b>Base:</b>
              </td>
              <td>
                <input type="file" id="fileBase" name="fileBase" />
              </td>
            </tr>
            <tr>
              <td>
                <b>Miniatura de la Base:</b>
              </td>
              <td>
                <input type="file" id="fileMiniatura" name="fileMiniatura" />
              </td>
            </tr>
            <tr>
              <td>
                <b>Partición 1:</b>
              </td>
              <td>
                <input type="file" id="fileParticion1" name="fileParticion1" />
              </td>
            </tr>
            <tr>
              <td>
                <b>Partición 2:</b>
              </td>
              <td>
                <input type="file" id="fileParticion2" name="fileParticion2" />
              </td>
            </tr>
            <tr>
              <td>
                <b>Partición 3:</b>
              </td>
              <td>
                <input type="file" id="fileParticion3" name="fileParticion3" />
              </td>
            </tr>
            <tr>
              <td>
                <b>Partición 4:</b>
              </td>
              <td>
                <input type="file" id="fileParticion4" name="fileParticion4" />
              </td>
            </tr>
          </table>
          <div id="buttons">
            <button id="buttonPrevisualization" onclick="previsualization()">Previsualizar</button>
            <input type="submit" id="buttonUpload" value="Subir las imágenes"/>
          </div>
      </form>
      </div>

      <div class="col-md-6">

        <div id="previsualization">
          <img id="back">
          <img id="part1">
          <img id="part2">
          <img id="part3">
          <img id="part4">
        </div>
        <h4 id="miniaturaTitulo">Miniatura:</h4>
        <div id="previsualizationMiniature">

          <img id="miniature">
        </div>
      </div>

    </div>

  </body>


  <script>
  //Variables para canvas
  var canvas = document.createElement("canvas");
  var ctx = canvas.getContext("2d");
  var mainCanvas = new fabric.Canvas('mainCanvas');
  fabric.Object.prototype.transparentCorners = false;
  fabric.Object.prototype.cornerSize = 8;
  fabric.Object.prototype.borderColor = 'black';
  fabric.Object.prototype.cornerColor= 'black';
  var workspace = document.getElementById("workspace");

  //Variables para subir imagenes y para la barra de carga
  var reader;
  var progress = document.querySelector('.percent');


  function openAdminTool() {
    window.location.href= document.URL + "adminTool.php";
  }

  function abortRead() {
    reader.abort();
  }

  function errorHandler(evt) {
    switch(evt.target.error.code) {
      case evt.target.error.NOT_FOUND_ERR:
        alert('File Not Found!');
        break;
      case evt.target.error.NOT_READABLE_ERR:
        alert('File is not readable');
        break;
      case evt.target.error.ABORT_ERR:
        break; // noop
      default:
        alert('An error occurred reading this file.');
    };
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

  function handleFileSelect(evt) {

    var files = evt.target.files; // FileList object
    // Loop through the FileList and render image files as canvas image
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
      reader.onerror = errorHandler;
      reader.onprogress = updateProgress;
      reader.onabort = function(e) {
        alert('File read cancelled');
      };
      reader.onloadstart = function(e) {
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

  document.getElementById('fileBase').addEventListener('change', handleFileSelect, false);
  document.getElementById('fileMiniatura').addEventListener('change', handleFileSelect, false);
  document.getElementById('fileParticion1').addEventListener('change', handleFileSelect, false);
  document.getElementById('fileParticion2').addEventListener('change', handleFileSelect, false);
  document.getElementById('fileParticion3').addEventListener('change', handleFileSelect, false);
  document.getElementById('fileParticion4').addEventListener('change', handleFileSelect, false);

  </script>

</html>
