<?PHP
include "../../config.php";
include "../../Core/produit_core.php";




$produit1C=new Produit_core();
$listeproduits=$produit1C->affiche_produit();
foreach($listeproduits as $row){
	?>
	<tr>
	<td><?PHP echo $row['Identfiant']; ?></td>
	<td><img src="apercu.php?id_img=<?PHP echo $row['Identifiant+']; ?>" class="image"></td>
	<td><?PHP echo $row['Nom']; ?></td>
	<td><?PHP echo $row['Prix']; ?></td>
	<td><?PHP echo $row['idcat']; ?></td>
	<td><?PHP echo $row['Quantite']; ?></td>
	<!--<form method="POST" action="views/supprimerproduit.php">
	<input type="submit" name="supprimer" class="btn btn-datatable btn-icon btn-transparent-dark mr-2">
	<input type="hidden" value="<?PHP echo $row['Identifiant']; ?>" name="Identifiant">
	<i data-feather="more-vertical"></i><a href="views/modifierproduit.php?Identifiant=<?PHP echo $row['Identifiant']; ?>
	"><button class="btn btn-datatable btn-icon btn-transparent-dark"><i data-feather="trash-2"></i></button></a>
                                                </td>-->
	<?PHP
}
?>

