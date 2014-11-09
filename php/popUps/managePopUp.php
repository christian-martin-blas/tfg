<?php
  include '../manageFunctions.php';
?>

<div id="managePopUp" title="Gestionar Escudos">
  <div id="manageContainer" class="container">
    <div id="designs" class="col-md-3">
      <h4>Escudos Públicos</h4>
      <div id="imagenesEscudos">
        <?php
          addEscudosManage();
        ?>
      </div>
      <form id="manageEscudo" action="./php/unpublishEscudo.php" method="POST">
        <table id="formManage">
          <tr>
            <td>
               <b>Título:</b>
            </td>
            <td>
              <input id="tituloManage" name="tituloManage" type="text" readonly>
            </td>
          </tr>
           <tr>
            <td>
               <b>Autor:</b>
            </td>
            <td>
              <input id="usernameManage" name="usernameManage" type="text" readonly>
            </td>
          </tr>
          <tr>
            <td>
               <b>Email:</b>
            </td>
            <td>
              <input id="emailManage" name="emailManage" type="email" readonly>
            </td>
          </tr>
        </table> 
      </form>
    </div>
    <div id="previsualizationManage" class="col-md-7">
      <img id="escudoPrevisualizationManage">
    </div>
  </div> 
</div>

<script>

//Variables de las imagenes
var escudoManageImg = document.getElementById("escudoPrevisualizationManage");

function displayEscudoManage(item) {
  document.getElementById("tituloManage").value = item.id;
  escudoManageImg.src = item.firstChild.src;
  document.getElementById("usernameManage").value = item.children[1].value;
  document.getElementById("emailManage").value = item.children[2].value;
}

</script>