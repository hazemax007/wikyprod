<?PHP
include "../../../config.php";
include "../../../Core/produit_core.php";
include "../../../Entities/produits.php";
$baseUrl = dirname(__DIR__,2)."/images//";
$prod= new Produit_core();
if (isset($_GET["ID"])){
    $id =$_GET["ID"];
    $recup=$prod->recuperer_produit2($id);
    var_dump($recup);
    unlink($baseUrl.$recup["Image"]);
	$prod->supprimer_produit($id);

}
header('Location: ../prod.php');
?>