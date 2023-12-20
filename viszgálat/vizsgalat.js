/*Berkovics Gellért*/

var r = 0;
var b = 0;
var r2;
var b2;

function startRed() {
  if (0<=r && r<10000) {
    if (0<=r && r<4000) {
      r++;
      document.getElementById("redValue").innerHTML = "Kicsi hallom";
    }
    if (4000<=r && r<7000) {
      r++;
      document.getElementById("redValue").innerHTML = "Közepes hallom";
    }
    if (7000<=r && r<10000) {
      r++;
      document.getElementById("redValue").innerHTML = "Nagyon hallom";
    }
    r++;
    document.getElementById("rangeChechedRed").value = r;
    document.getElementById("rangeRedValue").innerHTML = r + " Hz";
  }
}

function startBlue() {
  if (0<=b && b<10000) {
    if (0<=b && b<4000) {
      b++;
      document.getElementById("blueValue").innerHTML = "Kicsi hallom";
    }
    if (4000<=b && b<7000) {
      b++;
      document.getElementById("blueValue").innerHTML = "Közepes hallom";
    }
    if (7000<=b && b<10000) {
      b++;
      document.getElementById("blueValue").innerHTML = "Nagyon hallom";
    }
    b++;
    document.getElementById("rangeChechedBlue").value = b;
    document.getElementById("rangeBlueValue").innerHTML = b + " Hz";
  }
}

//Button and RadioButton

var blue = document.getElementById("rightcolor");
var red = document.getElementById("leftcolor");

function nohear() {
  if (red.checked == true) {
    r = 0;
    r2 = setInterval("startRed()", 1);
  } else if (blue.checked == true) {
    b = 0;
    b2 = setInterval("startBlue()", 1);
  }
}

function hear() {
  if (red.checked == true) {
    clearInterval(r2);
  } else if (blue.checked == true) {
    clearInterval(b2);
  }
}

function ertekeles() {
  alert(
    document.getElementById("rangeRedValue").innerHTML = "Bal:  " + r + " Hz  " +
    document.getElementById("redValue").innerHTML
  );

  alert(
    document.getElementById("rangeBlueValue").innerHTML = "Jobb:  " + b + " Hz  " +
    document.getElementById("blueValue").innerHTML
  );

  clearInterval(r2);
  clearInterval(b2);
  red.checked = false;
  blue.checked = false;
  document.getElementById("rangeChechedRed").value = 0;
  document.getElementById("rangeRedValue").innerHTML = 0 + " Hz";
  document.getElementById("rangeChechedBlue").value = 0;
  document.getElementById("rangeBlueValue").innerHTML = 0 + " Hz";
  document.getElementById("redValue").innerHTML = "";
  document.getElementById("blueValue").innerHTML = "";

  alert("Köszönjük!");
}
