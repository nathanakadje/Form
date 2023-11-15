<?php 

require_once_DIR_."config.php";
//Verifier si la variable email exite et n'est pas vide
if(isset($_POST['email']) && ! empty($_POST['email'] ) ){
    $email = htmlspecialchars($_POST['email']);
    $check = $bdd->prepare(' SELECT token FROM form WHERE email = ?');
    $check->execute(array($email));
    $data =  $check->fetch();
    //Nombre de ligne que reverra la requete sql
    $row =  $check-> rowCount();
    if($row){
        $token = bin2hex(openssl_random_pseudo_bytes(24));
        $token_user = $data['token'];
        $insert = $bdd-> prepare('INSERT INTO password_recover(token_user,token) VALUE (?,?)');
        $insert ->execute (array($token_user,$token));
        //creer le lien unique
        $link = 'recover.php?u=' .base64_encode($token_user). '&token=' .base64_encode($token);
        echo" <a href='$link'>Lien</a>";
    }else{
        echo "compte non valide";
    }
}
?>