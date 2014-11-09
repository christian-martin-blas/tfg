function displayEscudo(item) {
      document.getElementById("autorPopUp").value = item.children[0].value;
      document.getElementById("descripcionPopUp").value = item.children[1].value;
      document.getElementById("historiaPopUp").value = item.children[2].value;
      document.getElementById("tituloPopUp").value = item.children[3].value;
      var src = item.children[4].src;
      var index = src.indexOf("/img");
      var path = src.substring(index); 
      document.getElementById("escudo").src = "." + path;
      $("#popUpVisualization").dialog("open");
}

function downloadImage() {
  var src = document.getElementById("escudo").src;
  var a = $("<a>")
      .attr("href", src)
      .attr("download", "Escudo.png")
      .appendTo("body");

      a[0].click();

      a.remove();
}