<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />

            <title>GBAF | Accueil</title>
        <link href="style.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
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
        <div class="profil">
            <div class="profil-titre">
                <h2><u>Profil de <?php echo ucfirst($userinfo['username']); ?></u></h2>
                <div class="profil-text">
                    <h3><u>Nom :</u> <?php echo strtoupper($userinfo ['nom']); ?></h3>
                    <h3><u>Prénom :</u> <?php echo ucfirst($userinfo ['prenom']); ?></h3>
                    <h3><u>Username :</u> <?php echo $userinfo ['username']; ?></h3>
                    <h3><u>Question secrète :</u> <?php echo $userinfo ['question']; ?></h3>
                    <h3><u>Réponse :</u> <?php echo $userinfo ['reponse']; ?></h3>
                    <div class="button-forgot">
                        <a href="forgot.php" class="link-button"> Modifier le mot de passe </a>
                    </div>
                </div>
            </div>
        </div>
        <?php include ("footer.php") ?>