<?php
/*
On va écrire le controleur router qui va nous permettre de gerer nos points de terminaisons.
*/
if(isset($_GET["page"]))
{
    $page = $_GET["page"];
    include $page.".php";
}else {
    header('Location: ../index.php?page=home');
}
//var_dump($page);


?>