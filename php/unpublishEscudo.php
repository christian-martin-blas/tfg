<html>
<head>
<title>Process Uploaded File</title>
</head>
<body>
<?php
	require('./dbConnection.php');
	require('./globalLinks.php');
	
	//Recupero los valores a insertar
	$userId = $_POST['usernameManage'];
	$titulo = $_POST['tituloManage'];

	$error_code = 0;
	$enlace = dbConnect();
	if($enlace == 1) $error_code = $enlace;

	//Meter los valores con %s%
	$update = "UPDATE escudo SET public = 0 WHERE titulo = '%s' AND userId = '%s'";
	$consulta = sprintf($update, $titulo, $userId);
	// Ejecutar la consulta
	$resultado = mysql_query($consulta);
	// Comprobar el resultado
	// Lo siguiente muestra la consulta real enviada a MySQL, y el error ocurrido. Útil para depuración.
	if (!$resultado) {
	    $mensaje  = 'Consulta no válida: ' . mysql_error() . "\n";
	    $mensaje .= 'Consulta completa: ' . $consulta;
	    die($mensaje);
	    $error_code = 5;
	}
	// Liberar los recursos asociados con el conjunto de resultados
	// Esto se ejecutado automáticamente al finalizar el script.
	mysql_query("commit", $enlace);
	mysql_close($enlace);

	if($errorCode == 0) {
		header('Location: ' . Home . '?success=3');
	}
	else header('Location: ' . Home . '?error=' . $error_code);
	
	exit;
	
?>
</body>
</html>