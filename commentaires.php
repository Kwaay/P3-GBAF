<?php 
    session_start();
?>

<?php 
    require ("config.php");
    if (isset($_POST['post']) AND !empty($_POST['post'])) 
    {

        $post=htmlspecialchars($_POST['post']);
        $query=$bdd->prepare('INSERT INTO post (post,id_user,date_add,id_acteur) VALUES (:post,:id_user,NOW(),:id_acteur)');
        $query->bindParam(':post', $post, PDO::PARAM_STR_CHAR);
        $query->bindParam(':id_user', $_SESSION['id'], PDO::PARAM_INT);
        $query->bindParam(':id_acteur', $_GET['id_acteur'], PDO::PARAM_INT);
        $query->execute();
        header("Location:acteur.php?id=" . $_GET['id_acteur']);
        
    }
 
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>GBAF | Commentaire</title>
	    <link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <?php include ('header.php'); ?>
        <div class="commentaires_form" align="center">
            <h3><u>Créer un commentaire</u></h3>
            <form method="POST">
                <div>
                    <label for="post"><u>Contenu du commentaire :</u>
                    <br />
                    <br />
                       <input type="textarea" name="post" id="post" placeholder="Ecrivez ici"  size="50" style="height:250px;">
                    </label>
                </div>
                <br />
                <button type="submit">Poster le commentaire</button>
            </form>
                <br />
        </div>
        <?php include ('footer.php'); ?>
    </body>
</html>