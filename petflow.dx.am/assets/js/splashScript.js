var r = new Rune({
  container: "#logo-animation",
  width: window.innerWidth,
  height: window.innerHeight
});

var planet = r.group(0, 0);

var START_POSITION_X = window.innerWidth / 2,
  START_POSITION_Y = window.innerHeight / 2,
  MXM_RADIUS = window.innerWidth,
  CIRCLE_RADIUS_OUTER,
  CIRCLE_RADIUS_INNER,
  START_POSITION_INNER_X,
  START_POSITION_INNER_Y,
  outerCircle, innerCircle;

var outerColor = '#FAAA39';
var innerColor = '#FFFFFF';

function init() {
  reset();

  START_POSITION_INNER_X = START_POSITION_X + CIRCLE_RADIUS_OUTER / 2;
  START_POSITION_INNER_Y = START_POSITION_Y - CIRCLE_RADIUS_OUTER / 2;
  outerCircle = r.circle(START_POSITION_X, START_POSITION_Y, CIRCLE_RADIUS_OUTER, planet).fill(outerColor);
  drawInner();
}

function drawOuter() {
  outerCircle = r.circle(START_POSITION_X, START_POSITION_Y, CIRCLE_RADIUS_OUTER, planet).fill(outerColor);
}

function drawInner() {
  innerCircle = r.circle(START_POSITION_INNER_X, START_POSITION_INNER_Y, CIRCLE_RADIUS_INNER, planet).stroke(innerColor).fill(innerColor);
}

function getExponensualScale(val) {
  var minRad = 10;
  var maxRad = MXM_RADIUS;

  var minv = Math.log(minRad);
  var maxv = Math.log(maxRad);
  var scale = (maxv - minv) / (maxRad - minRad);
  return Math.exp(minv + scale * (val - minRad) * 0.1);
}

function cleanUp() {
  planet.remove(innerCircle);
  planet.remove(outerCircle);
}

r.on('draw', function() {

  if (CIRCLE_RADIUS_OUTER <= MXM_RADIUS) {
    cleanUp();
    drawOuter();
    CIRCLE_RADIUS_OUTER += getExponensualScale(CIRCLE_RADIUS_OUTER);
  }

  if (CIRCLE_RADIUS_OUTER > MXM_RADIUS && CIRCLE_RADIUS_INNER < MXM_RADIUS) {
    cleanUp();
    drawOuter();
    drawInner();
    CIRCLE_RADIUS_INNER += getExponensualScale(CIRCLE_RADIUS_INNER);
  }

  if (CIRCLE_RADIUS_INNER >= MXM_RADIUS) {
    reset();
  }

})

function reset() {
  CIRCLE_RADIUS_OUTER = 50;
  CIRCLE_RADIUS_INNER = 5;
}

init();
r.draw();
r.play();