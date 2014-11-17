<?php
  include '../popUpFunctions.php'
?>

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

var selector =  " <option value='#F5F5F5'>Plata(Blanco)</option> " +
                " <option value='#FCDD09'>Oro(Amarillo)</option> " +
                " <option value='#BFAF3F'>Oro</option> " +
                " <option value='#C2C1BD'>Plata</option> " +
                " <option value='#333399'>Azur</option> " +
                " <option value='#FF2611'>Gules</option> " +
                " <option value='#008000'>Sinople</option> " +
                " <option value='#000000'>Sable</option> " + 
                " <option value='#800080'>Púrpura</option> ";

//Variable para recargar la base original
var srcBack = null;

//Variables para cargar imágenes
var base = -1;
var particion = -1;

//Variables de las imagenes
var backImg = document.getElementById("back");
var part1Img = document.getElementById("part1");
var part2Img = document.getElementById("part2");
var part3Img = document.getElementById("part3");
var part4Img = document.getElementById("part4");


//Variables para el cambio de color
  var originalPixelsBack = null;
  var currentPixelsBack = null;
  var originalPixelsPart1 = null;
  var currentPixelsPart1 = null;
  var originalPixelsPart2 = null;
  var currentPixelsPart2 = null;
  var originalPixelsPart3 = null;
  var currentPixelsPart3 = null;
  var originalPixelsPart4 = null;
  var currentPixelsPart4 = null;


  function getPixels(img)  {
    canvas.width = img.width;
    canvas.height = img.height;

    ctx.drawImage(img, 0, 0, img.naturalWidth, img.naturalHeight, 0, 0, img.width, img.height);
    if(img.id == "back") {
      originalPixelsBack = ctx.getImageData(0, 0, img.width, img.height);
      currentPixelsBack = ctx.getImageData(0, 0, img.width, img.height);
    }
    else if(img.id == "part1") {
      originalPixelsPart1 = ctx.getImageData(0, 0, img.width, img.height);
      currentPixelsPart1 = ctx.getImageData(0, 0, img.width, img.height);
    }
    else if(img.id == "part2") {
      originalPixelsPart2 = ctx.getImageData(0, 0, img.width, img.height);
      currentPixelsPart2 = ctx.getImageData(0, 0, img.width, img.height);
    }
    else if(img.id == "part3") {
      originalPixelsPart3 = ctx.getImageData(0, 0, img.width, img.height);
      currentPixelsPart3 = ctx.getImageData(0, 0, img.width, img.height);
    }
    else if(img.id == "part4") {
      originalPixelsPart4 = ctx.getImageData(0, 0, img.width, img.height);
      currentPixelsPart4 = ctx.getImageData(0, 0, img.width, img.height);
    }
    img.onload = null;
  }

  function resetColor() { 
    var elem1 = document.getElementById("colorParticion1").children[0];
    var elem2 = document.getElementById("colorParticion1").children[1];
    elem1.parentNode.removeChild(elem1);
    elem2.parentNode.removeChild(elem2);
    $('#colorParticion1').append("<select id='particion1' name='colorpicker-picker-shortlist'  onchange='changeColor(this);''>" + selector + "</select>");
    
    if(particion == 2) {
      elem1 = document.getElementById("colorParticion2").children[0];
      elem2 = document.getElementById("colorParticion2").children[1];
      elem1.parentNode.removeChild(elem1);
      elem2.parentNode.removeChild(elem2);
      $('#colorParticion2').append("<select id='particion2' name='colorpicker-picker-shortlist'  onchange='changeColor(this);''>" + selector + "</select>");
    }
    else if (particion == 3) {
      elem1 = document.getElementById("colorParticion2").children[0];
      elem2 = document.getElementById("colorParticion2").children[1];
      elem1.parentNode.removeChild(elem1);
      elem2.parentNode.removeChild(elem2);
      elem1 = document.getElementById("colorParticion3").children[0];
      elem2 = document.getElementById("colorParticion3").children[1];
      elem1.parentNode.removeChild(elem1);
      elem2.parentNode.removeChild(elem2);
      $('#colorParticion2').append("<select id='particion2' name='colorpicker-picker-shortlist'  onchange='changeColor(this);''>" + selector + "</select>");
      $('#colorParticion3').append("<select id='particion3' name='colorpicker-picker-shortlist'  onchange='changeColor(this);''>" + selector + "</select>");
    }
    else if (particion == 4) {
      elem1 = document.getElementById("colorParticion2").children[0];
      elem2 = document.getElementById("colorParticion2").children[1];
      elem1.parentNode.removeChild(elem1);
      elem2.parentNode.removeChild(elem2);
      elem1 = document.getElementById("colorParticion3").children[0];
      elem2 = document.getElementById("colorParticion3").children[1];
      elem1.parentNode.removeChild(elem1);
      elem2.parentNode.removeChild(elem2);
      elem1 = document.getElementById("colorParticion4").children[0];
      elem2 = document.getElementById("colorParticion4").children[1];
      elem1.parentNode.removeChild(elem1);
      elem2.parentNode.removeChild(elem2);
      $('#colorParticion2').append("<select id='particion2' name='colorpicker-picker-shortlist'  onchange='changeColor(this);''>" + selector + "</select>");
      $('#colorParticion3').append("<select id='particion3' name='colorpicker-picker-shortlist'  onchange='changeColor(this);''>" + selector + "</select>");
      $('#colorParticion4').append("<select id='particion4' name='colorpicker-picker-shortlist'  onchange='changeColor(this);''>" + selector + "</select>");
    }
    else if (particion == 5) {
      elem1 = document.getElementById("colorParticion2").children[0];
      elem2 = document.getElementById("colorParticion2").children[1];
      elem1.parentNode.removeChild(elem1);
      elem2.parentNode.removeChild(elem2);
      elem1 = document.getElementById("colorParticion3").children[0];
      elem2 = document.getElementById("colorParticion3").children[1];
      elem1.parentNode.removeChild(elem1);
      elem2.parentNode.removeChild(elem2);
      elem1 = document.getElementById("colorParticion4").children[0];
      elem2 = document.getElementById("colorParticion4").children[1];
      elem1.parentNode.removeChild(elem1);
      elem2.parentNode.removeChild(elem2);
      elem1 = document.getElementById("colorParticion5").children[0];
      elem2 = document.getElementById("colorParticion5").children[1];
      elem1.parentNode.removeChild(elem1);
      elem2.parentNode.removeChild(elem2);
      $('#colorParticion2').append("<select id='particion2' name='colorpicker-picker-shortlist'  onchange='changeColor(this);''>" + selector + "</select>");
      $('#colorParticion3').append("<select id='particion3' name='colorpicker-picker-shortlist'  onchange='changeColor(this);''>" + selector + "</select>");
      $('#colorParticion4').append("<select id='particion4' name='colorpicker-picker-shortlist'  onchange='changeColor(this);''>" + selector + "</select>");
      $('#colorParticion5').append("<select id='particion5' name='colorpicker-picker-shortlist'  onchange='changeColor(this);''>" + selector + "</select>");
    }
    $('select[name="colorpicker-picker-shortlist"]').simplecolorpicker({picker: true, theme: 'glyphicons'});
  }


  function changeColor(select)  {
    //Compruebo que las imagenes se han cargado
    if(select.id == 'particion1' && !originalPixelsBack) return;
    if(select.id == 'particion2' && !originalPixelsPart1) return;
    if(select.id == 'particion3' && !originalPixelsPart2) return;
    if(select.id == 'particion4' && !originalPixelsPart3) return;
    if(select.id == 'particion5' && !originalPixelsPart4) return;

    var newColor = {
      R: hexToR(select.value),
      G: hexToG(select.value),
      B: hexToB(select.value),
    };
    if(select.id == 'particion1') {
      for(var I = 0, L = originalPixelsBack.data.length; I < L; I += 4)
      {
        if(currentPixelsBack.data[I + 3] > 0) // If it's not a transparent pixel
        {
            currentPixelsBack.data[I] = originalPixelsBack.data[I] / 255 * newColor.R;
            currentPixelsBack.data[I + 1] = originalPixelsBack.data[I + 1] / 255 * newColor.G;
            currentPixelsBack.data[I + 2] = originalPixelsBack.data[I + 2] / 255 * newColor.B;
        }
      }
      ctx.putImageData(currentPixelsBack, 0, 0);
      backImg.src = canvas.toDataURL("image/png");
    } 
    if(select.id == 'particion2') {
      for(var I = 0, L = originalPixelsPart1.data.length; I < L; I += 4)
      {
        if(currentPixelsPart1.data[I + 3] > 0) // If it's not a transparent pixel
        {
            currentPixelsPart1.data[I] = originalPixelsPart1.data[I] / 255 * newColor.R;
            currentPixelsPart1.data[I + 1] = originalPixelsPart1.data[I + 1] / 255 * newColor.G;
            currentPixelsPart1.data[I + 2] = originalPixelsPart1.data[I + 2] / 255 * newColor.B;
        }
      }
      ctx.putImageData(currentPixelsPart1, 0, 0);
      part1Img.src = canvas.toDataURL("image/png");
    } 
    if(select.id == 'particion3') {
      for(var I = 0, L = originalPixelsPart2.data.length; I < L; I += 4)
      {
        if(currentPixelsPart2.data[I + 3] > 0) // If it's not a transparent pixel
        {
            currentPixelsPart2.data[I] = originalPixelsPart2.data[I] / 255 * newColor.R;
            currentPixelsPart2.data[I + 1] = originalPixelsPart2.data[I + 1] / 255 * newColor.G;
            currentPixelsPart2.data[I + 2] = originalPixelsPart2.data[I + 2] / 255 * newColor.B;
        }
      }
      ctx.putImageData(currentPixelsPart2, 0, 0);
      part2Img.src = canvas.toDataURL("image/png");
    } 
    if(select.id == 'particion4') {
      for(var I = 0, L = originalPixelsPart3.data.length; I < L; I += 4)
      {
        if(currentPixelsPart3.data[I + 3] > 0) // If it's not a transparent pixel
        {
            currentPixelsPart3.data[I] = originalPixelsPart3.data[I] / 255 * newColor.R;
            currentPixelsPart3.data[I + 1] = originalPixelsPart3.data[I + 1] / 255 * newColor.G;
            currentPixelsPart3.data[I + 2] = originalPixelsPart3.data[I + 2] / 255 * newColor.B;
        }
      }
      ctx.putImageData(currentPixelsPart3, 0, 0);
      part3Img.src = canvas.toDataURL("image/png");
    } 
    if(select.id == 'particion5') {
      for(var I = 0, L = originalPixelsPart4.data.length; I < L; I += 4)
      {
        if(currentPixelsPart4.data[I + 3] > 0) // If it's not a transparent pixel
        {
            currentPixelsPart4.data[I] = originalPixelsPart4.data[I] / 255 * newColor.R;
            currentPixelsPart4.data[I + 1] = originalPixelsPart4.data[I + 1] / 255 * newColor.G;
            currentPixelsPart4.data[I + 2] = originalPixelsPart4.data[I + 2] / 255 * newColor.B;
        }
      }
      ctx.putImageData(currentPixelsPart4, 0, 0);
      part4Img.src = canvas.toDataURL("image/png");
    } 
  }


  $('select[name="colorpicker-picker-shortlist"]').simplecolorpicker({picker: true, theme: 'glyphicons'});

  function displayParticiones(item) {
    var id = item.id;
    var src = item.children[0].src;
    srcBack = src;
    $("#back").attr("src", src);
    getPixels(backImg);
    //Limpieza de colores y particiones
    if(particion != -1) {
      $("#colorParticion1").css("display", "none");
      if(particion == 2) {
        $("#colorParticion2").css("display", "none");
      }
      else if(particion == 3) {
        $("#colorParticion2").css("display", "none");
        $("#colorParticion3").css("display", "none");
      }
      else if(particion == 4) {
        $("#colorParticion2").css("display", "none");
        $("#colorParticion3").css("display", "none");
        $("#colorParticion4").css("display", "none");
      }
      else if(particion == 5) {
        $("#colorParticion2").css("display", "none");
        $("#colorParticion3").css("display", "none");
        $("#colorParticion4").css("display", "none");
        $("#colorParticion5").css("display", "none");
      }
      $("#part1").attr("src", "");
      $("#part2").attr("src", "");
      $("#part3").attr("src", "");
      $("#part4").attr("src", "");
      resetColor();
      particion = -1;
    }
    if(base != -1) {
      var particiones = "#particiones" + base;
      $(particiones).css("display", "none");
      base = -1;
    } 
    base = item.id.substr(4, id.length);

    var particiones = "#particiones" + base;
    $(particiones).css("display", "block");
  }

  function displayColores(item) {
    var id = item.id;
    var src = item.children[0].src;
    //Reset de los colores
    if(particion != -1) {
      $("#back").attr("src", srcBack);
      $("#part1").attr("src", "");
      $("#part2").attr("src", "");
      $("#part3").attr("src", "");
      $("#part4").attr("src", "");
      resetColor();      
      particion = -1;
    }
    var childSrc = item.firstElementChild.src;
    particion = childSrc.substr(childSrc.length - 5, 1);
    //var colores = "#colores" + base + particion;

    if(particion == 1) {
      $("#colorParticion1").css("display", "block");
      $("#colorParticion2").css("display", "none");
      $("#colorParticion3").css("display", "none");
      $("#colorParticion4").css("display", "none");
      $("#colorParticion5").css("display", "none");
      getPixels(backImg);
    }
    else if(particion == 2) {
      var srcPart1 = src.substr(0, src.length - 5) + "1.png";
      srcPart1 = srcPart1.replace("miniaturas","particiones");
      $("#part1").attr("src", srcPart1);
      $("#colorParticion1").css("display", "block");
      $("#colorParticion2").css("display", "block");
      $("#colorParticion3").css("display", "none");
      $("#colorParticion4").css("display", "none");
      $("#colorParticion5").css("display", "none");
      getPixels(backImg);
      var prueba = false;   
      part1Img.onload=function(){getPixels(part1Img)};
    }
    else if(particion == 3) {
      var srcPart1 = src.substr(0, src.length - 5) + "1.png";
      srcPart1 = srcPart1.replace("miniaturas","particiones");
      var srcPart2 = src.substr(0, src.length - 5) + "2.png";
      srcPart2 = srcPart2.replace("miniaturas","particiones");
      $("#part1").attr("src", srcPart1);
      $("#part2").attr("src", srcPart2);
      $("#colorParticion1").css("display", "block");
      $("#colorParticion2").css("display", "block");
      $("#colorParticion3").css("display", "block");
      $("#colorParticion4").css("display", "none");
      $("#colorParticion5").css("display", "none");
      getPixels(backImg);
      part1Img.onload=function(){getPixels(part1Img)};
      part2Img.onload=function(){getPixels(part2Img)};
    }
    else if(particion == 4) {
      var srcPart1 = src.substr(0, src.length - 5) + "1.png";
      srcPart1 = srcPart1.replace("miniaturas","particiones");
      var srcPart2 = src.substr(0, src.length - 5) + "2.png";
      srcPart2 = srcPart2.replace("miniaturas","particiones");
      var srcPart3 = src.substr(0, src.length - 5) + "3.png";
      srcPart3 = srcPart3.replace("miniaturas","particiones");
      $("#part1").attr("src", srcPart1);
      $("#part2").attr("src", srcPart2);
      $("#part3").attr("src", srcPart3);
      $("#colorParticion1").css("display", "block");
      $("#colorParticion2").css("display", "block");
      $("#colorParticion3").css("display", "block");
      $("#colorParticion4").css("display", "block");
      $("#colorParticion5").css("display", "none");
      getPixels(backImg);
      part1Img.onload=function(){getPixels(part1Img)};
      part2Img.onload=function(){getPixels(part2Img)};
      part3Img.onload=function(){getPixels(part3Img)};
    }
    else  {
      var srcPart1 = src.substr(0, src.length - 5) + "1.png";
      srcPart1 = srcPart1.replace("miniaturas","particiones");
      var srcPart2 = src.substr(0, src.length - 5) + "2.png";
      srcPart2 = srcPart2.replace("miniaturas","particiones");
      var srcPart3 = src.substr(0, src.length - 5) + "3.png";
      srcPart3 = srcPart3.replace("miniaturas","particiones");
      var srcPart4 = src.substr(0, src.length - 5) + "4.png";
      srcPart4 = srcPart4.replace("miniaturas","particiones");
      $("#part1").attr("src", srcPart1);
      $("#part2").attr("src", srcPart2);
      $("#part3").attr("src", srcPart3);
      $("#part4").attr("src", srcPart4);
      $("#colorParticion1").css("display", "block");
      $("#colorParticion2").css("display", "block");
      $("#colorParticion3").css("display", "block");
      $("#colorParticion4").css("display", "block");
      $("#colorParticion5").css("display", "block");
      getPixels(backImg);
      part1Img.onload=function(){getPixels(part1Img)};
      part2Img.onload=function(){getPixels(part2Img)};
      part3Img.onload=function(){getPixels(part3Img)};
      part4Img.onload=function(){getPixels(part4Img)};
    }    
  }

//Funciones para cambiar de hexadecimal a RGB
  function hexToR(h) {return parseInt((cutHex(h)).substring(0,2),16)}
  function hexToG(h) {return parseInt((cutHex(h)).substring(2,4),16)}
  function hexToB(h) {return parseInt((cutHex(h)).substring(4,6),16)}
  function cutHex(h) {return (h.charAt(0)=="#") ? h.substring(1,7):h}

</script>