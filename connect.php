<?php
try{
    //connection à la bd en PDO
    $bd = new PDO('mysql:host=localhost;dbname=videoclub', 'root', '');
    //$bd->exec('');

}catch(PDOException $e){
    echo 'Erreur: '.$e->getMessage();
    die();
}
?>