<?php include ("header.php"); ?>
<?php
    require ('config.php');
    if(empty($_SESSION['id']))
    {
        if(isset($_POST['username']))
        {
            $username = $_POST['username'];
        
            $get = $bdd->prepare('SELECT * FROM users WHERE username= ?');
            $get->execute(array($username));
            $infos = $get->fetch();
            

            if($get->rowCount() == 0)
            {
                echo 
                "
                <div class='success'>
                <h3> Votre compte n'existe pas </h3>
                <p> Redirection vers la page d'inscription dans 3 secondes </p>
                </div>
                ";
                ?>
                <meta http-equiv="refresh" content="3;URL=inscription.php">
                <?php
            }
            elseif($get->rowCount() == 1)
            {
                header('Location: reponsesecrete.php?id=' . $infos['id']);
            }         
        }
    }
    
?>
            
            <div class="recovery-form">
                <h3><u>Vérification de votre identité</u></h3>
                <form method="POST">
                    <div class="recovery-username">
                        <label for="username"><u>Pseudo :</u></label>
                        <input type="username" name="username" id="username" placeholder="Votre pseudo utilisé">
                    </div>
                    <br />
                    <div class="form_submit">
                        <input type="submit" name="submit" value="Envoyer">
                    </div>
                </form>
                <br>
                <p>Vous avez retrouvé votre mot de passe ? <a href="connexion.php" class="link-button">Se connecter</a></p>
                <br>
            </div>
    <?php include ("footer.php") ?>