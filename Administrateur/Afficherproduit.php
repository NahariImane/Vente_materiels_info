<?php
    session_start(); 
    if(!isset($_SESSION['monlogin'])) header('location: ../VisiteurAnonyme/Login2.php');
?>
<!doctype html>
 <html>
  <head>
   <mate charset="utf-8">
   <title>Affichage des produits</title>    
   <link rel="stylesheet" href="../CSS/Aclient4.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.css">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="../CSS/MODAL2.css">


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
<a href="admin.php"><img src="../img/logo.png"></a></div> 


<?php   
include ('../Connexion_database.php');
    echo '<table border="0" cellspacing="0">';
    echo '<caption><h1>Produits</h1></caption>';
    echo '<tr class="class1">';
    echo '<th>Nom Produit</th>';
    echo '<th>Description</th>';
    echo '<th>Quantite</th>';
    echo '<th>Prix</th>';
    echo '<th>Photo</th>';
    echo '<th>Reference</th>';
    echo '<th>Prix Promo</th>';
    echo '<th>Categorie</th>';
    echo '<th><a class="a1" href="Ajoutproduit.php"><i class="fa fa-plus"></i></a></th>';
    echo '</tr>';
$resultat1 = mysqli_query($connexion ,"SELECT Id_produit,Nom_Produit,Description,Quantite,Prix,Photo,Reference,Prix_Promo,Id_Categorie FROM produit");
$i=0;
$j=0;
while($ligne = mysqli_fetch_object($resultat1)) {
$resultat2 = mysqli_query($connexion ,"SELECT Libelle_Categorie FROM Categorie where Id_Categorie=$ligne->Id_Categorie ");
while($ligne2 = mysqli_fetch_object($resultat2))
{
$I[$i]=$ligne2->Libelle_Categorie;
$i++;
}
echo '<tr align="center"><td class="class2">'. $ligne->Nom_Produit. ' </td><td class="class3">'.
$ligne->Description.'</td><td class="class4">'.$ligne->Quantite.'</td><td class="class5">'.$ligne->Prix.'</td><td class="class6">'.$ligne->Photo.'</td><td class="class7">'.$ligne->Reference.'</td><td class="class7">'.$ligne->Prix_Promo.'</td><td>'.$I[$j].'</td><td id="sup"><button onclick="deleteme('.$ligne->Id_produit.')"  name="Delete"><i class="fa fa-trash-o"></i></button><button onclick="updateme('.$ligne->Id_produit.')"  name="update"><i class="fa fa-pencil"></i></button></td>
        <script language="javascript">
    function deleteme(delid)
    {
      if(confirm("Vous voulez supprimez cette categorie ??")){
        window.location.href="Supprimerproduit.php?id="+delid+" ";
        return true;
      }
    }   
    function updateme(upid)
    {
      if(confirm("Vous voulez modifier cette categorie ??")){
        window.location.href="Modifierproduit.php?id="+upid+" ";
        return true;
      }
    }   
    </script></tr>';
$j++;
}
echo '</table>';
echo '<a href="admin.php" title="retour"><i class="fa fa-mail-reply"></i></a>';
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
