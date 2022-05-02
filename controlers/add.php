<?php

//test 
if($_POST){
    if(isset($_POST['nom'])&& !empty($_POST['nom'])
        && isset($_POST['annee'])&& !empty($_POST['annee'])
        && isset($_POST['score'])&& !empty($_POST['score'])
        && isset($_POST['nbVotants'])&& !empty($_POST['nbVotants'])
    ){  
        //connection à la bd
        require_once('connect.php');
        
        //On nettoie toujours des données
        $nom = strip_tags($_POST['nom']);
        $annee = strip_tags($_POST['annee']);
        $score = strip_tags($_POST['score']);
        $nbvotants = strip_tags($_POST['nbVotants']);

        $sql = 'INSERT INTO `film`(`nom`, `annee`, `score`, `nbVotants`) VALUES
        (:nom, :annee, :score, :nbVotants);';

        $query = $bd->prepare($sql);
        $query->bindValue(':nom', $nom, PDO::PARAM_STR);
        $query->bindValue(':annee', $annee, PDO::PARAM_INT);
        $query->bindValue(':score', $score);
        $query->bindValue(':nbVotants', $nbvotants, PDO::PARAM_INT);
        
        $query->execute();
        $_SESSION['message']= "Film ajouté!";
         //On ferme la connection
         require_once('close.php');
        //on repart vers la page d'acceuil
        header('Location: ./index.php?page=home');

    }else{
        $_SESSION['erreur']=" Formulaire incomplet!";
    }
}

include './views/v_add.php';
?>
