//Variables para canvas
var canvas = document.createElement("canvas");
var ctx = canvas.getContext("2d");
var mainCanvas = new fabric.Canvas('mainCanvas');
fabric.Object.prototype.transparentCorners = false;
fabric.Object.prototype.cornerSize = 8;
fabric.Object.prototype.borderColor = 'black';
fabric.Object.prototype.cornerColor= 'black';

function addImage(item) {
  var imgElement = document.getElementById(item.id);
  var imgInstance = new fabric.Image(imgElement, {
    left: 150,
    top: 50
  });
  mainCanvas.add(imgInstance);
}

function deleteImage() {
  var activeObject = mainCanvas.getActiveObject();
  if (activeObject) {
    mainCanvas.remove(activeObject);
  }
}

function bringForward() {
  var activeObject = mainCanvas.getActiveObject();
  if (activeObject) {
    mainCanvas.bringForward(activeObject);
  }
}

function sendBackwards() {
  var activeObject = mainCanvas.getActiveObject();
  if (activeObject) {
    mainCanvas.sendBackwards(activeObject);
  }
}

function mirrorImage() {
  var activeObject = mainCanvas.getActiveObject();
  if (activeObject) {
    if(!activeObject.getFlipX()) activeObject.set('flipX', true);
    else activeObject.set('flipX', false);
    mainCanvas.renderAll();
  }
}

function cloneElement() {
  var activeObject = mainCanvas.getActiveObject();
  if (activeObject) {
    var newObject = fabric.util.object.clone(activeObject); 
    newObject.set("top", activeObject.getTop()+50);
    newObject.set("left", activeObject.getLeft()+50);
    mainCanvas.add(newObject);
    mainCanvas.renderAll();
  }
}

function updateAngle(item) {
  var activeObject = mainCanvas.getActiveObject();
  if (activeObject) {
    if(activeObject.getAngle() > 360) activeObject.setAngle(parseInt(item.value + 360, 10)).setCoords();
    else activeObject.setAngle(parseInt(item.value, 10)).setCoords();
    mainCanvas.renderAll();
  }
};

function updateScale(item) {
  var activeObject = mainCanvas.getActiveObject();
  if (activeObject) {
    activeObject.scale(parseFloat(item.value)).setCoords();
    mainCanvas.renderAll();
  }
};

function updateTop(item) {
  var activeObject = mainCanvas.getActiveObject();
  if (activeObject) {
    activeObject.setTop(parseInt(item.value, 10)).setCoords();
    mainCanvas.renderAll();
  }
};

function updateLeft(item) {
  var activeObject = mainCanvas.getActiveObject();
  if (activeObject) {
    activeObject.setLeft(parseInt(item.value, 10)).setCoords();
    mainCanvas.renderAll();
  }
};

function updateControls() {
  var scaleControl = document.getElementById("scale-control");
  var angleControl = document.getElementById("angle-control");
  var leftControl = document.getElementById("left-control");
  var topControl = document.getElementById("top-control");
  var activeObject = mainCanvas.getActiveObject();
  scaleControl.setAttribute("value",activeObject.getScaleX());
  if(activeObject.getAngle() > 360) angleControl.setAttribute("value",activeObject.getAngle()-360);
  else angleControl.setAttribute("value",activeObject.getAngle());
  leftControl.setAttribute("value",activeObject.getLeft());
  topControl.setAttribute("value",activeObject.getTop());
}
mainCanvas.on({
  'object:moving': updateControls,
  'object:scaling': updateControls,
  'object:resizing': updateControls,
  'object:rotating': updateControls
});