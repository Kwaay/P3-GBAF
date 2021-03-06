<?php
    session_start();
?>

<?php
    require ('config.php');
    // Choix de l'acteur à afficher //
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

    // Nombre de likes //
    $likesreq=$bdd->prepare("SELECT COUNT(*) AS nb_likes FROM vote WHERE vote=1 AND id_acteur=:id_acteur");
    $likesreq->bindParam(':id_acteur', $id_acteur, PDO::PARAM_INT);
    $likesreq->execute();
    $likes=$likesreq->fetch(PDO::FETCH_ASSOC);

    // Nombre de dislikes //
    $dislikesreq=$bdd->prepare("SELECT COUNT(*) AS nb_dislikes FROM vote WHERE vote=2 AND id_acteur=:id_acteur");
    $dislikesreq->bindParam(':id_acteur', $id_acteur, PDO::PARAM_INT);
    $dislikesreq->execute();
    $dislikes=$dislikesreq->fetch();

    // Format de la date //
    $date=date('d/m/Y');


    

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
            include ("header.php");
        ?>
      
        <div class="acteur-formation-co">
            <div class="img-partenaires">
                <img src="../images/<?php echo htmlspecialchars ($reponse['logo']) ?>" alt="Logo du <?php echo htmlspecialchars ($reponse['acteur']) ?>" />
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
                        <a href="vote.php?t=1&id=<?= $id_acteur ?>"> <?= $likes['nb_likes']; ?> <i class="fa fa-thumbs-up"></i></a> 
                        <a href="vote.php?t=2&id=<?= $id_acteur ?>"> <?= $dislikes['nb_dislikes']; ?> <i class="fa fa-thumbs-down"></i></a>
                                
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
                        ?>
                            <h4><u> Prénom :</u> <?php echo htmlspecialchars(ucfirst($prenom['prenom'])); ?></h4> 
                        </div>
                        <div class="date_com">
                            <h4><u>Date de la publication :</u> <?php echo htmlspecialchars($date, strtotime($infocom['date_add'])); ?></h4>
                        </div>
                        <div class="text-com">
                            <h4><u>Contenu du commentaire :</u> <?php echo htmlspecialchars($infocom['post']); ?></h4>
                            
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
