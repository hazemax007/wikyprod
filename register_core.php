<?php
include "../config.php";
include "../core/client.php";
include "../entities/client.php";

if(isset($_POST['envoi']))
{
    $nom=$_POST['nom'];
    $prenom=$_POST['Prenom'];
    $tel=$_POST['tel'];
    $adresse=$_POST['Adresse'];
    $email=$_POST['email'];
    $login=$_POST['login'];
    $mdp=$_POST['mdp'];
    
    $client = new client($nom,$prenom,$tel,$adresse,$email,$login,$mdp);
    $client_core = new client_core();
    
    $client_core->ajouter_client($client);
    header("Location:register_views.php");
    

}
?>
