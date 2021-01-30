<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>GBAF | Paramètres du compte</title>
	<link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <?php include ("header.php") ?>
        <?php
            require('config.php');
                // Système de récupération des informations de l'utilisateur pour les afficher dans le profil //
                $getid = intval($_SESSION['id']);
                $requser = $bdd->prepare('SELECT * FROM `users` WHERE id = ?');
                $requser->execute(array($getid));
                $userinfo = $requser->fetch();
        ?>
        <div class="profil" align="center">
            <div class="profil-titre">
                <h2><u>Profil de <?php echo ucfirst($userinfo['username']); ?></h2></u>
                <div class="profil-text">
                    <u><h3>Nom :</u> <?php echo strtoupper($userinfo ['nom']); ?></h3>
                    <u><h3>Prénom :</u> <?php echo ucfirst($userinfo ['prenom']); ?></h3>
                    <u><h3>Username :</u> <?php echo $userinfo ['username']; ?></h3>
                    <u><h3>Question secrète :</u> <?php echo $userinfo ['question']; ?></h3>
                    <u><h3>Réponse :</u> <?php echo $userinfo ['reponse']; ?></h3>
                    <div class="button-forgot" align="center">
                        <a href="forgot.php" class="link-button"> Modifier le mot de passe </a>
                    </div>
                </div>
            </div>
        </div>
        <?php include ("footer.php") ?>
    </body>
</html>


