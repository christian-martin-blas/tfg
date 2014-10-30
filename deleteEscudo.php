<html>
<head>
<title>Process Uploaded File</title>
</head>
<body>
<?php
	include './ChromePhp.php';

	require('../userManager.php');
  	$user_name = getUsername();

	//Recupero los valores a insertar
	$userId = $user_name;
	$titulo = $_POST['tituloDelete'];
	$src = $_POST['srcDelete'];

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
	$consulta = sprintf($delete, $titulo, $src, $userId);
	// Ejecutar la consulta
	$resultado = mysql_query($consulta);
	// Comprobar el resultado
	// Lo siguiente muestra la consulta real enviada a MySQL, y el error ocurrido. Útil para depuración.
	if (!$resultado) {
	    $mensaje  = 'Consulta no válida: ' . mysql_error() . "\n";
	    $mensaje .= 'Consulta completa: ' . $consulta;
	    die($mensaje);
	    $erroc_code = 4;
	}
	// Liberar los recursos asociados con el conjunto de resultados
	// Esto se ejecutado automáticamente al finalizar el script.
	mysql_query("commit", $enlace);
	mysql_close($enlace);

	unlink($src);


	if($errorCode == 0) {
		header('Location: /tfg/index.php?success=2');
	}
	else header('Location: /tfg/index.php?error=' . $error_code);
	
	exit;
	
?>
</body>
</html>