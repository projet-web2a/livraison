<?php
/**
 * Created by PhpStorm.
 * User: Nour
 * Date: 30/03/2019
 * Time: 18:05
 */
include "core/livreurC.php";
include "entite/livreur.php";
$livraison = new livreur($_POST['cin'],$_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['tel'],$_POST['ville'],$_POST['situation'],0,0);
var_dump($livraison);
$l = new livreurC();
$l->modifierLivreur($livraison,$_GET['id']);
header('Location: afficherlivreur.php');
