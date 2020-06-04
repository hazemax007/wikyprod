<?php
session_start();
include "../config.php";
include "../core/client.php";
include "../entities/client.php";

if(isset($_POST['envoi']))
{
    $nom=$_POST['nom'];
    $prenom=$_POST['Prenom'];
    $tel=$_POST['tel'];
    $email=$_POST['email'];
    $user=$_SESSION['user'];
   
    
    $db = config::getConnexion();
    $req = $db->prepare('UPDATE client SET NomClient=?,PrenomClient=?,TelClient=?,MailClient=?  WHERE LoginClient= ?');
    $req->execute(array($nom,$prenom,$tel,$email,$user));
   

    header("Location:compte.php");
    

}
?>
