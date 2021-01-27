<?php
    session_start();
?>
<?php
    require ('config.php');
    $id_acteur=$_GET['id'];
    $requete=$bdd->prepare('SELECT * FROM acteur WHERE id_acteur=:id_acteur');
    $requete->bindParam(':id_acteur', $id_acteur, PDO::PARAM_INT);
    $requete->execute();
    $reponse=$requete->fetch(PDO::FETCH_ASSOC);

    // Nombre de commentaires //
    $commentaires=$bdd->prepare("SELECT COUNT(*) AS nb_com  FROM post");
    $commentaires->execute(array($id_acteur));
    $donnees=$commentaires->fetch();
    
    // information commentaires //
    $retourcom=$bdd->prepare("SELECT * FROM post");
    $retourcom->execute(array($id_acteur));

    $likesreq=$bdd->prepare("SELECT COUNT(*) AS nb_likes FROM vote WHERE vote=1 AND id_acteur=:id_acteur");
    $likesreq->bindParam(':id_acteur', $id_acteur, PDO::PARAM_INT);
    $likesreq->execute();
    $likes=$likesreq->fetch(PDO::FETCH_ASSOC);

    $dislikesreq=$bdd->prepare("SELECT COUNT(*) AS nb_dislikes FROM vote WHERE vote=2 AND id_acteur=:id_acteur");
    $dislikesreq->bindParam(':id_acteur', $id_acteur, PDO::PARAM_INT);
    $dislikesreq->execute();
    $dislikes=$dislikesreq->fetch();

    $date=date('d/m/Y');


    

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>GBAF | Formation & Co</title>
    <link href="style.css" rel="stylesheet" /> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
        
    <body>
        <?php
            include ("header.php");
        ?>
      
        <div class="acteur-formation-co">
            <div class="img-partenaires">
                <img src="images/<?php echo htmlspecialchars ($reponse['logo']) ?>" alt="Logo du <?php echo htmlspecialchars ($reponse['acteur']) ?>" height=300  width=600 />
            </div>
            <div class="text-formation-co-acteurs">
                <h2><?php echo htmlspecialchars ($reponse['acteur']) ?></h2>
                <p> 
                <?php echo htmlspecialchars ($reponse['description']) ?>
                </p>
            </div>    
        </div>
        <div class="commentaires">
            <div class="menu-commentaires">
                <div class="profil-commentaires">
                    <h1> 
                      <?php echo $donnees['nb_com']; ?> commentaire(s) 
                    </h1>
    
                </div>    
                    <div class="bouton-commentaire">
                        <a href="commentaires.php?id_acteur=<?=$id_acteur ?>" class="link-button">Nouveau<br />commentaire</a>
                    </div>
                        <div class="bouton-like-dislike">
                        <a href="vote.php?t=1&id=<?= $id_acteur ?>"> <?= $likes['nb_likes']; ?></a>
                            <i class="fa fa-thumbs-up"></i> 
                        <a href="vote.php?t=2&id=<?= $id_acteur ?>"> <?= $dislikes['nb_dislikes']; ?></a>
                            <i class="fa fa-thumbs-down"></i>
                        </div>
            </div>
                    <?php 
                        while ($infocom=$retourcom->fetch()) { ?>
                    <div class="info-commentaires">
                        <div class="pseudo_com">
                        <?php 
                            $prenomcom=$bdd->prepare('SELECT prenom FROM users WHERE id=:id');
                            $prenomcom->bindParam (':id', $infocom['id_user'] , PDO::PARAM_INT);
                            $prenomcom->execute();
                            $prenom=$prenomcom->fetch(PDO::FETCH_ASSOC);

                            echo htmlspecialchars(ucfirst($prenom['prenom'])); ?>
                        </div>
                        <div class="date_com">
                        <?php
                            echo htmlspecialchars($date, strtotime($infocom['date_add'])); ?>
                        </div>
                        <div class="text-com">
                        <?php
                            echo htmlspecialchars($infocom['post']); ?>
                        </div>
                    </div>   
                    <?php 
                        }
                        $retourcom->closeCursor();
                    ?>
                </div>
            </div>
        </div>
        <?php include ("footer.php"); ?>
    </body>
</html>
