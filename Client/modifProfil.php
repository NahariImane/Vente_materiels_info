<?php
    session_start(); 
    if(!isset($_SESSION['monlogin'])) header('location: ../VisiteurAnonyme/Login2.php');
?>
<!doctype html>
 <html>
  <head>
   <meta charset="utf-8">
   <title>modifier mon compte</title>
   <link rel="stylesheet" href="../CSS/modif1.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.css">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     
           <link rel="stylesheet"  href="../CSS/Profil2.css">
  </head>
  <body>



<!-- Trigger/Open The Modal -->
<!-- The Modal -->

<a class="l"  id="myBtn"><i class="fa fa-user"></i></a>
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
   <!-- <script type="text/javascript">
    var nom='<?php echo $nom;?>';
    var prenom='<?php echo $prenom;?>';
    var email='<?php echo $email;?>';
    var tel='<?php echo $tel;?>';
    var password='<?php echo $password;?>';
    document.write('<table class="T"><tr><th class="th2">Nom</th><th class="th2">Prenom</th><th class="th2">Email</th><th class="th2">Tel</th><th class="th2">Mot de passe</th></tr><tr><td class="th2">'+nom+'</td><td class="th2">'+prenom+'</td><td class="th2">'+email+'</td><td class="th2">'+tel+'</td><td class="th2">'+password+'</td></form></tr></table>');
</script> -->
<form method="post" class="frm3">
 <button class="Modifier" name="MODIF"><a href="modifProfil.php" style="text-decoration:none;color:black; ">Gerer mon compte</a></button>
 <button class="Deconnexion"><a href="../VisiteurAnonyme/Deconnexion.php"  style="text-decoration:none;color:black;"><i class="fas fa-sign-out-alt"></i>    Deconnexion</a></button>
<!--<a href="../VisiteurAnonyme/Deconnexion.php" title="Se Déconnecter" class="s"><i class="fas fa-sign-out-alt"></i></a></li> -->
</form>
  </div>
</div>
<script src="../JS/Profil.js"></script>

<div class="logo1">
<a href="admin.php"><img src="../img/Logo.png"></a></div> 


    <?php
     include ('../Connexion_database.php');
     $mail=$_SESSION['monlogin'];
     $result1 = mysqli_query($connexion ,"SELECT c.Id_client,c.Nom,c.Prenom,c.Adresse,c.NumTel,c.Email,c.Mot_de_passe, v.Nom_Ville from client c , ville v  where c.Id_Ville=v.Id_Ville and c.Email='$mail'");
   while($ligne = mysqli_fetch_object($result1))
   {
    $ID=$ligne->Id_client;
    $Ourville=$ligne->Nom_Ville;
   echo '<form method="post" class="frm4">
    Nom :<br><input type="text" name="A" value="'.$ligne->Nom.'"  required><br><br>
    Prenom :<br><input type="text" name="B" value="'.$ligne->Prenom.'" required><br><br>
    Adresse:<br><input type="text" name="C" value="'.$ligne->Adresse.'" required><br><br>
    Téléphone :<br><input type="text" name="D" value="'.$ligne->NumTel.'" required><br><br>
    Ville :<br>    <select name="E">
              <option>'.$Ourville.'</option>';
         $result2 = mysqli_query($connexion ,"SELECT Nom_Ville from ville where Nom_Ville!='".$Ourville."'");
   while($ligne2 = mysqli_fetch_object($result2))
   {
    echo '<option>'.$ligne2->Nom_Ville.'</option>';
  }

  echo '</select><br><br>

    Email :<br><input type="text" name="F" value="'.$ligne->Email.'" required><br><br>
   
    Mot de passe :<br><input type="password" name="G" value="'.$ligne->Mot_de_passe.'" required><br><br>
    Confirmer votre mot de passe :<br><input type="password" name="H" ><br><br>
    <input type="submit" name="submit" value="Valider">
    
   </form>
    <a href="AccueilClient.php" title="retour"><i class="fa fa-mail-reply"></i></a>';
}

    if(isset($_POST['submit']))
    {
     $id=$ID;
     $nom=$_POST['A'];
     $prenom=$_POST['B'];
     $adresse=$_POST['C'];
     $tel=$_POST['D'];
     $ville=$_POST['E'];
     $email=$_POST['F'];
     $password=$_POST['G'];
     $passwordC=$_POST['H'];
     $Id_ville=0;

          $I2="select Email from client where Email!='$mail'";
           $k=0;
           $RE2=mysqli_query($connexion ,$I2);
          while($ligne = mysqli_fetch_row($RE2)) {
          $OurEmail=$ligne[0];
          if($email==$OurEmail)
           {
           $k++; 
           }
           }
          if($k==0)
          {

 //On créé la requête
if(preg_match("#[0][6][- \.?]?([0-9][0-9][- \.?]?){4}$#", $tel)||preg_match("#[0][5][- \.?]?([0-9][0-9][- \.?]?){4}$#", $tel)||preg_match("#[0][7][- \.?]?([0-9][0-9][- \.?]?){4}$#", $tel))
{
       if($passwordC!=null){
        if ($passwordC==$password) {
        $res= mysqli_query($connexion ,"SELECT Id_ville from ville where Nom_Ville='$ville'");
     while ($ligne= mysqli_fetch_object($res)) {
      $Id_ville=$ligne->Id_ville;
     }
     if($result = mysqli_query($connexion ,"UPDATE client SET Nom='$nom' , Prenom='$prenom' ,Adresse='$adresse', Email='$email' , NumTel='$tel', Id_Ville=$Id_ville , Mot_de_passe='$password' where Id_client='$id'"))
     {
      echo '<script>alert(\'Modification avec succées.......\');</script>';
      header('Refresh: 0; url=AccueilClient.php');
     }
   }
       else{
       echo'<script> alert(\'Votre confirmation est incorrect!!!!!\'); </script>';
       }
       } 
      else
      {
         $res= mysqli_query($connexion ,"SELECT Id_ville from ville where Nom_Ville='$ville'");
     while ($ligne= mysqli_fetch_object($res)) {
      $Id_ville=$ligne->Id_ville;
     }
     if($result = mysqli_query($connexion ,"UPDATE client SET Nom='$nom' , Prenom='$prenom' ,Adresse='$adresse', Email='$email' , NumTel='$tel', Id_Ville=$Id_ville where Id_client='$id'"))
     {
      echo '<script>alert(\'Modification avec succées.......\');</script>';
      header('Refresh: 0; url=AccueilClient.php');
     }
}
}
else
echo '<p class="R">Veuillez saisir un NumTel sous cette format:  05******** ou 06******** ou 07********  </p>'; 
}
else
  echo '<p class="R">Cette adresse email existe déja!!!</p>';
} 
   ?>


   <!-- pied de la page -->
  
      <footer>
        
          <div class="contenu-footer">
           
             <div class="blocs footer-about">
                  <h3>A Propos</h3>
                  <p>electrOriental.ma est un site <br> spécialisé  dans la  vente <br>
                      en ligne de matériels<br>informatiques à l'oriental</p>
             </div>
             <div class="blocs footer-contact">
                  <h3>Contactez-nous</h3>
                  <p>Tel: +212 606070607</p>
                  <p>Email: admin@contact.com</p>
                  <p>Adresse: 19 rue Alqods , Oujda ,Maroc</p>
            </div>
            <div class="blocs footer-media">
                  <h3>Réseaux Sociaux</h3>
                  <ul class="medias">
                      <li><a href="#"><i class="fab fa-facebook-square"></i> Facebook</a></li> <br><br>
                      <li><a href="#"><i class="fab fa-instagram"></i> Instagram</a></li> 
                 </ul>
            </div>
          </div>
            <p> &copy; electrOriental.ma | Designed by Nahari Imane & Laouaj Kaoutar</p> 
      </footer>

  </body>
 </html>