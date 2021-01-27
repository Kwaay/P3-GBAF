<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>GBAF | Mot de passe oublié</title>
	<link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <?php include ("header.php"); ?>
        <?php
            require ('config.php');
            $changepassword=$bdd->prepare("UPDATE users SET password = :password WHERE id=:id"); 
            if (!empty($_POST['password'])) 
            {
                echo "Ok";
                $changepassword->execute(array($_POST['password'], $_SESSION['id']));
                $newpass=$changepassword->fetch();
                echo 
                "<div class='success'>
                    <h3>Votre mot de passe a été changé avec succès.</h3>
                </div>";
                header('profil.php');
            }
            ?>
            <div class="forgot_form" align="center">
            <h3><u>Récupération de mot de passe</u></h3>
            <form method="POST" align="center">
                <div class="text-zone">
                    <label for="password"><u>Votre nouveau mot de passe :</u></label>
                    <input type="text" name="newpassword" id="newpassword" placeholder="Votre nouveau MDP">
                </div>
                <br>
                <div class="form_submit">
                    <input type="submit" value="Envoyer">
                </div>
               
            </form>
            <br>
            <p>Vous avez retrouvé votre mot de passe ? <a href="connexion.php" class="link-button">Se connecter</a></p>
            <br>
        </div>




        <?php include ("footer.php") ?>
    </body>
</html>
