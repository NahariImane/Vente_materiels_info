<?php
ob_start();
?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <title>S'inscrire / se connecter </title>
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.css">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet"  href="../CSS/Login3.css">
   </head>
  
   <body>
     
      <!-- s'inscrire / se connecter -->

         <div  class="login-form">
           <div class="logo1"><a href="../index.php"><img src="../img/Logo.png"></a></div> <br><br><br>
            <div class="form-box">
       	       <div class="button-box">
       	       	     <div id="btn"></div> 
       	   	         <button type="button"  class="toggle-btn" onclick="connecter()">Se connecter</button>
       	   	  	     <button type="button"  class="toggle2-btn" onclick="inscrire()">S'inscrire</button>
       	   	    </div>

       	   	    
       <!-- se connecter -->
       	        <div class="form">
       	        <form  id="connecter"   class="inputs"  method="POST">
       	           <input type="text"  name="email" class="input-field" placeholder="email" required>  
       	           <input type="password"  name="mot_de_passe" class="input-field" placeholder="Mot de passe" required> 

                  <!-- <br><br></b> <input type="checkbox" class="check-box"><span>Se souvenir de moi</span> -->
       	           <br><br><br><br><button type="submit" name="submit1" class="submit-btn">Se connecter</button>
       	        </form>
                       <?php
include ('../Connexion_database.php');
if (isset($_POST['submit1']))
{

 $Email=trim($_POST['email']);
 $Pass=trim($_POST['mot_de_passe']);
 $requete1="select Email , Mot_de_passe from client";
 $requete2="select Email_admin , Mot_de_passe_admin from administrateur";
 $resultat1 = mysqli_query($connexion ,$requete1);
 $resultat2 = mysqli_query($connexion ,$requete2);
 $cpt1=0;
 $cpt2=0;
 while($ligne = mysqli_fetch_object($resultat1)) {
 if(($ligne->Email==$Email)&&($ligne->Mot_de_passe==$Pass))
 {
$cpt1++;
 }
}
while($ligne2 = mysqli_fetch_object($resultat2))
{
 if(($ligne2->Email_admin==$Email)&&($ligne2->Mot_de_passe_admin==$Pass))
 {
$cpt2++;
 }
 }
 if(($cpt1==0)&&($cpt2==0))
 {
echo '<p class="R">votre mot de passe ou email est incorrecte !!!</p>';
 }
 if($cpt1!=0)
 {
 session_start(); 
$_SESSION['monlogin'] =$Email;
header('location: ../Client/AccueilClient.php'); 
 }
 if($cpt2!=0)
 {
session_start();
$_SESSION['monlogin'] =$Email;
header('location: ../Administrateur/admin.php');
 }

}
mysqli_close($connexion);
?> 
                </div>
        <!-- s'inscrire  -->
                <div id="hh">
                <form id="inscrire"  class="inputs"  method="POST">
                    <input type="text" class="input-field" name="prenom" placeholder="Prenom" required> 
                    <input type="text" class="input-field"  name="nom" placeholder="Nom" required> 
                     <input type="text" class="input-field"  name="adresse" placeholder="Adresse" required> 
                     <div class="select-style">
                     <SELECT name="ville" >
                      <OPTION VALUE="Guercif">Guercif</OPTION>
                      <OPTION VALUE="Ahfir">Ahfir</OPTION>
                      <OPTION VALUE="Aklim">Aklim</OPTION>
                      <OPTION VALUE="Berkane">Berkane</OPTION>
                      <OPTION VALUE="Saidia">Saidia</OPTION>
                      <OPTION VALUE="Figuig">Figuig</OPTION>
                      <OPTION VALUE="Jerada">Jerada</OPTION>
                      <OPTION VALUE="Al Aaroui">Al Aaroui</OPTION>
                      <OPTION VALUE="Bni Ansar">Bni Ansar</OPTION>
                      <OPTION VALUE="Driouch">Driouch</OPTION>
                      <OPTION VALUE="Nador">Nador</OPTION>
                      <OPTION VALUE="Selouane">Selouane</OPTION>
                      <OPTION VALUE="Zaio">Zaio</OPTION>
                      <OPTION VALUE="Ain Es Sfa">Ain Es Sfa</OPTION>
                      <OPTION VALUE="Beni Drar">Beni Drar</OPTION>
                      <OPTION VALUE="Bni Drar">Bni Drar</OPTION>
                      <OPTION VALUE="Oujda">Oujda</OPTION>
                      <OPTION VALUE="El Aioune">El Aioune</OPTION>
                      <OPTION VALUE="Taourirt">Taourirt</OPTION>
                      </SELECT>
                       </div>
                          <br>
                       <input type="text" class="input-field"  name="tel" placeholder="Numero de téléphone" required> 
                    <input type="text" class="input-field" name="email" placeholder="Email" required>  
                    <input type="password" class="input-field"  name="mot_de_passe" placeholder="Mot de passe" required> 
                    <input type="password" class="input-field"  name="mot_de_passeC" placeholder="Confirmer votre mot de passe" required> 
                 <!-- <br><br> <input type="checkbox" class="check-box"><span>j'accepte tout les conditions</span> --> <br><br><br>
                  <button type="submit" name="submit2" class="submit-btn">S'inscrire</button>
                
                </form> 
<?php
include ('../Connexion_database.php');   
if (isset($_POST['submit2']))
{
$Ville=$_REQUEST["ville"];
 $Nom=$_POST['nom'];
 $Prenom=$_POST['prenom'];
 $Adresse=$_POST['adresse'];
 $Tel=$_POST['tel'];
 $Email=$_POST['email'];
 $Pass=$_POST['mot_de_passe']; 
 $PassC=$_POST['mot_de_passeC']; 
 $A=0;
if ($Nom&&$Prenom&&$Email&&$Pass&&$Adresse&&$Tel&&$Ville&&$PassC)
        { 
if($Pass==$PassC)
{
$I2="select Email from client";
 $k=0;
 $RE2=mysqli_query($connexion ,$I2);
  while($ligne = mysqli_fetch_row($RE2)) {
    $OurEmail=$ligne[0];
  if($Email==$OurEmail)
  {
   $k++; 
  }
}
if($k==0)
{
 $I="select Id_Ville from ville WHERE Nom_Ville='$Ville'";
 $R=mysqli_query($connexion ,$I);
  while($ligne = mysqli_fetch_row($R)) {
    $A=$ligne[0];
} 
 //On créé la requête
if(preg_match("#[0][6][- \.?]?([0-9][0-9][- \.?]?){4}$#", $Tel)||preg_match("#[0][5][- \.?]?([0-9][0-9][- \.?]?){4}$#", $Tel)||preg_match("#[0][7][- \.?]?([0-9][0-9][- \.?]?){4}$#", $Tel))
{
$sql = "INSERT INTO  client (Id_Ville,Nom,Prenom,Adresse,NumTel,Email,Mot_de_passe) VALUES ($A,'$Nom','$Prenom','$Adresse','$Tel','$Email','$Pass')";
    // On envoie la requête
$res = $connexion->query($sql);
session_start();
$_SESSION['monlogin'] =$Email;
header('location: ../Client/AccueilClient.php'); 
}
else
echo '<p class="R">Veuillez saisir un NumTel sous cette format:  05******** ou 06******** ou 07********  </p>';

       // on ferme la connexion
mysqli_close($connexion);  
}
else
{
  echo '<p class="R">Cette adresse email existe déja!!!</p>';
}
} 
else
echo '<p class="R">Veuillez saisir le meme mot de passe</p>'; 
} 
}
?>
                </div>
       	    <a href="../index.php" title="retour"><i class="fa fa-mail-reply"></i></a> 
            </div>
        </div>

 <script type="text/javascript" src="../JS/Login2.js"></script> 
<?php

  ob_end_flush();
  ?>

   </body>



</html>
