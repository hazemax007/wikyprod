<HTML>
       <head>
           
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="../apple-icon.png">
    <link rel="shortcut icon" href="../favicon.ico">


    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">


    <link rel="stylesheet" href="../vendors/chosen/chosen.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>


       </head>
     <body>

     <?php 

     include_once "menu1.php";

     ?>

     <!-- /#left-panel -->


    <div id="right-panel" class="right-panel">
<?php

include_once "../entete.php";
?>

    <?PHP
    include "../../../config.php";
    include "../../../Core/produit_core.php";
    include "../../../Entities/produits.php";
    include "../../../Core/categorie_core.php";
    $baseUrl = dirname(__DIR__,2)."../images//";
    $cc=new categorie_core();
$categories= $cc->affiche_categorie();

    if (isset($_GET['ID'])){
        $id=$_GET['ID'];
        $prod=new Produit_core();
        $result=$prod->recuperer_produit($id);
        foreach($result as $row){
            
          $nom=$row['Nom'];
          $prix=$row['Prix'];
          $quantite=$row['Quantite'];
          $description=$row['Description'];
          $idcat=$row['IDcat'];
          $image=$row['Image'];
            
            
          if (isset($_POST['modifier'])){
            $file_name = $image;
        if(isset($_FILES['image']))
        {
            //var_dump($_POST);
            $errors= array();
            $file_name = $_FILES['image']['name'];
            $file_size =$_FILES['image']['size'];
            $file_tmp =$_FILES['image']['tmp_name'];
            $file_type=$_FILES['image']['type'];
            $file_ext=strtolower((explode('.',$file_name)[1]));
      
            $expensions= array("jpeg","jpg","png");
            if(file_exists($file_name)) {
              echo "Sorry, file already exists.";
              }
            if(in_array($file_ext,$expensions)=== false){
               $errors[]="extension not allowed, please choose a JPEG or PNG or jpg file.";
            }
      
            if($file_size > 2097152){
               $errors[]='File size must be excately 2 MB';
            }
      
            if(empty($errors)==true){
              move_uploaded_file($file_tmp,$baseUrl.$file_name);
              echo "Success";
              
            }
    
            else{
               print_r($errors);
            }
         }
            $nom=$_POST['nom'];
            $prix=$_POST['prix'];
            $quantite=$_POST['quantite'];
            $description=$_POST['description'];
            $idcat=$_POST['idCat'];
            $produit1=new produit($prix,$quantite,$nom, $file_name, $description,intval($idcat));
            $prod->modifier_produit($produit1,$_POST['id_ini']);
            echo $_POST['id_ini'];
            
        }
        ?>
     <form name="myform" method ="POST" enctype="multipart/form-data">
                        <div class="col-xs-6 col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title"> Nom  </strong>
                                </div>
                                <div class="card-body">

                                    <input type="text"placeholder="nom de la cathegorie" name="nom"  value="<?PHP echo $nom ?>">
                                        
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title"> Description </strong>
                                </div>
                                <div class="card-body">

                                    <input type="text" name="description" value="<?PHP echo $description?>">
                                        
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title"> Prix </strong>
                                </div>
                                <div class="card-body">

                                    <input type="text"  name="prix" value="<?PHP echo $prix ?>">
                                        
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title"> Quantite </strong>
                                </div>
                                <div class="card-body">

                                    <input type="text"  name="quantite" value="<?PHP echo $quantite ?>">
                                        
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
                                
                                <div class="col-12 col-md-9"><img src="<?=$baseUrl. $image?>"> <input type="file" id="file-input" name="image" class="form-control-file"></div>
                            </div>
                        </div></br></br>
                        <input type="hidden" name="id_ini" value="<?PHP echo $_GET['ID'];?>">
                        <input type="submit" name="modifier" value="Modifier">
                    </div>
                    </form>
 

        
    <?PHP
        }
    }
    else {echo "verifier";}
    if (isset($_POST['modifier'])){
        $file_name = $image;
    if(isset($_FILES['image']))
    {
        //var_dump($_POST);
        $errors= array();
        $file_name = $_FILES['image']['name'];
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
        $file_ext=strtolower((explode('.',$file_name)[1]));
  
        $expensions= array("jpeg","jpg","png");
        if(file_exists($file_name)) {
          echo "Sorry, file already exists.";
          }
        if(in_array($file_ext,$expensions)=== false){
           $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }
  
        if($file_size > 2097152){
           $errors[]='File size must be excately 2 MB';
        }
  
        if(empty($errors)==true){
          move_uploaded_file($file_tmp,$baseUrl.$file_name);
          echo "Success";
          
        }

        else{
           print_r($errors);
        }
     }
        $nom=$_POST['nom'];
        $prix=$_POST['prix'];
        $quantite=$_POST['quantite'];
        $description=$_POST['description'];
        $idcat=$_POST['idCat'];
        $produit1=new produit($prix,$quantite,$nom, $file_name, $description,intval($idcat));
        $prod->modifier_produit($produit1,$_POST['id_ini']);
        echo $_POST['id_ini'];
        //header('Location: ../prod.php');
    }
   
    ?>
    </body>
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
<script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../vendors/chosen/chosen.jquery.min.js"></script>

<script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    });
</script>
    </HTMl>
    
