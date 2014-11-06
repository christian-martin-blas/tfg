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
    
    $select="SELECT userId, titulo, email, src FROM escudo WHERE public = 1";
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
      $email = $fila['email'];
      $src = $fila['src'];
      echo("<div id='" . $titulo . "' class='divEscudo' onclick='displayEscudoManage(this)'>");
      echo("<img src='" . $src . "' class='escudo'>");
      echo("<input value = '" . $userId . "' type='text' style='display:none'>");
      echo("<input value = '" . $email . "' type='text' style='display:none'>");
      echo("</div>");      
    }
    // Liberar los recursos asociados con el conjunto de resultados
    // Esto se ejecutado automáticamente al finalizar el script.
    mysql_free_result($resultado);
    mysql_close($enlace);
  }
?>

<div id="managePopUp" title="Gestionar Escudos">
  <div id="manageContainer" class="container">
    <div id="designs" class="col-md-3">
      <h4>Escudos Públicos</h4>
      <div id="imagenesEscudos">
        <?php
          addEscudos();
        ?>
      </div>
      <form id="manageEscudo" action="unpublishEscudo.php" method="POST">
        <table id="formManage">
          <tr>
            <td>
               <b>Título:</b>
            </td>
            <td>
              <input id="tituloManage" name="tituloManage" type="text" readonly>
            </td>
          </tr>
           <tr>
            <td>
               <b>Autor:</b>
            </td>
            <td>
              <input id="usernameManage" name="usernameManage" type="text" readonly>
            </td>
          </tr>
          <tr>
            <td>
               <b>Email:</b>
            </td>
            <td>
              <input id="emailManage" name="emailManage" type="email" readonly>
            </td>
          </tr>
        </table> 
      </form>
    </div>
    <div id="previsualizationManage" class="col-md-7">
      <img id="escudoPrevisualizationManage">
    </div>
  </div> 
</div>

<script>

//Variables de las imagenes
var escudoManageImg = document.getElementById("escudoPrevisualizationManage");

function displayEscudoManage(item) {
  document.getElementById("tituloManage").value = item.id;
  escudoManageImg.src = item.firstChild.src;
  document.getElementById("usernameManage").value = item.children[1].value;
  document.getElementById("emailManage").value = item.children[2].value;
}

</script>