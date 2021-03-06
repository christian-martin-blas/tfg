<!DOCTYPE HTML>
<meta charset="utf-8"> 
<html>
  <head>
      <script src="../lib/js/jquery-1.11.0.min.js"></script>
      <link rel="stylesheet" href="../lib/css/redmond/jquery-ui-1.10.4.custom.css">
      <link rel="stylesheet" type="text/css" href="../lib/css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="../lib/css/jquery.simplecolorpicker.css">
      <link rel="stylesheet" type="text/css" href="../lib/css/jquery.simplecolorpicker-glyphicons.css">
      <link rel="stylesheet" type="text/css" href="../css/adminToolDeleteDecorative.css">

      <script src="../lib/js/bootstrap.js"></script>
      <script src="../lib/js/jquery-ui-1.10.4.custom.js"></script>
      <script src="../lib/js/jquery.simplecolorpicker.js"></script>
      <script src="../lib/js/fabric.js"></script>
      <script src="../lib/js/jquery.ui.widget.js"></script>
      <script src="../lib/js/jquery.iframe-transport.js"></script>
      <script src="../lib/js/jquery.fileupload.js"></script>
      <script src="../js/adminToolDeleteDecorativeFunctions.js"></script>

      <?php
        include('../php/globalLinks.php');
      ?>

      <title>Eliminar decoraciones</title>

  </head>
  <body>

    <?php

      function addSelects() {
        //Añade los selects con las particiones de cada base 
        $dir = '../img/decoraciones'; 
        $dir_admin = '../img/admin/decoraciones';   
        $files = scandir($dir_admin);
        foreach ($files as &$file) {
          if($file != '.' && $file != '..') {
            echo("<select id='" . $file . "' name='" . $file . "' onchange='showDecoracionImage(this)' style='display:none' class=\"form-control\">");
            echo("<option value=''></option>");
            $deep_dir_admin = $dir_admin . "/" . $file;
            $deep_files_admin = scandir($deep_dir_admin);
            foreach ($deep_files_admin as &$deep_file_admin) {
              if($deep_file_admin != '.' && $deep_file_admin != '..') {
                if(substr($deep_file_admin, -4) == ".png") {
                  //Nos aseguramos que sea una imagen png
                  $particion_name = substr($deep_file_admin, 0, -4);
                  echo("<option value='" . $particion_name . "'>" . $particion_name . "</option>");
                }
              }
            }
            $deep_dir = $dir . "/" . $file;
            $deep_files = scandir($deep_dir);
            foreach ($deep_files as &$deep_file) {
              if($deep_file != '.' && $deep_file != '..') {
                if(substr($deep_file, -4) == ".png") {
                  //Nos aseguramos que sea una imagen png
                  $particion_name = substr($deep_file, 0, -4);
                  echo("<option id='default' value='" . $particion_name . "'>" . $particion_name . "</option>");
                }
              }
            }
          }
          echo("</select>");
        }
      }        
    ?>
    <div id="adminTool">

      <div id="leftMenu" class="col-md-4">

        <form id="deleteFiles" enctype="multipart/form-data" action="../php/removerDecorative.php" method="POST" onsubmit="guardarSrc()">
          <?php

            if(isset($_GET['success']))
            {
              echo("<h3 style='text-align: center'>Se han eliminado las imágenes correctamente.</h3>");
            }
            else if(isset($_GET['error'])) {
              $error = $_GET['error'];
              //Se ha subido una particion sin subir otra antes.
              if($error == 1) echo("<h3 style='text-align: center'>Te has saltado el orden al subir las particiones.</h3>");
              if($error == 2) echo("<h3 style='text-align: center'>Ha habido un fallo subiendo las imágenes.</h3>");
            }
          ?>
          <table>
            <tr>
              <td>
                <b>Grupo de la decoración:</b>
              </td>
              <td>
                <select id="decorativeGroup" name="decorativeGroup" onchange="showDecoracion(this)" class="form-control" required>
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
            <tr id="decoraciones" style="display: none">
              <td>
                <b>Nombre de la Decoración:</b>
              </td>
              <td>
                <?php
                  addSelects();
                ?>
              </td>
            </tr>
          </table>
          <div id="buttonSubmit">
            <input type="submit" id="buttonUpload" value="Eliminar las imágenes" class="btn btn-default"/>
          </div>
          <input type="text" id="imgName" name="imgName"/> 
          <input type="text" id="isDefault" name="isDefault"/>    
        </form>
      </div>

      <div class="col-md-6">
        <ul class="nav nav-pills" style="width:900px">
          <li><a href=<?php echo(Joomla);?>>Home</a></li>
          <li><a href=<?php echo(Galeria);?>>Galería</a></li>
          <li><a href=<?php echo(Home);?>>Editor</a></li>
          <li><a href=<?php echo(AdminToolUpload);?>>Cargar Bases</a></li>
          <li><a href=<?php echo(AdminToolDelete);?>>Eliminar Bases</a></li>
          <li><a href=<?php echo(AdminToolUploadDecorative);?>>Cargar Decoraciones</a></li>
          <li class="active">
            <a href=<?php echo(AdminToolDeleteDecorative);?>>Eliminar Decoraciones</a>
          </li>
        </ul>
        <div id="previsualization">
          <img id="back">
        </div>
      </div>

    </div>

  </body>


  <script charset="UTF-8">
  //Variables de imágenes
  var back = document.getElementById("back");

  var antSelect = "";

  if($(window).width() > 1500) $("#leftMenu").css("margin-left","150px");
  </script>

</html>
