<!DOCTYPE HTML>
<meta charset="utf-8"> 
<html>
<head>
      <script src="./lib/js/jquery-1.11.0.min.js"></script>
      <link rel="stylesheet" href="./lib/css/redmond/jquery-ui-1.10.4.custom.css">
      <link rel="stylesheet" type="text/css" href="./lib/css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="./lib/css/jquery.simplecolorpicker.css">
      <link rel="stylesheet" type="text/css" href="./lib/css/jquery.simplecolorpicker-glyphicons.css">

      <script src="./lib/js/bootstrap.js"></script>
      <script src="./lib/js/jquery-ui-1.10.4.custom.js"></script>
      <script src="./lib/js/jquery.ui.widget.js"></script>

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
            margin-top: 200px;
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
      .ui-dialog {
            background:#C9DCEA !important
      }​

</style>

      <?php
            include './ChromePhp.php';
            require('./dbConnection.php');

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
                        echo("<input type=\"text\" id=\"autor\" value=\"" . $userId . "\" style=\"display:none\"/>");
                        echo("<input type=\"text\" id=\"descripcion\" value=\"" . $descripcion . "\" style=\"display:none\"/>");
                        echo("<input type=\"text\" id=\"historia\" value=\"" . $historia . "\" style=\"display:none\"/>");
                        echo("<input type=\"text\" id=\"titulo\" value=\"" . $titulo . "\" style=\"display:none\"/>");
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

</head>
<body>
      <div id="container">
            <?php
                  loadEscudos();
            ?>
      </div>
      <div id="popUpVisualization" title="Visualización escudo">  
    </div>
</body>
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



</script>
</html>
