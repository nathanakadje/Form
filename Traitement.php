<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    try{
        $bdd = new PDO("mysql:host=$servername; dbname=utilisateur", $username,$password);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo " connexion reussi !!";
    }
    catch(PDOException $e){
        echo "Erreur : ".$e->getMessage();
    }
   
    if(isset($_POST['ok'])){
        $pseudo= $_POST['pseudo'];
        $nom =$_POST['nom'];
        $prenom =$_POST['prenom'];
        $mdp =$_POST['pass'];
        $email =$_POST['email'];
        
        $requete = $bdd->prepare("INSERT INTO user VALUES (0, :pseudo, :nom, :prenom, :pass, :email, '')");
        $requete->execute(
            array(
                "pseudo" => $pseudo,
                "nom" => $nom,
                "prenom" => $prenom,
                "pass" => $mdp,
                "email" => $email
            )
            ) ;
        $reponse = $requete->fetchAll(PDO::FETCH_ASSOC);
      header("Location: Inscrit.php");
    }
?>