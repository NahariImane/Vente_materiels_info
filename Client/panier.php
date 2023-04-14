<?php
    session_start(); 
    if(!isset($_SESSION['monlogin'])) header('location: ../VisiteurAnonyme/Login2.php');
    ob_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Mon panier</title>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.css">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

     <link rel="stylesheet"  href="../CSS/Client2.css">
     <!-- <link rel="stylesheet"  href="../CSS/Profil.css"> -->
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
<form method="post">
 <button class="Modifier" name="MODIF"><a href="modifProfil.php" style="text-decoration:none;color:black; ">Gerer mon compte</a></button>
 <button class="Deconnexion"><a  href="../VisiteurAnonyme/Deconnexion.php" style="text-decoration:none;color:black; "><i class="fas fa-sign-out-alt"></i>Deconnexion</a></button>
<!--<a href="../VisiteurAnonyme/Deconnexion.php" title="Se Déconnecter" class="s"><i class="fas fa-sign-out-alt"></i></a></li> -->
</form>
  </div>
</div>
<script src="../JS/Profil.js"></script>
 <table class="infos">
         <tr>
            <td>
               <b> (+212) 05 35 67 68 70 | | info.client@ElectrOriental.ma </b>
            </td>    
          </tr>
    </table>


    <ul class="links">
   
      <li class="conn" ><a href="../VisiteurAnonyme/AccueilContact.php" class="con">CONTACT</a></li>
    </ul>



    <br><br><br><br>
     <div class="logo1"><a href="AccueilClient.php"><img src="../img/Logo.png"></a></div>
    <form action="Recherche.php" method="POST">
        <input type="text" size="60" name="Recherche" id="t" placeholder="Rechercher ">
        <button type="submit" id="p" ><i class="fa fa-search"></i> </button>
    </form>
    
        <button class="panier"><a href="panier1.php" title="panier" id="pan"><i class="fas fa-shopping-cart"style="font-size: 20px; "></i>Panier</a></button>
  

    <br><br>

    <nav id="nav">
      <ul class="catego" >       
          <li class="left" ><a href="../imprimante.php">Imprimantes </a></li>
          <li  class="left"><a href="../Ordinateurs.php">Ordinateurs</a></li>
          <li  class="left"><a href="../Peripheriques.php">Périphériques</a></li>
          <li  class="left"><a href="../Onduleurs.php">Onduleurs</a></li>
          <li  class="left"><a href="../Image.php">Images</a></li>
          <li  class="left"><a href="../Téléphones.php">Téléphones</a></li>
          <li  class="left"><a href="../Réseau.php">Réseau</a></li>
          
      </ul>
    </nav>


<br><br><br><br><br><br>

<?php 
 include('../Connexion_database.php');
    
$ID=$_GET['id'];
 if($_GET['id']!=null)
 {

 $id=time();
  $requete1="INSERT INTO `commande`( `Id_Commande`) VALUES ('$id')";

  $resultat1 = $connexion->query($requete1);

}
   $requete2="select  Id_produit from produit where Id_produit=$ID";
  $resultat2 = $connexion->query($requete2);



 
$requete3=" INSERT INTO `possede`(`Id_produit`,`Id_Commande`, `Statut` ) VALUES ($ID, $id ,'1')";
$resultat3 = $connexion->query($requete3);
$R="select Id_produit,Id_Commande,Statut from possede"; 
$RES=$connexion->query($R);
$cpt=0;
while($ligne1 = mysqli_fetch_object($RES))
  {
if($ligne1->Id_produit==$ID)
{
$cpt++;
}
}
if($cpt==0)
{
$requete3=" INSERT INTO `possede`(`Id_produit`,`Id_Commande`, `Statut` ) VALUES ($ID, $id ,'1')";
$resultat3 = $connexion->query($requete3);
 }
  $requete4=" select  distinct p1.Nom_Produit, p1.Photo,p1.Id_produit,p1.Prix_Promo, p1.Prix,p1.Quantite ,count(p1.Id_produit)  as Q from produit p1 , possede p2 where p1.Id_produit=p2.Id_produit and p2.Statut=1 group by p1.Id_produit"  ;
  $req="select * from possede";
 if($resultat = $connexion->query($req)){
    echo '<table border="1">';
    echo '<tr>';
    echo '<th>Nom de produit</th>';
    echo '<th>Photo</th>';
    echo '<th>Prix</th>';
     echo '<th>Quantite</th>';
     echo '<th></th>';
    echo '</tr>';
    $cp=0;
    $i=0;
  $resultat4 = $connexion->query($requete4);
  $total=0;
while($ligne = mysqli_fetch_object($resultat4))
  {
    
  	if($ligne->Q<$ligne->Quantite)
{
  if($ligne->Prix_Promo!=0)
  {
     $total= $total+($ligne->Prix_Promo * $ligne->Q);
      echo '<div class="tableauPa"> 
  <tr align="center"><td>'. $ligne->Nom_Produit. ' </td><td ><img src=../'. $ligne->Photo. ' style="width:20%"></td><td>'.$ligne->Prix_Promo.'</td><td>'. $ligne->Q. ' </td><td><a class="l"  id="myBtn2" href="panier.php?id='.$ligne->Id_produit.'"><i class="fa fa-plus"></i> </a></td><td><button onclick="deleteme('.$ligne->Id_produit.')"  name="Delete"><i class="fa fa-trash-o"></i></button></td>
        <script language="javascript">
    function deleteme(delid)
    {
      if(confirm("Vous voulez supprimez ce produit de votre commande??")){
        window.location.href="Supprimercommande.php?id="+delid+" ";
        return true;
      }
    }   
    </script></tr>
   </div>';
  }
  else
  {
          $total= $total+($ligne->Prix* $ligne->Q);
          echo '<div class="tableauPa"> 
  <tr align="center"><td>'. $ligne->Nom_Produit. ' </td><td ><img src=../'. $ligne->Photo. ' style="width:20%"></td><td>'.$ligne->Prix.'</td><td>'. $ligne->Q. ' </td><td><a class="l"  id="myBtn2" href="panier.php?id='.$ligne->Id_produit.'"><i class="fa fa-plus"></i> </a></td><td><button onclick="deleteme('.$ligne->Id_produit.')"  name="Delete"><i class="fa fa-trash-o"></i></button></td>
        <script language="javascript">
    function deleteme(delid)
    {
      if(confirm("Vous voulez supprimez ce client ??")){
        window.location.href="Supprimercommande.php?id="+delid+" ";
        return true;
      }
    }   
    </script></tr>
   </div>';
      }
    }
      else
      {
        if($ligne->Prix_Promo!=0)
        {
           $total= $total+($ligne->Prix_Promo * $ligne->Quantite);
        echo '<div class="tableauPa"> 
  <tr align="center"><td>'. $ligne->Nom_Produit. ' </td><td class="pht" ><img src=../'. $ligne->Photo. ' style="width:20%"></td><td>'.$ligne->Prix_Promo.'</td><td>'. $ligne->Quantite. ' </td><td><a class="l"  id="Btn" ><i class="fa fa-plus"></i> </a></td>
   </div>';
     echo'
<div id="Modal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="myclose">&times;</span>
     <p>Il n\'y a pas assez de produits en stock.</p>
  </div>
</div>
<script src="../JS/MODALPanier.js"></script><td><button onclick="deleteme('.$ligne->Id_produit.')"  name="Delete"><i class="fa fa-trash-o"></i></button></td>
        <script language="javascript">
    function deleteme(delid)
    {
      if(confirm("Vous voulez supprimez ce client ??")){
        window.location.href="Supprimercommande.php?id="+delid+" ";
        return true;
      }
    }   
    </script></tr>';
}
else
{ 

 $total= $total+($ligne->Prix * $ligne->Quantite);
  echo '<div class="tableauPa"> 
  <tr align="center"><td>'. $ligne->Nom_Produit. ' </td><td class="pht" ><img src=../'. $ligne->Photo. ' style="width:20%"></td><td>'.$ligne->Prix.'</td><td>'. $ligne->Quantite. ' </td><td><a class="l"  id="Btn" ><i class="fa fa-plus"></i> </a></td>
   </div>';
     echo'
<div id="Modal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="myclose">&times;</span>
     <p>Il n\'y a pas assez de produits en stock.</p>
  </div>
</div>
<script src="../JS/MODALPanier.js"></script><td><button onclick="deleteme('.$ligne->Id_produit.')"  name="Delete"><i class="fa fa-trash-o"></i></button></td>
        <script language="javascript">
    function deleteme(delid)
    {
      if(confirm("Vous voulez supprimez ce client ??")){
        window.location.href="Supprimercommande.php?id="+delid+" ";
        return true;
      }
    }   
    </script></tr>';

    }
}
  }
        echo '</table>';
          
          echo '<br><br><a href="AccueilClient.php" style="color:black"> <--continuer mes achats</a>';
}


    
  echo'<label For="To" style="margin:10px 0 0 965px;">Total : </label><input type="text"  value="'.$total.'"   readonly id="To" >';
$c=0;
  echo'<form method="POST"><button name="V" style="margin:10px 0 0 1290px;">valider</button></form>';
  if(isset($_POST['V']))
  {
    $r="select Id_Commande from possede";
  $resul = $connexion->query($r);
    while($ligne = mysqli_fetch_object($resul)){
         $email=$_SESSION['monlogin'];
    $requete5="select Id_client from client where Email= '$email' ";
    $resultat5 = $connexion->query($requete5);
    while($ligne2 = mysqli_fetch_object($resultat5)){
      
      $id_client=$ligne2->Id_client;

    }
      $id_commande=$ligne->Id_Commande;
      $date=date('Y-m-d H:i:s');
    $resF="Update commande SET  Total=$total , date_commande='$date', Id_client=$id_client where Id_Commande=$id_commande ";
    
   if($resulF = $connexion->query($resF)){
    $c++;
   }

  }
  if($c!=0)
  {
   echo '<script>alert(\'Commande validée\');</script>';
   $supp="delete from possede where Statut='1'";
   $resu = $connexion->query($supp);
   header('Refresh: 0; url=../Client/AccueilClient.php'); 
  }
  else
  {
    echo '<script>alert(\'Une erreur est survenu, veuillez réessayer la commande\');</script>';
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
<?php

  ob_end_flush();
  ?>
</body>
</html>