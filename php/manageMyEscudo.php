<html>
<head>
<title>Process Uploaded File</title>
</head>
<body>
<?php
	include './ChromePhp.php';
	require('./dbConnection.php');
	require('../userManager.php');

  	$userId = getUsername();
	//Recupero los valores a insertar
	if(isset($_POST['publishButton'])) $public = 1;
	else $public = 0;
	$titulo = $_POST['tituloMyManage'];
	$titulo = str_replace('%20', ' ', $titulo);

	$error_code = 0;
	$enlace = dbConnect();
	if($enlace == 1) $error_code = $enlace;

	//Meter los valores con %s%
	$update = "UPDATE escudo SET public = %b WHERE titulo = '%s' AND userId = '%s'";
	$consulta = sprintf($update, $public, $titulo, $userId);
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
		if($public == 1) header('Location: /editor/tfg/home.php?success=4');
		else header('Location: /editor/tfg/home.php?success=3');
	}
	else header('Location: /editor/tfg/home.php?error=' . $error_code);
	
	exit;
	
?>
</body>
</html>