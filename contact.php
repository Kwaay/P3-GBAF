<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>GBAF | Contact</title>
	<link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <?php include ("header.php"); ?>
        <div class="contact-form">
            <h3><u>Contactez-nous</u></h3>
            <form method="POST" action="mail.php">
                <div class="form-nom">
                    <label for="nom"><u>Votre nom :</u></label>
                    <input type="text" name="nom" id="nom" placeholder="Votre nom">
                </div>
                <br />
                <div class="form-email">
                    <label for="email"><u>Votre email:</u></label>
                    <input type="email" name="email" id="email" placeholder="Votre email">
                </div>
                <br />
                <div class="form-demande">
                    <label for="demande"><u>Votre demande :</u></label>
                    <br />
                    <br />
                    <input type="text" name="demande" id="demande" placeholder="Votre Demande"  size="50" style="height:100px;">
                </div>
                <br />
                <div class="form_submit">
                    <input type="submit" name="submit" id="submit" value="Envoyer">
                </div>
            </form>
        </div> 
        <br>
        <?php include ("footer.php") ?>
    </body>
</html>
