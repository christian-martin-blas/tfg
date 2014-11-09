﻿<!DOCTYPE HTML>
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
      <script src="./lib/js/utiles.js"></script>

      <title>Editor de escudos</title>
    <?php
      include './ChromePhp.php';
      include('../userManager.php');
      $user_name = getUsername();
      $isAdmin = isAdmin();
    ?>

      <style>
      td {
        padding: 6px;
      }
      html {
        max-width: 1500px;
      }
      #container {
        background-color: #D6EBF9;
        width: 800px;
      }
      #saveContainer {
        background-color: #D6EBF9;
        width: auto;
      }
      #loadContainer {
        background-color: #D6EBF9;
        width: auto;
        height: 570px;
      }
      #manageContainer {
        background-color: #D6EBF9;
        width: auto;
        height: 570px;
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
      img.escudo {
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
      #imagenesEscudos {
        background-color: white;
        height: 300px;
        width: 100%;
        overflow-y: scroll;
      }
      #misEscudos {
        background-color: white;
        height: 150px;
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
      #previsualizationSave {
        background-color: white;
        height: 350px;
        margin-top: 40px;
        margin-bottom: 40px;
        margin-left: 80px;
      }
      #previsualizationLoad {
        background-color: white;
        height: 350px;
        margin-top: 130px;
        margin-left: 50px;
      }
      #previsualizationManage {
        background-color: white;
        height: 350px;
        margin-top: 130px;
        margin-left: 50px;
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
        background-color: #F7FAFC;
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
        height: 75px;
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
        background-color: white;
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
        margin-top: 10px;
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
        margin-top: 150px;
      }
      #decorativeImages {
        max-height: 600px;
      }
      #escudo {
        position: absolute;
      }
      #srcSave {
        display: none;
      }
      #submitHidden {
        display: none;
      }
      div.divEscudo {
        width: 100px;
        float: left;
      }
      #escudoPrevisualization {
        margin-left: 50px;
      }
      #oldSrc {
        display: none;
      }
      #deleteButton {
        margin-right: 35px;
        margin-top: 20px;
        float: right;
      }
      #publishButton {
        margin-right: 35px;
        margin-top: 20px;
        float: right;
      }
      #unpublishButton {
        margin-right: 35px;
        margin-top: 20px;
        float: right;
      }
      #mainTool {
        height: 750px;
      }
      body {
        background-color: #F7FAFC;
      }
      .divDesign {
        width: 38px;
        height: 42px;
        margin-left: 18px;
        float: left;
      }
      #homeNavAdmin {
        display: none;
      }
      #homeNav {
        display: none;
      }
      .divFigure {
        width: 120px;
        float: left;
      }
      #buttonPopUpManage {
        display: none;
      }
      #manageEscudo {
        margin-top: 50px;
      }
      .ui-dialog {
            background: #D6EBF9 !important
      }

    </style>

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
      include './jqueryAlerts.php';
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

  </script>

</html>