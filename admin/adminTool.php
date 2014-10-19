<!DOCTYPE HTML>
<meta charset="utf-8"> 
<html>
  <head>
  	  <script src="../lib/js/jquery-1.11.0.min.js"></script>
  	  <link rel="stylesheet" href="../lib/css/redmond/jquery-ui-1.10.4.custom.css">
  	  <link rel="stylesheet" type="text/css" href="../lib/css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="../lib/css/jquery.simplecolorpicker.css">
      <link rel="stylesheet" type="text/css" href="../lib/css/jquery.simplecolorpicker-glyphicons.css">

  	  <script src="../lib/js/bootstrap.js"></script>
  	  <script src="../lib/js/jquery-ui-1.10.4.custom.js"></script>
      <script src="../lib/js/jquery.simplecolorpicker.js"></script>
      <script src="../lib/js/fabric.js"></script>
      <script src="../lib/js/jquery.ui.widget.js"></script>
      <script src="../lib/js/jquery.iframe-transport.js"></script>
      <script src="../lib/js/jquery.fileupload.js"></script>

  	  <style>
      html {
        max-width: 1500px;
      }
  		.page-header {
  			text-align: center;
  		}
      img {
        max-width: 100%;
        max-height: 100%;
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
      #part4 {
        position: absolute;
        left: 50%;
        top: 50%; 
        margin-left: -110px;
        margin-top: -110px;
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

      #uploadFiles {
        margin-top: 50px;
      }
      td {
        padding: 6px;
      }
      #buttonSubmit {
        margin-left: 330px;
        margin-top: 20px;
      }
      #previsualization {
        background-color: #C2C1BD;
        height: 350px;
        width: 533px;
        margin-top: 200px;
        margin-left: 70px;
        float: left;
        border: 5px solid #333333;
        position: relative;
      }
      #previsualizationMiniature {
        height: 64px;
        width: 64px;
        float: right;
        border: 3px solid #333333;
      }
      #miniaturaTitulo {
        margin-top: 300px;
        margin-left: 645px;
      }
      #linkMainPage {
        font-size: 18px;
      }
      #warning {
        margin: 8px;
        border: solid 2px;
        background-color: #C9DDE0;
        padding: 5px;
      }
      #base {
        display: none;
      }
      #sinBase {
        display: none;
      }

  	</style>

  </head>
  <body>

    <div id="adminTool">

      <div class="col-md-4">
        <a id="linkMainPage" href="/tfg">Editor de escudos</a>

        <form id="uploadFiles" enctype="multipart/form-data" action="uploader.php" method="POST">
          <?php
            include '../ChromePhp.php';

            if(isset($_GET['success']))
            {
              echo("<h3 style='text-align: center'>Se han cargado las imágenes correctamente.</h3>");
            }
          ?>
          <div id="warning">
            <h4>Atención:</h4>
            <ul>
              <li>El orden en que se añadan las particiones es importante.</li>
              <li>Si tiene más de una partición el escudo, hay que añadir el número de partición al final del nombre de la imagen.
                <br>
              <b>Ejemplo:</b> Cuadrada2.png </li>
              <li>Si se sube sólo la base del escudo, hay que añadir el número 1 en el nombre de la miniatura.
              <br>
              <b>Ejemplo:</b> Vacio1.png </li>
              <li>
                Si se suben imágenes que tengan más de 1 partición, hay que añadir el número de particiones al final del nombre de la miniatura.
                <br>
                <b>Ejemplo:</b> Si subiremos un escudo partido en 4 trozos, el nombre será: Cuartelado4.png
              </li>
            </ul>
          </div>
          <input type="radio" name="base" value="base" onclick="showTable(this)">Subiré base y particiones<br>
          <input type="radio" name="base" value="sinBase" onclick="showTable(this)">Subiré particiones
          <table id="sinBase">
            <tr>
              <td>
                <b>Nombre de la Base:</b>
              </td>
              <td>
                <select name="nombreBaseSelect" onchange="showBase(this)">
                  <option value="Aleman">Aleman</option>
                  <option value="Apuntado">Apuntado</option>
                  <option value="Frances">Frances</option>
                  <option value="Ingles">Ingles</option>
                  <option value="Italiano">Italiano</option>
                  <option value="Semicircular">Semicircular</option>
                </select>
              </td>
            </tr>
            <tr>
              <td>
                <b>Miniatura de la Base:</b>
              </td>
              <td>
                <input type="file" id="fileMiniaturaSelect" name="fileMiniaturaSelect"/>
              </td>
            </tr>
            <tr>
              <td>
                <b>Partición 1:</b>
              </td>
              <td>
                <input type="file" id="fileParticion1Select" name="fileParticion1Select"/>
              </td>
            </tr>
            <tr>
              <td>
                <b>Partición 2:</b>
              </td>
              <td>
                <input type="file" id="fileParticion2Select" name="fileParticion2Select" />
              </td>
            </tr>
            <tr>
              <td>
                <b>Partición 3:</b>
              </td>
              <td>
                <input type="file" id="fileParticion3Select" name="fileParticion3Select" />
              </td>
            </tr>
            <tr>
              <td>
                <b>Partición 4:</b>
              </td>
              <td>
                <input type="file" id="fileParticion4Select" name="fileParticion4Select" />
              </td>
            </tr>
          </table>
          <table id="base">
            <tr>
              <td>
                <b>Nombre de la Base:</b>
              </td>
              <td>
                <input type="text" id="nombreBase" name="nombreBase"/>
              </td>
            </tr>
            <tr>
              <td>
                <b>Base:</b>
              </td>
              <td>
                <input type="file" id="fileBase" name="fileBase"/>
              </td>
            </tr>
            <tr>
              <td>
                <b>Miniatura de la Base:</b>
              </td>
              <td>
                <input type="file" id="fileMiniatura" name="fileMiniatura"/>
              </td>
            </tr>
            <tr>
              <td>
                <b>Partición 1:</b>
              </td>
              <td>
                <input type="file" id="fileParticion1" name="fileParticion1" />
              </td>
            </tr>
            <tr>
              <td>
                <b>Partición 2:</b>
              </td>
              <td>
                <input type="file" id="fileParticion2" name="fileParticion2" />
              </td>
            </tr>
            <tr>
              <td>
                <b>Partición 3:</b>
              </td>
              <td>
                <input type="file" id="fileParticion3" name="fileParticion3" />
              </td>
            </tr>
            <tr>
              <td>
                <b>Partición 4:</b>
              </td>
              <td>
                <input type="file" id="fileParticion4" name="fileParticion4" />
              </td>
            </tr>
          </table>
          <div id="buttonSubmit">
            <input type="submit" id="buttonUpload" value="Subir las imágenes"/>
          </div>
      </form>
      </div>

      <div class="col-md-6">
        <div id="previsualization">
          <img id="back">
          <img id="part1">
          <img id="part2">
          <img id="part3">
          <img id="part4">
        </div>
        <h4 id="miniaturaTitulo">Miniatura:</h4>
        <div id="previsualizationMiniature">
          <img id="miniature">
        </div>
      </div>

    </div>

  </body>


  <script>
  //Variables de imágenes
  var back = document.getElementById("back");
  var miniature = document.getElementById("miniature");
  var part1 = document.getElementById("part1");
  var part2 = document.getElementById("part2");
  var part3 = document.getElementById("part3");
  var part4 = document.getElementById("part4");

  //Variables para subir imagenes
  var reader;

  function openAdminTool() {
    window.location.href= document.URL + "adminTool.php";
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

  function handleFileSelect(evt, item) {
    var files = evt.target.files; // FileList object
    // Loop through the FileList and render image files as canvas image
    for (var i = 0, f; f = files[i]; i++) {

      // Only process image files.
      if (!f.type.match('image.*')) {
        continue;
      }

      reader = new FileReader();
      reader.onerror = errorHandler;
       // Closure to capture the file information.
      reader.onload = (function(theFile) {
        return function(e) {
          // Render thumbnail.
          var src = e.target.result;
          var name = item.name;
          if(name == "fileBase") back.src = src;
          else if(name == "fileMiniatura" || name == "fileMiniaturaSelect") miniature.src = src;
          else if(name == "fileParticion1" || name == "fileParticion1Select") part1.src = src;
          else if(name == "fileParticion2" || name == "fileParticion2Select") part2.src = src;
          else if(name == "fileParticion3" || name == "fileParticion3Select") part3.src = src;
          else if(name == "fileParticion4" || name == "fileParticion4Select") part4.src = src;
        };
      })(f);

      // Read in the image file as a data URL.
        reader.readAsDataURL(f);
    }
  }

  document.getElementById('fileBase').addEventListener('change', function() {
    handleFileSelect(window.event, this);
  }, false);
  document.getElementById('fileMiniatura').addEventListener('change', function() {
    handleFileSelect(window.event, this);
  }, false);
  document.getElementById('fileParticion1').addEventListener('change', function() {
    handleFileSelect(window.event, this);
  }, false);
  document.getElementById('fileParticion2').addEventListener('change', function() {
    handleFileSelect(window.event, this);
  }, false);
  document.getElementById('fileParticion3').addEventListener('change', function() {
    handleFileSelect(window.event, this);
  }, false);
  document.getElementById('fileParticion4').addEventListener('change', function() {
    handleFileSelect(window.event, this);
  }, false);
  document.getElementById('fileMiniaturaSelect').addEventListener('change', function() {
    handleFileSelect(window.event, this);
  }, false);
  document.getElementById('fileParticion1Select').addEventListener('change', function() {
    handleFileSelect(window.event, this);
  }, false);
  document.getElementById('fileParticion2Select').addEventListener('change', function() {
    handleFileSelect(window.event, this);
  }, false);
  document.getElementById('fileParticion3Select').addEventListener('change', function() {
    handleFileSelect(window.event, this);
  }, false);
  document.getElementById('fileParticion4Select').addEventListener('change', function() {
    handleFileSelect(window.event, this);
  }, false);

  function showTable(item) {
    if(item.value == "base") {
      $('#base').css('display','block');
      $('#sinBase').css('display','none');
      document.getElementById("nombreBase").required = true;
      document.getElementById("fileBase").required = true;
      document.getElementById("fileMiniatura").required = true;
      document.getElementById("fileMiniaturaSelect").required = false;
      document.getElementById("fileParticion1Select").required = false;
    }
    else {
      $('#base').css('display','none');
      $('#sinBase').css('display','block');
      document.getElementById("nombreBase").required = false;
      document.getElementById("fileBase").required = false;
      document.getElementById("fileMiniatura").required = false;
      document.getElementById("fileMiniaturaSelect").required = true;
      document.getElementById("fileParticion1Select").required = true;
    }
  }

  function showBase(item) {
    var src = "/tfg/img/bases/Base " + item.value + ".png";
    back.src = src;
  }

  </script>

</html>
