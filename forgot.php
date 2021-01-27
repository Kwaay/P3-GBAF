<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>GBAF | Mot de passe oublié</title>
	<link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <?php include ("header.php"); ?>
        <?php
            require ('config.php');
            $changepassword=$bdd->prepare("UPDATE users SET password = :password WHERE id=:id"); 
            if (!empty($_POST['password'])) 
            {
                $changepassword->execute(array($_POST['password'], $_SESSION['id']));
                $newpass=$changepassword->fetch();
                echo 
                "<div class='success'>
                    <h3>Votre mot de passe a été changé avec succès.</h3>
                </div>";
                header('profil.php');
            }
            
            ?>
        <?php include ("footer.php") ?>
    </body>
</html>
