function showTable(item) {
    if(item.value == "base") {
      $('#base').css('display','block');
      $('#particion').css('display','none');
      document.getElementById("nombreBase").required = true;
      document.getElementById("nombreBaseParticion").required = false;
      if(antSelect != "") document.getElementById(antSelect).required = false;
    }
    else {
      $('#base').css('display','none');
      $('#particion').css('display','block');
      document.getElementById("nombreBase").required = false;
      document.getElementById("nombreBaseParticion").required = true;
    }
    borrarElementos();
  }

  function showBase(item) {
    if(item.value != "") {
      if(item.value != "Aleman" && item.value != "Apuntado" && item.value != "Frances" && item.value != "Ingles" 
        && item.value != "Italiano" && item.value != "Semicircular") var src = "../img/admin/bases/" + item.value + ".png";
      else var src = "../img/bases/" + item.value + ".png";
      back.src = src;
    }
    else back.src = "";
  }

  function showBaseParticion(item) {
    if(item.value != "") {
      if(item.value != "Aleman" && item.value != "Apuntado" && item.value != "Frances" && item.value != "Ingles" 
        && item.value != "Italiano" && item.value != "Semicircular") var src = "../img/admin/bases/" + item.value + ".png";
      else var src = "../img/bases/" + item.value + ".png";
      back.src = src;
      $("#" + antSelect).css("display","none");
      if(antSelect != "") document.getElementById(antSelect).required = false;
      antSelect = item.value;
      $("#particiones").css("display","table-row");
      $("#" + antSelect).css("display","block");
      document.getElementById(antSelect).required = true;
    }
  }

  function showParticion(item) {
    if(item.value != "") {
      var src = "../img/admin/miniaturas/" + item.id + "/" + item.value + ".png";
      back.src = src;
    }
  }

  function borrarElementos() {
    $("#back").attr("src","");
    $("#nombreBase").val("");
    $("#nombreBaseParticion").val("");
    $("#nombreParticion").val("");
  }

  function guardarSrc() {
    //Guardo las variables que necesito para saber que borrar
    $("#src").val(back.src);
    if($("#nombreBase").val() != "" && $("#nombreBase").val() != null) {
      $("#imgName").val($("#nombreBase").val());
    }
    else if($("#nombreBaseParticion").val() != "" && $("#nombreBaseParticion").val() != null) {
      var nombreBase = $("#nombreBaseParticion").val();
      document.getElementById("imgNameBase").value = nombreBase;
      document.getElementById("imgName").value = document.getElementById(nombreBase).value;
    }
  }