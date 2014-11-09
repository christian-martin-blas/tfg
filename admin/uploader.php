<html>
<head>
<title>Process Uploaded File</title>
</head>
<body>
<?php
	include '../php/utiles.php';
	include '../php/globalLinks.php';

	//ChromePhp::log("hola");
	$errorCode = validateForm();
	$num_particion = 1;
	if($errorCode == 0) {
		$target_path = "../img/admin";
		if($_POST['nombreParticion'] != "") $particion_name = sanear_string(str_replace(' ', '', $_POST['nombreParticion']));
		else if($_POST['nombreParticionSelect'] != "") $particion_name = sanear_string(str_replace(' ', '', $_POST['nombreParticionSelect']));
		else {
			//Caso en que se vaya a subir solo la base
			$base_name = str_replace(' ', '', $_POST['nombreBase']);
			$particion_name = "Vacio";
		}
		if($_FILES['fileBase']['name'] != "") {
		//Caso en que se sube una base y unas particiiones desde 0
			if($_POST['nombreBase'] != "") $base_name = sanear_string(str_replace(' ', '', $_POST['nombreBase']));
			uploadImage($target_path . "/bases", "fileBase", $base_name . ".png");
			$path_particiones = "../img/admin/miniaturas/" . $base_name;
			mkdir($path_particiones, 0700);
			$path_particiones = "../img/admin/particiones/" . $base_name;
			mkdir($path_particiones, 0700);
			if($_FILES['fileParticion1']['name'] != "") {
				$num_particion = 2;
				uploadImage($path_particiones, "fileParticion1", $particion_name . "1.png");
			} 
			if($_FILES['fileParticion2']['name'] != "") {
				$num_particion = 3;
				uploadImage($path_particiones, "fileParticion2", $particion_name . "2.png");
			} 
			if($_FILES['fileParticion3']['name'] != "") {
				$num_particion = 4;
				uploadImage($path_particiones, "fileParticion3", $particion_name . "3.png");
			} 
			if($_FILES['fileParticion4']['name'] != "") {
				$num_particion = 5;
				uploadImage($path_particiones, "fileParticion4", $particion_name . "4.png");
			} 
		}
		else {
		//Caso en que se suben las particiones de una base existente
			if($_POST['nombreBaseSelect'] != "") $base_name = $_POST['nombreBaseSelect'];
			$path_particiones = "../img/admin/miniaturas/" . $base_name;
			mkdir($path_particiones, 0700);
			$path_particiones = "../img/admin/particiones/" . $base_name;
			mkdir($path_particiones, 0700);
			if($_FILES['fileParticion1Select']['name'] != "") {
				$num_particion = 2;
				uploadImage($path_particiones, "fileParticion1Select", $particion_name . "1.png");
			} 
			if($_FILES['fileParticion2Select']['name'] != "") {
				$num_particion = 3;
				uploadImage($path_particiones, "fileParticion2Select", $particion_name . "2.png");
			} 
			if($_FILES['fileParticion3Select']['name'] != "") {
				$num_particion = 4;
				uploadImage($path_particiones, "fileParticion3Select", $particion_name . "3.png");
			} 
			if($_FILES['fileParticion4Select']['name'] != "") {
				$num_particion = 5;
				uploadImage($path_particiones, "fileParticion4Select", $particion_name . "4.png");
			} 
		}

		if($_POST['miniatura'] != "") {
			$dataMiniatura = $_POST['miniatura'];
			$dataMiniatura = base64_decode($dataMiniatura);
			$img = imagecreatefromstring($dataMiniatura);
			if ($img !== false) {
				//Con esto eliminamos el fondo negro con el que se guardaba la imagen
				imagealphablending($img, false);
				imagesavealpha($img, true);
				imagepng($img, "../img/admin/miniaturas/" . $base_name . "/" . $particion_name . $num_particion . ".png",9);
				imagedestroy($img);
			}
		}
	}

	if($errorCode == 0) {
		header('Location: ' . AdminToolUpload . '?success');
	}
	else header('Location: ' . AdminToolUpload . 'error=' . $errorCode);
	
	exit;


	function uploadImage($target_path, $file, $name) {
		if($name != "") $tmp_path = $target_path . "/" . $name;
		else $tmp_path = $target_path . "/" . basename($_FILES[$file]['name']);
		if(!file_exists($tmp_path)) {
			if(move_uploaded_file($_FILES[$file]['tmp_name'], $tmp_path)) {
			    echo "El fichero ".  $name. 
			    " se ha subido.";
			} else{
			    echo "Ha habido un error subiendo las imágenes.";
			    $GLOBALS['errorCode'] = 2;
			}
		}
		else {
			$GLOBALS['errorCode'] = 3;
		}
	}

	function validateForm() {
		$error = 0;
		if($_FILES['fileParticion1']['name'] == "") {
			if($_FILES['fileParticion2']['name'] != "" || $_FILES['fileParticion3']['name'] != "" || $_FILES['fileParticion4']['name'] != "") $error = 1;
		}
		else if($_FILES['fileParticion2']['name'] == "") {
			if($_FILES['fileParticion3']['name'] != "" || $_FILES['fileParticion4']['name'] != "") $error = 1;
		}
		else if($_FILES['fileParticion3']['name'] == "") {
			if($_FILES['fileParticion4']['name'] != "") $error = 1;
		}
		if($_FILES['fileParticion2Select']['name'] == "") {
			if($_FILES['fileParticion3Select']['name'] != "" || $_FILES['fileParticion4Select']['name'] != "") $error = 1;
		}
		else if($_FILES['fileParticion3Select']['name'] == "") {
			if($_FILES['fileParticion4Select']['name'] != "") $error = 1;
		}
		return $error;
	}
	
?>
</body>
</html>