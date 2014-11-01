<div id="popUpVisualization" title="Visualización escudo">
  <div id="containerPopUp" class="container">
    <div id="centralTool">
      <div id="information">
        <table id="form">
          <tr>
          <td>
             <b>Título:</b>
          </td>
          <td>
            <input type="text" id="tituloPopUp" disabled/>
          </td>
        </tr>
         <tr>
          <td>
             <b>Autor:</b>
          </td>
          <td>
            <input type="text" id="autorPopUp" disabled/>
          </td>
        </tr>
        <tr>
          <td>
             <b>Descripción:</b>
          </td>
          <td>
            <textarea id = "descripcionPopUp" rows="5" form="saveEscudo" disabled></textarea>
          </td>
        </tr>
        <tr>
          <td>
             <b>Historia:</b>
          </td>
          <td>
            <textarea id = "historiaPopUp" rows="5" form="saveEscudo" disabled></textarea>
          </td>
        </tr>
        </table>
      </div>
      
      <div id="previsualization" class="col-md-8">
        <img id="escudo">
      </div>
    </div> 
  </div>
</div>



<script>
  document.getElementById("tituloPopUp").value = document.getElementById("titulo");

</script>