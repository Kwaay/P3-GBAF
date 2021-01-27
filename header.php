<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
            <title>GBAF | Accueil</title>
        <link href="style.css" rel="stylesheet" /> 
    </head>
    <body>
        <?php 
            if(isset($_SESSION['username']) AND !empty($_SESSION['username']))
            {
                ?>
                    <div class="headerconnecte">
                        <a href="index.php"><img src="images/logo_gbaf_p3.png" height=125 width=125 /></a>  
                        <h1>Bienvenue <?php echo ucfirst($_SESSION['username']); ?></h1>
                        <div class="deco-button" align="center" style="border: 2px solid red; border-radius: 30px; padding: 0.5vh; text-align: center; display: inline-flex">
                            <a href="deconnexion.php" class="link-button">Se déconnecter</a>
                        </div>
                </div>
                <?php
            }
            else 
            {
                ?>
                <div class="header">
                    <a href="index.php"><img src="images/logo_gbaf_p3.png" height=125 width=125 /></a>  
                </div>
                <?php
            }
            
        ?> 

      