<html>
<head>
<title>Process Uploaded File</title>
</head>
<body>
<?php
	include '../ChromePhp.php';

	/*ChromePhp::log($_POST['src']);
	ChromePhp::log($_POST['imgName']);*/

	$bool_base = strpos($_POST['src'],'bases');
	if($bool_base != false) {
		//Hay que borrar la base, la miniatura y sus particiones
		if(strpos($_POST['src'],'admin') != false) {
			$src = ".." . substr($_POST['src'],20);
			unlink($src);
		}
		$base_name = $_POST['imgName'];
		$src = "../img/admin/particiones/" . $base_name;
		removeFiles($src);
		$src = "../img/admin/miniaturas/" . $base_name;
		removeFiles($src);
	}
	else {
		//Hay que eliminar la miniatura y sus particiones
		$src = ".." . substr($_POST['src'],20);
		unlink($src);
		$base_name = $_POST['imgNameBase'];
		$particion_name = substr($_POST['imgName'], 0, -1);
		$src = "../img/admin/particiones/" . $base_name . "/";
		unlink($src . $particion_name . "1.png");
		unlink($src . $particion_name . "2.png");
		unlink($src . $particion_name . "3.png");
		unlink($src . $particion_name . "4.png");
		unlink($src . $particion_name . "5.png");
	}
	
	

	header('Location: /tfg/admin/adminToolDelete.php?success');
	exit;

	function removeFiles($dir) {
		$files = scandir($dir);
		 foreach ($files as &$file) {
          if($file != '.' && $file != '..') {
          	unlink($dir . "/" . $file);
          }
      }
	}
	
?>
</body>
</html>