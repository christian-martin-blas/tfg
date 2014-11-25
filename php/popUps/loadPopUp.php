<?php
  include '../loadPopUpFunctions.php';
?>

<div id="loadPopUp" title="Cargar Escudo">
  <div id="loadContainer" class="container">
    <div id="designs" class="col-md-3">
      <h4>Mis Escudos</h4>
      <div id="misEscudos">
        <?php
          addMisEscudos();
        ?>
      </div>
      <h4>Escudos Públicos</h4>
      <div id="imagenesEscudos">
        <?php
          addEscudosLoad();
        ?>
      </div>
    </div>
    <div id="previsualizationLoad" class="col-md-8">
      <img id="escudoPrevisualization">
    </div>
    
    <form id="deleteEscudo" action="./php/deleteEscudo.php" method="POST">
      <input id="deleteButton" class="btn btn-default" type="submit" value="Borrar el escudo" style="display:none;">  
      <input id="tituloDelete" name="tituloDelete" type="text" style="display:none;">
      <input id="srcDelete" name="srcDelete" type="text" style="display:none;">
    </form>
    <form id="manageMyEscudo" action="./php/manageMyEscudo.php" method="POST">
      <input id="unpublishButton" class="btn btn-default" name = "unpublishButton" type="submit" value="Ocultar el escudo" style="display:none;">
      <input id="publishButton" class="btn btn-default" name = "publishButton" type="submit" value="Publicar el escudo" style="display:none;">    
      <input id="tituloMyManage" name="tituloMyManage" type="text" style="display:none;">
    </form>
  </div> 
</div>



<script>

//Variables de las imagenes
var escudoImg = document.getElementById("escudoPrevisualization");

function displayEscudo(item) {
  $("#deleteButton").css("display","none");
  $("#unpublishButton").css("display","none");
  $("#publishButton").css("display","none");
  escudoImg.src = item.firstChild.src;
}

function displayMiEscudo(item) {
  escudoImg.src = item.firstChild.src;
  $("#deleteButton").css("display","block");
  if(item.children[1].value == 1) {
    $("#publishButton").css("display","none");
    $("#unpublishButton").css("display","block");
  } 
  else {
    $("#unpublishButton").css("display","none");
    $("#publishButton").css("display","block");
  }
  var src = escudoImg.src;
  var lastIndex = src.lastIndexOf("/");
  var titulo = src.substring(lastIndex + 1, src.length - 4);
  document.getElementById("tituloDelete").value = titulo;
  document.getElementById("tituloMyManage").value = titulo;
  var index = src.indexOf("/img");
  document.getElementById("srcDelete").value = "." + src.substring(index);
}


</script>