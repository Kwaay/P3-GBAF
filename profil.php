<?php
    session_start();
?>
        <?php include ("header.php") ?>
        <?php
            require('config.php');
                // Système de récupération des informations de l'utilisateur pour les afficher dans le profil //
                $getid = intval($_SESSION['id']);
                $requser = $bdd->prepare('SELECT * FROM `users` WHERE id = ?');
                $requser->execute(array($getid));
                $userinfo = $requser->fetch();

                $id_user=$_SESSION['id'];
                $requete=$bdd->prepare('SELECT * FROM users WHERE id = ?');
                $requete->bindParam(':id_user', $id_user, PDO::PARAM_LOB);
                $requete->execute(array($id_user));
                $reponse=$requete->fetch(PDO::FETCH_ASSOC);

                $selavatar = $bdd->prepare('SELECT avatar FROM users WHERE id=:id');
                $selavatar->execute(array(
                        'id' => $_SESSION['id']
                        ));
                $avatar=$selavatar->fetch(PDO::FETCH_ASSOC);
        ?>
        <div class="profil" style="text-align:center;">
            <div class="profil-titre">
                <h2><u>Profil de <?php echo ucfirst($userinfo['username']); ?></u></h2>
                <div class="profil-text">
                    <h3><u>Nom :</u> <?php echo strtoupper($userinfo ['nom']); ?></h3>
                    <h3><u>Prénom :</u> <?php echo ucfirst($userinfo ['prenom']); ?></h3>
                    <h3><u>Username :</u> <?php echo $userinfo ['username']; ?></h3>
                    <h3><u>Question secrète :</u> <?php echo $userinfo ['question']; ?></h3>
                    <h3><u>Réponse :</u> <?php echo $userinfo ['reponse']; ?></h3>
                    <div class="button-forgot" style="text-align:center;">
                        <a href="forgot.php" class="link-button"> Modifier le mot de passe </a>
                    </div>

                    <?php
                    if(isset($avatar['avatar']))
                    {
                        ?>
                        <div class="profile-picture">
                        <h3><u> Votre avatar :</u></h3> <br/>
                            <img src="membres/avatars/<?php echo htmlspecialchars ($avatar['avatar']) ?>" alt="Logo du <?php echo htmlspecialchars ($avatar['avatar']) ?>" height="auto" width="300" />
                        </div> 
                        <?php  
                    }
                    else 
                    {
                        echo "Vous n'avez pas de photo de profil";
                    }
                    ?>
                <br />
                <form enctype="multipart/form-data" method="POST" >
                    <input type="file" name="avatar" id="avatar" /> <br /><br />
                    <?php
                        if(!isset($avatar['avatar']))
                        {
                            ?>
                            <input type="submit" value="Ajouter" name="picture-profile" action="profil.php" />
                            <br /> <br />
                            <?php
                        }
                        else
                        {
                            ?>
                            <input type="submit" value="Modifier" name="picture-profile" action="profil.php" />
                            <br />
                            <br />
                            <?php
                        }
                    ?>
                    
                </form>
                <?php
                   if(isset($_FILES['avatar']))
                   {
                        $ValidExtensions = array('jpg', 'jgeg', 'gif', 'png');
                        $splFileInfo = new SplFileInfo($_FILES['avatar']['name']);
                        $extensionUpload = strtolower($splFileInfo->getExtension());

                        if(in_array($extensionUpload, $ValidExtensions))
                        {
                            if(isset($_POST['picture-profile']))
                            {
                                $chemin = "membres/avatars/".$_SESSION['id'].".".$extensionUpload;
                                $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
                                if($resultat)
                                {
                                    $updateavatar = $bdd->prepare('UPDATE users SET avatar = :avatar WHERE id=:id');
                                    $updateavatar->execute(array(
                                            'avatar' => $_SESSION['id'].".".$extensionUpload,
                                            'id' => $_SESSION['id']
                                    ));
                                    echo 
                                    "
                                    <div class='success'>
                                    <h3> Votre photo de profil a bien été modifiée </h3>
                                    </div>
                                    ";
                                }    
                            }
                        }   
                    }
                ?>
           

            </div>
        </div>
        <?php include ("footer.php") ?>