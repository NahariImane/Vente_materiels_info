<?php
    session_start(); 
    if(!isset($_SESSION['monlogin'])) header('location: ../VisiteurAnonyme/Login2.php');
?>
<!doctype html>
 <html>
    <head>
       <meta charset="utf-8">
       <title>Accueil admin</title>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <LINK rel="stylesheet" href="../CSS/Style_admin2.css">
       <link rel="stylesheet" href="../CSS/MODAL2.css">
       <link rel="stylesheet" href="../CSS/Aclient5.css">
    </head>
    <body>
      <!-- Trigger/Open The Modal -->
      <!-- The Modal -->
      <a class="l"  id="myBtn"><i class="fa fa-user"></i> </a>
      <div id="myModal" class="modal">
     
    <div class="modal-content">
     <span class="close">&times;</span>
     <form method="post">
      <button class="Modifier" name="MODIF"><a href="Modifierprofil.php" style="text-decoration:none;color:black; ">Gerer mon compte</a></button>
      <button class="Deconnexion"><a href="../VisiteurAnonyme/Deconnexion.php" style="text-decoration:none;color:black;">Deconnexion</a></button>
     </form>
    </div>
   </div>
   <script src="../JS/MODAL2.js"></script>
   <div class="logo1">
    <img src="../img/logo.png">
   </div> 
   <ul class="b">
    <form name="form1" method="post">
     <li>
      <div class="dropdown">
       <button class="dropbtn" name="commande">Commandes
       </button>
      </div>
     </li>
     <li>
      <div class="dropdown">
       <button class="dropbtn"><a  href="Afficherclient.php" class="a1">Clients</a>
       </button>
      </div>
     </li>
     <li>
      <div class="dropdown">
       <button class="dropbtn"><a  href="Affichercategorie.php" class="a1">Categories</a>
       </button>
        </div></li>
      <li><div class="dropdown">
              <button class="dropbtn"><a href="Afficherproduit.php" class="a1"> Produits</a>
              </button>
          </div>
      </li>
            <li><div class="dropdown">
              <button class="dropbtn"><a href="AfficherMessage.php" class="a1">Messages</a>
              </button>
          </div>
      </li>
      <br><br>
      <br><br> 
      </form> 
   </ul>
       <?php
    include('../Connexion_database.php');
    $P=0;
    $result = mysqli_query($connexion ,"SELECT * FROM commande ");
    while($ligne = mysqli_fetch_object($result)) {
    if($ligne->Total!=null)
      $P++;
    }
    if($P!=0)
    {
    echo '<table border="0" collspacing="0" class="tab">';
    echo '<tr class="class1">';
    echo '<th>Nom de client</th>';
     echo '<th>Numero de télephone</th>';
    echo '<th>Date de commande</th>';
    
    echo '<th>Total</th>';
    echo '</tr>';
$resultat1 = mysqli_query($connexion ,"SELECT A.Nom,A.NumTel,B.Date_Commande,B.Total FROM client A ,commande B where A.Id_Client=B.Id_Client");
while($ligne = mysqli_fetch_object($resultat1)) {
echo '<tr align="center"><td class="class2">'. $ligne->Nom. ' </td><td class="class3">'. $ligne->NumTel. ' </td><td class="class3">'. $ligne->Date_Commande. ' </td><td td class="class6">'. $ligne->Total. ' </td></tr>';
}
echo '</table>';
}
?>
   <?php
   include ('../Connexion_database.php');
   if(isset($_POST['commande']))
   {
        $P=0;
    $result = mysqli_query($connexion ,"SELECT * FROM commande ");
    while($ligne = mysqli_fetch_object($result)) {
    $P++;
    }
    if($P!=0)
    {
    echo '<table border="0" collspacing="0" class="tab">';
    echo '<tr class="class1">';
    echo '<th>Nom de client</th>';
    echo '<th>Numero de télephone</th>';
    echo '<th>Date de commande</th>';
    echo '<th>Total</th>';
    echo '</tr>';
$resultat1 = mysqli_query($connexion ,"SELECT A.Nom,A.NumTel,B.Date_Commande,B.Total FROM client A ,commande B where A.Id_Client=B.Id_Client");
while($ligne = mysqli_fetch_object($resultat1)) {
echo '<tr align="center"><td class="class2">'. $ligne->Nom. ' </td><td class="class2">'. $ligne->NumTel. ' </td><td class="class3">'. $ligne->Date_Commande. ' </td><td td class="class6">'. $ligne->Total. ' </td></tr>';
}
echo '</table>';
   }
 }
   ?>
     <br><br><br>

  

  <br><br><br>

       

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
                      <li><a href="#"><i class="fa fa-facebook-square"></i> Facebook</a></li> <br><br>
                      <li><a href="#"><i class="fa fa-instagram"></i> Instagram</a></li> 
                 </ul>
            </div>
          </div>
            <p> &copy; electro.ma | Designed by Nahari Imane & Laouaj Kaoutar</p> 
      </footer>
      
  </body>
 </html>