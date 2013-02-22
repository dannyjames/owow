var DRAW = false;

function start(e) {
  DRAW = true;
  var x = e.offsetX;
  var y = e.offsetY;
  ctx.moveTo(x, y);
}

function move(e) {
  if (!DRAW) return;
  var x = e.offsetX;
  var y = e.offsetY;
  ctx.lineTo(x, y);
  ctx.stroke();
}

function end(e) {
  DRAW = false;
}
