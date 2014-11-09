<?php
	require_once('../../../userManager.php');
  	require('../dbConnection.php');
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

		$select="SELECT userId, titulo, src, public FROM escudo WHERE userId = '%s'";
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
		  $public = $fila['public'];
		  $src = $fila['src'];
		  echo("<div id='" . $titulo . "' class='divEscudo' onclick='displayMiEscudo(this)'>");
		  echo("<img src='" . $src . "' class='escudo'>");
		  echo("<input value = '" . $public . "' type='text' style='display:none'>");
		  echo("</div>");      
		}
		// Liberar los recursos asociados con el conjunto de resultados
		// Esto se ejecutado automáticamente al finalizar el script.
		mysql_free_result($resultado);
		mysql_close($enlace);
		}

		function addEscudosLoad() {
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