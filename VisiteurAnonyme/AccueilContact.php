<!DOCTYPE html>
<html>
   <head>
	   <meta charset="UTF-8">
	   <title>Contactez-nous</title>
	    <link rel="stylesheet"  href="../CSS/Contact.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   </head>
   <body>
    
       <div class="logo1"><a href="../index.php"><img src="../img/Logo.png"></a></div>


   <br><br><br><br>

     <div class="contact">
     	<h1>Contactez-nous</h1>

     	<form class="contact-form"  method="post" >
     		<input type="text"  class="text" placeholder="Nom" required>
     		<input type="email"  name="email" class="text" placeholder="Adresse email" required>
     		<input type="text"  class="text" placeholder="Numéro De Téléphone" name="tel" required>
     		<textarea class="text" name="message" placeholder="Message"></textarea>
     		<input type="submit" name="submit" class="button"  value="Envoyer">
     	</form>
        <?php
         include ('../Connexion_database.php');
         if(isset($_POST['submit']))
         {
         $Tel=$_POST['tel'];
         	if(preg_match("#[0][6][- \.?]?([0-9][0-9][- \.?]?){4}$#", $Tel)||preg_match("#[0][5][- \.?]?([0-9][0-9][- \.?]?){4}$#", $Tel)||preg_match("#[0][7][- \.?]?([0-9][0-9][- \.?]?){4}$#", $Tel))
                  {
         $Email=$_POST['email'];
         $Message=$_POST['message'];
         $R="select Id_Admin from administrateur";
         $resultat = mysqli_query($connexion ,$R);
         while($ligne = mysqli_fetch_row($resultat))
         {
         $ID=$ligne[0];
         }
         $R2="insert into message (Id_Admin,Email_Client_Visiteur,Message) values ($ID,'$Email','$Message')";
         if($res = $connexion->query($R2))
         {
         echo '<script>alert(\'Votre message est bien envoyé\');</script>';
         header('Refresh: 2; url=../index.php');
         }
         else
         {
         echo '<script>alert(\'Votre message est bien envoyé\');</script>';
         header('Refresh: 2; url=AcceuilContact.php');
         }
         mysqli_close($connexion); 
         }
         else
         {
         	echo '<p class="R">Veuillez saisir un NumTel sous cette format:  05******** ou 06******** ou 07********  </p>';
         }
         }
        ?>
<a href="../index.php" title="retour"><i class="fa fa-mail-reply"></i></a>
     </div>
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
                      <li><a href="#"><i class="fab fa-facebook-square"></i> Facebook</a></li> <br><br>
                      <li><a href="#"><i class="fab fa-instagram"></i> Instagram</a></li> 
                 </ul>
            </div>
          </div>
            <p> &copy; electro.ma | Designed by Nahari Imane & Laouaj Kaoutar </p> 
      </footer>

   </body>
</html>