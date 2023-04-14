<!DOCTYPE html>
<html>
  <head>
     <meta charset="UTF-8">
     <title>Matériels informatiques</title>
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.css">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

         <link rel="stylesheet"  href="CSS/index.css">
      

  </head>
  
  <body>
    

   <!-- <div class="logo1"><a href="index.php"><img src="img/logo.jpeg"></a></div>  -->
    <table class="infos">
         <tr>
            <td>
               <b> (+212) 05 35 67 68 70 | | info.client@ElectrOriental.ma </b>
            </td>    
          </tr>
    </table>


    <ul class="links">
      <li class=" acc"><a href="VisiteurAnonyme/Login.php" class="ac">CONNEXION</a></li>
      <li class="conn" ><a href="VisiteurAnonyme/AccueilContact.php" class="con">CONTACT</a></li>
    </ul>



    <br><br><br><br>
     <div class="logo1"><a href="index.php"><img src="img/Logo.png"></a></div>
    <form action="Recherche.php" method="POST">
        <input type="text" size="60" name="Recherche" id="t" placeholder="Rechercher ">
        <button type="submit" id="p" ><i class="fa fa-search"></i> </button>
    </form>
    
        <button class="panier"><a href="Client/panier.php" title="panier" id="pan"><i class="fas fa-shopping-cart"style="font-size: 20px; "></i>Panier</a></button>
  



    

   

    <br><br>

      
     <nav id="nav">
      <ul class="catego" >       
          <li class="left" ><a href="imprimante.php">Imprimantes </a></li>
          <li  class="left"><a href="Ordinateurs.php">Ordinateurs</a></li>
          <li  class="left"><a href="Peripheriques.php">Périphériques</a></li>
          <li  class="left"><a href="Onduleurs.php">Onduleurs</a></li>
          <li  class="left"><a href="Image.php">Images</a></li>
          <li  class="left"><a href="Téléphones.php">Téléphones</a></li>
          <li  class="left"><a href="Réseau.php">Réseau</a></li>
          
      </ul>
    </nav>


<br><br><br><br><br><br>

   
         
         <br><br><br>

       <div>

   <?php
       include ('Connexion_database.php');
         echo '<div  id="ii"  >';
   $requete1 ="select Id_Categorie from Categorie where Libelle_Categorie='Réseau'";
   $resultat1 = mysqli_query($connexion ,$requete1);
   while($ligne = mysqli_fetch_object($resultat1))
   {
     $ID2=$ligne->Id_Categorie;
     $resultat2 = mysqli_query($connexion ,"select Id_produit,Photo , Prix ,Prix_Promo, description from produit where Id_Categorie=$ID2");
    while($ligne2 = mysqli_fetch_object($resultat2))
   {
     echo '<div class="card">
     <img src="'.$ligne2->Photo.'" style="width:100%">
      <p>'.$ligne2->description.'</p>
     <p class="price"  name="pprix" style="text-decoration:line-through">'.$ligne2->Prix.' MAD</p>
         <p class="price_promo" style="color:#33eb3e; font-size:18pt">'.$ligne2->Prix_Promo.' MAD</p>
         
          <button><a href="panier.php?id='.$ligne2->Id_produit.'" name="mm" > <i class="fa fa-plus" style="font-size:25px"></i><i class="fas fa-shopping-cart2"style="font-size: 25px; "></i> </a></button>
         </div>';
   }
}
   ?>



        </div>



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
            <p> &copy; electrOriental.ma | Designed by Nahari Imane/Laouaj Kaoutar</p> 
      </footer>

  
  </body>
</html>