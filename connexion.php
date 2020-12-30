<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>GBAF | Inscription</title>
	<link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <?php include "header.php" ?>

        <div class="connexion_form">
            <h3>Connexion</h3>
            <form method="POST">
                <div>
                    <label for="pseudo">Pseudonyme : </label>
                    <input type="text" id="pseudo" required name="pseudo">
                </div>
                <div>
                    <label for="password">Mot de passe : </label>
                    <input type="password" id="password" required name="password">
                </div>

                <button type="submit">CONNEXION</button>
            </form>
            <br>
            <p>Pas encore inscrit ? <a href="inscription.php" class="link-button">S'inscrire</a></p>
            <p><a href="forgot.php" class="link-button">Mot de passe oublié ?</a></p>
            <br>
            <?php include "footer.php" ?>
    </body>
</html>




