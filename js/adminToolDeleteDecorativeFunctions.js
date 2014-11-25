 function showDecoracionImage(item) {
    if(item.value != "") {
      if(item[item.selectedIndex].id == "default") var src = "../img/decoraciones/" + item.id + "/" + item.value + ".png";
      else var src = "../img/admin/decoraciones/" + item.id + "/" + item.value + ".png";
      
      back.src = src;
      $("#back").on('load', function(){
          var width = back.width;
          var height = back.height;
          $("#back").css("margin-left",-Math.abs(width/2));
          $("#back").css("margin-top",-Math.abs(height/2));
        });
    }
  }

  function showDecoracion(item) {
    if(item.value != "") {
      $("#" + antSelect).css("display","none");
      if(antSelect != "") document.getElementById(antSelect).required = false;
      antSelect = item.value;
      $("#decoraciones").css("display","table-row");
      $("#" + antSelect).css("display","block");
      document.getElementById(antSelect).required = true;
    }
  }

  function guardarSrc() {
    //Guardo las variables que necesito para saber que borrar
    var group = $("#decorativeGroup").val();
    $("#imgName").val($("#" + group).val());
    if(back.src.indexOf("/admin/") == -1) $("#isDefault").val("true");
    else $("#isDefault").val("false");
  }
