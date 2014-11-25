<!DOCTYPE HTML>
<meta charset="utf-8"> 
<html>
  <head>
      <script src="../lib/js/jquery-1.11.0.min.js"></script>
      <link rel="stylesheet" href="../lib/css/redmond/jquery-ui-1.10.4.custom.css">
      <link rel="stylesheet" type="text/css" href="../lib/css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="../lib/css/jquery.simplecolorpicker.css">
      <link rel="stylesheet" type="text/css" href="../lib/css/jquery.simplecolorpicker-glyphicons.css">
      <link rel="stylesheet" type="text/css" href="../css/adminToolUpload.css">

      <script src="../lib/js/bootstrap.js"></script>
      <script src="../lib/js/jquery-ui-1.10.4.custom.js"></script>
      <script src="../lib/js/jquery.simplecolorpicker.js"></script>
      <script src="../lib/js/fabric.js"></script>
      <script src="../lib/js/jquery.ui.widget.js"></script>
      <script src="../lib/js/jquery.iframe-transport.js"></script>
      <script src="../lib/js/jquery.fileupload.js"></script>
      <script src="../js/adminToolUploadFunctions.js"></script>

      <title>Cargar bases y escudos</title>
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

        <form id="uploadFiles" enctype="multipart/form-data" action="../php/uploader.php" method="POST" onsubmit="generarMiniatura()">
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
              if($error == 3) echo("<h3 style='text-align: center'>Ya existe un escudo con ese nombre.</h3>");
            }
          ?>
          <div id="warning">
            <h4>Atención:</h4>
            <ul>
              <li>El orden en que se añadan las particiones es importante.</li>
            </ul>
          </div>
          <input type="radio" name="base" value="base" onclick="showTable(this)" >Subiré base y particiones<br>
          <input type="radio" name="base" value="sinBase" onclick="showTable(this)">Subiré particiones
          <table id="sinBase">
            <tr>
              <td>
                <b>Nombre de la Base:</b>
              </td>
              <td>
                <select id="nombreBaseSelect" name="nombreBaseSelect" onchange="showBase(this)" class="form-control">
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
                <input type="text" id="nombreParticionSelect" name="nombreParticionSelect" class="form-control"/>             
              </td>
            </tr>
            <tr>
              <td>
                <b>Partición 1:</b>
              </td>
              <td>
                <input type="file" id="fileParticion1Select" name="fileParticion1Select" class="form-control"/>
              </td>
            </tr>
            <tr>
              <td>
                <b>Partición 2:</b>
              </td>
              <td>
                <input type="file" id="fileParticion2Select" name="fileParticion2Select" class="form-control"/>
              </td>
            </tr>
            <tr>
              <td>
                <b>Partición 3:</b>
              </td>
              <td>
                <input type="file" id="fileParticion3Select" name="fileParticion3Select" class="form-control"/>
              </td>
            </tr>
            <tr>
              <td>
                <b>Partición 4:</b>
              </td>
              <td>
                <input type="file" id="fileParticion4Select" name="fileParticion4Select" class="form-control"/>
              </td>
            </tr>
          </table>
          <table id="base">
            <tr>
              <td>
                <b>Nombre de la Base:</b>
              </td>
              <td>
                <input type="text" id="nombreBase" name="nombreBase" class="form-control" required/>
              </td>
            </tr>
            <tr>
              <td>
                <b>Base:</b>
              </td>
              <td>
                <input type="file" id="fileBase" name="fileBase" class="form-control"/>
              </td>
            </tr>
            <tr>
              <td>
                <b>Nombre de la partición:</b>
              </td>
              <td>
                <input type="text" id="nombreParticion" name="nombreParticion" class="form-control"/>
              </td>
            </tr>
            <tr>
              <td>
                <b>Partición 1:</b>
              </td>
              <td>
                <input type="file" id="fileParticion1" name="fileParticion1" class="form-control"/>
              </td>
            </tr>
            <tr>
              <td>
                <b>Partición 2:</b>
              </td>
              <td>
                <input type="file" id="fileParticion2" name="fileParticion2" class="form-control"/>
              </td>
            </tr>
            <tr>
              <td>
                <b>Partición 3:</b>
              </td>
              <td>
                <input type="file" id="fileParticion3" name="fileParticion3" class="form-control"/>
              </td>
            </tr>
            <tr>
              <td>
                <b>Partición 4:</b>
              </td>
              <td>
                <input type="file" id="fileParticion4" name="fileParticion4" class="form-control"/>
              </td>
            </tr>
          </table>
          <div id="buttonSubmit">
            <input type="submit" id="buttonUpload" value="Subir las imágenes" class="btn btn-default"/>
          </div>
          <input type="text" id="miniatura" name="miniatura"/>    
      </form>
        <button id="borrarElementos" onclick="borrarElementos()" class="btn btn-default">Borrar imágenes</button>
      </div>

      <div class="col-md-6">
        <ul class="nav nav-pills" style="width:900px">
          <li><a href=<?php echo(Joomla);?>>Home</a></li>
          <li><a href=<?php echo(Galeria);?>>Galería</a></li>
          <li><a href=<?php echo(Home);?>>Editor</a></li>
          <li class="active"><a href=<?php echo(AdminToolUpload);?>>Cargar Bases</a></li>
          <li><a href=<?php echo(AdminToolDelete);?>>Eliminar Bases</a></li>
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
  var miniatura = document.getElementById("miniatura");
  var part1 = document.getElementById("part1");
  var part2 = document.getElementById("part2");
  var part3 = document.getElementById("part3");
  var part4 = document.getElementById("part4");

  //Variables para subir imagenes
  var reader;

  if($(window).width() > 1500) $("#leftMenu").css("margin-left","150px");

  </script>

</html>
