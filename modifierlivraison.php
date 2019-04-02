<?php
/**
 * Created by PhpStorm.
 * User: Nour
 * Date: 30/03/2019
 * Time: 18:05
 */
include "core/livraisonC.php";
include "entite/livraison.php";
$livraison = new livraison($_POST['nom'],$_POST['prenom'],$_POST['addresse'],$_POST['addresse1'],$_POST['ville'],$_POST['mail'],$_POST['tel'],'5',date('Y-m-d'),'4','4','400');
$l = new livraisonC();
$l->modifierlivraison($livraison,$_POST['id']);
header('Location: livraison.php');
