<?php
  function addBases() {
    $dir    = '../../img/admin/bases';
    $dir_src = './img/admin/bases';
    $files = scandir($dir);
    foreach ($files as &$file) {
      if($file != '.' && $file != '..') {
        $base_name = substr($file, 0, -4);
        echo("<div id=" . "'base" . $base_name . "' class='divDesign' onClick='displayParticiones(this)''>");
        echo("<img src='" . $dir_src . "/" . $file . "' class='design'>");
        echo("</div>");
      }
    }
  }

  function addParticiones() {
    //Añade las particiones para una base añadida por el admin    
    $dir    = '../../img/admin/miniaturas';
    $dir_src    = './img/admin/miniaturas';
    $files = scandir($dir);
    foreach ($files as &$file) {
      if($file != '.' && $file != '..') {
        echo("<div id ='particiones" . $file . "' class='particiones'>");
        echo("<h4>Particiones</h4>");
        echo("<div id='imagenesParticiones'>");
        $deep_dir = $dir . "/" . $file;
        $deep_dir_src = $dir_src . "/" . $file;
        $deep_files = scandir($deep_dir);
        foreach ($deep_files as &$deep_file) {
          if($deep_file != '.' && $deep_file != '..') {
            $particion_name = substr($deep_file, 0, -4);
            echo("<div id='particion" . $particion_name . "' class='divDesign' onClick='displayColores(this)'>");
            echo("<img src='" . $deep_dir_src  . "/" . $deep_file . "' class='design'>");
            echo("</div>");
          }
        }
        echo("</div>");
        echo("</div>");
      }
    }
    
  }

  function addParticionesBaseCreada($base) {
    //Aqui se añadiran las particiones añadidas por el admin para una base ya creada.
    $dir = '../../img/admin/miniaturas';
    $dir_src = './img/admin/miniaturas';
    $files = scandir($dir);
    foreach ($files as &$file) {
      if($file != '.' && $file != '..' && $file == $base) {
        $deep_files = scandir($dir . "/" . $base);
        foreach ($deep_files as $deep_file) {
          if($deep_file != '.' && $deep_file != '..') {
            $particion_name = substr($deep_file, 0, -4);
            echo("<div id='particion" . $particion_name . "' class='divDesign' onClick='displayColores(this)''>");
            echo("<img src='" . $dir_src . "/" . $base . "/" . $deep_file . "' class='design'>");
            echo("</div>");
          }
        }
      }
    }
  }
?>