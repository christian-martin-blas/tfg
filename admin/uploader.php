<html>
<head>
<title>Process Uploaded File</title>
</head>
<body>
<?php
	include '../ChromePhp.php';

	//ChromePhp::log($_POST['nombreBase']);

	$target_path = "../img/admin";
	if($_FILES['fileBase']['name'] != "") {
	//Caso en que se sube una base y unas particiiones desde 0
		if($_POST['nombreBase'] != "") $base_name = $_POST['nombreBase'];
		uploadImage($target_path . "/bases", "fileBase");
		$path_particiones = "../img/admin/miniaturas/" . $base_name;
		ChromePHP::log(mkdir($path_particiones, 0700));
		if($_FILES['fileMiniatura']['name'] != "") uploadImage("../img/admin/miniaturas/" . $base_name . "/", "fileMiniatura");
		$path_particiones = "../img/admin/particiones/" . $base_name;
		ChromePHP::log(mkdir($path_particiones, 0700));
		if($_FILES['fileParticion1']['name'] != "") uploadImage($path_particiones, "fileParticion1");
		if($_FILES['fileParticion2']['name'] != "") uploadImage($path_particiones, "fileParticion2");
		if($_FILES['fileParticion3']['name'] != "") uploadImage($path_particiones, "fileParticion3");
		if($_FILES['fileParticion4']['name'] != "") uploadImage($path_particiones, "fileParticion4");
	}
	else {
		//Caso en que se suben las particiones de una base existente
	}
	header('Location: /tfg/admin/adminTool.php');
	exit;

	function uploadImage($target_path, $file) {
		$tmp_path = $target_path . "/" . basename($_FILES[$file]['name']);
		if(move_uploaded_file($_FILES[$file]['tmp_name'], $tmp_path)) {
		    echo "El fichero ".  basename( $_FILES[$file]['name']). 
		    " se ha subido.";
		} else{
		    echo "Ha habido un error subiendo las imágenes.";
		}
	}
?>
</body>
</html>