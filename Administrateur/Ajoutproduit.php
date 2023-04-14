<?php
    session_start(); 
    if(!isset($_SESSION['monlogin'])) header('location: ../VisiteurAnonyme/Login2.php');
?>
<!doctype html>
 <html>
  <head>
   <meta charset="utf-8">
   <title>Ajout de produit</title>
   <!--<link rel="stylesheet" href="../CSS/ajout2.css"> -->
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



  <form method="POST" ENCTYPE="multipart/form-data"  class="frm3">
<LABEL FOR="idProduit"> Nom Produit : </LABEL> <BR>
   <input type="text" name="nom" id="idProduit" required><br>
<LABEL FOR="idDesc"> Description : </LABEL> <BR>
   <input type="text" name="description" id="idDesc" required><br>
<LABEL FOR="idQuantite"> Quantite : </LABEL> <BR>
   <input type="text" name="quantite" id="idQuantite" required><br>
<LABEL FOR="idPrix"> Prix : </LABEL> <BR>
   <input type="text" name="prix" id="idPrix" required><br>
<LABEL FOR="idPhoto"> Photo : </LABEL> <BR>
   <INPUT TYPE="file" NAME="fichier" SIZE="40" id="idPhoto" required><br>
<LABEL FOR="idRef"> Reference : </LABEL> <BR>
   <input type="text" name="reference" id="idRef" required><br>
<LABEL FOR="idPrixp"> Prix Promo : </LABEL> <BR>
   <input type="text" name="prixpro" id="idPrixp"><br>
<LABEL FOR="idCategorie"> Categorie : </LABEL> <BR>
   <select name="categorie">
    <option>Téléphone</option>
    <option>Périphériques</option>
    <option>Ordinateur</option>
    <option>Onduleurs</option>
    <option>Imprimante et Scanner</option>
    <option>Image et son</option>
   </select><br>
   <input type="submit" name="submit" value="Ajouter Produit">

</form>
   <a href="Afficherproduit.php" title="retour"><i class="fa fa-mail-reply"></i></a>
<?php
include ('../Connexion_database.php');
if(isset($_POST['submit']))
{
$nom=$_POST['nom'];
$desc=$_POST['description'];
$quantite=$_POST['quantite'];
$f='img/produits/'.$_FILES["fichier"]["name"];
$prix=$_POST['prix'];
$ref=$_POST['reference'];
$prixp=$_POST['prixpro'];
$categorie=$_POST['categorie'];
if ($nom&&$desc&&$quantite&&$f&&$prix&&$ref&&$categorie)
        { 
$I2="SELECT  Id_Categorie FROM Categorie where Libelle_Categorie='$categorie'";
 $RE2=mysqli_query($connexion ,$I2);
  while($ligne = mysqli_fetch_row($RE2)) {
    $A=$ligne[0];
} 
if((is_numeric($prix))&&(is_numeric($prixp)))
{
$sql = "INSERT INTO  produit (Id_Categorie,Nom_Produit,Description,Quantite,Prix,Photo,Reference,Prix_Promo) values ($A,'$nom','$desc',$quantite,$prix,'$f','$ref',$prixp)";
    // On envoie la requête
if($res = $connexion->query($sql))
{
  echo '<script>alert(\'Le produit est bien ajouté.\');</script>';
    header('Refresh: 0; url=Ajoutproduit.php');
}
else
{
 echo '<script>alert(\'Echec d\'ajout de produit.\');</script>'; 
    header('Refresh: 0; url=Ajoutproduit.php');
}
}
else
{
  echo '<script>alert(\'Vous devrez taper un prix numerique.\');</script>'; 
    header('Refresh: 0; url=Ajoutproduit.php');
}
}
}
mysqli_close($connexion);
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
