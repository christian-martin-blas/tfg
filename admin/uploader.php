<html>
<head>
<title>Process Uploaded File</title>
</head>
<body>
<?php
	include '../ChromePhp.php';

	//ChromePhp::log($_FILES['fileBase']['name'] == "");

	$target_path = "../img/admin";
	if($_FILES['fileBase']['name'] != "") {
	//Caso en que se sube una base y unas particiiones desde 0
		$base_name = substr($_FILES['fileBase']['name'], 0, -4);
		ChromePhp::log($base_name);
		uploadImage($target_path . "/bases", "fileBase");
		$path_particiones = "../img/admin/particiones/" . $base_name;
		mkdir($path_particiones, 0700);
		if($_FILES['fileMiniatura']['name'] != "") uploadImage($path_particiones, "fileMiniatura");
		if($_FILES['fileParticion1']['name'] != "") uploadImage($path_particiones, "fileParticion1");
		if($_FILES['fileParticion2']['name'] != "") uploadImage($path_particiones, "fileParticion2");
		if($_FILES['fileParticion3']['name'] != "") uploadImage($path_particiones, "fileParticion3");
		if($_FILES['fileParticion4']['name'] != "") uploadImage($path_particiones, "fileParticion4");
	}
	else {
		//Caso en que se suben las particiones de una base existente
	}

	function uploadImage($target_path, $file) {
		$tmp_path = $target_path . "/" . basename($_FILES[$file]['name']);
		ChromePhp::log($tmp_path);
		if(move_uploaded_file($_FILES[$file]['tmp_name'], $tmp_path)) {
		    echo "The file ".  basename( $_FILES[$file]['name']). 
		    " has been uploaded";
		} else{
		    echo "There was an error uploading the file, please try again!";
		}
	}
?>
</body>
</html>