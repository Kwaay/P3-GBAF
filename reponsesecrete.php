<?php include ("header.php"); ?>
<?php
    require ('config.php');
    if(empty($_SESSION['id']))
    {
        if(isset($_POST['username']) && isset($_POST['reponse']))
        {
            $username = $_POST['username'];
            $reponse = $_POST['reponse'];
        
            $get = $bdd->prepare('SELECT * FROM users WHERE username= ? AND reponse = ?');
            $get->execute(array($username,$reponse));
            while ($infos = $get->fetch()) 
            {
                if($get->rowCount() == 0)
                {
                    echo 
                    "
                    <div class='success'>
                    <h3> Vos informations ne correspondent pas </h3>
                    <p> Redirection vers la page d'inscription dans 3 secondes </p>
                    </div>
                    ";
                    ?>
                    <meta http-equiv="refresh" content="3;URL=inscription.php">
                    <?php
                }
                elseif($get->rowCount() == 1)
                {
                    echo 
                    "
                    <div class='success'>
                    <h3> Votre mot de passe a été modifié </h3>
                    <p> Redirection vers l'index dans 3 secondes </p>
                    </div>
                    ";
                    ?>
                    <?php
                }         
            }
        }
    }

            
    
?>
            
            <div class="recovery-form">
                <h3><u>Vérification de votre identité</u></h3>
                <form method="POST">
                    <div class="recovery-username">
                        <p>Votre pseudo : <?php $get['username']; ?> </p>
                    </div>
                    <br />
                    <div class="recovery-question">
                        <p>Votre Question secrète est : <?php echo $get['question']; ?> </p>
                    </div>
                        
                    <div class="recovery-reponse">
                        <label for="reponse"><u>Votre réponse :</u></label>
                        <input type="reponse" name="reponse" id="reponse" placeholder="Votre réponse">
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