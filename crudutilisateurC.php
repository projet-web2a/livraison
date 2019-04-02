<?PHP

class UtilisateurC
{
    function afficherUtilisateur($utilisateur)
    {
        echo "Nom" . $utilisateur->getNom() . "<br>";
        echo "Password " . $utilisateur->getPassword() . "<br>";
        echo "Mail" . $utilisateur->getMail() . "<br>";
    }

  function ajouterUtilisateur($utilisateur)
    {
        global $db;
        $sql = "INSERT INTO utilisateurs (nom,password,mail) VALUES(:nom,:password,:mail)";

        try {
            $req = $db->prepare($sql);

            $nom = $utilisateur->getNom();
            $password = $utilisateur->getPassword();
            $mail = $utilisateur->getMail();
            $req->bindValue(':nom', $nom);
            $req->bindValue(':password', $password);
            $req->bindValue(':mail', $mail);
            $req->execute();
            header('Location: ../espacemarketing.html');

        } catch (Exception $e) {

            header('Location: ../register.php');
            echo 'Erreur: ' . $e->getMessage();
        }
    }

        function afficherUtilisateurs()
    {
        global $db;

        $q = $db->query("SELECT * FROM utilisateurs");
        while ($utilisateur = $q->fetch()) {
            echo "Le nom est " . $utilisateur['nom'] . "<br/>";
        }


    }
}
?>