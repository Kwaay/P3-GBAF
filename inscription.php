<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>GBAF | Inscription</title>
	<link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <?php include "header.php" ?>
    <?php
        require('config.php');
        if (isset($_POST['nom'], $_POST['prenom'], $_POST['username'], $_POST['password'], $_POST['question'], $_POST['reponse'])) {
            // récupérer la donnée et supprimer les antislashes ajoutés par le formulaire
            $nom = stripslashes($_POST['nom']);
            $nom = mysqli_real_escape_string($bdd, $nom); 
            $prenom = stripslashes($_POST['prenom']);
            $prenom = mysqli_real_escape_string($bdd, $prenom); 
            $username = stripslashes($_POST['username']);
            $username = mysqli_real_escape_string($bdd, $username); 
            $password = stripslashes($_POST['password']);
            $password = mysqli_real_escape_string($bdd, $password);
            $question = stripslashes($_POST['question']);
            $question = mysqli_real_escape_string($bdd, $question);
            $reponse = stripslashes($_POST['reponse']);
            $reponse = mysqli_real_escape_string($bdd, $reponse);
            //requéte SQL + mot de passe crypté
            $query = "INSERT into `users` (nom, prenom, username, password, question, reponse)
                      VALUES ('$nom','$prenom','$username', '".hash('sha256', $password)."','$question','$reponse')";
            // Exécuter la requête sur la base de données
            $res = mysqli_query($bdd, $query);
            if($res){
                echo "<div class='success'>
                        <h3>Vous êtes inscrit avec succès.</h3>
                        <p>Cliquez ici pour vous <a href='connexion.php'>connecter</a></p>
                      </div>";
            }
        }
    ?>

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
                    <label for="username"><u>Pseudonyme :</u></label>
                    <input type="text" id="username" required name="username">
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
        </div>
        <?php include ("footer.php"); ?>
    </body>
</html>