<?php
  	require('./php/dbConnection.php');

	function loadDecoraciones($group) {
		$index = 0;
		$dir    = './img/decoraciones/' . $group ;
		$files = scandir($dir);
		foreach ($files as &$file) {
		  if($file != '.' && $file != '..') {
		    $file_name = substr($file, 0, -4);
		    echo("<div id='" . $group . $index . "' class='divFigure'>");
		    echo("<img id='" . $file_name . "' src='" . $dir . "/" . $file . "' class='figures' onClick='addImage(this)'/>");
		    echo("</div>");
		    $index = $index + 1;
		  }
		}
		$dir    = './img/admin/decoraciones/' . $group ;
		$files = scandir($dir);
		foreach ($files as &$file) {
		  if($file != '.' && $file != '..') {
		    $file_name = substr($file, 0, -4);
		    echo("<div id='" . $group . $index . "' class='divFigure'>");
		    echo("<img id='" . $file_name . "' src='" . $dir . "/" . $file . "' class='figures' onClick='addImage(this)'/>");
		    echo("</div>");
		    $index = $index + 1;
		  }
		}
	}
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