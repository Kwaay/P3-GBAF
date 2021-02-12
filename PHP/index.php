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
        <?php 
            include ("header.php");
            require('config.php');
            // Système pour rediriger sur la page connexion si jamais l'utilisateur n'est pas connecté //
            if(isset($_SESSION['username']) AND !empty($_SESSION['username']))
            {
                
            }
            else 
            {
                header('Location: connexion.php');
            }
        ?>

        <section class="presentation-gbaf">
            <div class="texte-gbaf">
                <h1><u>Le Groupement Banque Assurance Français (GBAF)</u></h1> 
                <h3>est une fédération représentant les 6 grands groupes français :</h3>
                <div class="logo-groupes">
                    <img src="../images/bnp-paribas.png" alt="Logo BNP"/>
                    <img src="../images/bpce.png" alt="Logo BPCE"/>
                    <img src="../images/credit-agricole.png" alt="Logo CréditAgricole"/>
                    <img src="../images/societe_generale.png" alt="Logo SociétéGénérale"/>
                    <img src="../images/la-banque-postale.png" alt="Logo La Banque Postale"/>
                </div>
                <p> Le GBAF est le représentant de la profession bancaire et des assureurs sur tous les axes de la réglementation financière française. 
                    Sa mission est de promouvoir l'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié des pouvoirs publics.
                </p>
            </div>
        </section>

            <div class="texte-partenaires">
                <h2><u>Les Partenaires et Acteurs</u></h2>
                <p>Les produits et services bancaires sont nombreux et très variés. 
                Afin de renseigner au mieux les clients, les salariés des 340 agences des banques et assurances en France (agents, chargés de clientèle, conseillers financiers, etc.)
                recherchent sur Internet des informations portant sur des produits bancaires et des financeurs, entre autres.
                </p>
                <br>
            </div>
    <div class="partenaires">
        <?php 
            $reponse = $bdd->query('SELECT * FROM acteur');
            while ($donnees = $reponse->fetch()) {
                ?>
                <div class="partenaire-formation-co">
                    <img src="../images/<?php echo htmlspecialchars($donnees['logo'])?>" alt="Logo de <?php echo htmlspecialchars($donnees['acteur']) ?>" />
                    <div class="text-container">
                        <h3><u><?php echo htmlspecialchars($donnees['acteur']) ?></u></h3>
                        <p><?php echo htmlspecialchars($donnees['description'])?></p>
                        <div class="button-formation-co">
                            <a href="acteur.php?id=<?php echo htmlspecialchars ($donnees ['id_acteur'])?>" class="link-button">Lire la suite</a>
                        </div>
                    </div>   
                </div>
                <?php
            }
        ?>
    </div>
        <br>
        <?php include ("footer.php"); ?> 