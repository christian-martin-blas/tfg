<html>
<head>
<title>Process Uploaded File</title>
</head>
<body>
<?php
	include '../ChromePhp.php';

	require('../../userManager.php');
	require('./dbConnection.php');

  	$user_name = getUsername();

	//Recupero los valores a insertar
	$userId = $user_name;

	$titulo = $_POST['tituloDelete'];
	$titulo = str_replace('%20', ' ', $titulo);
	$src = $_POST['srcDelete'];
	$src = str_replace('%20', ' ', $src);

	$error_code = 0;
	$enlace = dbConnect();
	if($enlace == 1) $error_code = $enlace;

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
	    $error_code = 4;
	}
	// Liberar los recursos asociados con el conjunto de resultados
	// Esto se ejecutado automáticamente al finalizar el script.
	mysql_query("commit", $enlace);
	mysql_close($enlace);

	unlink("." . $src);


	if($errorCode == 0) {
		header('Location: /editor/tfg/home.php?success=2');
	}
	else header('Location: /editor/tfg/home.php?error=' . $error_code);
	
	exit;
	
?>
</body>
</html>