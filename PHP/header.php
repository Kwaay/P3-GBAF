<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />

            <title>GBAF | Accueil</title>
        <link href="PHP/style.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
    </head>
    <body>
        <?php
            require ('config.php');
            // Système d'affichage du Nom / Prénom et des boutons "Profil" & "Déconnexion" si l'utilisateur est connecté //
            if(isset($_SESSION['username']) AND !empty($_SESSION['username']))
            {
                ?>
                    <div class="headerconnecte">
                        <div class="img-header">
                            <a href="index.php"><img src="../images/logo_gbaf_p3.png" alt="Logo GBAF" /></a>
                        </div>
                        <div class="infos-profil">
                            <a href="profil.php"></a><img src="../images/unknown.png"alt="profile-picture" />
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
                        <div class="profil-button">
                            <a href="profil.php" class="link-button">Paramètres du compte</a>
                        </div> 
                        <div class="deco-button">
                            <a href="deconnexion.php" class="link-button">Se déconnecter</a>
                        </div>
                    </div>
                <?php
            }
            else 
            {
                ?>
                <div class="header">
                    <a href="index.php"><img src="../images/logo_gbaf_p3.png" alt="Logo GBAF" /></a>  
                </div>
                <?php
            }
            
        ?>

      