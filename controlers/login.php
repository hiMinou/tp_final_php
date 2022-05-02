<?php
if(isset($_POST["username"])&&!empty($_POST["username"])
    &&isset($_POST["password"])&&!empty($_POST["password"])
){
    $username= $_POST['username'];
    $userpassword= $_POST['password'];
    //connection à la bd
    require_once('./connect.php');
    
    $sql = 'SELECT * from `user` where `username`=:username and `password`=:userpassword;';
    $query = $bd->prepare($sql);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->bindParam(':userpassword', $userpassword, PDO::PARAM_STR);

    $query->execute();
    $data = $query->fetch(PDO::FETCH_ASSOC);
    

    if($data==false){
        $_SESSION["erreur"]="Informations de connection incorrects!";
        
     }else{
        session_start();
        header('Location: ../index.php?page=home');
        $_SESSION["username"]= $data["username"];
        $_SESSION["type"]=$data["type"];
        $_SESSION["message"]="Bienvenu ".$data["username"];
     }
   

    //deconnection 
    require_once('./close.php');
}else{
    // $_SESSION["erreur"]="Formulaire incomplet!";
    // header('Location:../index.php?page=login');
}

include_once './views/v_login.php';
?>
