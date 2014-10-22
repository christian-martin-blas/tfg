<!DOCTYPE HTML>
<meta charset="utf-8"> 
<html>
  <head>
      <script src="../lib/js/jquery-1.11.0.min.js"></script>
      <link rel="stylesheet" href="../lib/css/redmond/jquery-ui-1.10.4.custom.css">
      <link rel="stylesheet" type="text/css" href="../lib/css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="../lib/css/jquery.simplecolorpicker.css">
      <link rel="stylesheet" type="text/css" href="../lib/css/jquery.simplecolorpicker-glyphicons.css">

      <script src="../lib/js/bootstrap.js"></script>
      <script src="../lib/js/jquery-ui-1.10.4.custom.js"></script>
      <script src="../lib/js/jquery.simplecolorpicker.js"></script>
      <script src="../lib/js/fabric.js"></script>
      <script src="../lib/js/jquery.ui.widget.js"></script>
      <script src="../lib/js/jquery.iframe-transport.js"></script>
      <script src="../lib/js/jquery.fileupload.js"></script>

      <style>
      html {
        max-width: 1500px;
      }
      .page-header {
        text-align: center;
      }
      img {
        max-width: 100%;
        max-height: 100%;
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
      #part4 {
        position: absolute;
        left: 50%;
        top: 50%; 
        margin-left: -110px;
        margin-top: -110px;
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

      #uploadFiles {
        margin-top: 50px;
      }
      td {
        padding: 6px;
      }
      #buttonSubmit {
        margin-left: 330px;
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
        position: relative;
      }
      #linkMainPage {
        font-size: 18px;
      }
      #warning {
        margin: 8px;
        border: solid 2px;
        background-color: #C9DDE0;
        padding: 5px;
      }
      #base {
        display: none;
      }
      #sinBase {
        display: none;
      }
      #borrarElementos {
        margin: 8px;
        float: right;
      }
      #miniatura {
        display: none;
      }

    </style>

  </head>
  <body>

    <?php
      function addOptions() {
        //Añade al select las bases creadas por el admin
        $dir    = '../img/admin/bases';
        $files = scandir($dir);
        foreach ($files as &$file) {
          if($file != '.' && $file != '..') {
            $base_name = substr($file, 0, -4);
            echo("<option value='" . $base_name . "'>" . $base_name . "</option>");
          }
        }
      }
    ?>

    <div id="adminTool">

      <div class="col-md-4">
        <a id="linkMainPage" href="/tfg">Editor de escudos</a>

        <form id="uploadFiles" enctype="multipart/form-data" action="uploader.php" method="POST" onsubmit="generarMiniatura()">
          <?php

            if(isset($_GET['success']))
            {
              echo("<h3 style='text-align: center'>Se han cargado las imágenes correctamente.</h3>");
            }
            else if(isset($_GET['error'])) {
              $error = $_GET['error'];
              //Se ha subido una particion sin subir otra antes.
              if($error == 1) echo("<h3 style='text-align: center'>Te has saltado el orden al subir las particiones.</h3>");
              if($error == 2) echo("<h3 style='text-align: center'>Ha habido un fallo subiendo las imágenes.</h3>");
            }
          ?>
          <div id="warning">
            <h4>Atención:</h4>
            <ul>
              <li>El orden en que se añadan las particiones es importante.</li>
            </ul>
          </div>
          <input type="radio" name="base" value="base" onclick="showTable(this)">Subiré base y particiones<br>
          <input type="radio" name="base" value="sinBase" onclick="showTable(this)">Subiré particiones
          <table id="sinBase">
            <tr>
              <td>
                <b>Nombre de la Base:</b>
              </td>
              <td>
                <select id="nombreBaseSelect" name="nombreBaseSelect" onchange="showBase(this)">
                  <option value=""></option>
                  <option value="Aleman">Aleman</option>
                  <option value="Apuntado">Apuntado</option>
                  <option value="Frances">Frances</option>
                  <option value="Ingles">Inglés</option>
                  <option value="Italiano">Italiano</option>
                  <option value="Semicircular">Semicircular</option>
                  <?php
                    addOptions();
                  ?>
                </select>
              </td>
            </tr>
            <tr>
              <td>
                <b>Nombre de la partición:</b>
              </td>
              <td>
                <input type="text" id="nombreParticionSelect" name="nombreParticionSelect"/>             
              </td>
            </tr>
            <tr>
              <td>
                <b>Partición 1:</b>
              </td>
              <td>
                <input type="file" id="fileParticion1Select" name="fileParticion1Select" accept="image/png"/>
              </td>
            </tr>
            <tr>
              <td>
                <b>Partición 2:</b>
              </td>
              <td>
                <input type="file" id="fileParticion2Select" name="fileParticion2Select" accept="image/png"/>
              </td>
            </tr>
            <tr>
              <td>
                <b>Partición 3:</b>
              </td>
              <td>
                <input type="file" id="fileParticion3Select" name="fileParticion3Select" accept="image/png"/>
              </td>
            </tr>
            <tr>
              <td>
                <b>Partición 4:</b>
              </td>
              <td>
                <input type="file" id="fileParticion4Select" name="fileParticion4Select" accept="image/png"/>
              </td>
            </tr>
          </table>
          <table id="base">
            <tr>
              <td>
                <b>Nombre de la Base:</b>
              </td>
              <td>
                <input type="text" id="nombreBase" name="nombreBase" required/>
              </td>
            </tr>
            <tr>
              <td>
                <b>Base:</b>
              </td>
              <td>
                <input type="file" id="fileBase" name="fileBase" accept="image/png" />
              </td>
            </tr>
            <tr>
              <td>
                <b>Nombre de la partición:</b>
              </td>
              <td>
                <input type="text" id="nombreParticion" name="nombreParticion"/>
              </td>
            </tr>
            <tr>
              <td>
                <b>Partición 1:</b>
              </td>
              <td>
                <input type="file" id="fileParticion1" name="fileParticion1" accept="image/png"/>
              </td>
            </tr>
            <tr>
              <td>
                <b>Partición 2:</b>
              </td>
              <td>
                <input type="file" id="fileParticion2" name="fileParticion2" accept="image/png"/>
              </td>
            </tr>
            <tr>
              <td>
                <b>Partición 3:</b>
              </td>
              <td>
                <input type="file" id="fileParticion3" name="fileParticion3" accept="image/png"/>
              </td>
            </tr>
            <tr>
              <td>
                <b>Partición 4:</b>
              </td>
              <td>
                <input type="file" id="fileParticion4" name="fileParticion4" accept="image/png"/>
              </td>
            </tr>
          </table>
          <div id="buttonSubmit">
            <input type="submit" id="buttonUpload" value="Subir las imágenes"/>
          </div>
          <input type="text" id="miniatura" name="miniatura"/>    
      </form>
        <button id="borrarElementos" onclick="borrarElementos()">Borrar imágenes</button>
      </div>

      <div class="col-md-6">
        <div id="previsualization">
          <img id="back">
          <img id="part1">
          <img id="part2">
          <img id="part3">
          <img id="part4">
        </div>
      </div>

    </div>

  </body>


  <script>
  //Variables de imágenes
  var back = document.getElementById("back");
  var miniatura = document.getElementById("miniatura");
  var part1 = document.getElementById("part1");
  var part2 = document.getElementById("part2");
  var part3 = document.getElementById("part3");
  var part4 = document.getElementById("part4");

  //Variables para subir imagenes
  var reader;

  //Añadimos el evento onChange para que cargue las previsualizaciones de las imagenes
  addOnChangeToFiles();

  function errorHandler(evt) {
    switch(evt.target.error.code) {
      case evt.target.error.NOT_FOUND_ERR:
        alert('Archivo no encontrado.');
        break;
      case evt.target.error.NOT_READABLE_ERR:
        alert('El archivo no se puede leer.');
        break;
      case evt.target.error.ABORT_ERR:
        break; // noop
      default:
        alert('Ha ocurrido un error mientras se leía el archivo.');
    };
  }

  function handleFileSelect(evt, item) {
    var files = evt.target.files; // FileList object
    // Loop through the FileList and render image files as canvas image
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
        && item.value != "Italiano" && item.value != "Semicircular") var src = "/tfg/img/admin/bases/" + item.value + ".png";
      else var src = "/tfg/img/bases/" + item.value + ".png";
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


  </script>

</html>
