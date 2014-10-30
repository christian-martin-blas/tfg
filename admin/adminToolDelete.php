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
      body {
        background-color: #F7FAFC;
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
        margin-top: 250px;
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
        margin-top: 100px;
        margin-left: 70px;
        float: left;
        border: 5px solid #333333;
        position: relative;
      }
      #base {
        display: none;
      }
      #particion {
        display: none;
      }
      #src {
        display: none;
      }
      #imgName {
        display: none;
      }
      #imgNameBase {
        display: none;
      }
      #leftMenu {
        margin-left: 150px;
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

        <form id="deleteFiles" enctype="multipart/form-data" action="remover.php" method="POST" onsubmit="guardarSrc()">
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
        <ul class="nav nav-pills">
          <li><a href="/editor/tfg">Home</a></li>
          <li><a href="/editor/tfg/admin/adminToolUpload.php">Cargar Bases</a></li>
          <li class="active">
            <a href="/editor/tfg/admin/adminToolDelete.php">Eliminar Bases</a>
          </li>
          <li><a href="/editor/tfg/admin/adminToolUploadDecorative.php">Cargar Decoraciones</a></li>
          <li><a href="/editor/tfg/admin/adminToolDeleteDecorative.php">Eliminar Decoraciones</a></li>
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


  function showTable(item) {
    if(item.value == "base") {
      $('#base').css('display','block');
      $('#particion').css('display','none');
      document.getElementById("nombreBase").required = true;
      document.getElementById("nombreBaseParticion").required = false;
      if(antSelect != "") document.getElementById(antSelect).required = false;
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
        && item.value != "Italiano" && item.value != "Semicircular") var src = "../img/admin/bases/" + item.value + ".png";
      else var src = "../img/bases/" + item.value + ".png";
      back.src = src;
    }
    else back.src = "";
  }

  function showBaseParticion(item) {
    if(item.value != "") {
      if(item.value != "Aleman" && item.value != "Apuntado" && item.value != "Frances" && item.value != "Ingles" 
        && item.value != "Italiano" && item.value != "Semicircular") var src = "../img/admin/bases/" + item.value + ".png";
      else var src = "../img/bases/" + item.value + ".png";
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
      var src = "../img/admin/miniaturas/" + item.id + "/" + item.value + ".png";
      back.src = src;
    }
  }

  function borrarElementos() {
    $("#back").attr("src","");
    $("#nombreBase").val("");
    $("#nombreBaseParticion").val("");
    $("#nombreParticion").val("");
  }

  function guardarSrc() {
    //Guardo las variables que necesito para saber que borrar
    $("#src").val(back.src);
    if($("#nombreBase").val() != "") {
      $("#imgName").val($("#nombreBase").val());
    }
    else if($("#nombreBaseParticion").val() != "") {
      var nombreBase = $("#nombreBaseParticion").val();
      $("#imgNameBase").val($("#nombreBaseParticion").val());
      $("#imgName").val($("#" + nombreBase).val());
    }
  }

  </script>

</html>
