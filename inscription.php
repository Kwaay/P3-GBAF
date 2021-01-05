<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>GBAF | Inscription</title>
	<link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <?php include "header.php" ?>
        <?php include "footer.php" ?>

        <div class="inscription_form">
            <h3><u>Inscription à l'Extranet</u></h3>
            <form method="POST"> 
                <div>
                    <label for="nom"><u>Nom :</u></label>
                    <input type="text" id="nom" required name="nom">
                </div>
                <br>
                <div>
                    <label for="prenom"><u>Prénom :</u></label>
                    <input type="text" id="prenom" required name="prenom">
                </div> 
                <br>      
                <div>
                    <label for="pseudo"><u>Pseudonyme :</u></label>
                    <input type="text" id="pseudo" required name="pseudo">
                </div>
                <br>
                <div>
                    <label for="password"><u>Mot de passe :</u></label>
                    <input type="password" id="password" required name="password">
                </div>
                <br>
                <div>
                    <label for="questionsecrete"><u>Question secrète:</u></label>
                    <input type="text" id="question" required name="question">
                </div>
                <br>
                <div>
                    <label for="reponse"><u>Réponse :</u></label>
                    <input type="text" id="reponse" required name="reponse">
                </div> 
                <br>

                <button type="submit">S'inscrire</button>
            </form>
            <br>
            <p>Vous voulez vous connecter ? <a href="connexion.php" class="link-button">Se connecter</a></p>
            <br>
    </body>
</html>