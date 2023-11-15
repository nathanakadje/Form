<?php
//Creer une connexion a la bd
try{
    $bdd = new PDO('mysql:host=localhost;dbname=bd_form; charset=utf8', 'root','');
    echo " connexion reussi !!";
}catch(\Exception $e){
    die('Erreur'.$e->getMessage());
}

?>