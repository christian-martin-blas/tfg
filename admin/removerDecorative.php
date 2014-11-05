<html>
<head>
<title>Process Uploaded File</title>
</head>
<body>
<?php
	include '../ChromePhp.php';

	if($_POST['isDefault'] == "true") $src = "../img/decoraciones/" . $_POST['decorativeGroup'] . "/" . $_POST['imgName'] . ".png";
	else $src = "../img/admin/decoraciones/" . $_POST['decorativeGroup'] . "/" . $_POST['imgName'] . ".png";
	unlink($src);
	
	header('Location: /editor/tfg/admin/adminToolDeleteDecorative.php?success');
	exit;
	
?>
</body>
</html>