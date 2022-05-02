<?php

//traitement du post
if($_POST){
    if( isset($_POST['nom'])&& !empty($_POST['nom'])
        &&isset($_POST['nom'])&& !empty($_POST['nom'])
        && isset($_POST['annee'])&& !empty($_POST['annee'])
        && isset($_POST['score'])&& !empty($_POST['score'])
        && isset($_POST['nbVotants'])&& !empty($_POST['nbVotants'])
    ){  
        //connection à la bd
        require_once('connect.php');
        
        //On nettoie toujours des données
        $id = strip_tags($_POST['id']);
        $nom = strip_tags($_POST['nom']);
        $annee = strip_tags($_POST['annee']);
        $score = strip_tags($_POST['score']);
        $nbvotants = strip_tags($_POST['nbVotants']);

        $sql = 'UPDATE `film` SET (`id`=:id,`nom`=:nom, `annee`=:annee, `score`=:score, `nbVotants`=:nbvotants) WHERE `id`=:id;';

        $query = $bd->prepare($sql);
        
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->bindParam(':nom', $nom, PDO::PARAM_STR);
        $query->bindParam(':annee', $annee, PDO::PARAM_INT);
        $query->bindParam(':score', $score, PDO::PARAM_INT);
        $query->bindParam(':nbVotants', $nbvotants, PDO::PARAM_INT);

        $query->execute();

        //msg succes

        $_SESSION['message']= "Film modifié!";
         //On ferme la connection
         require_once('close.php');
        //on repart vers la page d'acceuil
        header('Location: index.php?page=home');

    }else{
        $_SESSION['erreur']=" Formulaire incomplet!";
    }
}
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
}else{
    $_SESSION['erreur']="URL invalide";
    header("Location: index.php?page=home");
}

include_once './views/v_edit.php';
?>

