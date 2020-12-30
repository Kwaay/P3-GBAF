<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>GBAF | Inscription</title>
	<link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <?php include "header.php" ?>

        <div class="inscription_form">
            <h3>Inscription</h3>
            <form method="POST">                
                <div>
                    <label for="pseudo">Pseudonyme : </label>
                    <input type="text" id="pseudo" required name="pseudo">
                </div>
                <div>
                    <label for="password">Mot de passe : </label>
                    <input type="password" id="password" required name="password">
                </div>
                <div>
                    <label for="questionsecrete">Question secrete: </label>
                    <input type="text" id="question" required name="question">
                </div>
                <div>
                    <label for="reponse">Réponse :</label>
                    <input type="text" id="reponse" required name="reponse">
                </div>

                <button type="submit">INSCRIPTION</button>
            </form>
            <br>
            <p>Vous voulez vous connecter ? <a href="connexion.php" class="link-button">Se connecter</a></p>
            <br>
    </body>
</html>