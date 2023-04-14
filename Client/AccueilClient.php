<?php
     session_start();  
    if(!isset($_SESSION['monlogin'])) header('location: ../VisiteurAnonyme/Login2.php');
?>
<!DOCTYPE html>
<html>
  <head>
     <meta charset="UTF-8">
     <title>Matériels informatiques</title>
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

       
         <link rel="stylesheet"  href="../CSS/Client1.css">
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





   <table class="infos">
         <tr>
            <td>
               <b>(+212) 05 35 67 68 70 | | info.client@ElectrOriental.ma </b>
            </td>    
          </tr>
    </table>


    <ul class="links">
     <!-- <li class=" acc"><a href="../VisiteurAnonyme/Login.php" class="ac">MON COMPTE</a></li> -->
      <li class="conn" ><a href="../VisiteurAnonyme/AccueilContact.php" class="con">CONTACT</a></li>
    </ul>

     <div class="logo1"><a href="AccueilClient.php"><img src="../img/Logo.png"></a></div>
    <form action="Recherche2.php" method="POST">
        <input type="text" size="60" name="Recherche" id="t" placeholder="Rechercher ">
        <button type="submit" id="p" ><i class="fa fa-search"></i> </button>
    </form>
    
        <button class="panier"><a href="panier1.php" title="panier" id="pan"><i class="fas fa-shopping-cart"style="font-size: 20px; "></i>Panier</a></button>
  

    <br><br>

      
     <nav id="nav">
      <ul >       
          <li class="left" ><a href="imprimante.php">Imprimantes </a></li>
          <li  class="left"><a href="Ordinateurs.php">Ordinateurs</a></li>
          <li  class="left"><a href="Peripheriques.php">Périphériques</a></li>
          <li  class="left"><a href="Onduleurs.php">Onduleurs</a></li>
          <li  class="left"><a href="Image.php">Images</a></li>
          <li  class="left"><a href="Téléphones.php">Téléphones</a></li>
          <li  class="left"><a href="Réseau.php">Réseau</a></li>
          
      </ul>
    </nav>







<br><br><br><br>

  <!-- Slides de nouveauté -->

  
    <div class ="diapos">
        <?php  
          include ('../Connexion_database.php'); 
          $requete="select  Id_produit,Photo , Prix ,Prix_Promo, description from produit where Photo like '%Nouveaute%'";
          $resultat = mysqli_query($connexion ,$requete);
          while($ligne = mysqli_fetch_object($resultat))
          {

             echo '<div class="diapo" >
               <div class="text">Nouveauté</div>
               <img src="../'.$ligne->Photo.'" class="img">
               <div class="text2">'.$ligne->description.'</div>

             </div>';
         }
        ?>
     
     
           <a class="precedent" onclick=" plusDiapo(-1)">&#10094;</a>
           <a class="suivant" onclick="plusDiapo(1)">&#10095;</a>
    </div>

    <div class="boutton">
         <span class="point" onclick="Diapocourant(1) "></span> 
         <span class="point" onclick="Diapocourant(2)"></span> 
    </div>

    <script type="text/javascript" src="../JS/slides.js"></script>
    <script type="text/javascript" src="../JS/accueil.js"></script>
       

    <br><br><br>





       <div>
         <?php 
         
         include ('../Connexion_database.php');
         echo '<div  id="ii"  >';
          //style="border:1px solid black;"
         //echo '<div class="card">';  
         $requete1="select  Id_produit,Photo , Prix ,Prix_Promo, description from produit where Photo like '%produits%'";
         $resultat1 = mysqli_query($connexion ,$requete1);
         while($ligne = mysqli_fetch_object($resultat1))
         {

         echo '<div class="card">
         
         <img src="../'.$ligne->Photo.'" alt="Produits" style="width:100%">
         <p style="font-size: 15pt;">'.$ligne->description.'</p>
         <p class="price"  name="pprix" style="font-size: 14pt;" >'.$ligne->Prix.' MAD</p>
         <p class="price_promo" style="color:#33eb3e; font-size:15pt">'.$ligne->Prix_Promo.' MAD</p>
        

         <button><a href="panier.php?id='.$ligne->Id_produit.'" name="mm" > <i class="fa fa-plus" style="font-size:25px"></i><i class="fas fa-shopping-cart2"style="font-size: 25px; "></i> </a></button>
         
         </div>';

          }  
        ?>

        </div>


      
       <!-- pied de la page -->
    
      <footer>
        
          <div class="contenu-footer">
           
             <div class="blocs footer-about">
                  <h3>A Propos</h3>
                  <p>electro.ma est un site <br> spécialisé  dans la  vente <br>
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
            <p> &copy; electro.ma | Designed by Nahari Imane & Laouaj Kaoutar</p> 
      </footer>



  </body>
</html>