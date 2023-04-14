var diapoIndex = 1;
showDiapo(diapoIndex);

function plusDiapo(n){
   showDiapo(diapoIndex +=n);
}

function Diapocourant(n){
	showDiapo(diapoIndex = n);
}

function showDiapo(n){
	var i ;
	var diapos = document.getElementsByClassName("diapo");
	var points = document.getElementsByClassName("point");
      if (n > diapos.length) {diapoIndex = 1}    
      if (n < 1) {diapoIndex = diapos.length}
      for (i = 0; i < diapos.length; i++) {
          diapos[i].style.display = "none";  
      }
      for (i = 0; i < points.length; i++) {
          points[i].className = points[i].className.replace(" active", "");
      }
      diapos[diapoIndex-1].style.display = "block";  
      points[diapondex-1].className += " active";

}