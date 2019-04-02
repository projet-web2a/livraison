<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 28/03/2019
 * Time: 23:01
 */
include "C:/xampp\htdocs\webnour\admin\configuration.php";
class livreurC
{
    function ajouterLivreur($livreur){
        $sql="INSERT INTO livreur (cin,nom,prenom,mail,num_tel,ville_actuelle,situation,last,lng) values (:cin,:nom,:prenom,:mail,:num_tel,:ville_actuelle,:situation,:lat,:lng)";
        global $db;
        try{

            $cin=$livreur->getcin();
            $nom=$livreur->getnom();
            $prenom=$livreur->getprenom();
            $mail=$livreur->getmail();
            $num_tel=$livreur->getnum_tel();
            $ville_actuelle=$livreur->getville_actuelle();
            $situation=$livreur->getsituation();
            $lat=$livreur->getlat();
            $lng=$livreur->getlng();
            $req=$db->prepare($sql);
            $req->bindValue(':cin',$cin);
            $req->bindValue(':nom',$nom);
            $req->bindValue(':prenom',$prenom);
            $req->bindValue(':mail',$mail);
            $req->bindValue(':num_tel',$num_tel);
            $req->bindValue(':ville_actuelle',$ville_actuelle);
            $req->bindValue(':situation',$situation);
            $req->bindValue(':lat',$lat);
            $req->bindValue(':lng',$lng);
            $req->execute();

        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }

    }

    function afficherLivreur(){
        //$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
        $sql="SElECT * From livreur";
        global $db;
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function supprimerLivreur($cin){
        $sql="DELETE FROM livreur where id= :cin";
        global $db;
        $req=$db->prepare($sql);
        $req->bindValue(':cin',$cin);
        try{
            $req->execute();
            // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function modifierLivreur($livreur,$cin){
        $sql="UPDATE livreur SET cin=:cinn, nom=:nom,prenom=:prenom,mail=:mail,num_tel=:num_tel,ville_actuelle=:ville_actuelle,situation=:situation,last=:lat,lng=:lng WHERE id=:cin";
        //$sql="INSERT INTO employe (cin,nom,prenon,nbHeurs,tarifHeur) values (:cin, :nom,:prenom,:nbH,:tarifH)";
        //$sql="INSERT INTO laivraison (code_Livraison,nom,prenom,adresse_ligne_1,adresse_ligne_2,ville,mail,num_tel,code_livre) values (:code_Livraison, :nom,:prenom,:adresse_ligne_1,:adresse_ligne_2,:ville,:mail,:num_tel,:code_livre)";

        global $db;
        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        try{
            $req=$db->prepare($sql);
            $cinn=$livreur->getcin();
            $nom=$livreur->getnom();
            $prenom=$livreur->getprenom();

            $mail=$livreur->getmail();
            $num_tel=$livreur->getnum_tel();

            $ville_actuelle=$livreur->getville_actuelle();
            $situation=$livreur->getsituation();

            $lat=$livreur->getlat();
            $lng=$livreur->getlng();

            $datas = array(':cinn'=>$cinn, ':cin'=>$cin, ':nom'=>$nom,':prenom'=>$prenom,':mail'=>$mail,':num_tel'=>$num_tel,':ville_actuelle'=>$ville_actuelle,':situation'=>$situation,':lat'=>$lat,':lng'=>$lng);

            $req->bindValue(':cinn',$cinn);
            $req->bindValue(':cin',$cin);
            $req->bindValue(':nom',$nom);
            $req->bindValue(':prenom',$prenom);

            $req->bindValue(':mail',$mail);
            $req->bindValue(':num_tel',$num_tel);

            $req->bindValue(':ville_actuelle',$ville_actuelle);
            $req->bindValue(':situation',$situation);

            $req->bindValue(':lat',$lat);
            $req->bindValue(':lng',$lng);


            $s=$req->execute();

            // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
            echo " Les datas : " ;
            print_r($datas);
        }

    }


    function recupererLivreur($cin){
        $sql="SELECT * from livreur where id=$cin";
        global $db;
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function recupererLaivraison($code_Livraison){
        $sql="SELECT * from laivraison where code_Livraison=$code_Livraison";
        global $db;
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

//this is  to google map


    public function getcollegesblanklating(){

        $sql ="SELECT * FROM livreur WHERE lat IS null AND lng IS null LIMIT 1";
        global $db;
        $stmt= $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);


    }
    public function getallcollg(){

        $sql ="SELECT * FROM livreur";
        global $db;
        $stmt= $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    public function updatecolegeswithlant(){

        $sql ="UPDATE  livreur SET lat =:lat AND lng =:lng WHERE id =:id";
        global $db;

        $stmt= $db->prepare($sql);

        $stmt->bindParam(':lat',$this->lat);
        $stmt->bindParam(':lng',$this->lng);
        $stmt->bindParam(':id',$this->id);

        if($stmt->execute()){
            return true;
        }
        else
        {
            return false;
        }

    }
    public function trier($par)
    {
        $sql="SELECT * FROM livreur order by $par ";

        global $db;
        try{
            $result=$db->query($sql);

            return $result;

        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

}