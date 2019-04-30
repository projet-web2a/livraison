<?php

include "C:/xampp/htdocs/EyeZone/core/livraisonC.php";
include "C:/xampp/htdocs/EyeZone/entites/livraison.php";
if(isset($_GET['id']))
{
$li= new livraisonC();

$livraison new livraison($_POST['dateLivraison'],$_POST['idCommande'],$_POST['username'],$_POST['nom_ville'],$_POST['num_tel']);
$li->modifierLivraison($livraison,$_GET['id']);
header('Location: afficherlivraison.php');

}
?> 