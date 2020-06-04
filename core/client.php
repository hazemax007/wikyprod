<?PHP


class client_core
{
    function afficher_client($client)
    {
        echo "Id: " . $client->getid() . "<br>";
        echo "Nom: " . $client->getnom() . "<br>";
        echo "Prenom: " . $client->getprenom() . "<br>";
        echo "Telephone: " . $client->gettel() . "<br>";
        echo "Adresse: " . $client->geadresse() . "<br>";
        echo "Email: " . $client->getemail() . "<br>";
        echo "Login: " . $client->getlogin() . "<br>";
        echo "Mot de passe: " . $client->getmdp() . "<br>";
    }


    function affiche_client()
    {

        $sql = "select * from client";
        $db = config::getConnexion();
        try 
        {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e)
        {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function ajouter_client($client)
    {
        $sql = "insert into client (LoginClient,MdpClient,NomClient,PrenomClient,TelClient,MailClient,AdresseClient) 
		values (:login,:mdp,:nom,:prenom,:telephone,:email,:adresse)";
        $db = config::getConnexion();
        try{
            $req = $db->prepare($sql);

            $login = $client->getlogin();
            $mdp = $client->getmdp();
            $nom = $client->getnom();
            $prenom = $client->getprenom();
            $telephone = $client->gettel();
            $email = $client->getemail();
            $adresse = $client->getadresse();

            $req->bindValue(':login',$login);
            $req->bindValue(':mdp', $mdp);
            $req->bindValue(':nom', $nom);
            $req->bindValue(':prenom', $prenom);
            $req->bindValue(':telephone', $telephone); 
            $req->bindValue(':email', $email);
            $req->bindValue(':adresse', $adresse);


            $req->execute();
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function supprimer_client($id)
    {
        $sql = "DELETE from client where id = :IdClient";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':IdClient', $id);
        try {
            $req->execute();
        } catch (Exception $e)
        {
            die('Erreur: ' . $e->getMessage());
        }
    }
    
    function modifier_client($client, $idClient)
    {
        $sql = "UPDATE client SET nom=:NomClient,prenom=:PrenomClient,adresse=:AdresseClient,email=:MailClient,telephone=:TelClient,mdp=:MdpClient, WHERE idClient=:IdClient";

        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);

            $nom = $client->getnom();
            $prenom = $client->getprenom();
            $adresse = $client->getadresse();
            $telephone= $client->gettel();
            $email = $client->getemail();
            $mdp = $client->getmdp();
           

            $req->bindValue(':NomClient', $nom);
            $req->bindValue(':PrenomClient', $prenom);
            $req->bindValue(':AdresseClient', $adresse);
            $req->bindValue(':TelClient', $telephone);
            $req->bindValue(':MdpClient', $mdp);
            $req->bindValue(':MailClient', $email);
            $req->bindValue(':IdClient', $idClient);


            $req->execute();
        } catch (Exception $e) {
            echo " Erreur ! " . $e->getMessage();
        }
    }

    public static function triclient()
{
    $db = config::getConnexion();
    $sql = "SELECT * FROM client ORDER by nom ASC";
    
    $liste = $db->query($sql);
    return $liste;
}

public static function triprenomclient()
{
    $db = config::getConnexion();
    $sql = "SELECT * FROM client ORDER by prenom DESC";
    $liste = $db->query($sql);
    return $liste;
}

function recuperer_client($id_client)
{
    $sql = "SELECT * from client where id_client=$id_client";
    $db = config::getConnexion();
    try {
        $liste = $db->query($sql);
        return $liste;
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}

function verifier_client($login,$mdp)
{   
    $query ="SELECT * from client where LoginClient=:LoginClient and MdpClient=:MdpClient";
   
    $db = config::getConnexion();
    try {
        $req = $db->prepare($query);
        $req->bindValue(':LoginClient', $login);
        $req->bindValue(':MdpClient', $mdp);
        $req->execute();
        return $req->fetchAll();
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}

function modifier_mdp($client,$login,$mdp)
{
    $query = "UPDATE client set MdpClient=:MdpClient where LoginClient=:LoginClient";
    $db=config::getConnexion();
    try
    {
        $req=$db->prepare($query);
        $login = $client->getlogin();
        $mdp = $client->getmdp();
        $req->bindValue(':MdpClient',$mdp);
        $req->bindValue('LoginClient',$login);
        $req->execute();
    }
    catch(Exception $e)
    {
        die('Erreur'.$e->getMessage());
    }
}
}

?>
