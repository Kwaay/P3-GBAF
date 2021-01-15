<?php
    session_start();
    require ('config.php');
    $id_acteur=$_GET['id'];
    $id_user=$_
    $requete=$bdd->prepare('SELECT * FROM acteur WHERE id_acteur=:id_acteur');
    $requete->bindParam(':id_acteur', $id_acteur, PDO::PARAM_INT);
    $requete->execute();
    $reponse=$requete->fetch(PDO::FETCH_ASSOC);
    
    $commentaires=$bdd->prepare("SELECT COUNT(*) AS nb_com  FROM post");
    $commentaires->execute(array($id_acteur));
    $donnees=$commentaires->fetch();
    
    $retourcom=$bdd->prepare("SELECT * FROM post");
    $retourcom->execute(array($id_acteur));

    $getusername=$bdd->prepare("SELECT prenom FROM users WHERE id_user=?");
    $getusername->execute(array($id_user));
    
    
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
        <?php include ("header.php"); ?>
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
                        <a href="commentaires.php" class="link-button">Nouveau<br />commentaire</a>
                    </div>
                        <div class="bouton-like-dislike">
                        <i class="fa fa-thumbs-up">5</i>
                        <i class="fa fa-thumbs-down"></i>
                        </div>
            </div>
                    <?php 
                        while ($com2=$retourcom->fetch()) { ?>
                    <div class="info-commentaires">
                        <div class="pseudo_com">
                        <?php 
                            echo htmlspecialchars($com2['id_user']); ?>
                        </div>
                        <div class="date_com">
                        <?php
                            echo htmlspecialchars($com2['date_add']); ?>
                        </div>
                        <div class="text-com">
                        <?php
                            echo htmlspecialchars($com2['post']); ?>
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
