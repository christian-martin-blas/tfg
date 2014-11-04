<!DOCTYPE HTML>
<meta charset="utf-8"> 
<html>
<head>
    <?php
      include('../userManager.php');
      include './ChromePhp.php';
      require('./dbConnection.php');
      $isAdmin = isAdmin();
    ?>
      <script src="./lib/js/jquery-1.11.0.min.js"></script>
      <link rel="stylesheet" href="./lib/css/redmond/jquery-ui-1.10.4.custom.css">
      <link rel="stylesheet" type="text/css" href="./lib/css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="./lib/css/jquery.simplecolorpicker.css">
      <link rel="stylesheet" type="text/css" href="./lib/css/jquery.simplecolorpicker-glyphicons.css">

      <script src="./lib/js/bootstrap.js"></script>
      <script src="./lib/js/jquery-ui-1.10.4.custom.js"></script>
      <script src="./lib/js/jquery.ui.widget.js"></script>

      <title>Galería de escudos</title>

<style>
      html {
        max-width: 1500px;
      }
      body {
        background-color: #F7FAFC;
      }
      div.divEscudo {
            width: 200px;
            float: left;
            border: solid 2px;
            margin-top: 10px;
            margin-bottom: 10px;
            margin-right: 20px;
            margin-left: 20px;
            background-color: #D9DDe0;
            cursor: pointer;
      }
      #container {
        overflow-y:scroll;
        margin-left: 400px;
        width: 1000px;
        margin-top: 80px;
        border: groove 5px;
        max-height: 700px;
      }
      .escudo {
            width: 200px;
      }
      h4 {
            text-align: center;
      }
      #containerPopUp {
        background-color: #C9DCEA;
        width: 1100px;
      }
      #previsualization {
        background-color: white;
        height: 350px;
        width: 550px;
        margin-top: 40px;
        margin-bottom: 40px;
        margin-left: 80px;
        float: left;
      }
      #escudo {
        position: absolute;
      }
      #information {
            float: left;
      }
      td {
        padding: 6px;
      }
      #homeNav {
        margin-left: 400px;
      }
      #homeNavAdmin {
        display: none;
        margin-left: 550px;
      }
      h1 {
        font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
        margin-left: 400px;
        margin-top: 50px;
        color: #428BCA;
      }
      #buttonPopUpDownload {
        float: right;
        margin-right: 115px;
      }
      #autor {
        display: none;
      }
      #historia {
        display: none;
      }
      #descripcion {
        display: none;
      }
      #titulo {
        display: none;
      }
      .ui-dialog {
            background:#C9DCEA !important;
      }?
          
</style>
</head>
<body>
  <?php
        function loadEscudos() {
              $enlace = dbConnect();
              if($enlace == 1) $error_code = $enlace;

              //Meter los valores con %s%

              $select="SELECT * FROM escudo WHERE public = 1";
              // Ejecutar la consulta
              $resultado = mysql_query($select);
              // Comprobar el resultado
              // Lo siguiente muestra la consulta real enviada a MySQL, y el error ocurrido. Útil para depuración.
              if (!$resultado) {
                $mensaje  = 'Consulta no válida: ' . mysql_error() . "\n";
                $mensaje .= 'Consulta completa: ' . $consulta;
                die($mensaje);
              }

              while ($fila = mysql_fetch_assoc($resultado)) {
                    $userId = $fila['userId'];
                    $titulo = $fila['titulo'];
                    $historia = $fila['historia'];
                    $descripcion = $fila['descripcion'];
                    $src = $fila['src'];
                    echo("<div id='" . $titulo . " " . $userId . "' class='divEscudo' onclick='displayEscudo(this)'>");
                    echo("<input type=\"text\" id=\"autor\" value=\"" . $userId . "\">");
                    echo("<input type=\"text\" id=\"descripcion\" value=\"" . $descripcion . "\">");
                    echo("<input type=\"text\" id=\"historia\" value=\"" . $historia . "\">");
                    echo("<input type=\"text\" id=\"titulo\" value=\"" . $titulo . "\">");
                    echo("<img src='" . $src . "' class='escudo'>");
                    echo("<h4>" . $titulo . "</h4>");
                    echo("</div>");      
              }
              // Liberar los recursos asociados con el conjunto de resultados
              // Esto se ejecutado automáticamente al finalizar el script.
              mysql_free_result($resultado);
              mysql_close($enlace);
        }
      ?>
    <ul id="homeNav" class="nav nav-pills">
      <li><a href="/editor/">Home</a></li>
      <li class="active">
        <a href="/editor/tfg/">Galería</a>
      </li>
      <li><a href="/editor/tfg/home.php">Editor</a></li>
    </ul>
    <ul id="homeNavAdmin" class="nav nav-pills">
      <li><a href="/editor/">Home</a></li>
      <li class="active">
        <a href="/editor/tfg/">Galería</a>
      </li>
      <li><a href="/editor/tfg/home.php">Editor</a></li>
      <li><a href="/editor/tfg/admin/adminToolUpload.php">Cargar Bases</a></li>
      <li><a href="/editor/tfg/admin/adminToolDelete.php">Eliminar Bases</a></li>
      <li><a href="/editor/tfg/admin/adminToolUploadDecorative.php">Cargar Decoraciones</a></li>
      <li><a href="/editor/tfg/admin/adminToolDeleteDecorative.php">Eliminar Decoraciones</a></li>
    </ul>
    <h1>Galería de escudos</h1>
    <div id="container">
          <?php
                loadEscudos();
          ?>
    </div>
    <div id="popUpVisualization" title="Visualización escudo">  
    </div>
</body>
<?php
  if ($isAdmin)
  {
      echo "<script>javascript:$('#homeNav').css('display','none')</script>";   
       echo "<script>javascript:$('#homeNavAdmin').css('display','block')</script>";   
  }
?>
<script>
$(function(){
    $ ("#popUpVisualization").load("popUpVisualization.php");
  });

$("#popUpVisualization").dialog({
      autoOpen: false,
      height: "auto",
      width: 1200,
      modal: true,
      buttons: {
      },
      close: function( event, ui ) {
      }
})

function displayEscudo(item) {
      document.getElementById("autorPopUp").value = item.children[0].value;
      document.getElementById("descripcionPopUp").value = item.children[1].value;
      document.getElementById("historiaPopUp").value = item.children[2].value;
      document.getElementById("tituloPopUp").value = item.children[3].value;
      var src = item.children[4].src;
      var index = src.indexOf("/img");
      var path = src.substring(index); 
      document.getElementById("escudo").src = "." + path;
      $("#popUpVisualization").dialog("open");
}

function downloadImage() {
  var src = document.getElementById("escudo").src;
  var a = $("<a>")
      .attr("href", src)
      .attr("download", "Escudo.png")
      .appendTo("body");

      a[0].click();

      a.remove();
}



</script>
</html>
