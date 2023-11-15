<!DOCTYPE html>
<html lang='fr'>
    <head> 
        <meta charset='UTF-8'>
        <title> connexion</title>
    </head>
 </html>
 <body>

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
     //verifier si les informations du formulaire sont en POST
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $email = $_POST['email'];
            $password = $_POST['password'];
            //Requete sql
            if ($email != "" && $password !=""){
                //Creation du token avec la fonction random qui specifie le nvr de caratere 
                $token = bin2hex(random_bytes(32));
                //connexion a la bd
                $req = $bdd -> query("SELECT * FROM user WHERE email='$email' AND mdp='$password'");
               //execution de la requete
               $rep = $req->fetchAll();
               
            //verifier si false ou true
            if($rep != false){
                //Ajout du token aux id du user selectionne
                $bdd ->exec("UPDATE user SET token='$token' WHERE email='$email' AND mdp='$password'");
                setcookie("token", $token, time() + 3600);
                setcookie("email", $email, time() + 3600);
                header("Location: succes.php");
                exit();}
            else{
                echo nl2br( "Email ou mdp incorect !!  ");
                
             }
         }
         
        }

    ?>
    <form method="POST" action=""> 
        <label for = "email" >Email</label> 
        <input type="email" id ="email" name="email" placeholder="Enter your mail.." required>
        <label for = "password"> Mot de pass</label> 
        <input type="password" id ="password" name="password" placeholder="Mot de pass.." required>
        <input type="submit" value="Se connecter" name="ok">
    </form>
    <?php
        if($GLOBALS == false){
            ?>
           <p> <?php echo "Email ou mdp incorect !!"; ?> </p>
           <?php
        }
    ?> 
 </body>