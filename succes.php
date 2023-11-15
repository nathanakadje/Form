<?php 
$servername = "localhost";
     $username = "root";
     $password = "";
     try{
         $bdd = new PDO("mysql:host=$servername; dbname=utilisateur", $username,$password);
         $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo " connexion reussi !!";
     }
     catch(PDOException $e){
         echo "Erreur : ".$e->getMessage();
     }
     $email = $_COOKIE['email'];
     $token = $_COOKIE['token'];
     if($token){
        $req =$bdd -> query("SELECT * FROM user WHERE email = '$email' AND token = '$token'");
        $rep = $req->fetch();
    if ($rep['pseudo'] != false){
        echo " Vous etes bien connecte ".$rep['pseudo']." !";
    }
    else{
        header("Location: Login.php");
    }
     }
    
?>