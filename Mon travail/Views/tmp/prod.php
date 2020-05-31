<?php
include "../../config.php";
include "../../Core/produit_core.php";
include "../../Core/categorie_core.php";
$pc = new Produit_core();
$produits = $pc->affiche_produit();

$cc=new categorie_core();
$categories= $cc->affiche_categorie();

$baseUrl = "http://localhost/mon%20travail/Views/images".DIRECTORY_SEPARATOR;

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">


    <link rel="stylesheet" href="vendors/chosen/chosen.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body>
    <?php
     include_once "menu.php";
     ?>

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        

        <?php

        include_once "entete.php";
        ?>

        
        <div class="content mt-3">
            <div class="animated fadeIn">

                <div class="row">
                    <form name="myform" method ="POST" action="traitement/ajout_prod.php" enctype="multipart/form-data">
                    <div class="col-xs-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"> Nom  </strong>
                            </div>
                            <div class="card-body">

                                <input type="text"placeholder="nom de la cathegorie" name="nom">
                                    
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"> Description </strong>
                            </div>
                            <div class="card-body">

                                <input type="text" name="description">
                                    
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"> Prix </strong>
                            </div>
                            <div class="card-body">

                                <input type="text"  name="prix">
                                    
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"> Quantite </strong>
                            </div>
                            <div class="card-body">

                                <input type="text"  name="quantite">
                                    
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"> Categorie </strong>
                            </div>
                            <div class="card-body">
                            <select name="idCat" id="">
                                <?php foreach ($categories as $categorie ):
                                ?>
                                <option value="<?=$categorie["IDcat"];?>"><?=$categorie["NOMcat"];?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title"> Photo </strong>
                        </div>
                        <div class="row form-group">
                            
                            <div class="col-12 col-md-9"><input type="file" id="file-input" name="image" class="form-control-file"></div>
                        </div>
                    </div></br></br>
                    <input type="submit" name="send" value="Ajouter">
                </div>
                </form>
</div>
            
            </div><!-- .animated -->
        </div><!-- .content -->

    </div><!-- /#right-panel -->
    <div class="container-fluid mt-n10">
                        <div class="card mb-4">
                            <div class="card-header">DataTable Example</div>
                            <div class="card-body">
                                <div class="datatable table-responsive">
                                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Identifiant</th>
                                                <th>Image </th>
                                                <th>Nom</th>
                                                <th>Prix</th>
                                                <th>Quantite</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                
                                        <tbody>
                                            <?php foreach ($produits as $produit) : ?>
                                                <tr>
                                                    <td><?= $produit['ID']?></td>
                                                    <td> <img src="<?=$baseUrl. $produit['Image']?>" alt="" srcset=""> </td>
                                                    <td><?= $produit['Nom']?></td>
                                                    <td><?= $produit['Prix']?></td>
                                                    <td><?= $produit['Quantite']?></td>
                                                    <td>
                                                        <a href="traitement/supp_prod.php?ID=<?= $produit['ID']?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                                        <a href="traitement/modif_prod.php?ID=<?= $produit['ID']?>"><i class="fa fa-pencil-square"></i></a>
                                                    </td>

                                                </tr>

                                            
                                            <?php endforeach ?>

                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="footer mt-auto footer-light">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 small">Copyright &#xA9; Your Website 2020</div>
                            <div class="col-md-6 text-md-right small">
                                <a href="#!">Privacy Policy</a>
                                &#xB7;
                                <a href="#!">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script type="text/javascript">
            let myform= document.getElementById('myform');
            let prix= document.getElementById('prix');
            let quantite= document.getElementById('quantite');
            myform.addEventListener('submit', function(e){
                
            })
            if (prix.value.trim()<=0) {
                    let myerror = document.getElementById('error');
                    myerror.innerHTML = "Le champs username est requis.";
                    myerror.style.color = 'red';
                    e.preventDefault();
            }
        </script>

</body>

</html>