<!DOCTYPE HTML>
<meta charset="utf-8"> 
<html>
  <head>
      <script src="../lib/js/jquery-1.11.0.min.js"></script>
      <link rel="stylesheet" href="../lib/css/redmond/jquery-ui-1.10.4.custom.css">
      <link rel="stylesheet" type="text/css" href="../lib/css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="../css/adminToolUploadDecorative.css">

      <script src="../lib/js/bootstrap.js"></script>
      <script src="../lib/js/jquery-ui-1.10.4.custom.js"></script>
      <script src="../lib/js/jquery.simplecolorpicker.js"></script>
      <script src="../lib/js/fabric.js"></script>
      <script src="../lib/js/jquery.ui.widget.js"></script>
      <script src="../lib/js/jquery.iframe-transport.js"></script>
      <script src="../lib/js/jquery.fileupload.js"></script>
      <script src="../js/adminToolUploadDecorativeFunctions.js"></script>

      <title>Cargar decoraciones</title>
      <?php
        include('../php/globalLinks.php');
      ?>

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

      <div id="leftMenu" class="col-md-4">

        <form id="uploadFiles" enctype="multipart/form-data" action="../php/uploaderDecorative.php" method="POST" onsubmit="saveSrc()">
          <?php

            if(isset($_GET['success']))
            {
              echo("<h3 style='text-align: center'>Se han cargado las imágenes correctamente.</h3>");
            }
            else if(isset($_GET['error'])) {
              $error = $_GET['error'];
              //Se ha subido una particion sin subir otra antes.
              if($error == 2) echo("<h3 style='text-align: center'>Ha habido un fallo subiendo las imágenes.</h3>");
              if($error == 3) echo("<h3 style='text-align: center'>Ya existe una imagen con ese nombre.</h3>");
            }
          ?>
          <table>
            <tr>
              <td>
                <b>Grupo de la decoración:</b>
              </td>
              <td>
                <select id="decorativeGroup" name="decorativeGroup" class="form-control" required>
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
                <input type="text" id="nameImage" name="nameImage" class="form-control" required/>             
              </td>
            </tr>
            <tr>
              <td>
                <b>Imágen Decorativa:</b>
              </td>
              <td>
                <input type="file" id="fileImage" name="fileImage" class="form-control" required/>             
              </td>
            </tr>
          </table>
          <div id="buttonSubmit">
            <input type="submit" id="buttonUpload" value="Subir las imágenes" class="btn btn-default"/>
          </div> 
      </form>
        <button id="reiniciarValores" onclick="reiniciarValores()" class="btn btn-default">Reiniciar valores</button>
      </div>

      <div class="col-md-6">
        <ul class="nav nav-pills" style="width:900px">
          <li><a href=<?php echo(Joomla);?>>Home</a></li>
          <li><a href=<?php echo(Galeria);?>>Galería</a></li>
          <li><a href=<?php echo(Home);?>>Editor</a></li>
          <li><a href=<?php echo(AdminToolUpload);?>>Cargar Bases</a></li>
          <li><a href=<?php echo(AdminToolDelete);?>>Eliminar Bases</a></li>
          <li class="active">
            <a href=<?php echo(AdminToolUploadDecorative);?>>Cargar Decoraciones</a>
          </li>
          <li><a href=<?php echo(AdminToolDeleteDecorative);?>>Eliminar Decoraciones</a></li>
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

  if($(window).width() > 1500) $("#leftMenu").css("margin-left","150px");

  //Añadimos el evento onChange para que cargue las previsualizaciones de las imagenes
  addOnChangeToFiles();

  </script>

</html>
