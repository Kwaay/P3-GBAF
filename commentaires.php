<?php 
    require ("config.php");
    if (isset($_POST['post'])) {
       $post=htmlspecialchars($_POST['post']);
    }
    $query=$bdd->prepare('INSERT into `post` VALUES (:post)');
    $query->execute(array('post' => $post));
    $addpost=$query->fetch(PDO::PARAM_ASSOC);
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
        <div class="commentaires_form">
            <h3><u>Créer un commentaire</u></h3>
            <form method="POST">
                <div>
                    <label for="post"><u>Contenu du commentaire :</u><br>
                        <input type="text" id="post">
                    </label>
                </div>
                <br>
                <button type="submit">Poster le commentaire</button>
            </form>
                <br>
        </div>
        <?php include ('footer.php'); ?>
    </body>
</html>