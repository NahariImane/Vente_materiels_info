<?php
session_start();
if(!isset($_SESSION['monlogin'])) header('location: ../VisiteurAnonyme/Login2.php');
include("../Connexion_database.php");
$select = "delete from possede where Id_produit='".$_GET['id']."'";
if($query = mysqli_query($connexion,$select))
{
echo '<script>alert(\'Suppression avec succes!!!!\');</script>';
header('Refresh: 0; url=panier1.php');
}
else
{
echo '<script>alert(\'Vous pouvez pas supprimer cette categorie!!!!\');</script>';
header('Refresh: 0; url=panier1.php');
}
?>