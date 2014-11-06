<!DOCTYPE HTML>
<meta charset="utf-8"> 
<html>
  <head>
    

      <script src="./lib/js/jquery-1.11.0.min.js"></script>
      <link rel="stylesheet" href="./lib/css/redmond/jquery-ui-1.10.4.custom.css">
      <link rel="stylesheet" type="text/css" href="./lib/css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="./lib/css/jquery.simplecolorpicker.css">
      <link rel="stylesheet" type="text/css" href="./lib/css/jquery.simplecolorpicker-glyphicons.css">

      <script src="./lib/js/bootstrap.js"></script>
      <script src="./lib/js/jquery-ui-1.10.4.custom.js"></script>
      <script src="./lib/js/jquery.simplecolorpicker.js"></script>
      <script src="./lib/js/fabric.js"></script>
      <script src="./lib/js/jquery.ui.widget.js"></script>
      <script src="./lib/js/jquery.iframe-transport.js"></script>
      <script src="./lib/js/jquery.fileupload.js"></script>
      <script src="./lib/js/utiles.js"></script>

      <title>Editor de escudos</title>
    <?php
      include './ChromePhp.php';
      include('../userManager.php');
      $user_name = getUsername();
      $isAdmin = isAdmin();
    ?>

      <style>
      td {
        padding: 6px;
      }
      html {
        max-width: 1500px;
      }
      #container {
        background-color: #D6EBF9;
        width: 800px;
      }
      #saveContainer {
        background-color: #D6EBF9;
        width: auto;
      }
      #loadContainer {
        background-color: #D6EBF9;
        width: auto;
        height: 570px;
      }
      #manageContainer {
        background-color: #D6EBF9;
        width: auto;
        height: 570px;
      }
      .page-header {
        text-align: center;
      }
      #designs {
        height: 100%;
      }
      img.design {
        width: 100%;
        cursor: pointer;
        padding-bottom: 5px;
      }
      img.escudo {
        width: 100%;
        cursor: pointer;
        padding-bottom: 5px;
      }
      img {
        max-width: 100%;
        max-height: 100%;
      }
      #imagenesFormas {
        background-color: white;
        height: 100px;
        width: 100%;
        overflow-y: scroll;
      }
      #imagenesEscudos {
        background-color: white;
        height: 300px;
        width: 100%;
        overflow-y: scroll;
      }
      #misEscudos {
        background-color: white;
        height: 150px;
        width: 100%;
        overflow-y: scroll;
      }
      .particiones {
        display: none;
      }
      #imagenesParticiones {
        background-color: white;
        height: 100px;
        width: 100%;
        overflow-y: scroll;
      }
      .colores {
        display: none;
      }
      #imagenesColores {
        background-color: white;
        height: 100px;
        width: 100%;
        overflow-y: scroll;
        margin-bottom: 10px;
      }
      #previsualization {
        background-color: white;
        height: 350px;
        margin-top: 40px;
        margin-bottom: 40px;
      }
      #previsualizationSave {
        background-color: white;
        height: 350px;
        margin-top: 40px;
        margin-bottom: 40px;
        margin-left: 80px;
      }
      #previsualizationLoad {
        background-color: white;
        height: 350px;
        margin-top: 130px;
        margin-left: 50px;
      }
      #previsualizationManage {
        background-color: white;
        height: 350px;
        margin-top: 130px;
        margin-left: 50px;
      }
      #back {
        position: absolute;
        left: 50%;
        top: 50%; 
        margin-left: -110px;
        margin-top: -110px;
      }
      #part1 {
        position: absolute;
        left: 50%;
        top: 50%; 
        margin-left: -110px;
        margin-top: -110px;
      }
      #part2 {
        position: absolute;
        left: 50%;
        top: 50%; 
        margin-left: -110px;
        margin-top: -110px;
      }
      #part3 {
        position: absolute;
        left: 50%;
        top: 50%; 
        margin-left: -110px;
        margin-top: -110px;
      }
      #colorParticion1 {
        padding: 5px;
        display: none;
      }
      #colorParticion2 {
        padding: 5px;
        display: none;
      }
      #colorParticion3 {
        padding: 5px;
        display: none;
      }
      #colorParticion4 {
        padding: 5px;
        display: none;
      }
      #colorParticion5 {
        padding: 5px;
        display: none;
      }
      #workspace {
        width: 800px;
        height: 350px;
        background-color: #F7FAFC;
        display: inline-block;
      }
      #shield {
        display: block;
        margin-left: auto;
        margin-right: auto;
        margin-top: 50px;
      }
      #accordion {
        padding: 10px;
        margin-top: 100px;
        width: 100%;
        height: 100%;
        font-size: 12px;
      }
      img.figures {
        height: 75px;
        padding: 5px;
        cursor: pointer;
        display:block;
        margin:auto;
      }
      .controls { 
        float: left;
        background: #EAF5FE; 
        padding-bottom: 15px; 
        padding-left: 15px; 
        padding-right: 15px; 
        border-right: 5px solid #333333; 
        border-top: 5px solid #333333; 
        border-bottom: 5px solid #333333; 
        height: 350px 
      }
      #mainCanvas {
        border-style: solid;
        border-width: 5px;
      }
      .canvas-container {
        float: left;
        background-color: white;
      }
      .icons {
        height: 30px;
        width: 30px;
        cursor: pointer;
      }
      .button {
        float: left;
        background: #77AEFF; 
        margin-left: 2px;
        margin-right: 2px;
        margin-bottom: 30px;
        border-bottom: 2px solid;
        border-left: 2px solid;
        border-right: 2px solid;
      }
      #images {
        background-color: #F2F9FF;
      }
      #fileUploadDiv {
        border-style: groove;
        width: 325px;
        margin-left: 10px;
        margin-top: 10px;
      }
      #progress_bar {
        margin: 10px 0;
        padding: 3px;
        border: 1px solid #000;
        font-size: 14px;
        clear: both;
        opacity: 0;
        -moz-transition: opacity 1s linear;
        -o-transition: opacity 1s linear;
        -webkit-transition: opacity 1s linear;
      }
      #progress_bar.loading {
        opacity: 1.0;
      }
      #progress_bar .percent {
        background-color: #99ccff;
        height: auto;
        width: 0;
      }
      #files {
        font-size: 13px;
        margin: 5px;
      }
      #abortUpload {
        font-size: 13px;
        margin: 5px;
        display: none;
      }
      #uploadButtons {
        padding: 5px;
      }
      #formDiv {
        margin-top: 40px;
      }
      #leftMenu {
        margin-left: 250px;
      }
      #buttons {
        margin-top: 150px;
      }
      #decorativeImages {
        max-height: 600px;
      }
      #escudo {
        position: absolute;
      }
      #srcSave {
        display: none;
      }
      #submitHidden {
        display: none;
      }
      div.divEscudo {
        width: 100px;
        float: left;
      }
      #escudoPrevisualization {
        margin-left: 50px;
      }
      #oldSrc {
        display: none;
      }
      #deleteButton {
        margin-right: 35px;
        margin-top: 20px;
        float: right;
      }
      #publishButton {
        margin-right: 35px;
        margin-top: 20px;
        float: right;
      }
      #unpublishButton {
        margin-right: 35px;
        margin-top: 20px;
        float: right;
      }
      #mainTool {
        height: 750px;
      }
      body {
        background-color: #F7FAFC;
      }
      .divDesign {
        width: 38px;
        height: 42px;
        margin-left: 18px;
        float: left;
      }
      #homeNavAdmin {
        display: none;
      }
      #homeNav {
        display: none;
      }
      .divFigure {
        width: 120px;
        float: left;
      }
      #buttonPopUpManage {
        display: none;
      }
      #manageEscudo {
        margin-top: 50px;
      }
      .ui-dialog {
            background: #D6EBF9 !important
      }

    </style>

  </head>
  <body>

    <?php
      //Utilizado para que la gente haga login, redirige a la Home Page
      if(is_null($user_name))  {
        echo "<script>javascript:alert('No has hecho log in.'); window.location = '/editor'</script>";       
      }
      
      function loadDecoraciones($group, $index) {
        $dir    = './img/admin/decoraciones/' . $group ;
        $files = scandir($dir);
        foreach ($files as &$file) {
          if($file != '.' && $file != '..') {
            $file_name = substr($file, 0, -4);
            echo("<div id='" . $group . $index . "' class='divFigure'>");
            echo("<img id='" . $file_name . "' src='" . $dir . "/" . $file . "' class='figures' onClick='addImage(this)'/>");
            echo("</div>");
            $index = $index + 1;
          }
        }
      }
      function oldSrc() {
        if(isset($_GET['error']) || isset($_GET['success'])) {
          if(file_exists("./tempFile.txt")) {
            $temp_file = fopen("./tempFile.txt", "r") or die("Unable to open file!");
            $src = fread($temp_file,filesize("./tempFile.txt"));
            echo("<input type='text' id='oldSrc' name='oldSrc' value='" . $src . "'/>");  
            fclose($temp_file);
            unlink("./tempFile.txt");
            return $src;
          }
        }
      }
    ?>


    <div id="mainTool">

      <div id="leftMenu" class="col-md-3">
        <div id="images">
          <div id ="decorativeImages">
            <div id="accordion">
              <h3>Imágenes Animales</h3>
              <div id="animales">
                <div id="animales1" class="divFigure">
                  <img id="aguila" src="./img/decoraciones/animales/aguila.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="animales2" class="divFigure">
                  <img id="cabrapie" src="./img/decoraciones/animales/cabrapie.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="animales3" class="divFigure">
                  <img id="halcon" src="./img/decoraciones/animales/halcon.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="animales4" class="divFigure">
                  <img id="leon" src="./img/decoraciones/animales/leon.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="animales5" class="divFigure">
                  <img id="aguila1" src="./img/decoraciones/animales/aguila1.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="animales6" class="divFigure">
                  <img id="cabra" src="./img/decoraciones/animales/cabra.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="animales7" class="divFigure">
                  <img id="ciervo" src="./img/decoraciones/animales/ciervo.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="animales8" class="divFigure">
                  <img id="ciguena" src="./img/decoraciones/animales/ciguena.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="animales9" class="divFigure">
                  <img id="cordero" src="./img/decoraciones/animales/cordero.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="animales10" class="divFigure">
                  <img id="garza" src="./img/decoraciones/animales/garza.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="animales11" class="divFigure">
                  <img id="guepardo" src="./img/decoraciones/animales/guepardo.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="animales12" class="divFigure">
                  <img id="oso" src="./img/decoraciones/animales/oso.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="animales13" class="divFigure">
                  <img id="toro" src="./img/decoraciones/animales/toro.png" class="figures" onClick="addImage(this)"/>
                </div>
                <?php
                  loadDecoraciones("animales", 14);
                ?>
              </div>
              <h3>Imágenes Artificiales</h3>
              <div id="artificiales">
                <div id="artificiales1" class="divFigure">
                  <img id="baculo" src="./img/decoraciones/artificiales/baculo.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="artificiales2" class="divFigure">
                  <img id="balanza" src="./img/decoraciones/artificiales/balanza.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="artificiales3" class="divFigure">
                  <img id="castillo" src="./img/decoraciones/artificiales/castillo.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="artificiales4" class="divFigure">
                  <img id="espada" src="./img/decoraciones/artificiales/espada.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="artificiales5" class="divFigure">
                  <img id="iglesia" src="./img/decoraciones/artificiales/iglesia.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="artificiales6" class="divFigure">
                  <img id="llaveoro" src="./img/decoraciones/artificiales/llaveoro.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="artificiales7" class="divFigure">
                  <img id="llaveplata" src="./img/decoraciones/artificiales/llaveplata.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="artificiales8" class="divFigure">
                  <img id="muro" src="./img/decoraciones/artificiales/muro.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="artificiales9" class="divFigure">
                  <img id="palacio" src="./img/decoraciones/artificiales/palacio.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="artificiales10" class="divFigure">
                  <img id="pozo" src="./img/decoraciones/artificiales/pozo.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="artificiales11" class="divFigure">
                  <img id="torre" src="./img/decoraciones/artificiales/torre.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="artificiales12" class="divFigure">
                  <img id="torretorreada" src="./img/decoraciones/artificiales/torretorreada.png" class="figures" onClick="addImage(this)"/>
                </div>
                <?php
                  loadDecoraciones("artificiales", 13);
                ?>
              </div>
              <h3>Imágenes Naturales</h3>
              <div id="naturales">
                <div id="naturales1" class="divFigure">
                  <img id="concha" src="./img/decoraciones/naturales/concha.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="naturales2" class="divFigure">
                  <img id="hoguera" src="./img/decoraciones/naturales/hoguera.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="naturales3" class="divFigure">
                  <img id="lluna" src="./img/decoraciones/naturales/lluna.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="naturales4" class="divFigure">
                  <img id="llunafigurada" src="./img/decoraciones/naturales/llunafigurada.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="naturales5" class="divFigure">
                  <img id="mano" src="./img/decoraciones/naturales/mano.png" class="figures" onClick="addImage(this)"/>
                </div>
                <?php
                  loadDecoraciones("naturales", 6);
                ?>
              </div>

              <h3>Imágenes Vegetales</h3>
              <div id="vegetales">
                <div id="vegetales1" class="divFigure">
                  <img id="arbol" src="./img/decoraciones/vegetales/arbol.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="vegetales2" class="divFigure">
                  <img id="cebolla" src="./img/decoraciones/vegetales/cebolla.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="vegetales3" class="divFigure">
                  <img id="granado" src="./img/decoraciones/vegetales/granado.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="vegetales4" class="divFigure">
                  <img id="manzano" src="./img/decoraciones/vegetales/manzano.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="vegetales5" class="divFigure">
                  <img id="palma" src="./img/decoraciones/vegetales/palma.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="vegetales6" class="divFigure">
                  <img id="palmasentrelazadas" src="./img/decoraciones/vegetales/palmasentrelazadas.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="vegetales7" class="divFigure">
                  <img id="palmera" src="./img/decoraciones/vegetales/palmera.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="vegetales8" class="divFigure">
                  <img id="pera" src="./img/decoraciones/vegetales/pera.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="vegetales9" class="divFigure">
                  <img id="pina" src="./img/decoraciones/vegetales/pina.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="vegetales10" class="divFigure">
                  <img id="trigo" src="./img/decoraciones/vegetales/trigo.png" class="figures" onClick="addImage(this)"/>
                </div>
                <?php
                  loadDecoraciones("vegetales", 11);
                ?>
              </div>

              <h3>Muebles</h3>
              <div id="muebles">
                <div id="muebles1" class="divFigure">
                  <img id="cruzblanca" src="./img/decoraciones/muebles/cruzblanca.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="muebles2" class="divFigure">
                  <img id="cruzgriegablanca" src="./img/decoraciones/muebles/cruzgriegablanca.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="muebles3" class="divFigure">
                  <img id="cruzgriegaplata" src="./img/decoraciones/muebles/cruzgriegaplata.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="muebles4" class="divFigure">
                  <img id="cruzmaltablanca" src="./img/decoraciones/muebles/cruzmaltablanca.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="muebles5" class="divFigure">
                  <img id="cruzmaltaplata" src="./img/decoraciones/muebles/cruzmaltaplata.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="muebles6" class="divFigure">
                  <img id="estrella5amarilla" src="./img/decoraciones/muebles/estrella5amarilla.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="muebles7" class="divFigure">
                  <img id="estrella5blanca" src="./img/decoraciones/muebles/estrella5blanca.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="muebles8" class="divFigure">
                  <img id="estrella6amarilla" src="./img/decoraciones/muebles/estrella6amarilla.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="muebles9" class="divFigure">
                  <img id="estrella6blanca" src="./img/decoraciones/muebles/estrella6blanca.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="muebles10" class="divFigure">
                  <img id="estrella8amarilla" src="./img/decoraciones/muebles/estrella8amarilla.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="muebles11" class="divFigure">
                  <img id="estrella8blanca" src="./img/decoraciones/muebles/estrella8blanca.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="muebles12" class="divFigure">
                  <img id="flordelis" src="./img/decoraciones/muebles/flordelis.png" class="figures" onClick="addImage(this)"/>
                </div>
                <?php
                  loadDecoraciones("muebles", 13);
                ?>
              </div>

              <h3>Piezas</h3>
              <div id="piezas">
                <div id="piezas1" class="divFigure">
                  <img id="dibujo" src="./img/decoraciones/piezas/dibujo.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="piezas2" class="divFigure">
                  <img id="fajaondadaazul" src="./img/decoraciones/piezas/fajaondadaazul.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="piezas3" class="divFigure">
                  <img id="fajaondadaplata" src="./img/decoraciones/piezas/fajaondadaplata.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="piezas4" class="divFigure">
                  <img id="fajaviperadaamrilla" src="./img/decoraciones/piezas/fajaviperadaamrilla.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="piezas5" class="divFigure">
                  <img id="fajaviperadaroja" src="./img/decoraciones/piezas/fajaviperadaroja.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="piezas6" class="divFigure">
                  <img id="fajaviperadazul" src="./img/decoraciones/piezas/fajaviperadazul.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="piezas7" class="divFigure">
                  <img id="gaiaazul" src="./img/decoraciones/piezas/gaiaazul.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="piezas8" class="divFigure">
                  <img id="gaiaroja" src="./img/decoraciones/piezas/gaiaroja.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="piezas9" class="divFigure">
                  <img id="gaiaverde" src="./img/decoraciones/piezas/gaiaverde.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="piezas10" class="divFigure">
                  <img id="llamaamarilla" src="./img/decoraciones/piezas/llamaamarilla.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="piezas11" class="divFigure">
                  <img id="llamablanca" src="./img/decoraciones/piezas/llamablanca.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="piezas12" class="divFigure">
                  <img id="perlaondada" src="./img/decoraciones/piezas/perlaondada.png" class="figures" onClick="addImage(this)"/>
                </div>
                <?php
                  loadDecoraciones("piezas", 13);
                ?>
              </div>

              <h3>Soportes</h3>
              <div id="soportes">
                <div id="soportes1" class="divFigure">
                  <img id="ala1_left" src="./img/decoraciones/soportes/ala1_left.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="soportes2" class="divFigure">
                  <img id="ala1_right" src="./img/decoraciones/soportes/ala1_right.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="soportes3" class="divFigure">
                  <img id="columna1oro" src="./img/decoraciones/soportes/columna1oro.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="soportes4" class="divFigure">
                  <img id="columna1plata" src="./img/decoraciones/soportes/columna1plata.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="soportes5" class="divFigure">
                  <img id="columna2" src="./img/decoraciones/soportes/columna2.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="soportes6" class="divFigure">
                  <img id="columna2oro" src="./img/decoraciones/soportes/columna2oro.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="soportes7" class="divFigure">
                  <img id="columna2plata" src="./img/decoraciones/soportes/columna2plata.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="soportes8" class="divFigure">
                  <img id="leon1" src="./img/decoraciones/soportes/leon1.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="soportes9" class="divFigure">
                  <img id="leon2" src="./img/decoraciones/soportes/leon2.png" class="figures" onClick="addImage(this)"/>
                </div>
                <?php
                  loadDecoraciones("soportes", 10);
                ?>
              </div>

              <h3>Timbres</h3>
              <div id="timbres">
                <div id="timbres1" class="divFigure">
                  <img id="coronabaron" src="./img/decoraciones/timbres/coronabaron.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="timbres2" class="divFigure">
                  <img id="coronaciudad" src="./img/decoraciones/timbres/coronaciudad.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="timbres3" class="divFigure">
                  <img id="coronacomarca" src="./img/decoraciones/timbres/coronacomarca.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="timbres4" class="divFigure">
                  <img id="coronaduque" src="./img/decoraciones/timbres/coronaduque.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="timbres5" class="divFigure">
                  <img id="coronainfante" src="./img/decoraciones/timbres/coronainfante.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="timbres6" class="divFigure">
                  <img id="coronaprincipe" src="./img/decoraciones/timbres/coronaprincipe.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="timbres7" class="divFigure">
                  <img id="coronareal" src="./img/decoraciones/timbres/coronareal.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="timbres8" class="divFigure">
                  <img id="coronarovincia" src="./img/decoraciones/timbres/coronarovincia.png" class="figures" onClick="addImage(this)"/>
                </div>
                <div id="timbres9" class="divFigure">
                  <img id="coronasenor" src="./img/decoraciones/timbres/coronasenor.png" class="figures" onClick="addImage(this)"/>
                </div>
                <?php
                  loadDecoraciones("timbres", 10);
                ?>
              </div>
            </div>
          </div>
          <div id="fileUploadDiv">
            <div id="uploadButtons">
              <h4 style="text-align: center">Cargar una imagen decorativa</h4>
              <input type="file" id="files" name="file" />
              <button id="abortUpload" onclick="abortRead();">Cancelar la subida</button>
              <div id="progress_bar"><div class="percent">0%</div></div>
            </div>
          </div>
      </div>
      </div>

      <div class="col-md-7">
        <ul id="homeNavAdmin" class="nav nav-pills">
          <li><a href="/editor/">Home</a></li>
          <li><a href="/editor/tfg/">Galería</a></li>
          <li class="active">
            <a href="/editor/tfg/home.php">Editor</a>
          </li>
          <li><a href="/editor/tfg/admin/adminToolUpload.php">Cargar Bases</a></li>
          <li><a href="/editor/tfg/admin/adminToolDelete.php">Eliminar Bases</a></li>
          <li><a href="/editor/tfg/admin/adminToolUploadDecorative.php">Cargar Decoraciones</a></li>
          <li><a href="/editor/tfg/admin/adminToolDeleteDecorative.php">Eliminar Decoraciones</a></li>
        </ul>
        <ul id="homeNav" class="nav nav-pills">
          <li><a href="/editor/">Home</a></li>
          <li><a href="/editor/tfg/">Galería</a></li>
          <li class="active">
            <a href="/editor/tfg/home.php">Editor</a>
          </li>
        </ul>
        <div id="buttons" class="btn-group">
          <button id="buttonPopUp" onclick="openPopUp('open')" class="btn btn-default">Nuevo Escudo</button>
          <button id="buttonPopUpSave" onclick="openPopUp('save')" class="btn btn-default">Guardar Escudo</button>
          <button id="buttonPopUpLoad" onclick="openPopUp('load')" class="btn btn-default">Cargar Escudo</button>
          <button id="buttonPopUpDownload" onclick="downloadImage()" class="btn btn-default">Descargar Escudo</button>
          <button id="buttonPopUpManage" onclick="openPopUp('manage')" class="btn btn-default">Gestionar Escudos</button>
        </div>
        <div id="workspace">
          <canvas id="mainCanvas" width="530" height="350">
          </canvas>
          <div class="controls">
              <div id="icons">
                <div id="delete" class="button" title="Borrar elemento">
                  <img id="cross" src="./img/icons/crossIcon.png" class="icons" onClick="deleteImage()"/>
                </div>
                <div id="up" class="button" title="Subir elemento">
                  <img id="arrowUp" src="./img/icons/arrowUp.png" class="icons" onClick="bringForward()"/>
                </div>
                <div id="down" class="button" title="Bajar elemento">
                  <img id="arrowDown" src="./img/icons/arrowDown.png" class="icons" onClick="sendBackwards()"/>
                </div>
                <div id="clone" class="button" title="Copiar elemento">
                  <img id="copy" src="./img/icons/copyIcon.png" class="icons" onClick="cloneElement()"/>
                </div>
              </div>
              <p>
                <label><span>Ángulo:</span> <input type="range" id="angle-control" value="0" min="-180" max="180" onChange="updateAngle(this)"></label>
              </p>
              <p>
                <label><span>Horizontal:</span> <input type="range" id="left-control" value="150" min="0" max="530" onChange="updateLeft(this)"></label>
              </p>
              <p>
                <label><span>Vertical:</span> <input type="range" id="top-control" value="150" min="0" max="350" onChange="updateTop(this)"></label>
              </p>
              <p>
                <label><span>Escalar:</span> <input type="range" id="scale-control" value="1" min="0.1" max="3" step="0.1" onChange="updateScale(this)"></label>
              </p>
              <p>
                <label>
                  <button type="button" onClick="mirrorImage()" >Invertir imagen</button>
                </label>
              </p>
          </div>
        </div>
      </div>

    </div>


    <div id="popUp" title="Crear forma">  
    </div>
    <div id="savePopUp" title="Guardar escudo">  
    </div>
    <div id="loadPopUp" title="Cargar escudo">  
    </div>
    <div id="managePopUp" title="Gestionar escudos">  
    </div>
  </body>

  <div id="dialogConfirm" title="¿Deseas borrar el diseño actual?">
    <p>
      <span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Se borrará completamente el diseño actual del escudo. 
    </p>
    <b>
      ¿Estás seguro que deseas borrar el diseño?
    </b>

  </div>
    <?php
      include './jqueryAlerts.php';
      oldSrc();
      if ($isAdmin)
      {
           echo "<script>javascript:$('#homeNavAdmin').css('display','block')</script>";
           echo "<script>javascript:$('#buttonPopUpManage').css('display','block')</script>";      
      }
      else echo "<script>javascript:$('#homeNav').css('display','block')</script>";   
    ?>
  <script>
  //Variables para canvas
  var canvas = document.createElement("canvas");
  var ctx = canvas.getContext("2d");
  var mainCanvas = new fabric.Canvas('mainCanvas');
  fabric.Object.prototype.transparentCorners = false;
  fabric.Object.prototype.cornerSize = 8;
  fabric.Object.prototype.borderColor = 'black';
  fabric.Object.prototype.cornerColor= 'black';
  var workspace = document.getElementById("workspace");

  //Variables para subir imagenes y para la barra de carga
  var reader;
  var progress = document.querySelector('.percent');

  //Variable para saber que popUp abrir
  var popUpOpener;

  $(function(){
    //Si al guardar un escudo ya existe, recuperamos en lo que estabamos trabajando
    if(document.getElementById("oldSrc")) {
      //var oldSrc = document.getElementById("oldSrc").value;
      var oldSrc = "data:image/png;base64," + document.getElementById("oldSrc").value;
      fabric.Image.fromURL(oldSrc, function(img) {
        mainCanvas.add(img.set({ left: 0, top: 0, selectable: false, hasControls: false, evented: false}));
      });
    }
    $ ("#popUp").load("popUp.php");
    $ ("#savePopUp").load("savePopUp.php");
    $ ("#loadPopUp").load("loadPopUp.php");
    $ ("#managePopUp").load("managePopUp.php");
  });

  $("#popUp").dialog({
      autoOpen: false,
      height: "auto",
      width: "auto",
      modal: true,
      buttons: {
        "Crear forma": function() {
          var c = document.getElementById("mainCanvas");
          var mainCtx = c.getContext("2d");          
          if(particion == 1 || particion == -1) {
            mainCtx.drawImage(backImg, 150, 50);
            var src = c.toDataURL("image/png");
            fabric.Image.fromURL(src, function(img) {
              mainCanvas.add(img.set({ left: 0, top: 0, selectable: false, hasControls: false, evented: false}));
            });
          }
          else if(particion == 2) {
            mainCtx.drawImage(backImg, 150, 50);
            mainCtx.drawImage(part1Img, 150, 50);
            var src = c.toDataURL("image/png");
            fabric.Image.fromURL(src, function(img) {
              mainCanvas.add(img.set({ left: 0, top: 0, selectable: false, hasControls: false, evented: false}));
            });
          }
          else if(particion == 3) {
            mainCtx.drawImage(backImg, 150, 50);
            mainCtx.drawImage(part1Img, 150, 50);
            mainCtx.drawImage(part2Img, 150, 50);
            mainCtx.drawImage(part3Img, 150, 50);
            var src = c.toDataURL("image/png");
            fabric.Image.fromURL(src, function(img) {
              mainCanvas.add(img.set({ left: 0, top: 0, selectable: false, hasControls: false, evented: false}));
            });
          }
          else if(particion == 4) {
            mainCtx.drawImage(backImg, 150, 50);
            mainCtx.drawImage(part1Img, 150, 50);
            mainCtx.drawImage(part2Img, 150, 50);
            mainCtx.drawImage(part3Img, 150, 50);
            mainCtx.drawImage(part4Img, 150, 50);
            var src = c.toDataURL("image/png");
            fabric.Image.fromURL(src, function(img) {
              mainCanvas.add(img.set({ left: 0, top: 0, selectable: false, hasControls: false, evented: false}));
            });
          }
          $( this ).dialog( "close" );
        },
        "Cancelar": function() {
          $( this ).dialog( "close" );
        }
      },
      close: function( event, ui ) {
        $("#back").attr("src", "");
        $("#part1").attr("src", "");
        $("#part2").attr("src", "");
        $("#part3").attr("src", "");
        $("#part4").attr("src", "");
        $("#particionesApuntado").css("display", "none");
        $("#particionesSemicircular").css("display", "none");
        $("#particionesAleman").css("display", "none");
        $("#particionesIngles").css("display", "none");
        $("#particionesItaliano").css("display", "none");
        $("#particionesFrances").css("display", "none");
        resetColor();
        $("#colorParticion1").css("display", "none");
        $("#colorParticion2").css("display", "none");
        $("#colorParticion3").css("display", "none");
        $("#colorParticion4").css("display", "none");
        $("#colorParticion5").css("display", "none");
      }
    });


    $("#savePopUp").dialog({
        autoOpen: false,
        height: "auto",
        width: 1100,
        modal: true,
        buttons: {
          "Guardar escudo": function() {
            var $myForm = $('#saveEscudo');
            //Comprobamos si el formulario es valido
            var titulo = document.getElementById("titulo").value;
            document.getElementById("titulo").value = omitirAcentos(titulo);
            if (!$myForm[0].checkValidity()) {
              $myForm.find(':submit').click()
            }
            else {
              document.getElementById("saveEscudo").submit();
              $( this ).dialog( "close" );
            }
          },
          "Cancelar": function() {
            //Borrar valores
            $( this ).dialog( "close" );
          }
        },
        close: function( event, ui ) {
          $("#titulo").val("");
          $("#descripcion").val("");
          $("#historia").val("");
          $("#public").prop('checked', false);
        }
      });

    $("#loadPopUp").dialog({
        autoOpen: false,
        height: 700,
        width: 1100,
        modal: true,
        buttons: {
          "Cargar escudo": function() {
            var c = document.getElementById("mainCanvas");
            var mainCtx = c.getContext("2d");   
            mainCtx.drawImage(document.getElementById("escudoPrevisualization"), 0, 0);
            var src = c.toDataURL("image/png");       
            fabric.Image.fromURL(src, function(img) {
              mainCanvas.add(img.set({ left: 0, top: 0, selectable: false, hasControls: false, evented: false}));
            });
            $( this ).dialog( "close" );
          },
          "Cancelar": function() {
            //Borrar valores
            $( this ).dialog( "close" );
          }
        },
        close: function( event, ui ) {
          $("#deleteButton").css("display","none");
          $("#unpublishButton").css("display","none");
          $("#publishButton").css("display","none");
          document.getElementById("escudoPrevisualization").src = "";
          document.getElementById("tituloDelete").value = "";
          document.getElementById("tituloMyManage").value = "";
        }
      });

    $("#managePopUp").dialog({
      autoOpen: false,
      height: 700,
      width: 1100,
      modal: true,
      buttons: {
        "Ocultar escudo": function() {
          document.getElementById("manageEscudo").submit();
          $( this ).dialog( "close" );
        },
        "Cancelar": function() {
          //Borrar valores
          $( this ).dialog( "close" );
        }
      },
      close: function( event, ui ) {
        document.getElementById("escudoPrevisualizationManage").src = "";
        document.getElementById("usernameManage").value = "";
        document.getElementById("emailManage").value = "";
      }
    });
    


    $( "#dialogConfirm" ).dialog({
      autoOpen: false,
      resizable: true,
      height: "auto",
      width: "auto",
      modal: true,
      buttons: {
        "Aceptar": function() {
          while(mainCanvas.item(0) != undefined) {
            mainCanvas.remove(mainCanvas.item(0));
          }
          $( this ).dialog( "close" );
          if(popUpOpener == "open") $("#popUp").dialog("open");
          else if(popUpOpener == "load") $("#loadPopUp").dialog("open");
        },
        "Cancelar": function() {
          $( this ).dialog( "close" );
        }
      }
    });


  function openPopUp(popUp) {
    
    if(mainCanvas.item(0) != undefined) {
      if(popUp == "open") {
        popUpOpener = "open";
        $("#dialogConfirm").dialog("open");
      }
      else if(popUp == "load") {
        popUpOpener = "load";
        $("#dialogConfirm").dialog("open");
      }
      else if(popUp == "manage") $("#managePopUp").dialog("open");
      else {
        mainCanvas.deactivateAll().renderAll();
        var c = document.getElementById("mainCanvas");
        var mainCtx = c.getContext("2d");
        var src = c.toDataURL("image/png");
        document.getElementById("escudo").src = src;
        $("#savePopUp").dialog("open");
      } 
    }
    else {
      if(popUp == "open") $("#popUp").dialog("open");
      else if(popUp == "save") {
        $("<div title=\'Atención\'><b>No has creado ningún escudo aún.</b></div>").dialog({
          modal: true,
          buttons: {
            Ok: function() {
              $( this ).dialog( "close" );
            }
          }
        });
      } 
      else if(popUp == "load") $("#loadPopUp").dialog("open");
      else if(popUp == "manage") $("#managePopUp").dialog("open");
    }
  }


  $(function() {
    $( "#accordion" ).accordion({
      heightStyle: "fill" 
    });
  });

  function addImage(item) {
    var imgElement = document.getElementById(item.id);
    var imgInstance = new fabric.Image(imgElement, {
      left: 150,
      top: 50
    });
    mainCanvas.add(imgInstance);
  }

  function deleteImage() {
    var activeObject = mainCanvas.getActiveObject();
    if (activeObject) {
      mainCanvas.remove(activeObject);
    }
  }

  function bringForward() {
    var activeObject = mainCanvas.getActiveObject();
    if (activeObject) {
      mainCanvas.bringForward(activeObject);
    }
  }

  function sendBackwards() {
    var activeObject = mainCanvas.getActiveObject();
    if (activeObject) {
      mainCanvas.sendBackwards(activeObject);
    }
  }

  function mirrorImage() {
    var activeObject = mainCanvas.getActiveObject();
    if (activeObject) {
      if(!activeObject.getFlipX()) activeObject.set('flipX', true);
      else activeObject.set('flipX', false);
      mainCanvas.renderAll();
    }
  }

  function cloneElement() {
    var activeObject = mainCanvas.getActiveObject();
    if (activeObject) {
      var newObject = fabric.util.object.clone(activeObject); 
      newObject.set("top", activeObject.getTop()+50);
      newObject.set("left", activeObject.getLeft()+50);
      mainCanvas.add(newObject);
      mainCanvas.renderAll();
    }
  }

  function updateAngle(item) {
    var activeObject = mainCanvas.getActiveObject();
    if (activeObject) {
      if(activeObject.getAngle() > 360) activeObject.setAngle(parseInt(item.value + 360, 10)).setCoords();
      else activeObject.setAngle(parseInt(item.value, 10)).setCoords();
      mainCanvas.renderAll();
    }
  };

  function updateScale(item) {
    var activeObject = mainCanvas.getActiveObject();
    if (activeObject) {
      activeObject.scale(parseFloat(item.value)).setCoords();
      mainCanvas.renderAll();
    }
  };

  function updateTop(item) {
    var activeObject = mainCanvas.getActiveObject();
    if (activeObject) {
      activeObject.setTop(parseInt(item.value, 10)).setCoords();
      mainCanvas.renderAll();
    }
  };

  function updateLeft(item) {
    var activeObject = mainCanvas.getActiveObject();
    if (activeObject) {
      activeObject.setLeft(parseInt(item.value, 10)).setCoords();
      mainCanvas.renderAll();
    }
  };

  function updateControls() {
    var scaleControl = document.getElementById("scale-control");
    var angleControl = document.getElementById("angle-control");
    var leftControl = document.getElementById("left-control");
    var topControl = document.getElementById("top-control");
    var activeObject = mainCanvas.getActiveObject();
    scaleControl.setAttribute("value",activeObject.getScaleX());
    if(activeObject.getAngle() > 360) angleControl.setAttribute("value",activeObject.getAngle()-360);
    else angleControl.setAttribute("value",activeObject.getAngle());
    leftControl.setAttribute("value",activeObject.getLeft());
    topControl.setAttribute("value",activeObject.getTop());
  }
  mainCanvas.on({
    'object:moving': updateControls,
    'object:scaling': updateControls,
    'object:resizing': updateControls,
    'object:rotating': updateControls
  });

  function openAdminToolUpload() {
    window.location.href= document.URL + "admin/adminToolUpload.php";
  }

  function openAdminToolDelete() {
    window.location.href= document.URL + "admin/adminToolDelete.php";
  }

  function abortRead() {
    reader.abort();
  }

  function errorHandler(evt) {
    switch(evt.target.error.code) {
      case evt.target.error.NOT_FOUND_ERR:
        alert('File Not Found!');
        break;
      case evt.target.error.NOT_READABLE_ERR:
        alert('File is not readable');
        break;
      case evt.target.error.ABORT_ERR:
        break; // noop
      default:
        alert('An error occurred reading this file.');
    };
  }

  function updateProgress(evt) {
    // evt is an ProgressEvent.
    if (evt.lengthComputable) {
      var percentLoaded = Math.round((evt.loaded / evt.total) * 100);
      // Increase the progress bar length.
      if (percentLoaded < 100) {
        progress.style.width = percentLoaded + '%';
        progress.textContent = percentLoaded + '%';
      }
    }
  }

  function handleFileSelect(evt) {

    var files = evt.target.files; // FileList object
    // Loop through the FileList and render image files as canvas image
    for (var i = 0, f; f = files[i]; i++) {

      // Only process image files.
      if (!f.type.match('image.*')) {
        continue;
      }
        
      // Reset progress indicator on new file selection.
      $("#abortUpload").css("display","block");
      progress.style.width = '0%';
      progress.textContent = '0%';

      reader = new FileReader();
      reader.onerror = errorHandler;
      reader.onprogress = updateProgress;
      reader.onabort = function(e) {
        alert('File read cancelled');
      };
      reader.onloadstart = function(e) {
        document.getElementById('progress_bar').className = 'loading';
      };
       // Closure to capture the file information.
      reader.onload = (function(theFile) {
        return function(e) {
          // Render thumbnail.
          var src = e.target.result;
          fabric.Image.fromURL(src, function(img) {
              mainCanvas.add(img.set({ left: 0, top: 0}));
            });
           progress.style.width = '100%';
          progress.textContent = '100%';
          setTimeout("document.getElementById('progress_bar').className='';", 2000);
          setTimeout("$('#abortUpload').css('display','none')", 2000);
        };
      })(f);

      // Read in the image file as a data URL.
        reader.readAsDataURL(f);
    }
  }

  document.getElementById('files').addEventListener('change', handleFileSelect, false);

  function downloadImage() {
    if(mainCanvas.item(0) == undefined) notImagePopUp();
    else{
      mainCanvas.deactivateAll().renderAll();
      var c = document.getElementById("mainCanvas");
      var mainCtx = c.getContext("2d");
      var src = c.toDataURL("image/png");

      var a = $("<a>")
      .attr("href", src)
      .attr("download", "Escudo.png")
      .appendTo("body");

      a[0].click();

      a.remove();
    }
  }

  function notImagePopUp() {
    $("<div title=\'Atención\'><b>No hay ninguna imagen para descargar.</b></div>").dialog({
      modal: true,
      buttons: {
        Ok: function() {
          $( this ).dialog( "close" );
        }
      }
    });
  }

  </script>

</html>
