<?PHP

class Produit_core {
    function recuperer_dernier_id()
    {
        $db = config::getConnexion();
        return $db->lastInsertId();
    }
    /*public function get_catalogue($id_produit)
    {
        $db = config::getConnexion();
        $req=$db->prepare("SELECT * from catalogue where ide_produit=?");
        $req->execute(array($id_produit));
        return $req->fetchAll(PDO::FETCH_OBJ);
    }*/
    function affiche_produit(){ 

        $sql="SELECT * From produit p inner join categorie c on p.idcat=c.idcat";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }   
    }
  
	function ajouter_produit($Produit){
		$sql="insert into produit (prix,quantite,nom,image,description, idcat) 
		values (:prix,:quantite,:nom,:image,:description,:idcat)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
       
        $prix=$Produit->getprix();
        $quantite=$Produit->getquantite();
        $nom=$Produit->getnom();
        $image=$Produit->getimage();
        $description=$Produit->getdescription();
        $idcat=$Produit->getidcat();
  
		
		$req->bindValue(':prix',$prix);
		$req->bindValue(':quantite',$quantite);
		$req->bindValue(':nom',$nom);
        $req->bindValue(':image',$image);
        $req->bindValue(':description',$description);
        $req->bindValue(':idcat',$idcat);
        
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function supprimer_produit($id){
		$sql="DELETE FROM produit where id= :id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifier_produit($Produit,$id){
		$sql="UPDATE produit SET prix=:prix,quantite=:quantite,image=:image,description=:description,nom=:nom,idcat=:idcat WHERE id=:id";
		
		$db = config::getConnexion();
try{		
        $req=$db->prepare($sql);
		
        $prix=$Produit->getprix();
        $quantite=$Produit->getquantite();
        $nom=$Produit->getnom();
        $image=$Produit->getimage();
        $description=$Produit->getdescription();
        $idcat=$Produit->getidcat();

		$req->bindValue(':prix',$prix);
		$req->bindValue(':quantite',$quantite);
		$req->bindValue(':nom',$nom);
        $req->bindValue(':image',$image);
        $req->bindValue(':description',$description);
        $req->bindValue(':idcat',$idcat);
        $req->bindValue(':id',$id);
      
		
		
            $s=$req->execute();
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }
		
	}
    public function recherche($valeur)
    {
        $sql="SELECT * from produit p inner join categorie c on p.idcat=c.idcat where p.nom like '%$valeur%'";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste->fetchAll();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function recuperer_produit($id){
        $sql="SELECT * from produit where id=$id";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
       
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }

    }
    function recuperer_produit2($id){
        $sql="SELECT * from produit where id=$id";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
       
            return $liste->fetch();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
        
    }
    function GetProduitbycategory($idcat)
    {

        $sql="SELECT * from produit p inner join categorie c on p.idcat=c.idcat where p.idcat=$idcat";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
       
            return $liste->fetchAll();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    
        
    }
    public static function tri_produit()
    {
        $db = config::getConnexion();
        $sql = "SELECT * FROM produit ORDER by nom ASC";
        $liste = $db->query($sql);
        return $liste;
    }
    public static function tri_prix_produit()
    {
        $db = config::getConnexion();
        $sql = "SELECT * FROM produit ORDER by prix DESC";
        $liste = $db->query($sql);
        return $liste;
    }
    function afficher_nouveautes(){
        $sql="SELECT * FROM  produit ORDER BY added DESC LIMIT 10";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }   
          
    }
    
}

?>