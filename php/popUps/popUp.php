<?php
  include '../popUpFunctions.php'
?>
<script src="./js/popUpFunctions.js"></script>

<div id="popUp" title="Crear forma">
  <div id="container" class="container">
    <div id="centralTool">
      <div class="row">
        <div id="designs" class="col-md-3">
          <h4>Formas</h4>
          <div id="imagenesFormas">
            <div id="baseApuntado" class="divDesign" onClick="displayParticiones(this)">
              <img src="./img/bases/Apuntado.png"  class="design">
            </div>
            <div id="baseSemicircular" class="divDesign" onClick="displayParticiones(this)">
              <img src="./img/bases/Semicircular.png" class="design">
            </div>
            <div id="baseFrances" class="divDesign" onClick="displayParticiones(this)">
              <img src="./img/bases/Frances.png" class="design">
            </div>
            <div id="baseIngles" class="divDesign" onClick="displayParticiones(this)">
              <img src="./img/bases/Ingles.png" class="design">
            </div>
            <div id="baseAleman" class="divDesign" onClick="displayParticiones(this)">
              <img src="./img/bases/Aleman.png" class="design">
            </div>
            <div id="baseItaliano" class="divDesign" onClick="displayParticiones(this)">
              <img src="./img/bases/Italiano.png" class="design">
            </div>
            <?php
              addBases();
            ?>
          </div>
          <div id ="particionesApuntado" class="particiones">
            <h4>Particiones</h4>
            <div id="imagenesParticiones">
              <div id="particionVacio" class="divDesign" onClick="displayColores(this)">
                <img src="./img/miniaturas/Apuntado/Vacio1.png" class="design">
              </div>
              <div id="particionPartido" class="divDesign" onClick="displayColores(this)">
                <img src="./img/miniaturas/Apuntado/Partido2.png" class="design">
              </div>
              <div id="particionCortado" class="divDesign" onClick="displayColores(this)">
                <img src="./img/miniaturas/Apuntado/Cortado2.png" class="design">
              </div>
              <div id="particionTronchado" class="divDesign" onClick="displayColores(this)">
                <img src="./img/miniaturas/Apuntado/Tronchado2.png" class="design">
              </div>
              <div id="particionCuartelado" class="divDesign"  onClick="displayColores(this)">
                <img src="./img/miniaturas/Apuntado/Cuartelado4.png" class="design">
              </div>
              
              <?php
                addParticionesBaseCreada("Apuntado");
              ?>
            </div>
          </div>
          <div id ="particionesSemicircular" class="particiones">
            <h4>Particiones</h4>
            <div id="imagenesParticiones">
              <div id="particionPartido" class="divDesign" onClick="displayColores(this)">
                <img src="./img/miniaturas/Semicircular/Partido2.png" class="design">
              </div>
              <div id="particionCortado" class="divDesign" onClick="displayColores(this)">
                <img src="./img/miniaturas/Semicircular/Cortado2.png" class="design">
              </div>
              <div id="particionTronchado" class="divDesign" onClick="displayColores(this)">
                <img src="./img/miniaturas/Semicircular/Tronchado2.png" class="design">
              </div>
              <?php
                addParticionesBaseCreada("Semicirular");
              ?>
            </div>
          </div>
          <?php
            addParticiones();
          ?>
          <div id="colorParticion1">
            Partición 1:
            <select id="particion1" name="colorpicker-picker-shortlist"  onchange="changeColor(this);">
              <option value="#F5F5F5">Plata(Blanco)</option>
              <option value="#FCDD09" >Oro(Amarillo)</option>
              <option value="#BFAF3F">Oro</option>
              <option value="#C2C1BD">Plata</option>
              <option value="#333399">Azur</option>
              <option value="#FF2611">Gules</option>
              <option value="#008000">Sinople</option>
              <option value="#000000">Sable</option>
              <option value="#800080">Púrpura</option>
            </select>
          </div>
          <div id="colorParticion2">
            Partición 2:
            <select id="particion2" name="colorpicker-picker-shortlist" onchange="changeColor(this);">
              <option value="#F5F5F5">Plata(Blanco)</option>
              <option value="#FCDD09">Oro(Amarillo)</option>
              <option value="#BFAF3F">Oro</option>
              <option value="#C2C1BD">Plata</option>
              <option value="#333399">Azur</option>
              <option value="#FF2611">Gules</option>
              <option value="#008000">Sinople</option>
              <option value="#000000">Sable</option>
              <option value="#800080">Púrpura</option>
            </select>
          </div>
          <div id="colorParticion3">
            Partición 3:
            <select id="particion3" name="colorpicker-picker-shortlist" onchange="changeColor(this);">
              <option value="#F5F5F5">Plata(Blanco)</option>
              <option value="#FCDD09">Oro(Amarillo)</option>
              <option value="#BFAF3F">Oro</option>
              <option value="#C2C1BD">Plata</option>
              <option value="#333399">Azur</option>
              <option value="#FF2611">Gules</option>
              <option value="#008000">Sinople</option>
              <option value="#000000">Sable</option>
              <option value="#800080">Púrpura</option>
            </select>
          </div>
          <div id="colorParticion4">
            Partición 4:
            <select id="particion4" name="colorpicker-picker-shortlist" onchange="changeColor(this);">
              <option value="#F5F5F5">Plata(Blanco)</option>
              <option value="#FCDD09">Oro(Amarillo)</option>
              <option value="#BFAF3F">Oro</option>
              <option value="#C2C1BD">Plata</option>
              <option value="#333399">Azur</option>
              <option value="#FF2611">Gules</option>
              <option value="#008000">Sinople</option>
              <option value="#000000">Sable</option>
              <option value="#800080">Púrpura</option>
            </select>
          </div>
          <div id="colorParticion5">
            Partición 5:
            <select id="particion5" name="colorpicker-picker-shortlist" onchange="changeColor(this);">
              <option value="#F5F5F5">Plata(Blanco)</option>
              <option value="#FCDD09">Oro(Amarillo)</option>
              <option value="#BFAF3F">Oro</option>
              <option value="#C2C1BD">Plata</option>
              <option value="#333399">Azur</option>
              <option value="#FF2611">Gules</option>
              <option value="#008000">Sinople</option>
              <option value="#000000">Sable</option>
              <option value="#800080">Púrpura</option>
            </select>
          </div>
        </div>
        <div id="previsualization" class="col-md-8">
          <img id="back">
          <img id="part1">
          <img id="part2">
          <img id="part3">
          <img id="part4">
        </div>
      </div>
    </div> 
  </div>
</div>



<script>

//Variables de las imagenes
var backImg = document.getElementById("back");
var part1Img = document.getElementById("part1");
var part2Img = document.getElementById("part2");
var part3Img = document.getElementById("part3");
var part4Img = document.getElementById("part4");

$('select[name="colorpicker-picker-shortlist"]').simplecolorpicker({picker: true, theme: 'glyphicons'});
  

</script>