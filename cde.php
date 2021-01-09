<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>GBAF | Partenaire CDE</title>
    <link href="style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
        
    <body>
    <?php include ("header.php"); ?>
        <div class="acteur-cde">
            <div class="img-partenaires">
                <img src="images/cde.png" alt="Logo du Partenaire CDE" height=300  width=600 />
            </div>
            <div class="text-cde-acteurs">
                <h2>CDE</h2>
                <p> 
                La CDE (Chambre Des Entrepreneurs) accompagne les entreprises dans leurs démarches de formation. 
                Son président est élu pour 3 ans par ses pairs, chefs d’entreprises et présidents des CDE.
                </p>
            </div>    
        </div>
        <div class="commentaires">
            <div class="menu-commentaires">
                <div class="profil-commentaires">
                    <h1> X commentaires </h1>
                </div>    
                    <div class="bouton-commentaire">
                        <a href="commentaires.php" class="link-button">Nouveau<br />commentaire</a>
                    </div>
                        <div class="bouton-like-dislike">
                        <i class="fa fa-thumbs-up">5</i>
                        <i class="fa fa-thumbs-down"></i>
                        </div>
            </div>
                <div class="first-commentaire">
                    <p>
                    Prénom <br>
                    Date <br>
                    Texte <br>
                    </p>
                </div>
                <div class="second-commentaire">
                    <p>
                    Prénom <br>
                    Date <br>
                    Texte <br>
                    </p>
                </div>
                <div class="third-commentaire">
                    <p>
                    Prénom <br>
                    Date <br>
                    Texte <br>
                    </p>
                </div>
                </div>
            </div>
        </div>

    <?php include ("footer.php"); ?>    
    </body>
</html>