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
        if (isset($_REQUEST['nom'], $_REQUEST['prenom'], $_REQUEST['username'], $_REQUEST['password'], $_REQUEST['question'], $_REQUEST['reponse'])){
        // récupérer la donnée et supprimer les antislashes ajoutés par le formulaire
            $nom = stripslashes($_REQUEST['nom']);
            $nom = mysqli_real_escape_string($conn, $nom); 
            $prenom = stripslashes($_REQUEST['prenom']);
            $prenom = mysqli_real_escape_string($conn, $prenom); 
            $username = stripslashes($_REQUEST['username']);
            $username = mysqli_real_escape_string($conn, $username); 
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($conn, $password);
            $question = stripslashes($_REQUEST['question']);
            $question = mysqli_real_escape_string($conn, $question);
            $reponse = stripslashes($_REQUEST['reponse']);
            $reponse = mysqli_real_escape_string($conn, $reponse);
            //requéte SQL + mot de passe crypté
                $query = "INSERT into `users` (nom, prenom, username, password, question, reponse)
                        VALUES ('$username', '".hash('sha256', $password)."')";
            // Exécuter la requête sur la base de données
                $res = mysqli_query($conn, $query);
                if($res){
                echo "<div class='success'>
                        <h3>Vous êtes inscrit avec succès.</h3>
                        <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
                    </div>";
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
    <?php include ("footer.php"); ?>
    </body>
</html>