<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 29/03/2019
 * Time: 00:46
 */
include "core/livraisonC.php";
include "entite/livraison.php";
$l = new livraisonC();
$l->supprimerlivraison($_GET['id']);
header('Location: livraison.php');
?>




