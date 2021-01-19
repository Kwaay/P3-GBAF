<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>GBAF | Connexion</title>
	<link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <?php include ("header.php") ?>
        <?php
            require('config.php');
            if (isset($_POST['username'], $_POST['password']))
            {
                $username = htmlspecialchars($_POST['username']);
                $password = sha1($_POST['password']);
                if(!empty('username') AND !empty('password'))
                {
                    $req = $bdd->prepare("SELECT (username,password) FROM `users` WHERE username = ? AND password = ?");
                    $req->execute(array($username,$password));
                    $userexist = $req->rowCount();
                    if($userexist == 1)
                    {
                        $userinfo = $req-> fetch();
                        $_SESSION['id'] = $userinfo['id'];
                        $_SESSION['username'] = $userinfo['username'];
                        $_SESSION['password'] = $userinfo['password'];
                        header("Location: profil.php?id=".$_SESSION['id'])
                    }
                    else
                    {
                        $erreur = "Mauvais identifiants";
                    }
          
                }
                else 
                {
                    $erreur = "Tous les champs doivent être complétés";
                }
                
            }
        ?>

        <div class="connexion_form">
            <h3><u>Connexion à l'Extranet</u></h3>
            <form method="POST">
                <div class="form_pseudo">
                    <label for="pseudo"><u>Pseudonyme :</u></label>
                    <input type="text" id="pseudo" placeholder="Votre pseudo">
                </div>
                <br>
                <div class="form_password">
                    <label for="password"><u>Mot de passe :</u></label>
                    <input type="password" id="password" placeholder="Votre mot de passe">
                </div>
                <br>
                <div class="form_submit">
                    <input type="submit" id="password" value="Se connecter">
                </div>
               
            </form>
            <br>
            <p>Pas encore inscrit ? <a href="inscription.php" class="link-button">S'inscrire</a></p>
            <p><a href="forgot.php" class="link-button">Mot de passe oublié ?</a></p>
            <br>
            </div>

        <?php include ("footer.php") ?>
    </body>
</html>




