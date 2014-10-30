<?php
	if(isset($_GET['success'])) {
		$success = $_GET['success'];
		echo '<script language="javascript">';
		if($success == 1) echo '$("<div title=\'Información\'><b>Se ha guardado correctamente el escudo.</b></div>").dialog({
		                                                          modal: true,
		                                                          buttons: {
		                                                            Ok: function() {
		                                                              $( this ).dialog( "close" );
		                                                            }
		                                                          }
		                                                        });';
		if($success == 2) echo '$("<div title=\'Información\'><b>Se ha borrado correctamente el escudo.</b></div>").dialog({
		                                                          modal: true,
		                                                          buttons: {
		                                                            Ok: function() {
		                                                              $( this ).dialog( "close" );
		                                                            }
		                                                          }
		                                                        });';
		echo '</script>';
		}
	else if(isset($_GET['error'])) {
		$error = $_GET['error'];
		//Se ha subido una particion sin subir otra antes.
		echo '<script language="javascript">';
		if($error == 1) echo '$("<div title=\'Atención\'><b>No se ha podido conectar con la Base de datos.</b></div>").dialog({
		                                                          modal: true,
		                                                          buttons: {
		                                                            Ok: function() {
		                                                              $( this ).dialog( "close" );
		                                                            }
		                                                          }
		                                                        });';
		if($error == 2) echo '$("<div title=\'Atención\'><b>No se ha podido guardar en la Base de datos.</b></div>").dialog({
		                                                          modal: true,
		                                                          buttons: {
		                                                            Ok: function() {
		                                                              $( this ).dialog( "close" );
		                                                            }
		                                                          }
		                                                        });';
		if($error == 3) echo '$("<div title=\'Atención\'><b>Ya existe un escudo con ese nombre.</b></div>").dialog({
		                                                          modal: true,
		                                                          buttons: {
		                                                            Ok: function() {
		                                                              $( this ).dialog( "close" );
		                                                            }
		                                                          }
		                                                        });';
		if($error == 4) echo '$("<div title=\'Atención\'><b>No se ha podido borrar el escudo de la Base de datos.</b></div>").dialog({
		                                                          modal: true,
		                                                          buttons: {
		                                                            Ok: function() {
		                                                              $( this ).dialog( "close" );
		                                                            }
		                                                          }
		                                                        });';
	}
?>