<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>GBAF | Connexion</title>
	<link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
    <?php include ("header.php") ?>
    

        <div class="connexion_form">
            <h3><u>Connexion à l'Extranet</u></h3>
            <form method="POST">
                <div class="form_pseudo">
                    <label for="pseudo"><u>Pseudonyme :</u></label>
                    <input type="text" id="pseudo" required name="pseudo">
                </div>
                <br>
                <div class="form_password">
                    <label for="password"><u>Mot de passe :</u></label>
                    <input type="password" id="password" required name="password">
                </div>
                <br>

                <button type="submit">Se connecter</button>
            </form>
            <br>
            <p>Pas encore inscrit ? <a href="inscription.php" class="link-button">S'inscrire</a></p>
            <p><a href="forgot.php" class="link-button">Mot de passe oublié ?</a></p>
            <br>
            </div>

    <?php include ("footer.php") ?>
    </body>
</html>




