<?php

//include "../../../config.php";
//include "../../../Core/categorie_core.php";
//nclude "../../../Entities/categorie.php";
//var_dump($_POST);


   if(isset ($_POST['nom']))
{
    
    //if(!empty($nom))&& preg_match("/[A-Za-z](3,30)/",$nom))
    
        $connexion = new PDO('mysql:host=localhost;dbname=projetweb', 'root', '');
        $nom=$_POST['nom'];
        $query="insert into categorie values(NULL,'$nom') ";
        $connexion->exec($query);
        header("Location:../prod.php");

    
}
    //header("Location:../forms-advanced1.php")
        
       
   // }
    //$categorie= new categorie($nom);
    //$categorie_core= new Categorie_core();
    //$categorie_core->ajouter_Categorie($categorie);
    //var_dump($categorie);

    //header("Location:../forms-advanced1.php");


?>