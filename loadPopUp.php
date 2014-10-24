<?php
  include './ChromePhp.php';  

  function addEscudos() {
    $enlace =  mysql_connect('localhost', 'regularUser', '');
    if (!$enlace) {
        die('No pudo conectarse: ' . mysql_error());
    }
    $bd_seleccionada = mysql_select_db('tfg', $enlace);
    if (!$bd_seleccionada) {
        die ('No se puede usar tfg : ' . mysql_error());
    }

    //Meter los valores con %s%
    
    $select="SELECT userId, titulo, src FROM escudo WHERE public = 1";
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
      <h4>Escudos</h4>
      <div id="imagenesEscudos">
        <?php
          addEscudos();
        ?>
      </div>
    </div>
    <div id="previsualization" class="col-md-8">
      <img id="escudoPrevisualization">
    </div>
  </div> 
</div>



<script>

//Variables de las imagenes
var escudoImg = document.getElementById("escudoPrevisualization");

function displayEscudo(item) {
  escudoImg.src = item.firstChild.src;
}


</script>