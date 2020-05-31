<?php
include "../../../config.php";
include "../../../Core/produit_core.php";
include "../../../Entities/produits.php";
$baseUrl = "http://localhost/mon%20travail/Views/images".DIRECTORY_SEPARATOR;
$prod = new Produit_core();
$data = "";

if (isset($_GET['user'])) {
    
    $user = $_GET['user'];
    $search = $prod->recherche($user);
    
    if (empty($search)) {

    $data = <<<HTML
        <div style="font-size : 20px ; text-align: center; margin-top: 10px"> Aucun produit </div>
HTML;

    }

    foreach ($search as $row) {
        $nom=$row['Nom'];
		$prix=$row['Prix'];
		$quantite=$row['Quantite'];
        $description=$row['Description'];
        $id=$row['ID'];
        $idcat=$row['IDcat'];
        $image=$row['Image'];
        $cat=$row['NOMcat']; 
        $url=$baseUrl.$image;
    $data .= <<<HTML
        <div class="col-md-6 col-lg-4">
            <div class="card text-center card-product">
                <div class="card-product__img">
                <img class="card-img" src="$url" alt="">
                <ul class="card-product__imgOverlay">
                    <li><button><i class="ti-search"></i></button></li>
                    <li><button><i class="ti-shopping-cart"></i></button></li>
                    <li><button><i class="ti-heart"></i></button></li>
                </ul>
                </div>
                <div class="card-body">
                <p>$cat</p>
                <h4 class="card-product__title"><a href="single-product.php?ID=$idcat" >$nom</a></h4>
                <p class="card-product__price">$prix</p>
                </div>
            </div>
        </div>
HTML;

        }

}
 echo $data;
?>