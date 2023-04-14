
   var x = document.getElementById("connecter");
var y = document.getElementById("inscrire");
var z = document.getElementById("btn");
function load(){
	  y.style.display= "none";
}

window.onload=load;

function inscrire(){
  x.style.left = "-400px";
  y.style.left = "50px";
  z.style.left = "110px"; 
  x.style.display= "none";
  y.style.display="block";
  
}

function connecter(){
  x.style.left = "50px"; 
 y.style.left = "450px";
  z.style.left = "0px";
  y.style.display= "none";
  x.style.display="block ";
}
