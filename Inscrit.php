<!DOCTYPE html>
<html lang='fr'>
    <head> 
        <meta charset='UTF-8'>
        <title> INSCRIPTION</title>
        <style>
            input{
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body>
        <form method="POST" action="Traitement.php">
        <label for="nom"> Votre nom* </label>
        <input type="text" id ="nom" name="nom" placeholder="Enter your name..." required>
         <br />
         <label for="prenom"> Votre prenom*</label>
        <input type="text" id ="prenom" name="prenom" placeholder="Enter your lastname..." required> 
        <br />
        <label for="pseudo"> Votre pseudo </label>
        <input type="text" id ="pseudo" name="pseudo" placeholder="Enter your pseudo..." required > 
        <br />
        <label for="pass"> Votre Mot de pass* </label>
        <input type="password" id ="pass" name="pass" placeholder="Enter your Password..." required> 
        <br />
        <label for="email"> Votre Email*</label>
        <input type="text" id ="email" name="email" placeholder="Enter your mail.." required> 
        <br />
        <input type="submit" value="M'inscrire" name="ok">
    </form>
    </body>
</html>