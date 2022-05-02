<?php
// On démarre une session
session_start();

// Est-ce que l'id existe et n'est pas vide dans l'URL
if(isset($_GET['id']) && !empty($_GET['id'])){
    require_once('connect.php');

    // On nettoie l'id envoyé
    $id = strip_tags($_GET['id']);

    $sql = 'SELECT * FROM `film` WHERE `id` = :id;';

    // On prépare la requête
    $query = $bd->prepare($sql);

    // On "accroche" les paramètre (id)
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // On exécute la requête
    $query->execute();

    // On récupère le produit
    $data = $query->fetch();

    // On vérifie si le produit existe
    if(!$data){
        $_SESSION['erreur'] = "Cet id n'existe pas";
        header('Location: index.php?page=home');
        die();
    }

    $sql = 'DELETE FROM `film` WHERE `id` = :id;';

    // On prépare la requête
    $query = $bd->prepare($sql);

    // On "accroche" les paramètre (id)
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // On exécute la requête
    $query->execute();
    $_SESSION['message'] = "Film supprimé";
    header('Location: index.php?page=home');


}else{
    $_SESSION['erreur'] = "URL invalide";
    header('Location: index.php?page=home');
}