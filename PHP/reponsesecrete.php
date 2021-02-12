<?php include ("header.php"); ?>
<?php
    require ('config.php');
    // Système de récupération de la question et de la réponse //
    if(empty($_SESSION['id']))
    {
        if(isset($_GET['id']))
        {
            $requser = $bdd->prepare('SELECT * FROM `users` WHERE id = ?');
            $requser->execute(array($_GET['id']));
            $userinfo = $requser->fetch();
        }
        if(isset($_POST['reponse'], $_POST['newpass']))
        {
            $reponse = $_POST['reponse'];
            if($userinfo ['reponse'] !== $reponse)
            {
                echo 
                "
                <div class='success'>
                <h3> Vos informations ne correspondent pas </h3>
                </div>
                ";
                ?>
                <?php
            }
            else
            {
                // Puis modification du password si la réponse à la question secrète est bonne //
                $password = $_POST['newpass'];
                $passwordhashed = sha1($password);
                $newpass=$bdd->prepare("UPDATE users SET password = ? WHERE id= ?"); 
                $newpass->execute(array($passwordhashed, $_GET['id']));
                header('Location: connexion.php');
            }         
        }
    }

            
    
?>
            
            <div class="recovery-form">
                <h3><u>Vérification de votre identité</u></h3>
                <form method="POST" action="reponsesecrete.php?id=<?= $_GET['id'] ?>">
                    <div class="recovery-username">
                        <p>Votre pseudo : <?php echo $userinfo['username']; ?> </p>
                    </div>
                    <div class="recovery-question">
                        <p>Votre Question secrète est : <?php echo $userinfo['question']; ?> </p>
                    </div>
                    <div class="recovery-reponse">
                        <label for="reponse"><u>Votre réponse :</u></label>
                        <input type="text" name="reponse" id="reponse" placeholder="Votre réponse">
                    </div>
                    <br />
                    <div class="recovery-newpass">
                        <label for="newpass"><u>Votre nouveau mot de passe :</u></label>
                        <input type="password" name="newpass" id="newpass" placeholder="Votre nouveau mot de passe">
                    </div>
                    <br />
                    <div class="form_submit">
                        <input type="submit" name="submit" value="Envoyer">
                    </div>
                </form>
                <br>
                <p>Vous avez retrouvé votre mot de passe ? <a href="connexion.php" class="link-button">Se connecter</a></p>
                <br>
            <div>
    <?php include ("footer.php") ?>