<?php  

session_start();
if(isset($_POST['button']))
{
    session_destroy();
}
else
{
session_unset();
}
header("Location:index.php");

?>