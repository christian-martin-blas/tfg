<html>
<head>
<title>Process Uploaded File</title>
</head>
<body>
<?php
	include './ChromePhp.php';

	//Recupero los valores a insertar
	$userId = "prueba";
	$nombre = $_POST['titulo'];
	$descripcion = $_POST['descripcion'];
	$historia = $_POST['historia'];
	$src = $_POST['srcSave'];
	$public =  isset($_POST['public']) && $_POST['public']  ? "1" : "0";

	$src = base64_decode($src);
	$img = imagecreatefromstring($src);
	if ($img !== false) {
		//Con esto eliminamos el fondo negro con el que se guardaba la imagen
		imagealphablending($img, false);
		imagesavealpha($img, true);
		if(!file_exists("./img/users/" . $userId )) {
			mkdir("./img/users/" . $userId, 0700);
			mkdir("./img/users/" . $userId . "/public", 0700);
			mkdir("./img/users/" . $userId . "/private", 0700);
		}
		if($public) $src = "./img/users/" . $userId . "/public/" . $nombre . ".png";
		else $src = "./img/users/" . $userId . "/private/" . $nombre . ".png";
		imagepng($img, $src ,9);
		imagedestroy($img);
	}


	/*ChromePhp::log($nombre);
	ChromePhp::log($descripcion);
	ChromePhp::log($historia);
	ChromePhp::log($src);
	ChromePhp::log($public);*/

	$error_code = 0;
	$enlace =  mysql_connect('localhost', 'root', 'root');
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
	$insert = "INSERT INTO escudo VALUES ('%s',' %s', '%s', '%s', '%s', %b)";
	$consulta = sprintf($insert, $userId, $nombre, $descripcion, $historia, $src, $public);
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