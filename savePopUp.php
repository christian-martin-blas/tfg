<div id="dialog-form" title="Guardar escudo">
  <div id="saveContainer" class="container">
    <div id="formDiv" class="col-md-4">
     <form id="saveEscudo" action="saveEscudo.php" method="POST">
      <table id="form">
        <tr>
          <td>
             <b>Título:</b>
          </td>
          <td>
            <input type="text" id="titulo" name="titulo"/>
          </td>
        </tr>
        <tr>
          <td>
             <b>Descripción:</b>
          </td>
          <td>
            <textarea name="descripcion" rows="5" form="saveEscudo" ></textarea>
          </td>
        </tr>
        <tr>
          <td>
             <b>Historia:</b>
          </td>
          <td>
            <textarea name="historia" rows="5" form="saveEscudo" ></textarea>
          </td>
        </tr>
        <tr>
          <td></td>
          <td>
            <input type="checkbox" name="public" value='1'>Público<br>
          </td>
        </tr>
      </table>
      <input type="text" id="srcSave" name="srcSave"/>    
     </form>
    </div>
    <div id="previsualization" class="col-md-6">
      <img id="escudo" src = ""/>
    </div>
  </div>
</div>



<script>



</script>