<?php
session_start();
include "../config.php";
include "../core/client.php";
include "../entities/client.php";

if(isset($_POST['envoi']))
{
    $mdp_actuel=$_POST['mdp_actuel'];
    $mdp_new=$_POST['mdp_new'];
    $mdp_new_confirm=$_POST['mdp_new_confirm'];
    $user=$_SESSION['user'];
   
    
    $db = config::getConnexion();
    $req = $db->prepare('SELECT MdpClient from client WHERE LoginClient= ?');
    $req->execute(array($user));
    $cli=$req->fetch();
    $mdp = $cli['MdpClient'];

    if($mdp != $mdp_actuel)
    {
        //si le mot de passe entré est different de celui de la base de donnée
        echo "<p style='color:red;'>Mauvais mot de passe!</p>";
    }
    else
    {
        //si c'est le bon mot de passe
        if($mdp_new != $mdp_new_confirm)
        {
            //si les deux mdp sont differents
            header("Location:compte.php");
            echo "<script language='javascript'>Les mots de passe sont differents!</script>";
        }
        else
        {
            $req = $db->prepare('UPDATE client SET MdpClient=? WHERE LoginClient= ?');
            $req->execute(array($mdp_new,$user));
           
        
            header("Location:compte.php");
        }

    }

   

    header("Location:compte.php");
    

}
?>
