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
                </div>
                <br />
                <form enctype="multipart/form-data" method="POST" >
                    <input type="file" name="avatar" id="avatar" /> <br /><br />
                    <input type="submit" value="Modifier" name="picture-profile" />
                </form>
                <?php
                    if(isset($_FILES['avatar']))
                    {
                        echo "Ok";
                        var_dump($_FILES['avatar']);
                        $ValidExtensions = array('jpg', 'jgeg', 'gif', 'png');
                        $extensionUpload = strtolower(SplFileInfo::getExtension($_FILES['avatar']['name']));
                        
        
                        if(in_array($extensionUpload, $ValidExtensions))
                        {
                            echo "Ok2";
                            
                            if(isset($_POST['picture-profile']))
                            {
                                $sessionid = $_SESSION['id'];
                                $checkreq = $bdd->prepare('SELECT * FROM users WHERE id = ?');
                                $checkreq->execute(array($sessionid));
                                if($checkreq->rowCount() == 0)
                                {
                                    $chemin = "membres/avatars/".$_SESSION['id'].".".$extensionUpload;
                                    $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
                                    if($resultat)
                                    {
                                        $updateavatar = $bdd->prepare('INSERT users SET avatar = :avatar WHERE id=:id');
                                        $updateavatar->execute(array(
                                                'avatar' => $_SESSION['id'].".".$extensionUpload,
                                                'id' => $_SESSION['id']
                                        ));
                                        echo 
                                        "
                                        <div class='success'>
                                        <h3> Votre photo de profil a bien été ajoutée </h3>
                                        <p>Redirection vers votre page de profil dans 3 secondes</p>
                                        </div>
                                        ";
                                        ?>
                                        <meta http-equiv="refresh" content="3;URL=profil.php" />
                                        <?php
                                    }
                                }
                                else
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
                                        <p>Redirection vers votre page de profil dans 3 secondes</p>
                                        </div>
                                        ";
                                        ?>
                                        <meta http-equiv="refresh" content="3;URL=profil.php" />
                                        <?php
                                    }    
                                }
                            }
                        }   
                    }
                ?>
           

            </div>
        </div>
        <?php include ("footer.php") ?>