<?php
    session_start(); 
    if(!isset($_SESSION['monlogin'])) header('location: ../VisiteurAnonyme/Login2.php');
?>
<!doctype html>
 <html>
  <head>
   <meta charset="utf-8">
   <title>modifier mon compte</title>
   <!-- <link rel="stylesheet" href="../CSS/modif8.css"> -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.css">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
      <link rel="stylesheet" href="../CSS/MODAL2.css">
      <link rel="stylesheet" href="../CSS/Aclient4.css">
  </head>
  <body>


    <!-- Trigger/Open The Modal -->
<!-- The Modal -->
<a class="l"  id="myBtn"><i class="fa fa-user"></i> </a>
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <!-- <script type="text/javascript">
    var nom='<?php echo $nom;?>';
    var prenom='<?php echo $prenom;?>';
    var email='<?php echo $email;?>';
    var tel='<?php echo $tel;?>';
    var password='<?php echo $password;?>';
    document.write('<form><input type="text" value="'+nom+'"><br><input type="text" value="'+prenom+'"><br><input type="text" value="'+email+'"><br><input type="text" value="'+tel+'"><br><input type="text" value="'+password+'"><br></form>');
</script> -->
<form method="post">
 <button class="Modifier" name="MODIF"><a href="Modifierprofil.php" style="text-decoration:none;color:black; ">Gerer mon compte</a></button>
 <button class="Deconnexion"><a href="../VisiteurAnonyme/Deconnexion.php" style="text-decoration:none;color:black;">Deconnexion</a></button>
</form>
  </div>
</div>
<script src="../JS/MODAL2.js"></script>
<div class="logo1">
<a href="admin.php"><img src="../img/Logo.png"></a></div> 



    <?php
     include ('../Connexion_database.php');
     $mail=$_SESSION['monlogin'];
     $result1 = mysqli_query($connexion ,"SELECT Id_admin,Nom_admin,Prenom_admin,NumTel_admin,Email_admin,Mot_de_passe_admin from administrateur  where Email_admin='$mail'");
   while($ligne = mysqli_fetch_object($result1))
   {
    $ID=$ligne->Id_admin;
   echo '<form method="post" class="frm3">
    Nom :<br><input type="text" name="A" value="'.$ligne->Nom_admin.'"  required><br><br>
    Prenom :<br><input type="text" name="B" value="'.$ligne->Prenom_admin.'" required><br><br>
    Téléphone :<br><input type="text" name="C" value="'.$ligne->NumTel_admin.'" required><br><br>
    Email :<br><input type="text" name="D" value="'.$ligne->Email_admin.'" required><br><br> 
    Mot de passe :<br><input type="password" name="E" value="'.$ligne->Mot_de_passe_admin.'" required><br><br>
    Confirmer votre mot de passe :<br><input type="password" name="F" ><br><br>
    <input type="submit" name="submit" value="Valider">
   
   </form>
    <a href="admin.php" title="retour"><i class="fa fa-mail-reply"></i></a>';
}

    if(isset($_POST['submit']))
    {
     $id=$ID;
     $nom=$_POST['A'];
     $prenom=$_POST['B'];
     $tel=$_POST['C'];
     $email=$_POST['D'];
     $password=$_POST['E'];
     $passwordC=$_POST['F'];
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
     if($result = mysqli_query($connexion ,"UPDATE administrateur SET Nom_admin='$nom' , Prenom_admin='$prenom' , Email_admin='$email' , NumTel_admin='$tel', Mot_de_passe_admin='$password' where Id_admin='$id'"))
     {
      echo '<script>alert(\'Modification avec succées.......\');</script>';
      header('Refresh: 0; url=Modifierprofil.php');
     }
   }
       else{
       echo'<script> alert(\'Votre confirmation est incorrect!!!!!\'); </script>';
       }
       } 
      else
      {
     if($result = mysqli_query($connexion ,"UPDATE administrateur SET Nom_admin='$nom' , Prenom_admin='$prenom' , Email_admin='$email' , NumTel_admin='$tel', Mot_de_passe_admin='$password' where Id_admin='$id'"))
     {
      echo '<script>alert(\'Modification avec succées.......\');</script>';
      header('Refresh: 0; url=Modifierprofil.php');
     }
}
}
else
echo '<script>alert(\'Veuillez saisir un NumTel sous cette format:  05******** ou 06******** ou 07********\'); </script>'; 
}
else
  echo '<script>alert(\'Cette adresse email existe déja!!!\'); </script>';
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