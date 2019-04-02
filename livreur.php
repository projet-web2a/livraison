<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 28/03/2019
 * Time: 22:50
 */

class livreur
{

    private $cin;
    private $nom;
    private $prenom;
    private $mail;
    private $num_tel;
    private $ville_actuelle;
    private $situation;
    private $lat;
    private $lng;



    function __construct($cin,$nom,$prenom,$mail,$num_tel, $ville_actuelle,$situation,$lat,$lng)
    {
        $this->cin=$cin;
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->mail=$mail;
        $this->num_tel=$num_tel;
        $this->ville_actuelle=$ville_actuelle;
        $this->situation=$situation;
        $this->lat=$lat;
        $this->lng=$lng;
    }
    function getcin(){
        return $this->cin;
    }
    function getnom(){
        return $this->nom;
    }
    function getprenom(){
        return $this->prenom;
    }
    function getmail(){
        return $this->mail;
    }
    function getnum_tel(){
        return $this->num_tel;
    }
    function getville_actuelle(){
        return $this->ville_actuelle;
    }
    function getsituation(){
        return $this->situation;
    }
    function getlat(){
        return $this->lat;
    }
    function getlng(){
        return $this->lng;
    }
    function setcin($cin){
        $this->cin=$cin;
    }
    function setnom($nom){
        $this->nom=$nom;
    }
    function setprenom($prenom){
        $this->prenom=$prenom;
    }
    function setmail($mail){
        $this->mail=$mail;
    }
    function setnum_tel($num_tel){
        $this->num_tel=$num_tel;
    }
    function setcode_livraison($code_livraison){
        $this->code_livraison=$code_livraison;
    }
    function setsituation($situation){
        $this->situation=$situation;
    }
    function setlat($lat){
        $this->lat=$lat;
    }
    function setlng($lng){
        $this->lng=$lng;
    }
}