<html>
<head>
<title>Process Uploaded File</title>
</head>
<body>
<?php
	include '../ChromePhp.php';

	//ChromePhp::log("hola");
	//validateForm();
	$success = true;
	$target_path = "../img/admin";
	if($_POST['nombreParticion']) $particion_name = $_POST['nombreParticion'];
	else if($_POST['nombreParticionSelect']) $particion_name = $_POST['nombreParticionSelect'];
	if($_FILES['fileBase']['name'] != "") {
	//Caso en que se sube una base y unas particiiones desde 0
		if($_POST['nombreBase'] != "") $base_name = $_POST['nombreBase'];
		uploadImage($target_path . "/bases", "fileBase", "");
		$path_particiones = "../img/admin/miniaturas/" . $base_name;
		mkdir($path_particiones, 0700);
		$path_particiones = "../img/admin/particiones/" . $base_name;
		mkdir($path_particiones, 0700);
		if($_FILES['fileParticion1']['name'] != "") uploadImage($path_particiones, "fileParticion1", $particion_name . "1.png");
		if($_FILES['fileParticion2']['name'] != "") uploadImage($path_particiones, "fileParticion2", $particion_name . "2.png");
		if($_FILES['fileParticion3']['name'] != "") uploadImage($path_particiones, "fileParticion3", $particion_name . "3.png");
		if($_FILES['fileParticion4']['name'] != "") uploadImage($path_particiones, "fileParticion4", $particion_name . "4.png");
	}
	else {
	//Caso en que se suben las particiones de una base existente
		if($_POST['nombreBaseSelect'] != "") $base_name = $_POST['nombreBaseSelect'];
		$path_particiones = "../img/admin/miniaturas/" . $base_name;
		mkdir($path_particiones, 0700);
		$path_particiones = "../img/admin/particiones/" . $base_name;
		mkdir($path_particiones, 0700);
		if($_FILES['fileParticion1Select']['name'] != "") uploadImage($path_particiones, "fileParticion1Select", $particion_name . "1.png");
		if($_FILES['fileParticion2Select']['name'] != "") uploadImage($path_particiones, "fileParticion2Select", $particion_name . "2.png");
		if($_FILES['fileParticion3Select']['name'] != "") uploadImage($path_particiones, "fileParticion3Select", $particion_name . "3.png");
		if($_FILES['fileParticion4Select']['name'] != "") uploadImage($path_particiones, "fileParticion4Select", $particion_name . "4.png");
	}

	if($_POST['miniatura'] != "") {
		$dataMiniatura = $_POST['miniatura'];
		$dataMiniatura = base64_decode($dataMiniatura);
		$img = imagecreatefromstring($dataMiniatura);
		if ($img !== false) {
			//Con esto eliminamos el fondo negro con el que se guardaba la imagen
			imagealphablending($img, false);
			imagesavealpha($img, true);
			imagepng($img, "../img/admin/miniaturas/" . $base_name . "/" . "prueba.png",9);
			imagedestroy($img);
		}
	}

	if($success) {
		header('Location: /tfg/admin/adminTool.php?success');
	}
	else header('Location: /tfg/admin/adminTool.php?error');
	
	exit;


	function uploadImage($target_path, $file, $name) {
		if($name != "") $tmp_path = $target_path . "/" . $name;
		else $tmp_path = $target_path . "/" . basename($_FILES[$file]['name']);
		if(move_uploaded_file($_FILES[$file]['tmp_name'], $tmp_path)) {
		    echo "El fichero ".  $name. 
		    " se ha subido.";
		} else{
		    echo "Ha habido un error subiendo las imágenes.";
		    $success = false;
		}
	}

	function validateForm() {
		header('Location: /tfg/admin/adminTool.php?error');
	}
	
?>
</body>
</html>