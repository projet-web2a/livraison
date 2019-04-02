<?php
/**
 * Created by PhpStorm.
 * User: Nour
 * Date: 31/03/2019
 * Time: 22:40
 */
include "core/livreurC.php";
include "entite/livreur.php";
$livraison = new livreur($_POST['cin'],$_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['tel'],$_POST['ville'],$_POST['situation'],0,0);
$l = new livreurC();
$l->ajouterLivreur($livraison);
header('Location: afficherlivreur.php');