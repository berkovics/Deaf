/*Berkovics Gellért*/
var c=document.getElementById("c1");
var rajzlap=c.getContext("2d");
rajzlap.beginPath();

var c2=document.getElementById("c2");
var rajzlap2=c2.getContext("2d");
rajzlap2.beginPath();

for(var x=0;x<=500;x+=70){
  rajzlap.moveTo(x,0);  
  rajzlap.lineTo(x,500);
}

for(var x=210;x<=500;x+=35){
  rajzlap.moveTo(x,0); 
  rajzlap.lineTo(x,500);
}

for(var y=0;y<=500;y+=45){
  rajzlap.moveTo(0,y); 
  rajzlap.lineTo(500,y);
}

for(var x=0;x<=20;x+=70){
  rajzlap2.moveTo(x,0);  
  rajzlap2.lineTo(x,500);
}

for(var y=0;y<=500;y+=45){
  rajzlap2.moveTo(0,y); 
  rajzlap2.lineTo(500,y);
}

rajzlap.stroke();
rajzlap.beginPath();

rajzlap2.stroke();
rajzlap2.beginPath();

for(var db=1;db<=6;db++){
  var x=Math.floor(Math.random()*494); 
  var y=Math.floor(Math.random()*0);
  //rajzlap.fillStyle="red";
  rajzlap.fillRect(x,y,10,10);

  if(db==1){
    var eX=x;
    var eY=y;
    var elsoX=x;
    var elsoY=y;
  }else{
    rajzlap.moveTo(eX+5,eY+5); 
    rajzlap.lineTo(x+5,y+5);
    //rajzlap.strokeStyle="rgb(255, 0, 0)";
    rajzlap.stroke();
    eX=x;
    eY=y;

    function redColor(){
      var red = document.getElementById("leftcolor");
      if (red.checked == true) {
        rajzlap.fillStyle="red";
        rajzlap.fillRect(x,y,10,10);
        rajzlap.strokeStyle="red";
        rajzlap.stroke();
        eX=x;
        eY=y;
        return red;
      }
    }

    function blueColor() {
      var blue = document.getElementById("rightcolor");
      if (blue.checked == true) {
        rajzlap.fillStyle="blue";
        rajzlap.fillRect(x,y,10,10);
        rajzlap.strokeStyle="blue";
        rajzlap.stroke();
        eX=x;
        eY=y;
        return blue;
      }
    }

    //if(db==4){
      //rajzlap.moveTo(eX+3,eY+3);
      //rajzlap.lineTo(elsoX+3,elsoY+3);
      //rajzlap.strokeStyle="rgb(255,0,255)";
      //rajzlap.stroke();
    //}
  }
}


function balbutton() {
  if (x>=1 && x>=6) {
    rajzlap.fillStyle="green";
    c.innerHTML=rajzlap.fillRect(x,y,10,10);
  }
}

function jobbbutton() {
  if (x<=1 && x<=6) {
    rajzlap.fillStyle="green";
    c.innerHTML=rajzlap.fillRect(x,y,10,10);
  }
}

function nohear() {
  if (y<=1 && y<=6) {
    rajzlap.fillStyle="green";
    c.innerHTML=rajzlap.fillRect(x,y,10,10);
  }
}

function hear() {
  if (y<=1 && y<=6) {
    rajzlap.fillStyle="green";
    c.innerHTML=rajzlap.fillRect(x,y,10,10);
  }
}

function ertekeles() {
  alert("Köszönjük!");
}


