<?php
session_start();
$comma_separated = implode(",", $_SESSION['panier']);
setcookie('panier', $comma_separated, time()+365*24*3600, null, null, false, true);
//include "../config.php";
if(!$_SESSION['user'])
{
    header("Location:index.php");
}
?>
<?php   
include "../config.php";
include "../entities/panier.class.php";
$panier=new panier();

$json=array('error' => true);
if(isset($_GET['id']))
{
    $sq=$_GET['id'];
    $sql = "SELECT id FROM produit WHERE id=$sq";
    $tab=array('id'=>$_GET['id']);
    $db = config::getConnexion();
    $req = $db->prepare($sql);
    $req->execute($tab);
    $product=$req->fetchAll(PDO::FETCH_OBJ);
    if(empty($product))
    {
        $json['message']="Produit n'existe pas!";

    }
    else
    {
        $panier->add($product[0]->id);
        $json['error']=false;
        //$json['total']=$product['Prix'] * $_SESSION['panier'][$product['ID']];
        $nb=$panier->count();
        $json['count']=$nb-1;
        $json['message']='Le produit a bien ete ajoute a votre panier';
        header("Location:category.php");


    }
  
}
else
{
    $json['message']="Vous n'avez selectionne de produit a ajouter au panier";
}

echo json_encode($json);

?>

