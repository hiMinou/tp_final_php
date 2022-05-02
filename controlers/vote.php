<?php
    if(isset($_GET['vote'])&&isset($_GET['id'])){
        require_once('connect.php');
        //On nettoie le get envoyé
        $vote = strip_tags($_GET['vote']);
        $id = strip_tags($_GET['id']);
        
        $sql = 'SELECT * FROM `film`WHERE `id`= :id';
    
        //On prepare la rêquete
        $query = $bd->prepare($sql);
        //On "accroche" les paramètre (id)
        $query->bindValue(':id', $id, PDO::PARAM_INT);
    
        //On exécute la requête
        $query->execute();
    
        //On récupère le produit
        $data = $query->fetch(PDO::FETCH_ASSOC);

        var_dump($data);
        $newscore= $data['score'] + 1/10;
        $newnbvotants= $data['nbVotants']+1;
        if(!$data){
            $_SESSION['erreur']= "Cet id n'existe pas";
            header('Location: index.php?page=home');
        }else{

            // if($vote=='top'){
            //         if($data['score']<=10){
            //             $sql = 'UPDATE `film` SET nom =:nom, annee =:annee, score=:score, nbVotants =:nbvotants WHERE id=:id;';

            //             $query = $bd->prepare($sql);
                        
            //             $query->bindParam(':id', $id, PDO::PARAM_INT);
            //             $query->bindParam(':nom', $nom, PDO::PARAM_STR);
            //             $query->bindParam(':annee', $annee, PDO::PARAM_INT);
            //             $query->bindParam(':score', $newscore, PDO::PARAM_INT);
            //             $query->bindParam(':nbVotants', $newnbvotants, PDO::PARAM_INT);
                
            //             $query->execute();
                        
            //         }
            // }
            $_SESSION['message']= "Merci pour votre vote!";
            header('Location: index.php?page=home');

        }
        
    }else{
        $_SESSION['erreur']="URL invalide";
        header("Location: index.php?page=home");
    }
    
?>