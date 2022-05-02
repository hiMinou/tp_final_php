<?php
session_start();
//connection à la bd
require_once('connect.php');
//test 
$sql = 'Describe film';
$query=$bd->prepare($sql);
$query->execute();
$col = $query->fetchAll(PDO::FETCH_COLUMN);
//var_dump($col);

//on recupère les colones
if(isset($_GET["Direction"]) && isset($_GET["orderBy"]) && in_array($_GET["orderBy"], $col)){

    $parm1 = $_GET["orderBy"];
    $parm2 = $_GET["Direction"];
    
}else{
    $parm1 = "id";
    $parm2 = "ASC";
}     

//on recupère toute les data
$sql = 'SELECT * from `film` order by '.$parm1.' '.$parm2;
$query=$bd->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
//var_dump($result);


//On ferme la connection
require_once('close.php');

//navbar
include_once './views/v_navbar.php';

//routeur de page
include_once './controlers/routeur.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link rel="stylesheet" href="main.css">
    <title>TP_final</title>
</head>
<body>
    
    <?php
        //navbar
        include_once './views/v_navbar.php';

        include_once './controlers/routeur.php';
        

        
        
    ?>
</body>
</html>

