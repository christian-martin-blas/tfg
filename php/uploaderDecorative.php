<html>
<head>
<title>Process Uploaded File</title>
</head>
<body>
<?php
	include '../ChromePhp.php';
	include '../php/utiles.php';
	include '../php/globalLinks.php';

	$target_path = "../img/admin/decoraciones/";
	if($_POST['nameImage'] != "") $image_name = sanear_string(str_replace(' ', '', $_POST['nameImage']));
	$errorCode = uploadImage($target_path . $_POST['decorativeGroup'], "fileImage", $image_name . ".png");

	if($errorCode == 0) {
		header('Location: ' . AdminToolUploadDecorative . '?success');
	}
	else header('Location: ' . AdminToolUploadDecorative . '?error=' . $errorCode);
	
	exit;


	function uploadImage($target_path, $file, $name) {
		if($name != "") $tmp_path = $target_path . "/" . $name;
		else $tmp_path = $target_path . "/" . basename($_FILES[$file]['name']);
		if(!file_exists($tmp_path)) {
			if(move_uploaded_file($_FILES[$file]['tmp_name'], $tmp_path)) {
			    echo "El fichero ".  $name. 
			    " se ha subido.";
			    return 0;
			} else{
			    echo "Ha habido un error subiendo las imágenes.";
			    return 2;
			}
		}
		else {
			return 3;
		}
	}

?>
</body>
</html>