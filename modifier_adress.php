<?php
session_start();
include "../config.php";
include "../core/client.php";
include "../entities/client.php";

if(isset($_POST['envoi']))
{
    $adresse=$_POST['adress'];
    $user=$_SESSION['user'];
   
    
    $db = config::getConnexion();
    $req = $db->prepare('UPDATE client SET AdresseClient=? WHERE LoginClient= ?');
    $req->execute(array($adresse,$user));
   
    header("Location:compte.php");
    

}
?>
