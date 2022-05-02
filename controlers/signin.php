<?php
    if(isset($_POST["username"])&&!empty($_POST["username"])
    &&isset($_POST["password"])&&!empty($_POST["password"])
){
    $username= $_POST['username'];
    $userpassword= $_POST['password'];
    $username= $_POST['username'];
    $usertype= $_POST['type'];
    //connection à la bd
    require_once('./connect.php');
    
    $sql = 'SELECT * from `user` where `username`=:username and `password`=:userpassword;';
    $query = $bd->prepare($sql);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->bindParam(':userpassword', $userpassword, PDO::PARAM_STR);

    $query->execute();
    $data = $query->fetch(PDO::FETCH_ASSOC);
    

    if($data==false){
        $sql = 'INSERT INTO `user`(`username`,`password`,`type`) VALUES (:username, :userpassword, :usertype)';
        $query = $bd->prepare($sql);
        $query->bindParam(':username', $username, PDO::PARAM_STR);
        $query->bindParam(':userpassword', $userpassword, PDO::PARAM_STR);
        $query->bindParam(':usertype', $usertype, PDO::PARAM_STR);

        $query->execute();
        header('Location: ./index.php?page=login');
        
        $_SESSION["message"]= "Inscription réussie, vous pouvez vous connectez dès maintenant!";
        
     }else{
        $_SESSION["erreur"]= "Un utilisateur utilise déjà ces informations. Veuillez les changer!";
        
     }
   

    //deconnection 
    require_once('./close.php');
}else{
    // $_SESSION["erreur"]="Formulaire incomplet!";
    // header('Location:../index.php?page=login');
}
    include_once './views/v_signin.php';
?>