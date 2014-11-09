<!DOCTYPE HTML>
<meta charset="utf-8"> 
<html>
  <head>
      <script src="./lib/js/jquery-1.11.0.min.js"></script>
      <link rel="stylesheet" href="./lib/css/redmond/jquery-ui-1.10.4.custom.css">
      <link rel="stylesheet" type="text/css" href="./lib/css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="./lib/css/jquery.simplecolorpicker.css">
      <link rel="stylesheet" type="text/css" href="./lib/css/jquery.simplecolorpicker-glyphicons.css">
      <link rel="stylesheet" type="text/css" href="./lib/css/home.css">

      <script src="./lib/js/bootstrap.js"></script>
      <script src="./lib/js/jquery-ui-1.10.4.custom.js"></script>
      <script src="./lib/js/jquery.simplecolorpicker.js"></script>
      <script src="./lib/js/fabric.js"></script>
      <script src="./lib/js/jquery.ui.widget.js"></script>
      <script src="./lib/js/jquery.iframe-transport.js"></script>
      <script src="./lib/js/jquery.fileupload.js"></script>
      <script src="./lib/js/utiles.js"></script>
      <script src="./lib/js/homeFunctions.js"></script>
      <script src="./lib/js/canvasFunctions.js"></script>

      <title>Editor de escudos</title>
    <?php
      include './ChromePhp.php';
      include('../userManager.php');
      $user_name = getUsername();
      $isAdmin = isAdmin();
    ?>

  </head>
  <body>

    <?php
      //Utilizado para que la gente haga login, redirige a la Home Page
      if(is_null($user_name))  {
        echo "<script>javascript:alert('No has hecho log in.'); window.location = '/editor'</script>";       
      }
      
      function loadDecoraciones($group) {
        $index = 0;
        $dir    = './img/decoraciones/' . $group ;
        $files = scandir($dir);
        foreach ($files as &$file) {
          if($file != '.' && $file != '..') {
            $file_name = substr($file, 0, -4);
            echo("<div id='" . $group . $index . "' class='divFigure'>");
            echo("<img id='" . $file_name . "' src='" . $dir . "/" . $file . "' class='figures' onClick='addImage(this)'/>");
            echo("</div>");
            $index = $index + 1;
          }
        }
        $dir    = './img/admin/decoraciones/' . $group ;
        $files = scandir($dir);
        foreach ($files as &$file) {
          if($file != '.' && $file != '..') {
            $file_name = substr($file, 0, -4);
            echo("<div id='" . $group . $index . "' class='divFigure'>");
            echo("<img id='" . $file_name . "' src='" . $dir . "/" . $file . "' class='figures' onClick='addImage(this)'/>");
            echo("</div>");
            $index = $index + 1;
          }
        }
      }
      function oldSrc() {
        if(isset($_GET['error']) || isset($_GET['success'])) {
          if(file_exists("./tempFile.txt")) {
            $temp_file = fopen("./tempFile.txt", "r") or die("Unable to open file!");
            $src = fread($temp_file,filesize("./tempFile.txt"));
            echo("<input type='text' id='oldSrc' name='oldSrc' value='" . $src . "'/>");  
            fclose($temp_file);
            unlink("./tempFile.txt");
            return $src;
          }
        }
      }
    ?>


    <div id="mainTool">
      <div id="leftMenu" class="col-md-3">
        <div id="images">
          <div id ="decorativeImages">
            <div id="accordion">
              <h3>Imágenes Animales</h3>
              <div id="animales">
                
                <?php
                  loadDecoraciones("animales");
                ?>
              </div>
              <h3>Imágenes Artificiales</h3>
              <div id="artificiales">
                <?php
                  loadDecoraciones("artificiales");
                ?>
              </div>
              <h3>Imágenes Naturales</h3>
              <div id="naturales">
                <?php
                  loadDecoraciones("naturales");
                ?>
              </div>

              <h3>Imágenes Vegetales</h3>
              <div id="vegetales">
                <?php
                  loadDecoraciones("vegetales");
                ?>
              </div>

              <h3>Muebles</h3>
              <div id="muebles">
                <?php
                  loadDecoraciones("muebles");
                ?>
              </div>

              <h3>Piezas</h3>
              <div id="piezas">
                <?php
                  loadDecoraciones("piezas");
                ?>
              </div>

              <h3>Soportes</h3>
              <div id="soportes">
                <?php
                  loadDecoraciones("soportes");
                ?>
              </div>

              <h3>Timbres</h3>
              <div id="timbres">
                <?php
                  loadDecoraciones("timbres");
                ?>
              </div>
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
        <ul id="homeNavAdmin" class="nav nav-pills">
          <li><a href="/editor/">Home</a></li>
          <li><a href="/editor/tfg/">Galería</a></li>
          <li class="active">
            <a href="/editor/tfg/home.php">Editor</a>
          </li>
          <li><a href="/editor/tfg/admin/adminToolUpload.php">Cargar Bases</a></li>
          <li><a href="/editor/tfg/admin/adminToolDelete.php">Eliminar Bases</a></li>
          <li><a href="/editor/tfg/admin/adminToolUploadDecorative.php">Cargar Decoraciones</a></li>
          <li><a href="/editor/tfg/admin/adminToolDeleteDecorative.php">Eliminar Decoraciones</a></li>
        </ul>
        <ul id="homeNav" class="nav nav-pills">
          <li><a href="/editor/">Home</a></li>
          <li><a href="/editor/tfg/">Galería</a></li>
          <li class="active">
            <a href="/editor/tfg/home.php">Editor</a>
          </li>
        </ul>
        <div id="buttons" class="btn-group">
          <button id="buttonPopUp" onclick="openPopUp('open')" class="btn btn-default">Nuevo Escudo</button>
          <button id="buttonPopUpSave" onclick="openPopUp('save')" class="btn btn-default">Guardar Escudo</button>
          <button id="buttonPopUpLoad" onclick="openPopUp('load')" class="btn btn-default">Cargar Escudo</button>
          <button id="buttonPopUpDownload" onclick="downloadImage()" class="btn btn-default">Descargar Escudo</button>
          <button id="buttonPopUpManage" onclick="openPopUp('manage')" class="btn btn-default">Gestionar Escudos</button>
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
                  <button type="button" onClick="mirrorImage()" >Invertir imagen</button>
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
    <div id="loadPopUp" title="Cargar escudo">  
    </div>
    <div id="managePopUp" title="Gestionar escudos">  
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
    <?php
      include './lib/php/jqueryAlerts.php';
      oldSrc();
      if ($isAdmin)
      {
           echo "<script>javascript:$('#homeNavAdmin').css('display','block')</script>";
           echo "<script>javascript:$('#buttonPopUpManage').css('display','block')</script>";      
      }
      else echo "<script>javascript:$('#homeNav').css('display','block')</script>";   
    ?>
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

  //Variable para saber que popUp abrir
  var popUpOpener;

  $(function(){
    //Si al guardar un escudo ya existe, recuperamos en lo que estabamos trabajando
    if(document.getElementById("oldSrc")) {
      //var oldSrc = document.getElementById("oldSrc").value;
      var oldSrc = "data:image/png;base64," + document.getElementById("oldSrc").value;
      fabric.Image.fromURL(oldSrc, function(img) {
        mainCanvas.add(img.set({ left: 0, top: 0, selectable: false, hasControls: false, evented: false}));
      });
    }
    $ ("#popUp").load("popUp.php");
    $ ("#savePopUp").load("savePopUp.php");
    $ ("#loadPopUp").load("loadPopUp.php");
    $ ("#managePopUp").load("managePopUp.php");
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
    });


    $("#savePopUp").dialog({
        autoOpen: false,
        height: "auto",
        width: 1100,
        modal: true,
        buttons: {
          "Guardar escudo": function() {
            var $myForm = $('#saveEscudo');
            //Comprobamos si el formulario es valido
            var titulo = document.getElementById("titulo").value;
            document.getElementById("titulo").value = omitirAcentos(titulo);
            if (!$myForm[0].checkValidity()) {
              $myForm.find(':submit').click()
            }
            else {
              document.getElementById("saveEscudo").submit();
              $( this ).dialog( "close" );
            }
          },
          "Cancelar": function() {
            //Borrar valores
            $( this ).dialog( "close" );
          }
        },
        close: function( event, ui ) {
          $("#titulo").val("");
          $("#descripcion").val("");
          $("#historia").val("");
          $("#public").prop('checked', false);
        }
      });

    $("#loadPopUp").dialog({
        autoOpen: false,
        height: 700,
        width: 1100,
        modal: true,
        buttons: {
          "Cargar escudo": function() {
            var c = document.getElementById("mainCanvas");
            var mainCtx = c.getContext("2d");   
            mainCtx.drawImage(document.getElementById("escudoPrevisualization"), 0, 0);
            var src = c.toDataURL("image/png");       
            fabric.Image.fromURL(src, function(img) {
              mainCanvas.add(img.set({ left: 0, top: 0, selectable: false, hasControls: false, evented: false}));
            });
            $( this ).dialog( "close" );
          },
          "Cancelar": function() {
            //Borrar valores
            $( this ).dialog( "close" );
          }
        },
        close: function( event, ui ) {
          $("#deleteButton").css("display","none");
          $("#unpublishButton").css("display","none");
          $("#publishButton").css("display","none");
          document.getElementById("escudoPrevisualization").src = "";
          document.getElementById("tituloDelete").value = "";
          document.getElementById("tituloMyManage").value = "";
        }
      });

    $("#managePopUp").dialog({
      autoOpen: false,
      height: 700,
      width: 1100,
      modal: true,
      buttons: {
        "Ocultar escudo": function() {
          if(document.getElementById("escudoPrevisualizationManage").src != "") {
            document.getElementById("manageEscudo").submit();
            $( this ).dialog( "close" );
          }
        },
        "Cancelar": function() {
          //Borrar valores
          $( this ).dialog( "close" );
        }
      },
      close: function( event, ui ) {
        document.getElementById("escudoPrevisualizationManage").src = "";
        document.getElementById("usernameManage").value = "";
        document.getElementById("emailManage").value = "";
        document.getElementById("tituloManage").value = "";
      }
    });
    


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
          if(popUpOpener == "open") $("#popUp").dialog("open");
          else if(popUpOpener == "load") $("#loadPopUp").dialog("open");
        },
        "Cancelar": function() {
          $( this ).dialog( "close" );
        }
      }
    });


  

  </script>

</html>
