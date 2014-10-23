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
      td {
        padding: 6px;
      }
      html {
        max-width: 1500px;
      }
  		#container {
  			background-color: grey;
  			width: 800px;
  		}
      #saveContainer {
        background-color: grey;
        width: auto;
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
  		#previsualization {
  			background-color: white;
  			height: 350px;
  			margin-top: 40px;
        margin-bottom: 40px;
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
      #colorParticion5 {
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
        display:block;
        margin:auto;
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
      #formDiv {
        margin-top: 40px;
      }
      #leftMenu {
        margin-left: 250px;
      }
      #buttons {
        margin-top: 10px;
      }

  	</style>

  </head>
  <body>

    <?php
      function loadDecoraciones($group, $index) {
        $dir    = './img/admin/decoraciones/' . $group ;
        $files = scandir($dir);
        foreach ($files as &$file) {
          if($file != '.' && $file != '..') {
            $file_name = substr($file, 0, -4);
            echo("<div id='" . $group . $index . "' class='col-md-5'>");
            echo("<img id='" . $file_name . "' src='" . $dir . "/" . $file . "' class='figures' onClick='addImage(this)'/>");
            echo("</div>");
            $index = $index + 1;
          }
        }
      }

    ?>


    <div id="mainTool">

      <div id="leftMenu" class="col-md-3">
        <div id="images">
          <div id="accordion">
            <h3>Imágenes Animales</h3>
            <div id="animales">
              <div id="animales1" class="col-md-5">
                <img id="aguila" src="./img/animales/aguila.png" class="figures" onClick="addImage(this)"/>
              </div>
              <div id="animales2" class="col-md-5">
                <img id="cabrapie" src="./img/animales/cabrapie.png" class="figures" onClick="addImage(this)"/>
              </div>
              <div id="animales3" class="col-md-5">
                <img id="halcon" src="./img/animales/halcon.png" class="figures" onClick="addImage(this)"/>
              </div>
              <div id="animales4" class="col-md-5">
                <img id="leon" src="./img/animales/leon.png" class="figures" onClick="addImage(this)"/>
              </div>
              <?php
                loadDecoraciones("animales", 5);
              ?>
            </div>
            <h3>Imágenes Artificiales</h3>
            <div id="artificiales">
              <div id="artificiales1" class="col-md-5">
                <img id="baculo" src="./img/artificiales/baculo.png" class="figures" onClick="addImage(this)"/>
              </div>
              <div id="artificiales2" class="col-md-5">
                <img id="balanza" src="./img/artificiales/balanza.png" class="figures" onClick="addImage(this)"/>
              </div>
              <div id="artificiales3" class="col-md-5">
                <img id="castillo" src="./img/artificiales/castillo.png" class="figures" onClick="addImage(this)"/>
              </div>
              <div id="artificiales4" class="col-md-5">
                <img id="espada" src="./img/artificiales/espada.png" class="figures" onClick="addImage(this)"/>
              </div>
              <?php
                loadDecoraciones("artificiales", 5);
              ?>
            </div>
            <h3>Imágenes Naturales</h3>
            <div id="naturales">
              <?php
                loadDecoraciones("naturales", 1);
              ?>
            </div>

            <h3>Imágenes Vegetales</h3>
            <div id="vegetales">
              <?php
                loadDecoraciones("vegetales", 1);
              ?>
            </div>

            <h3>Muebles</h3>
            <div id="muebles">
              <?php
                loadDecoraciones("muebles", 1);
              ?>
            </div>

            <h3>Piezas</h3>
            <div id="piezas">
              <?php
                loadDecoraciones("piezas", 1);
              ?>
            </div>

            <h3>Soportes</h3>
            <div id="soportes">
              <?php
                loadDecoraciones("soportes", 1);
              ?>
            </div>

            <h3>Timbres</h3>
            <div id="timbres">
              <?php
                loadDecoraciones("timbres", 1);
              ?>
            </div>
          </div>

          <div id="fileUploadDiv">
            <div id="uploadButtons">
              <h4 style="text-align: center">Cargar una imagen decorativa</h4>
              <input type="file" id="files" name="file" />
              <button id="abortUpload" onclick="abortRead();">Cancelar la subida</button>
              <div id="progress_bar"><div class="percent">0%</div></div>
            </div>
          </div>
      </div>
      </div>

      <div class="col-md-7">
        <ul class="nav nav-pills">
          <li class="active">
            <a href="/tfg">Home</a>
          </li>
          <li><a href="/tfg/admin/adminToolUpload.php">Cargar Bases</a></li>
          <li><a href="/tfg/admin/adminToolDelete.php">Eliminar Bases</a></li>
          <li><a href="/tfg/admin/adminToolUploadDecorative.php">Cargar Decoraciones</a></li>
          <li><a href="/tfg/admin/adminToolDeleteDecorative.php">Eliminar Decoraciones</a></li>
        </ul>
        <div id="buttons">
          <button id="buttonPopUp" onclick="openPopUp('open')">Nuevo Escudo</button>
          <button id="buttonPopUp" onclick="openPopUp('save')">Guardar Escudo</button>
          <button id="buttonPopUp" onclick="openPopUp('load')">Cargar Escudo</button>
        </div>
        <div id="workspace">
          <canvas id="mainCanvas" width="530" height="350">
          </canvas>
          <div class="controls">
              <div id="icons">
                <div id="delete" class="button" title="Borrar elemento">
                  <img id="cross" src="./img/icons/crossIcon.png" class="icons" onClick="deleteImage()"/>
                </div>
                <div id="up" class="button" title="Subir elemento">
                  <img id="arrowUp" src="./img/icons/arrowUp.png" class="icons" onClick="bringForward()"/>
                </div>
                <div id="down" class="button" title="Bajar elemento">
                  <img id="arrowDown" src="./img/icons/arrowDown.png" class="icons" onClick="sendBackwards()"/>
                </div>
                <div id="clone" class="button" title="Copiar elemento">
                  <img id="copy" src="./img/icons/copyIcon.png" class="icons" onClick="cloneElement()"/>
                </div>
              </div>
              <p>
                <label><span>Ángulo:</span> <input type="range" id="angle-control" value="0" min="-180" max="180" onChange="updateAngle(this)"></label>
              </p>
              <p>
                <label><span>Horizontal:</span> <input type="range" id="left-control" value="150" min="0" max="530" onChange="updateLeft(this)"></label>
              </p>
              <p>
                <label><span>Vertical:</span> <input type="range" id="top-control" value="150" min="0" max="350" onChange="updateTop(this)"></label>
              </p>
              <p>
                <label><span>Escalar:</span> <input type="range" id="scale-control" value="1" min="0.1" max="3" step="0.1" onChange="updateScale(this)"></label>
              </p>
              <p>
                <label>
                  <button type="button" onClick="mirrorImage()">Invertir imagen</button>
                </label>
              </p>
          </div>
        </div>
      </div>

    </div>


		<div id="popUp" title="Crear forma">	
		</div>
    <div id="savePopUp" title="Guardar escudo">  
    </div>

  </body>

  <div id="dialogConfirm" title="¿Deseas borrar el diseño actual?">
    <p>
      <span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Se borrará completamente el diseño actual del escudo. 
    </p>
    <b>
      ¿Estás seguro que deseas borrar el diseño?
    </b>

  </div>

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

  $(function(){
    $ ("#popUp").load("popUp.php");
    $ ("#savePopUp").load("savePopUp.php");
  });


	$("#popUp").dialog({
  		autoOpen: false,
  		height: "auto",
  		width: "auto",
  		modal: true,
  		buttons: {
  			"Crear forma": function() {
          var c = document.getElementById("mainCanvas");
          var mainCtx = c.getContext("2d");          
          if(particion == 1 || particion == -1) {
            mainCtx.drawImage(backImg, 150, 50);
            var src = c.toDataURL("image/png");
            fabric.Image.fromURL(src, function(img) {
              mainCanvas.add(img.set({ left: 0, top: 0, selectable: false, hasControls: false, evented: false}));
            });
          }
          else if(particion == 2) {
            mainCtx.drawImage(backImg, 150, 50);
            mainCtx.drawImage(part1Img, 150, 50);
            var src = c.toDataURL("image/png");
            fabric.Image.fromURL(src, function(img) {
              mainCanvas.add(img.set({ left: 0, top: 0, selectable: false, hasControls: false, evented: false}));
            });
          }
          else if(particion == 3) {
            mainCtx.drawImage(backImg, 150, 50);
            mainCtx.drawImage(part1Img, 150, 50);
            mainCtx.drawImage(part2Img, 150, 50);
            mainCtx.drawImage(part3Img, 150, 50);
            var src = c.toDataURL("image/png");
            fabric.Image.fromURL(src, function(img) {
              mainCanvas.add(img.set({ left: 0, top: 0, selectable: false, hasControls: false, evented: false}));
            });
          }
          else if(particion == 4) {
            mainCtx.drawImage(backImg, 150, 50);
            mainCtx.drawImage(part1Img, 150, 50);
            mainCtx.drawImage(part2Img, 150, 50);
            mainCtx.drawImage(part3Img, 150, 50);
            mainCtx.drawImage(part4Img, 150, 50);
            var src = c.toDataURL("image/png");
            fabric.Image.fromURL(src, function(img) {
              mainCanvas.add(img.set({ left: 0, top: 0, selectable: false, hasControls: false, evented: false}));
            });
          }
          $( this ).dialog( "close" );
  			},
  			"Cancelar": function() {
  				$( this ).dialog( "close" );
  			}
  		},
      close: function( event, ui ) {
        $("#back").attr("src", "");
        $("#part1").attr("src", "");
        $("#part2").attr("src", "");
        $("#part3").attr("src", "");
        $("#part4").attr("src", "");
        $("#particionesApuntado").css("display", "none");
        $("#particionesSemicircular").css("display", "none");
        $("#particionesAleman").css("display", "none");
        $("#particionesIngles").css("display", "none");
        $("#particionesItaliano").css("display", "none");
        $("#particionesFrances").css("display", "none");
        resetColor();
        $("#colorParticion1").css("display", "none");
        $("#colorParticion2").css("display", "none");
        $("#colorParticion3").css("display", "none");
        $("#colorParticion4").css("display", "none");
        $("#colorParticion5").css("display", "none");
      }
  	})


    $("#savePopUp").dialog({
        autoOpen: false,
        height: "auto",
        width: 1100,
        modal: true,
        buttons: {
          "Guardar escudo": function() {
            document.getElementById("saveEscudo").submit();
            $( this ).dialog( "close" );
          },
          "Cancelar": function() {
            $( this ).dialog( "close" );
          }
        },
        close: function( event, ui ) {
        }
      })
    


    $( "#dialogConfirm" ).dialog({
      autoOpen: false,
      resizable: true,
      height: "auto",
      width: "auto",
      modal: true,
      buttons: {
        "Aceptar": function() {
           while(mainCanvas.item(0) != undefined) {
            mainCanvas.remove(mainCanvas.item(0));
          }
          $( this ).dialog( "close" );
          $("#popUp").dialog("open");
        },
        "Cancelar": function() {
          $( this ).dialog( "close" );
        }
      }
    });


  function openPopUp(popUp) {
    if(mainCanvas.item(0) != undefined) {
      if(popUp == "open" || popUp == "load") $("#dialogConfirm").dialog("open");
      else {
        var c = document.getElementById("mainCanvas");
        var mainCtx = c.getContext("2d");
        var src = c.toDataURL("image/png");
        console.log(src);
      } 
    }
  	else {
      if(popUp == "open") $("#popUp").dialog("open");
      else if(popUp == "save") $("#savePopUp").dialog("open");
      if(popUp == "load") $("#loadPopUp").dialog("open");

    }
  }


  $(function() {
    $( "#accordion" ).accordion({

    });
  });

  function addImage(item) {
    var imgElement = document.getElementById(item.id);
    var imgInstance = new fabric.Image(imgElement, {
      left: 150,
      top: 50
    });
    mainCanvas.add(imgInstance);
  }

  function deleteImage() {
    var activeObject = mainCanvas.getActiveObject();
    if (activeObject) {
      mainCanvas.remove(activeObject);
    }
  }

  function bringForward() {
    var activeObject = mainCanvas.getActiveObject();
    if (activeObject) {
      mainCanvas.bringForward(activeObject);
    }
  }

  function sendBackwards() {
    var activeObject = mainCanvas.getActiveObject();
    if (activeObject) {
      mainCanvas.sendBackwards(activeObject);
    }
  }

  function mirrorImage() {
    var activeObject = mainCanvas.getActiveObject();
    if (activeObject) {
      if(!activeObject.getFlipX()) activeObject.set('flipX', true);
      else activeObject.set('flipX', false);
      mainCanvas.renderAll();
    }
  }

  function cloneElement() {
    var activeObject = mainCanvas.getActiveObject();
    if (activeObject) {
      var newObject = fabric.util.object.clone(activeObject); 
      newObject.set("top", activeObject.getTop()+50);
      newObject.set("left", activeObject.getLeft()+50);
      mainCanvas.add(newObject);
      mainCanvas.renderAll();
    }
  }

  function updateAngle(item) {
    var activeObject = mainCanvas.getActiveObject();
    if (activeObject) {
      if(activeObject.getAngle() > 360) activeObject.setAngle(parseInt(item.value + 360, 10)).setCoords();
      else activeObject.setAngle(parseInt(item.value, 10)).setCoords();
      mainCanvas.renderAll();
    }
  };

  function updateScale(item) {
    var activeObject = mainCanvas.getActiveObject();
    if (activeObject) {
      activeObject.scale(parseFloat(item.value)).setCoords();
      mainCanvas.renderAll();
    }
  };

  function updateTop(item) {
    var activeObject = mainCanvas.getActiveObject();
    if (activeObject) {
      activeObject.setTop(parseInt(item.value, 10)).setCoords();
      mainCanvas.renderAll();
    }
  };

  function updateLeft(item) {
    var activeObject = mainCanvas.getActiveObject();
    if (activeObject) {
      activeObject.setLeft(parseInt(item.value, 10)).setCoords();
      mainCanvas.renderAll();
    }
  };

  function updateControls() {
    var scaleControl = document.getElementById("scale-control");
    var angleControl = document.getElementById("angle-control");
    var leftControl = document.getElementById("left-control");
    var topControl = document.getElementById("top-control");
    var activeObject = mainCanvas.getActiveObject();
    scaleControl.setAttribute("value",activeObject.getScaleX());
    if(activeObject.getAngle() > 360) angleControl.setAttribute("value",activeObject.getAngle()-360);
    else angleControl.setAttribute("value",activeObject.getAngle());
    leftControl.setAttribute("value",activeObject.getLeft());
    topControl.setAttribute("value",activeObject.getTop());
  }
  mainCanvas.on({
    'object:moving': updateControls,
    'object:scaling': updateControls,
    'object:resizing': updateControls,
    'object:rotating': updateControls
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

  document.getElementById('files').addEventListener('change', handleFileSelect, false);

  </script>

</html>