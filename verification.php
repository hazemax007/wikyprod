<?php
require "../config.php";
//require  '../views/inc/eader.php';
require "../core/client.php";
require "../entities/client.php";
//require "../entities/panier_class.php";
session_start();

$user='WikyprodAd';
$password='Wiky216237';

if(isset($_POST['envoi']))
{
    $login=$_POST['login'];
    $mdp=$_POST['mdp'];

    if($login&&$mdp)
    {
        if($login==$user&&$mdp==$password)
        {
            $_SESSION['user']=$login;
                header("Location:../views/admin/views/index.php" );
          
           
        }
        else
        {
            $client_core = new client_core();
            $utilisateur=$client_core->verifier_client($login,$mdp);
            if(empty($utilisateur))
             {
                echo "<script type='text/javascript' language='javascript'>alert(\"Login ou mot de passe incorrect!\")</script>";
                 header("Location:login.php");
             }
             else
             {
                echo "<script type='text/javascript' language='javascript'>alert('Vous avez été connecté avec succes!')</script>";
                $_SESSION['user']=$login;
                header("Location: index.php");
             }
        }
    }   
}

?>


