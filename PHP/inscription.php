
        <?php include "header.php" ?>
        <?php
            require('config.php');
            // Système de récupération des données du formulaire de déconnexion //
            if (isset($_POST['nom'], $_POST['prenom'], $_POST['username'], $_POST['password'], $_POST['question'], $_POST['reponse'])) 
            {
                if (!empty($_POST['nom'] AND !empty($_POST['prenom']) AND !empty($_POST['username']) AND !empty($_POST['password']) AND !empty($_POST['question'])) AND !empty($_POST['reponse']))
                {
                    $nom = htmlspecialchars($_POST['nom']); 
                    $prenom = htmlspecialchars($_POST['prenom']);
                    $username = htmlspecialchars($_POST['username']); 
                    $password = sha1($_POST['password']);
                    $question = htmlspecialchars($_POST['question']);
                    $reponse = htmlspecialchars($_POST['reponse']);

                    $inscrmembre=$bdd->prepare('INSERT into `users` (nom, prenom, username, password, question, reponse) VALUES (:nom,:prenom,:username,:password,:question,:reponse)');     
                    $inscrmembre->execute(array(
                        'nom' => $nom, 
                        'prenom' => $prenom,
                        'username' => $username,
                        'password' => $password,
                        'question' => $question,
                        'reponse' => $reponse
                    ));

                    echo 
                    "<div class='success'>
                        <h3>Vous êtes inscrit avec succès.</h3>
                        <p> Pour vous connecter, c'est <a href='connexion.php'>ici</a>.</p>
                    </div>";
                    header('Location:connexion.php');
                }       
                else
                {
                    echo 
                    "<div class='erreur'>
                        <h3>Votre compte n'a pas été créé, vérifiez vos champs de formulaire et réessayez</h3>
                        <p> Si vous avez déjà un compte, connectez-vous <a href='connexion.php'>ici</a></p>
                    </div>"; 
                }
            }

            
                
        ?>
        <div class="inscription_form">
            <h3><u>Inscription à l'Extranet</u></h3>
            <form method="POST"> 
                <div>
                    <label for="nom"><u>Nom :</u></label>
                    <input type="text" name="nom" id="nom" placeholder="Votre nom">
                </div>
                <br>
                <div>
                    <label for="prenom"><u>Prénom :</u></label>
                    <input type="text" name="prenom"  id="prenom" placeholder="Votre prénom">
                </div> 
                <br>      
                <div>
                    <label for="username"><u>Pseudonyme :</u></label>
                    <input type="text" name="username"  id="username" placeholder="Votre pseudonyme">
                </div>
                <br>
                <div>
                    <label for="password"><u>Mot de passe :</u></label>
                    <input type="password"  name="password"  id="password" placeholder="Votre Mot de passe">
                </div>
                <br>
                <div>
                    <label for="questionsecrete"><u>Question secrète:</u></label>
                    <input type="text" name="question" id="question" placeholder="Votre Question secrète">
                </div>
                <br>
                <div>
                    <label for="reponse"><u>Réponse :</u></label>
                    <input type="text"  name="reponse" id="reponse" placeholder="Votre réponse">
                </div> 
                <br>

                <button type="submit">S'inscrire</button>
            </form>
            <br>
            <p>Vous voulez vous connecter ? <a href="connexion.php" class="link-button">Se connecter</a></p>
            <br>
        </div>
       
        <?php include ("footer.php"); ?>