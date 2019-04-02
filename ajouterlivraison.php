<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 28/03/2019
 * Time: 23:35
 */
include "core/livraisonC.php";
include "entity/livraison.php";
$livraison = new livraison($_POST['name'],$_POST['prenom'],$_POST['Landmark'],$_POST['Landmark1'],$_POST['Town'],$_POST['mail'],$_POST['tel'],'5',date('Y-m-d'),'4','4','400');
$l = new livraisonC();
$l->ajouterlivraison($livraison);
$to='henebhar@gmail.com';
$sujet='la vie est belle';
$text='test';
//$text=$_POST['name'].$_POST['prenom'].$_POST['Landmark'].$_POST['Landmark1'].$_POST['Town'].$_POST['mail'].$_POST['tel'].'5'.date('Y-m-d').'4'.'4'.'400';
mail($to,$sujet,$text);

//header('Location: checkout.php');
