var DRAW = false;
var offsetY;

function start(e) {
  e.preventDefault(); // prevent dragging
  DRAW = true;
  offsetY = canvas.getBoundingClientRect().top;
  if ('touches' in e)
    e = e.touches[0];
  var x = e.clientX;
  var y = e.clientY - offsetY;
  ctx.moveTo(x, y);
}

function move(e) {
  if (!DRAW) return;
  if ('touches' in e)
    e = e.touches[0];
  var x = e.clientX;
  var y = e.clientY - offsetY;
  ctx.lineTo(x, y);
  ctx.stroke();
}

function end(e) {
  DRAW = false;
}
