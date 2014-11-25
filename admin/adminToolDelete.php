<!DOCTYPE HTML>
<meta charset="utf-8"> 
<html>
  <head>
      <script src="../lib/js/jquery-1.11.0.min.js"></script>
      <link rel="stylesheet" href="../lib/css/redmond/jquery-ui-1.10.4.custom.css">
      <link rel="stylesheet" type="text/css" href="../lib/css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="../lib/css/jquery.simplecolorpicker.css">
      <link rel="stylesheet" type="text/css" href="../lib/css/jquery.simplecolorpicker-glyphicons.css">
      <link rel="stylesheet" type="text/css" href="../css/adminToolDelete.css">

      <script src="../lib/js/bootstrap.js"></script>
      <script src="../lib/js/jquery-ui-1.10.4.custom.js"></script>
      <script src="../lib/js/jquery.simplecolorpicker.js"></script>
      <script src="../lib/js/fabric.js"></script>
      <script src="../lib/js/jquery.ui.widget.js"></script>
      <script src="../lib/js/jquery.iframe-transport.js"></script>
      <script src="../lib/js/jquery.fileupload.js"></script>
      <script src="../js/adminToolDeleteFunctions.js"></script>

      <?php 
        include('../php/globalLinks.php');
      ?>

      <title>Eliminar bases y escudos</title>

  </head>
  <body>

    <?php

      function addOptions() {
        //Añade al select las bases creadas por el admin
        $dir    = '../img/admin/bases';
        $files = scandir($dir);
        foreach ($files as &$file) {
          if($file != '.' && $file != '..') {
            if(substr($file, -4) == ".png") {
              //Nos aseguramos que sea una imagen png
              $base_name = substr($file, 0, -4);
              echo("<option value='" . $base_name . "'>" . $base_name . "</option>");
            }
          }
        }
      }

      function addSelects() {
        //Añade los selects con las particiones de cada base 
        $dir = '../img/admin/miniaturas';   
        $files = scandir($dir);
        foreach ($files as &$file) {
          if($file != '.' && $file != '..') {
            echo("<select id='" . $file . "' name='" . $file . "' onchange='showParticion(this)' style='display:none' class=\"form-control\">");
            echo("<option value=''></option>");
            $deep_dir = $dir . "/" . $file;
            $deep_files = scandir($deep_dir);
            foreach ($deep_files as &$deep_file) {
              if($deep_file != '.' && $deep_file != '..') {
                if(substr($deep_file, -4) == ".png") {
                  //Nos aseguramos que sea una imagen png
                  $particion_name = substr($deep_file, 0, -4);
                  echo("<option value='" . $particion_name . "'>" . $particion_name . "</option>");
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

        <form id="deleteFiles" enctype="multipart/form-data" action="../php/remover.php" method="POST" onsubmit="guardarSrc()">
          <?php

            if(isset($_GET['success']))
            {
              echo("<h3 style='text-align: center'>Se han eliminado las imágenes correctamente.</h3>");
            }
          ?>
          <input type="radio" name="base" value="base" onclick="showTable(this)">Eliminaré base y particiones<br>
          <input type="radio" name="base" value="particion" onclick="showTable(this)">Eliminaré particiones
          <table id="base">
            <tr>
              <td>
                <b>Nombre de la Base:</b>
              </td>
              <td>
                <select id="nombreBase" name="nombreBase" onchange="showBase(this)" class="form-control" required>
                  <?php
                    addOptions();
                  ?>
                </select>
              </td>
            </tr>
          </table>
          <table id="particion">
            <tr>
              <td>
                <b>Nombre de la Base:</b>
              </td>
              <td>
                <select id="nombreBaseParticion" name="nombreBaseParticion" onchange="showBaseParticion(this)" class="form-control">
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
            <tr id="particiones" style="display: none">
              <td>
                <b>Nombre de la Partición:</b>
              </td>
              <td>
                <?php
                  addSelects();
                ?>
              </td>
            </tr>
          </table>
          <div id="buttonSubmit">
            <input type="submit" id="buttonUpload" value="Eliminar las imágenes"  class="btn btn-default"/>
          </div>
          <input type="text" id="src" name="src"/>   
          <input type="text" id="imgName" name="imgName"/>   
          <input type="text" id="imgNameBase" name="imgNameBase"/>   
        </form>
      </div>

      <div class="col-md-6">
        <ul class="nav nav-pills" style="width:900px">
          <li><a href=<?php echo(Joomla);?>>Home</a></li>
          <li><a href=<?php echo(Galeria);?>>Galería</a></li>
          <li><a href=<?php echo(Home);?>>Editor</a></li>
          <li><a href=<?php echo(AdminToolUpload);?>>Cargar Bases</a></li>
          <li class="active">
            <a href=<?php echo(AdminToolDelete);?>>Eliminar Bases</a>
          </li>
          <li><a href=<?php echo(AdminToolUploadDecorative);?>>Cargar Decoraciones</a></li>
          <li><a href=<?php echo(AdminToolDeleteDecorative);?>>Eliminar Decoraciones</a></li>
        </ul>
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

  var antSelect = "";

  if($(window).width() > 1500) $("#leftMenu").css("margin-left","150px");

  

  </script>

</html>
