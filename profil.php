<?php
session_start();
?>

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
            if (isset($_GET['id']) AND $_GET['id'] > 0)
            {
                echo "Ok";
                $getid = intval($_GET['id']);
                $requser = $bdd->prepare('SELECT * FROM `users` WHERE id = ?');
                $requser->execute(array($getid));
                $userinfo = $requser->fetch(PDO::PARAM_ASSOC);
            }
        ?>
        <div class="profil">
            <h2>Profil de <?php echo $userinfo['username']; ?></h2>
            <p>
            <br />
            Nom = <?php echo $userinfo ['nom']; ?>
            <br />
            Prénom : <?php echo $userinfo ['prenom']; ?>
            <br />
            Username : <?php echo $userinfo ['username']; ?>
            <br />
            Password : <?php echo $userinfo ['password']; ?>
            <br />
            Question secrète : <?php echo $userinfo ['questions']; ?>
            <br />
            Réponse : <?php echo $userinfo ['reponse']; ?>
            <br />
            </p>

        <?php include ("footer.php") ?>
    </body>
</html>


