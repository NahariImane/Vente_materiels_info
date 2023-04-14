<?php
    session_start(); 
    if(!isset($_SESSION['monlogin'])) header('location: ../VisiteurAnonyme/Login2.php');
?>
<!doctype html>
 <html>
  <head>
   <mate charset="utf-8">
   <title>Affichage des clients</title>    
   <link rel="stylesheet" href="../CSS/Aclient4.css">
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
    echo '<caption><h1>Clients</h1></caption>';
    echo '<tr class="class1">';
    echo '<th>Nom</th>';
    echo '<th>Prenom</th>';
    echo '<th>Adresse</th>';
    echo '<th>Numero de Telephone</th>';
    echo '<th>Email</th>';
    echo '<th>Mot de passe</th>';
    echo '<th>Ville</th>';
    echo '<th></th>';
    echo '</tr>';
$resultat1 = mysqli_query($connexion ,"SELECT Id_Client,Nom,Prenom,Adresse,NumTel,Email,Mot_de_passe,Id_Ville FROM Client");
$i=0;
$j=0;
while($ligne = mysqli_fetch_object($resultat1)) {
$resultat2 = mysqli_query($connexion ,"SELECT Nom_Ville FROM ville where Id_Ville=$ligne->Id_Ville ");
while($ligne2 = mysqli_fetch_object($resultat2))
{
$I[$i]=$ligne2->Nom_Ville;
$i++;
}
echo '<tr align="center"><td class="class2">'. $ligne->Nom. ' </td><td class="class3">'.
$ligne->Prenom.'</td><td class="class4">'.$ligne->Adresse.'</td><td class="class5">'.$ligne->NumTel.'</td><td class="class6">'.$ligne->Email.'</td><td class="class7">'.$ligne->Mot_de_passe.'</td><td>'.$I[$j].'</td><td id="del"><button onclick="deleteme('.$ligne->Id_Client.')"  name="Delete"><i class="fa fa-trash-o"></i></button></td>
        <script language="javascript">
    function deleteme(delid)
    {
      if(confirm("Vous voulez supprimez ce client ??")){
        window.location.href="Supprimerclient.php?id="+delid+" ";
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
