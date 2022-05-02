<?php

//On verifie que l'id 
if(isset($_GET['id'])&& !empty($_GET["id"])){
    require_once('connect.php');
    //On nettoie l'id envoyé
    $id = strip_tags($_GET['id']);
    $sql = 'SELECT * FROM `film`WHERE `id`= :id';

    //On prepare la rêquete
    $query = $bd->prepare($sql);
    //On "accroche" les paramètre (id)
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    //On exécute la requête
    $query->execute();

    //On récupère le produit
    $data = $query->fetch();
    if(!$data){
        $_SESSION['erreur']= "Cet id n'existe pas";
        header('Location: index.php?page=home');
    }
    include_once './views/v_voir.php';
}else{
    $_SESSION['erreur']="URL invalide";
    header("Location: index.php?page=home");
}
?>
