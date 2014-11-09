<!DOCTYPE HTML>
<meta charset="utf-8"> 
<html>
<head>
    <?php
      include('../userManager.php');
      include './ChromePhp.php';
      require('./dbConnection.php');
      $user_name = getUsername();
      $isAdmin = isAdmin();
    ?>
      <script src="./lib/js/jquery-1.11.0.min.js"></script>
      <link rel="stylesheet" href="./lib/css/redmond/jquery-ui-1.10.4.custom.css">
      <link rel="stylesheet" type="text/css" href="./lib/css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="./lib/css/jquery.simplecolorpicker.css">
      <link rel="stylesheet" type="text/css" href="./lib/css/jquery.simplecolorpicker-glyphicons.css">
      <link rel="stylesheet" type="text/css" href="./lib/css/index.css">

      <script src="./lib/js/bootstrap.js"></script>
      <script src="./lib/js/jquery-ui-1.10.4.custom.js"></script>
      <script src="./lib/js/jquery.ui.widget.js"></script>
      <script src="./lib/js/indexFunctions.js"></script>

      <title>Galería de escudos</title>
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
                    $historia = utf8_encode($fila['historia']);
                    $descripcion = utf8_encode($fila['descripcion']);
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

</script>
</html>
