<?PHP
class Categorie_core
{
        /*function afficher_categorie($Categorie)
    {
        echo "id_categorie: " . $Categorie->getid_categorie() . "<br>";
        echo "nom_categorie: " . $Categorie->getnom_categorie() . "<br>";
        echo "lien_categorie: " . $Categorie->getlien_categorie() . "<br>";
    
    }*/
    function affiche_categorie()
    {

        $sql = "SElECT * From categorie ";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function ajouter_Categorie($Categorie)
    {
        $sql = "insert into categorie (NOMcat) VALUES (:nomcat)";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);


            $nomcat= $Categorie->getnomcat();

            $req->bindValue(':nomcat', $nomcat);

            $req->execute();
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function supprimer_categorie($idcat)
    {
        $sql = "DELETE from categorie where idcat=:idcat";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idcat', $idcat);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function modifier_categorie($Categorie, $idcat)
    {
        $sql = "UPDATE categorie SET nomcat=:nomcat WHERE idcat=:idcat";

        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);

            $nomcat = $Categorie->getnomcat();


            $req->bindValue(':nomcat', $nomcat);
            $req->bindValue(':idcat',$idcat);


             $req->execute();
        } catch (Exception $e) {
            echo " Erreur ! " . $e->getMessage();
        }
    }

    function recuperer_categorie($idcat)
    {
        $sql = "SELECT * from categorie where idcat=$idcat";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}


?>