<!DOCTYPE html>
<html>
  <head>
     <meta charset="UTF-8">
     <title>Matériels informatiques</title>
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.css">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet"  href="CSS/index2.css">
  </head>
  <body>
  	

 <div class="infos">
     <b> (+212) 05 35 67 68 70 | | info.client@ElectrOriental </b>  

     <span >
        <p class="links">
          <a href="VisiteurAnonyme/Login2.php"  class="ac"> CONNEXION </a> <span class="conn">  <a href="VisiteurAnonyme/AccueilContact.php" class="con" > CONTACT</a> </span>
        </p>
     </span>
  </div> 

  

    
    <div class="logo1"><a href="index.php"><img src="img/Logo.png"></a>
      <form action="Recherche.php" method="POST">
        <input type="text" size="60" name="Recherche" id="t" placeholder="Rechercher " style=width:50%;>
        <button type="submit" id="p"  ><i class="fa fa-search"></i> </button>
       </form>
      <button class="panier" onclick="alert('Vous devez être client dans le site!');"> <a title="panier" id="pan"  style="font-size: 15px"><i class="fas fa-shopping-cart"  style="font-size: 15px; "></i> &nbsp &nbsp Panier</a></button></div>
  
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

   
    <!-- Slides de nouveauté -->

  
    <div class ="diapos">
        <?php  
          include ('Connexion_database.php'); 
          $requete="select  Id_produit,Photo , Prix ,Prix_Promo, description from produit where Photo like '%Nouveaute%'";
          $resultat = mysqli_query($connexion ,$requete);
          while($ligne = mysqli_fetch_object($resultat))
          {

             echo '<div class="diapo" >
               <div class="text">Nouveauté</div>
        	     <img src="'.$ligne->Photo.'" class="img">
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

    <script type="text/javascript" src="JS/slides.js"></script>
    <script type="text/javascript" src="JS/accueil.js"></script>
       

    <br><br><br>


    <div>
        <?php 
         include ('Connexion_database.php');
         echo '<div  id="ii"  >';
         $requete1="select  Id_produit,Photo , Prix ,Prix_Promo, description from produit where Photo like '%produits%'";
         $resultat1 = mysqli_query($connexion ,$requete1);
         while($ligne = mysqli_fetch_object($resultat1))
         {
            echo '<div class="card">
            <img src="'.$ligne->Photo.'" alt="Produits" style="width:100%">
            <p style="font-size: 15pt;">'.$ligne->description.'</p>
            <p class="price"  name="pprix" style="font-size: 14pt;" >'.$ligne->Prix.' MAD</p>
            <p class="price_promo" style="color:#33eb3e; font-size:15pt">'.$ligne->Prix_Promo.' MAD</p>
            <button onclick="alert(\'Vous devez être client dans le site!\');" ><a name="mm" > <i class="fa fa-plus" style="font-size:25px"></i><i class="fas fa-shopping-cart2"style="font-size: 25px; "></i> </a></button> 
            </div>';
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
            <p> &copy; electrOriental.ma | Designed by Nahari Imane & Laouaj Kaoutar</p> 
      </footer>

   </body>
</html>