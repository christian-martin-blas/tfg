<html>
<head>
<title>Process Uploaded File</title>
</head>
<body>
<?php
	require('../userManager.php');
	require('./dbConnection.php');
  	$user_name = getUsername();

	//Recupero los valores a insertar
	$userId = $user_name;
	$nombre = $_POST['titulo'];
	$descripcion = $_POST['descripcion'];
	$historia = $_POST['historia'];
	$src = $_POST['srcSave'];
	$public =  isset($_POST['public']) && $_POST['public']  ? "1" : "0";

	if(!file_exists("./img/users/" . $userId . "/public/" . $nombre . ".png") && !file_exists("./img/users/" . $userId . "/private/" . $nombre . ".png")) {

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


		$enlace = dbConnect();
		if($enlace == 1) $error_code = $enlace;

		//Meter los valores con %s%
		$insert = "INSERT INTO escudo VALUES ('%s','%s', '%s', '%s', '%s', %b)";
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

		// Liberar los recursos asociados con el conjunto de resultados
		// Esto se ejecutado automáticamente al finalizar el script.
		mysql_free_result($resultado);
		mysql_close($enlace);
	}
	else {
		$error_code = 3;
	} 

	$temp_file = fopen("./tempFile.txt", "w") or die("Unable to open file!");
	fwrite($temp_file, $_POST['srcSave']);
	fclose($temp_file);

	if($error_code == 0) {
		header('Location: /editor/tfg/index.php?success=1');
	}
	else header('Location: /editor/tfg/index.php?error=' . $error_code);
	
	exit;
	
?>
</body>
</html>