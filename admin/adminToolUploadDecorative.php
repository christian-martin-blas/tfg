<!DOCTYPE HTML>
<meta charset="utf-8"> 
<html>
  <head>
      <script src="../lib/js/jquery-1.11.0.min.js"></script>
      <link rel="stylesheet" href="../lib/css/redmond/jquery-ui-1.10.4.custom.css">
      <link rel="stylesheet" type="text/css" href="../lib/css/bootstrap.css">

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
      #back {
        position: absolute;
        left: 50%;
        top: 50%; 
      }
      #uploadFiles {
        margin-top: 300px;
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
        height: 500px;
        width: 700px;
        margin-top: 100px;
        margin-left: 70px;
        float: left;
        border: 5px solid #333333;
        position: relative;
      }
      #reiniciarValores {
        margin: 8px;
        float: right;
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

        <form id="uploadFiles" enctype="multipart/form-data" action="uploaderDecorative.php" method="POST" onsubmit="saveSrc()">
          <?php

            if(isset($_GET['success']))
            {
              echo("<h3 style='text-align: center'>Se han cargado las imágenes correctamente.</h3>");
            }
            else if(isset($_GET['error'])) {
              $error = $_GET['error'];
              //Se ha subido una particion sin subir otra antes.
              if($error == 1) echo("<h3 style='text-align: center'>Ha habido un fallo subiendo las imágenes.</h3>");
              if($error == 3) echo("<h3 style='text-align: center'>Ya existe una imagen con ese nombre.</h3>");
            }
          ?>
          <table>
            <tr>
              <td>
                <b>Grupo de la decoración:</b>
              </td>
              <td>
                <select id="decorativeGroup" name="decorativeGroup" required>
                  <option value=""></option>
                  <option value="animales">Animales</option>
                  <option value="artificiales">Artificiales</option>
                  <option value="muebles">Muebles</option>
                  <option value="naturales">Naturales</option>
                  <option value="piezas">Piezas</option>
                  <option value="soportes">Soportes</option>
                  <option value="timbres">Timbres</option>
                  <option value="vegetales">Vegetales</option>
                </select>
              </td>
            </tr>
            <tr>
              <td>
                <b>Nombre de la imágen:</b>
              </td>
              <td>
                <input type="text" id="nameImage" name="nameImage" required/>             
              </td>
            </tr>
            <tr>
              <td>
                <b>Imágen Decorativa:</b>
              </td>
              <td>
                <input type="file" id="fileImage" name="fileImage" accept="image/png" required/>             
              </td>
            </tr>
          </table>
          <div id="buttonSubmit">
            <input type="submit" id="buttonUpload" value="Subir las imágenes"/>
          </div> 
      </form>
        <button id="reiniciarValores" onclick="reiniciarValores()">Reiniciar valores</button>
      </div>

      <div class="col-md-6">
        <ul class="nav nav-pills">
          <li class="active">
            <a href="/tfg">Home</a>
          </li>
          <li><a href="/tfg/admin/adminToolUpload.php">Cargar Bases</a></li>
          <li><a href="/tfg/admin/adminToolDelete.php">Eliminar Bases</a></li>
          <li><a href="/tfg/admin/adminToolUploadDecorative.php">Cargar Decoraciones</a></li>
          <li><a href="/tfg/admin/adminToolDeleteDecorative.php">Eliminar Decoraciones</a></li>
        </ul>
        <div id="previsualization">
          <img id="back">
        </div>
      </div>

    </div>

  </body>


  <script>
  //Variables de imágenes
  var back = document.getElementById("back");

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
  </script>

</html>
