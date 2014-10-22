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

      #deleteFiles {
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
      #base {
        display: none;
      }
      #particion {
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

      function addSelects() {
        //Añade los selects con las particiones de cada base    
        $dir    = '../img/admin/miniaturas';
        addParticiones($dir);
        $dir    = '../img/miniaturas';
        addParticiones($dir);
      }

      function addParticiones($dir) {
        $files = scandir($dir);
        foreach ($files as &$file) {
          if($file != '.' && $file != '..') {
            echo("<select id='" . $file . "' name='" . $file . "' onchange='showParticion(this)' style='display:none'>");
            echo("<option value=''></option>");
            $deep_dir = $dir . "/" . $file;
            $deep_files = scandir($deep_dir);
            foreach ($deep_files as &$deep_file) {
              if($deep_file != '.' && $deep_file != '..') {
                $particion_name = substr($deep_file, 0, -4);
                echo("<option value='" . $particion_name . "'>" . $particion_name . "</option>");
              }
            }
          }
          echo("</select>");
        }
      }
    ?>

    <div id="adminTool">

      <div class="col-md-4">
        <a id="linkMainPage" href="/tfg">Editor de escudos</a>

        <form id="deleteFiles" enctype="multipart/form-data" action="remover.php" method="POST" onsubmit="generarMiniatura()">
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
          <input type="radio" name="base" value="base" onclick="showTable(this)">Eliminaré base y particiones<br>
          <input type="radio" name="base" value="particion" onclick="showTable(this)">Eliminaré particiones
          <table id="base">
            <tr>
              <td>
                <b>Nombre de la Base:</b>
              </td>
              <td>
                <select id="nombreBase" name="nombreBase" onchange="showBase(this)" required>
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
          </table>
          <table id="particion">
            <tr>
              <td>
                <b>Nombre de la Base:</b>
              </td>
              <td>
                <select id="nombreBaseParticion" name="nombreBaseParticion" onchange="showBaseParticion(this)">
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
            <input type="submit" id="buttonUpload" value="Eliminar las imágenes"/>
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
      </div>

    </div>

  </body>


  <script>
  //Variables de imágenes
  var back = document.getElementById("back");

  var antSelect = "";


  function showTable(item) {
    if(item.value == "base") {
      $('#base').css('display','block');
      $('#particion').css('display','none');
      document.getElementById("nombreBase").required = true;
      document.getElementById("nombreBaseParticion").required = false;
    }
    else {
      $('#base').css('display','none');
      $('#particion').css('display','block');
      document.getElementById("nombreBase").required = false;
      document.getElementById("nombreBaseParticion").required = true;
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

  function showBaseParticion(item) {
    if(item.value != "") {
      if(item.value != "Aleman" && item.value != "Apuntado" && item.value != "Frances" && item.value != "Ingles" 
        && item.value != "Italiano" && item.value != "Semicircular") var src = "/tfg/img/admin/bases/" + item.value + ".png";
      else var src = "/tfg/img/bases/" + item.value + ".png";
      back.src = src;
      $("#" + antSelect).css("display","none");
      if(antSelect != "") document.getElementById(antSelect).required = false;
      antSelect = item.value;
      $("#particiones").css("display","table-row");
      $("#" + antSelect).css("display","block");
      document.getElementById(antSelect).required = true;
    }
  }

  function showParticion(item) {
    if(item.value != "") {
      if(item.id != "Aleman" && item.id != "Apuntado" && item.id != "Frances" && item.id != "Ingles" 
        && item.id != "Italiano" && item.id != "Semicircular") var src = "/tfg/img/admin/miniaturas/" + item.id + "/" + item.value + ".png";
      else var src = "/tfg/img/miniaturas/" + item.id + "/" + item.value + ".png";
      back.src = src;
    }
  }

  function borrarElementos() {
    $("#back").attr("src","");
    $("#nombreBase").val("");
    $("#nombreBaseParticion").val("");
    $("#nombreParticion").val("");
  }

  </script>

</html>
