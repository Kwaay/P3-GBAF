<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>GBAF | Forgot</title>
	<link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <?php include ("header.php"); ?>
        <?php
            require ('config.php');
            // Système de modification de mot de passe connecté //
            if(isset($_POST['password'], $_SESSION['id'])) 
            {
                $password = sha1($_POST['password']);

                if(!empty($_POST['password'])) 
                    {
                        $changepassword=$bdd->prepare("UPDATE users SET password = ? WHERE id= ?"); 
                        $changepassword->execute(array($password, $_SESSION['id']));
                        echo 
                        "<div class='success'>
                            <h3>Votre mot de passe a été modifié avec succès.</h3>
                            <p> Vous allez être redirigé vers votre profil dans 3 secondes </p>
                            <br />
                        </div>";
                        ?>
                        
                        <?php
                    }
            }

            ?>
            
            <div class="forgot-form">
            <h3><u>Modification de votre mot de passe</u></h3>
            <form method="POST">
                <div class="text-zone">
                    <label for="password"><u>Votre nouveau mot de passe :</u></label>
                    <br />
                    <br />
                    <input type="password" name="password" id="password" placeholder="Votre nouveau MDP">
                </div>
                <br>
                <div class="form_submit">
                    <input type="submit" name="submit" value="Envoyer">
                </div>
               
            </form>
            <br>
            <p>Vous avez retrouvé votre mot de passe ? <a href="connexion.php" class="link-button">Se connecter</a></p>
            <br>
        </div>
        <?php include ("footer.php") ?>

