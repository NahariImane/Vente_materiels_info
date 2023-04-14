<?php
    session_start(); 
    if(!isset($_SESSION['monlogin'])) header('location: ../Anonyme/Login2.php');
?>
<!doctype html>
 <html>
 <head>
  <meta charset="utf-8">
  <title>Update</title>
  
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


<?php
include('../Connexion_database.php');
$result1 = mysqli_query($connexion ,"SELECT Id_Categorie ,Libelle_Categorie from categorie where Id_Categorie='".$_GET['id']."'");
   while($ligne = mysqli_fetch_object($result1))
   {
   $ID=$ligne->Id_Categorie;
   echo '<form method="POST" class="frm2">
    Nom :<br><input type="text" name="A" value="'.$ligne->Libelle_Categorie.'" ><br><br>
    <input type="submit" name="submit" value="Valider les modifications">
   
   </form>
    <a href="Affichercategorie.php" title="retour"><i class="fa fa-mail-reply"></i></a>';
 }
   //
    if(isset($_POST['submit']))
    {
      $id=$ID;
      $nom=$_POST['A'];
     if($result = mysqli_query($connexion ,"UPDATE categorie SET Libelle_Categorie='$nom'  where Id_Categorie=$id"))
     {
      echo '<script>alert(\'Modification avec succées.......\');</script>';
      header('Refresh: 0; url=Affichercategorie.php');
     }
      
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