<?php
$connexion = mysqli_connect("localhost","root","");
  if( !$connexion) 
  { 
   echo "Desolé, connexion à localhost impossible"; 
   exit; 
  }
 if( !mysqli_select_db($connexion,'vente_materiels')) 
 { 
  echo "Désolé, accès à la base vente_materiels impossible";  
  exit;
 }
?>