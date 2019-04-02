<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 29/03/2019
 * Time: 00:46
 */
include "core/livreurC.php";
include "entite/livreur.php";
$l = new livreurC();
$l->supprimerLivreur($_GET['id']);
header('Location: afficherlivreur.php');
?>




