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
        <?php
            require ('config.php');

            // Système d'affichage du Nom / Prénom et des boutons "Profil" & "Déconnexion" si l'utilisateur est connecté //
            if(isset($_SESSION['username']) AND !empty($_SESSION['username']))
            {
                // Système pour récupérer la photo de profil
                $selavatar = $bdd->prepare('SELECT avatar FROM users WHERE id=:id');
                $selavatar->execute(array(
                        'id' => $_SESSION['id']
                        ));
                $avatar=$selavatar->fetch(PDO::FETCH_ASSOC);
                ?>
                    <div class="headerconnecte">
                        <div class="img-header" style="padding: 2vh;">
                            <a href="index.php"><img src="images/logo_gbaf_p3.png" height="125" width="125" alt="Logo GBAF" /></a>
                        </div>
                        <div class="infos-profil">
                            <a href="profil.php"><img src="membres/avatars/<?php echo htmlspecialchars ($avatar['avatar']) ?>" height="auto" width="50" alt="Photo de profil" /></a>
                                <?php 
                                    $getid = intval($_SESSION['id']);
                                    $infoprofil=$bdd->prepare('SELECT nom,prenom FROM users WHERE id=:id');
                                    $infoprofil->bindParam(':id', $getid, PDO::PARAM_INT);
                                    $infoprofil->execute();
                                    $profil = $infoprofil->fetch();
                                ?>
                        </div>
                        <div class="text-header">
                            <p> Bonjour <?php echo (strtoupper($profil['nom']))?> <?php echo ucfirst($profil['prenom']);?> </p> <br />
                        </div>
                        <div class="profil-button" style="border: 2px solid red; border-radius: 30px; padding: 0.5vh; text-align: center; display: inline-flex">
                            <a href="profil.php" class="link-button">Paramètres du compte</a>
                        </div> 
                        <div class="deco-button" style="border: 2px solid red; border-radius: 30px; padding: 0.5vh; text-align: center; display: inline-flex">
                            <a href="deconnexion.php" class="link-button">Se déconnecter</a>
                        </div>
                    </div>
                <?php
            }
            else 
            {
                ?>
                <div class="header">
                    <a href="index.php"><img src="images/logo_gbaf_p3.png" height="125" width="125" alt="Logo GBAF" /></a>  
                </div>
                <?php
            }
            
        ?>

      