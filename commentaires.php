<?php 
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>GBAF | Commentaire</title>
	    <link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <?php 
        require ("config.php");
            // Système d'ajout de commentaires //
            if (isset($_POST['post']) AND !empty($_POST['post'])) 
            {
                $post=htmlspecialchars($_POST['post']);
                $query=$bdd->prepare('INSERT INTO post (post,id_user,date_add,id_acteur) VALUES (:post,:id_user,NOW(),:id_acteur)');
                $query->bindParam(':post', $post, PDO::PARAM_STR_CHAR);
                $query->bindParam(':id_user', $_SESSION['id'], PDO::PARAM_INT);
                $query->bindParam(':id_acteur', $_GET['id_acteur'], PDO::PARAM_INT);
                $query->execute();

                if($query)
                {
                    $page = $bdd-> prepare('SELECT acteur FROM acteur WHERE id_acteur = ?');
                    $page -> execute(array($_GET['id_acteur']));
                    $nompage = $page->fetch();
                    echo
                    "<div class='success'>
                        <h3>Votre commentaire a été ajouté avec succès.</h3>
                        <p> Vous allez être redirigé vers la page d'Acteur :  " ?><?php echo $nompage['acteur']; ?><?php echo"  dans 3 secondes </p>
                        <br />
                    </div>";
                }
                    
        ?>
                <meta http-equiv="refresh" content="3;acteur.php?id= <?= $_GET['id_acteur']; ?>">
        <?php
            }
        ?>
            
    
        <div class="commentaires_form" style="text-align:center;">
            <div class="img">
                <img src="images/logo_gbaf_p3.png" height="125" width="125" alt="Logo GBAF" /></a>
            </div>
            <br />
            <h3><u>Créer un commentaire</u></h3>
            <form method="POST">
                <div>
                    <label for="post"><u>Contenu du commentaire :</u>
                    <br />
                    <br />
                       <input type="text" name="post" id="post" placeholder="Ecrivez ici"  size="50">
                    </label>
                </div>
                <br />
                <button type="submit">Poster le commentaire</button>
            </form>
                <br />
        </div>
        