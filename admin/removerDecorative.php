<html>
<head>
<title>Process Uploaded File</title>
</head>
<body>
<?php
	include '../ChromePhp.php';

	$src = "../img/admin/decoraciones/" . $_POST['decorativeGroup'] . "/" . $_POST['imgName'] . ".png";
	unlink($src);
	
	header('Location: /tfg/admin/adminToolDeleteDecorative.php?success');
	exit;
	
?>
</body>
</html>