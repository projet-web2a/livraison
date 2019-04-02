<?php
include "C:/xampp\htdocs\webnour\admin\configuration.php";
class livraisonC
{
    function get_last_code()
    {
        $sql="SELECT * FROM livraison ORDER by code_Livraison DESC limit 1";
       // $db =Connexion::getConnexion();
        global $db;
        try{
            $liste=$db->query($sql);
            $donnes = $liste->fetch();
            return $donnes;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function ajouterlivraison($livraison){
        $sql="INSERT INTO livraison (nom,prenom,adresse_ligne_1,adresse_ligne_2,ville,mail,num_tel,code_livre,date_livraison,affectation,livreur,prix) values ( :nom,:prenom,:adresse_ligne_1,:adresse_ligne_2,:ville,:mail,:num_tel,:code_livre,:date_livraison,:affectation,:livreur,:prix)";
        //$sql="INSERT INTO `employe`(`cin`, `nom`, `prenon`, `nbHeurs`, `tarifHeur`) VALUES (:c,:nom,:prenon,:nbHeurs,:tarifHeur)";
       // $db =Connexion::getConnexion();
        global $db;
        try{
            $req=$db->prepare($sql);


            $nom=$livraison->getnom();
            $prenom=$livraison->getprenom();
            $adresse_ligne_1=$livraison->getadresse_ligne_1();
            $adresse_ligne_2=$livraison->getadresse_ligne_2();
            $ville=$livraison->getville();
            $mail=$livraison->getmail();
            $num_tel=$livraison->getnum_tel();
            $code_livre=$livraison->getcode_livre();
            $date_livraison=$livraison->getdate_livraison();
            $affectation=$livraison->getaffectation();
            $livreur=$livraison->getlivreur();
            $prix=$livraison->getprix();

            $req->bindValue(':nom',$nom);
            $req->bindValue(':prenom',$prenom);
            $req->bindValue(':adresse_ligne_1',$adresse_ligne_1);
            $req->bindValue(':adresse_ligne_2',$adresse_ligne_2);

            $req->bindValue(':ville',$ville);
            $req->bindValue(':mail',$mail);
            $req->bindValue(':num_tel',$num_tel);
            $req->bindValue(':code_livre',$code_livre);

            $req->bindValue(':date_livraison',$date_livraison);
            $req->bindValue(':affectation',$affectation);
            $req->bindValue(':livreur',$livreur);
            $req->bindValue(':prix',$prix);


            $req->execute();

        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    function afficherlivraison(){
        //$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
        global $db;
        $sql="SElECT * From livraison";
       // $db =Connexion::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function afficherlivraison_livreur($rre){
        //$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
        global $db;
        $sql="SELECT * from livraison where  livreur='$rre' and affectation=:0";
        //$db =Connexion::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function afficherlivraisonforone($rre,$date){
        //$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
        //$sql="SElECT * From livraison where prenom=$rre ";
        $sql="SELECT * from livraison where nom='$rre' and date_livraison >='$date'";
        global $db;
       // $db =Connexion::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function afficherlivraisonforonetous($rre){
        //$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
        //$sql="SElECT * From livraison where prenom=$rre ";
        $sql="SELECT * from livraison where code_livraison=".$rre;
        global $db;
        //$db =Connexion::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function supprimerlivraison($code_Livraison){
        $sql="DELETE FROM livraison where code_Livraison= :code_Livraison";
        // $db =Connexion::getConnexion();
        global $db;
        $req=$db->prepare($sql);
        $req->bindValue(':code_Livraison',$code_Livraison);
        try{
            $req->execute();
            // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function modifierlivraison_livreur($code_Livraison){
        $sql="UPDATE livraison SET affectation='1' where code_Livraison= :code_Livraison";
        //$db =Connexion::getConnexion();
        global $db;
        $req=$db->prepare($sql);
        $req->bindValue(':code_Livraison',$code_Livraison);
        try{
            $req->execute();
            // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function modifier_code_livre ($code_Livraison,$code_livre)
    {
        $sql="UPDATE livraison SET code_livre=:code_livre where code_Livraison=:code_Livraison";
        // $db =Connexion::getConnexion();
        global $db;
        $req=$db->prepare($sql);

        $req->bindValue(':code_livre',$code_livre);
        $req->bindValue(':code_Livraison',$code_Livraison);

        try{
            $req->execute();
            // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }

    }

    function modifierlivraison($livraison,$code_Livraison){
        $sql="UPDATE livraison SET nom=:nom,prenom=:prenom,adresse_ligne_1=:adresse_ligne_1,adresse_ligne_2=:adresse_ligne_2,ville=:ville,mail=:mail,num_tel=:num_tel WHERE code_Livraison=:code_Livraison";
        //$sql="INSERT INTO employe (cin,nom,prenon,nbHeurs,tarifHeur) values (:cin, :nom,:prenom,:nbH,:tarifH)";
        //$sql="INSERT INTO livraison (code_Livraison,nom,prenom,adresse_ligne_1,adresse_ligne_2,ville,mail,num_tel,code_livre) values (:code_Livraison, :nom,:prenom,:adresse_ligne_1,:adresse_ligne_2,:ville,:mail,:num_tel,:code_livre)";
        global $db;
        //$db =Connexion::getConnexion();
        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        try{
            $req=$db->prepare($sql);
            $nom=$livraison->getnom();
            $prenom=$livraison->getprenom();
            $adresse_ligne_1=$livraison->getadresse_ligne_1();
            $adresse_ligne_2=$livraison->getadresse_ligne_2();
            $ville=$livraison->getville();
            $mail=$livraison->getmail();
            $num_tel=$livraison->getnum_tel();

            $req->bindValue(':code_Livraison',$code_Livraison);
            $req->bindValue(':nom',$nom);
            $req->bindValue(':prenom',$prenom);
            $req->bindValue(':adresse_ligne_1',$adresse_ligne_1);
            $req->bindValue(':adresse_ligne_2',$adresse_ligne_2);

            $req->bindValue(':ville',$ville);
            $req->bindValue(':mail',$mail);
            $req->bindValue(':num_tel',$num_tel);



            $s=$req->execute();

            // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
            echo " Les datas : " ;

        }

    }

    function recupererlivraison($code_Livraison){
        $sql="SELECT * from livraison where code_Livraison=$code_Livraison";
        //$db =Connexion::getConnexion();
        global $db;
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function recupererprix($region){

        $sql="SELECT * FROM prix WHERE `region`='".$region."'";
        //$db =Connexion::getConnexion();
        global $db;
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function recupererLivreur($cin){
        $sql="SELECT * from livreur where cin=$cin";
        //$db =Connexion::getConnexion();
        global $db;
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    public function trier($par)
    {
        $sql="SELECT * FROM livraison order by $par ";

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
?>