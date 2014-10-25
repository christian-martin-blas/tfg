<html>
<head>
<title>Process Uploaded File</title>
</head>
<body>
<?php
	include './ChromePhp.php';

	//Recupero los valores a insertar
	$userId = "prueba";
	$titulo = $_POST['titulo'];
	$descripcion = $_POST['descripcion'];
	$historia = $_POST['historia'];
	$src = $_POST['srcSave'];
	$public =  isset($_POST['public']) && $_POST['public']  ? "1" : "0";

	$error_code = 0;
	$enlace =  mysql_connect('localhost', 'regularUser', '');
	if (!$enlace) {
	    die('No pudo conectarse: ' . mysql_error());
	    $erroc_code = 1;
	}
	echo 'Conectado satisfactoriamente';
	$bd_seleccionada = mysql_select_db('tfg', $enlace);
	if (!$bd_seleccionada) {
	    die ('No se puede usar tfg : ' . mysql_error());
	}

	//Meter los valores con %s%
	$delete = "DELETE FROM escudo WHERE titulo = '%s' AND src = '%s' AND userId = '%s'";
	$consulta = sprintf($delete, $userId, $titulo, $src);
	// Ejecutar la consulta
	$resultado = mysql_query($consulta);
	// Comprobar el resultado
	// Lo siguiente muestra la consulta real enviada a MySQL, y el error ocurrido. Útil para depuración.
	if (!$resultado) {
	    $mensaje  = 'Consulta no válida: ' . mysql_error() . "\n";
	    $mensaje .= 'Consulta completa: ' . $consulta;
	    die($mensaje);
	    $erroc_code = 2;
	}

	while ($fila = mysql_fetch_assoc($resultado)) {
	    echo $fila['userId'];
	    echo $fila['nombre'];
	    echo $fila['src'];
	    echo $fila['public'];
	}

	// Liberar los recursos asociados con el conjunto de resultados
	// Esto se ejecutado automáticamente al finalizar el script.
	mysql_free_result($resultado);
	mysql_close($enlace);


	if($errorCode == 0) {
		header('Location: /tfg/index.php?success');
	}
	else header('Location: /tfg/index.php?error=' . $error_code);
	
	exit;
	
?>
</body>
</html>