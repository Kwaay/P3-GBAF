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
            // Système de modification de mot de passe //
            if (!empty($_POST['password'])) 
            {
                echo "Ok";
                $changepassword=$bdd->prepare("UPDATE users SET password = :password WHERE id=:id"); 
                $changepassword->execute(array($_POST['password'], $_SESSION['id']));
                $newpass=$changepassword->fetch();
                echo 
                "<div class='success'>
                    <h3>Votre mot de passe a été modifié avec succès.</h3>
                </div>";
                header('profil.php');
            }

            ?>
            <div class="forgot-form">
            <h3><u>Modification de votre mot de passe</u></h3>
            <form method="POST">
                <div class="text-zone">
                    <label for="password"><u>Votre nouveau mot de passe :</u></label>
                    <br />
                    <br />
                    <input type="password" name="newpassword" id="newpassword" placeholder="Votre nouveau MDP">
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
