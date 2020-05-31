<?php

$connexion = new PDO('mysql:host=localhost;dbname=projetweb', 'root', '');
$query = "select * From categorie ";
$result= $connexion->query($query);
$data= $result->fetchAll();
for($i=0;$i<count($data);$i++)
{
    $id=$data[$i]["IDcat"];
    $nom=$data[$i]["NOMcat"];
echo "<tr><td>$id</td><td>$nom</td></tr>";
$connexion->exec($query);
header("Location:../forms-advanced1.php");
}