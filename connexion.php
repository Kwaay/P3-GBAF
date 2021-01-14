<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>GBAF | Connexion</title>
	<link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <?php include ("header.php") ?>
        <?php
            require('config.php');
            session_start();
            if (isset($_POST['username'], $_POST['password'])){
                $username = stripslashes($_POST['username']);
                $username = mysqli_real_escape_string($bdd, $username);
                $password = stripslashes($_POST['password']);
                $password = mysqli_real_escape_string($bdd, $password);
                $query = "SELECT * FROM `users` WHERE username='$username' and password='".hash('sha256', $password)."'";
                $result = mysqli_query($bdd,$query) or die(mysql_error());
                $rows = mysqli_num_rows($result);
                if($rows==1){
                    $_SESSION['username'] = $username;
                    header("Location: index.php");
                }else{
                    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
                }
            }
        ?>

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




