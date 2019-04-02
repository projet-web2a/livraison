<?PHP
include  "../config.php";
class EvenementC
{
    function afficherEvenement()
    {
        $sql = "SElECT * From evenement";
        global $db;
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function ajouterEvenement($evenement)
    {
        global $db;
        $sql = "INSERT INTO evenement (id_evenement,nom_evenement,datedebut,datefin,nbrparticipant,nbrvue,image,description) VALUES(:id_evenement,:nom_evenement,:datedebut,:datefin,:nbrparticipant,:nbrvue,:image,:description)";

        try {
            $req = $db->prepare($sql);

            $nom_evenement = $evenement->getNom();
            $datedebut = $evenement->getDatedebut();
            $datefin = $evenement->getDatefin();
            $nbrparticipant = $evenement->getNbrparticipant();
            $nbrvue = $evenement->getNbrvue();
            $image = $evenement->getImage();
            $description = $evenement->getDescription();
            $id_evenement = $evenement->getId();
            $req->bindValue(':id_evenement', $id_evenement);
            $req->bindValue(':nom_evenement', $nom_evenement);
            $req->bindValue(':datedebut', $datedebut);
            $req->bindValue(':datefin', $datefin);
            $req->bindValue(':nbrparticipant', $nbrparticipant);
            $req->bindValue(':nbrvue', $nbrvue);
            $req->bindValue(':image', $image);
            $req->bindValue(':description', $description);


            $req->execute();
            // header('Location: ../espacemarketing.php');

        } catch (Exception $e) {

            // header('Location: ../register.php');
            echo 'Erreur: ' . $e->getMessage();
        }
    }


    function supprimerEvenement($id)
    {
        global $db;
        $sql = "DELETE FROM evenement where id_evenement= :id_evenement";

        $req = $db->prepare($sql);
        $req->bindValue(':id_evenement', $id);
        try {
            $req->execute();
            // header('Location: index.php');
        } catch (Exception $e) {

            die('Erreur: ' . $e->getMessage());
        }
    }

    function modifierEvenement($evenement,$id){
        global $db ;
        $sql="UPDATE evenement SET  nom_evenement=:nom_evenement,datedebut=:datedebut, datefin=:datefin,nbrparticipant=:nbrparticipant,nbrvue=:nbrvue , image=:image , description=:description where id_evenement=:id_evenement";


        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        try{
            $req=$db->prepare($sql);

            $nom_evenement=$evenement->getNom();
            $datedebut=$evenement->getDatedebut();
            $datefin=$evenement->getDatefin();
            $nbrvue=$evenement->getNbrvue();
            $nbrparticipant=$evenement->getNbrparticipant();
            $image=$evenement->getImage();
            $description=$evenement->getDescription();
            $datas = array(':nom_evenement'=>$nom_evenement, ':datedebut'=>$datedebut, ':datefin'=>$datefin,':nbrparticipant'=>$nbrparticipant,':nbrvue'=>$nbrvue,':image'=>$image, ':description'=>$description);
            $req->bindValue(':id_evenement', $id);
            $req->bindValue(':nom_evenement',$nom_evenement);
            $req->bindValue(':datedebut',$datedebut);
            $req->bindValue(':datefin',$datefin);
            $req->bindValue(':nbrparticipant',$nbrparticipant);
            $req->bindValue(':nbrvue',$nbrvue);
            $req->bindValue(':image',$image);
            $req->bindValue(':description',$description);

            $s=$req->execute();

            // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
            echo " Les datas : " ;
            print_r($datas);
        }

    }
    function recupererEvenement($id){
        global $db ;
        echo "la vie en rose";

        $sql="SELECT * from evenement where id_evenement=$id";
        echo "la vie en rose";


        try{
            $liste=$db->query($sql);

            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function rechercherListeevenement($datedebut){
        $sql="SELECT * from evenement where id_evenement=$datedebut";
        global  $db;
        try{
            $liste=$db->query($sql);
            echo"nnn";
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
}

?>