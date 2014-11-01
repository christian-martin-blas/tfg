<?php

	function dbConnect(){
		$enlace =  mysql_connect('localhost', 'regularUser', '');
		if (!$enlace) {
		    $erroc_code = 1;
		}
		$bd_seleccionada = mysql_select_db('tfg', $enlace);
		return $enlace;
	}
?>