<div id="dialog-form" title="Guardar escudo">
  <div id="saveContainer" class="container">
    <div id="formDiv" class="col-md-4">
      <h5 style="color: #ffffff">Al guardar el escudo, no se podrán volver a modificar las imágenes que lo componen.</h5>
     <form id="saveEscudo" action="saveEscudo.php" method="POST">
      <table id="form">
        <tr>
          <td>
             <b>Título:</b>
          </td>
          <td>
            <input type="text" id="titulo" name="titulo" required/>
          </td>
        </tr>
        <tr>
          <td>
             <b>Descripción:</b>
          </td>
          <td>
            <textarea id = "descripcion" name="descripcion" rows="5" form="saveEscudo" ></textarea>
          </td>
        </tr>
        <tr>
          <td>
             <b>Historia:</b>
          </td>
          <td>
            <textarea id = "historia" name="historia" rows="5" form="saveEscudo" ></textarea>
          </td>
        </tr>
        <tr>
          <td></td>
          <td>
            <input id = "public" type="checkbox" name="public" value='1'>Público<br>
          </td>
        </tr>
      </table>
      <input type="text" id="srcSave" name="srcSave"/>  
      <input id="submitHidden" type="submit" value="Submit">  
     </form>
    </div>
    <div id="previsualization" class="col-md-6">
      <img id="escudo" src = "" onload="saveSrc()"/>
    </div>
  </div>
</div>



<script>

  function saveSrc() {
    //Guardamos el codigo base 64 de la imagen del escudo
    var src = document.getElementById("escudo").src;
    src = src.substring(22);
    document.getElementById("srcSave").value = src;
  }

</script>