<?php
  include './ChromePhp.php';  

  require('../userManager.php');
  $user_name = getUsername();

  function addMisEscudos() {

    $userId = $GLOBALS['user_name'];

    $enlace =  mysql_connect('localhost', 'regularUser', '');
    if (!$enlace) {
        die('No pudo conectarse: ' . mysql_error());
    }
    $bd_seleccionada = mysql_select_db('tfg', $enlace);
    if (!$bd_seleccionada) {
        die ('No se puede usar tfg : ' . mysql_error());
    }

    //Meter los valores con %s%
    
    $select="SELECT userId, titulo, src FROM escudo WHERE userId = '%s'";
    $select = sprintf($select, $userId);
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
      $src = $fila['src'];
      echo("<div id='" . $titulo . "' class='divEscudo' onclick='displayMiEscudo(this)'>");
      echo("<img src='" . $src . "' class='escudo'>");
      echo("</div>");      
    }
    // Liberar los recursos asociados con el conjunto de resultados
    // Esto se ejecutado automáticamente al finalizar el script.
    mysql_free_result($resultado);
    mysql_close($enlace);
  }

  function addEscudos() {
    $userId = $GLOBALS['user_name'];

    $enlace =  mysql_connect('localhost', 'regularUser', '');
    if (!$enlace) {
        die('No pudo conectarse: ' . mysql_error());
    }
    $bd_seleccionada = mysql_select_db('tfg', $enlace);
    if (!$bd_seleccionada) {
        die ('No se puede usar tfg : ' . mysql_error());
    }

    //Meter los valores con %s%
    
    $select="SELECT userId, titulo, src FROM escudo WHERE public = 1 AND userId != '%s' ";
    $select = sprintf($select, $userId);
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
      $src = $fila['src'];
      echo("<div id='" . $titulo . "' class='divEscudo' onclick='displayEscudo(this)'>");
      echo("<img src='" . $src . "' class='escudo'>");
      echo("</div>");      
    }
    // Liberar los recursos asociados con el conjunto de resultados
    // Esto se ejecutado automáticamente al finalizar el script.
    mysql_free_result($resultado);
    mysql_close($enlace);
  }
?>

<div id="loadPopUp" title="Cargar Escudo">
  <div id="loadContainer" class="container">
    <div id="designs" class="col-md-3">
      <h4>Mis Escudos</h4>
      <div id="misEscudos">
        <?php
          addMisEscudos();
        ?>
      </div>
      <h4>Escudos Públicos</h4>
      <div id="imagenesEscudos">
        <?php
          addEscudos();
        ?>
      </div>
    </div>
    <div id="previsualizationLoad" class="col-md-8">
      <img id="escudoPrevisualization">
    </div>
    <form id="deleteEscudo" action="deleteEscudo.php" method="POST">
      <input id="deleteButton" type="submit" value="Borrar el escudo" style="display:none;">  
      <input id="tituloDelete" name="tituloDelete" type="text" style="display:none;">
      <input id="srcDelete" name="srcDelete" type="text" style="display:none;">
    </form>
  </div> 
</div>



<script>

//Variables de las imagenes
var escudoImg = document.getElementById("escudoPrevisualization");

function displayEscudo(item) {
  $("#deleteButton").css("display","none");
  escudoImg.src = item.firstChild.src;
}

function displayMiEscudo(item) {
  escudoImg.src = item.firstChild.src;
  $("#deleteButton").css("display","block");
  var src = decodeURI(escudoImg.src);
  var lastIndex = src.lastIndexOf("/");
  var titulo = src.substring(lastIndex + 1, src.length - 4);
  document.getElementById("tituloDelete").value = titulo;
  document.getElementById("srcDelete").value = "." + src.substring(20);
}


</script>