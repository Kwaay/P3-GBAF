<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["username"])){
    header("Location: connexion.php");
    exit(); 
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>GBAF | Accueil</title>
	<link href="style.css" rel="stylesheet" /> 
    </head>
     <?php include ("header.php"); ?> 
     

    <body>
       <section class="presentation-gbaf">
            <div class="texte-gbaf">
                <h1><u>Le Groupement Banque Assurance Français (GBAF)</u></h1> 
                <h3>est une fédération représentant les 6 grands groupes français :</h3>
            <div class="logo-groupes">
                <img src="images/bnp-paribas.png" alt ="Logo BNP" height=150 width=150 />
                <img src="images/bpce.png" alt="Logo BPCE" height=150 width=150 />
                <img src="images/credit-agricole.png" alt="Logo CréditAgricole" height=150 width=150 />
                <img src="images/societe_generale.png" alt="Logo SociétéGénérale" height=150 width=150 />
                <img src="images/la-banque-postale.png" alt="Logo La Banque Postale" height=150 width=150 />
            </div>
            <p> Le GBAF est le représentant de la profession bancaire et des assureurs sur tous les axes de la réglementation financière française. 
                Sa mission est de promouvoir l'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié des pouvoirs publics.
            </p>
        </section>

            <div class="texte-partenaires">
                <h2><u>Les Partenaires et Acteurs</u></h2>
                <p>Les produits et services bancaires sont nombreux et très variés. 
                Afin de renseigner au mieux les clients, les salariés des 340 agences des banques et assurances en France (agents, chargés de clientèle, conseillers financiers, etc.)
                recherchent sur Internet des informations portant sur des produits bancaires et des financeurs, entre autres.
                </p>
                </div>
                <br>
            </div>
    <div class="partenaires">
        <div class="partenaire-formation-co">
            <img src="images/formation_co.png" alt="Logo de Formation&Co" height=150 width=300/>
            <div class="text-container">
                <h3><u>Formation & Co</u></h3>
                <p> Formation&co est une association française présente sur tout le territoire.
                Nous proposons à des personnes issues de tout milieu de devenir entrepreneur grâce à un crédit et un accompagnement professionnel et personnalisé.
                Notre proposition : 
                • un financement jusqu’à 30 000€ ;
                • un suivi personnalisé et gratuit ;
                • une lutte acharnée contre les freins sociétaux et les stéréotypes.

                Le financement est possible, peu importe le métier : coiffeur, banquier, éleveur de chèvres… . Nous collaborons avec des personnes talentueuses et motivées.
                Vous n’avez pas de diplômes ? Ce n’est pas un problème pour nous ! Nos financements s’adressent à tous. </p>
            <div class="button-formation-co">
                <a href="formation_co.php" class="link-button">Lire la suite</a>
            </div>
        </div>
            
        </div>
       <br>
        <div class="partenaire-protect-people">
            <img src="images/protectpeople.png" alt="Logo de ProtectPeople" height=150 width=300/>
            <div class="text-container">
                <h3><u>Protect People</u></h3>
                <p> Protectpeople finance la solidarité nationale.
                Nous appliquons le principe édifié par la Sécurité sociale française en 1945 : permettre à chacun de bénéficier d’une protection sociale.

                Chez Protectpeople, chacun cotise selon ses moyens et reçoit selon ses besoins.
                Proectecpeople est ouvert à tous, sans considération d’âge ou d’état de santé.
                Nous garantissons un accès aux soins et une retraite.
                Chaque année, nous collectons et répartissons 300 milliards d’euros.
                Notre mission est double :
                • sociale : nous garantissons la fiabilité des données sociales ;
                • économique : nous apportons une contribution aux activités économiques.</p>
            <div class="button-protect-people">
                <a href="protectpeople.php" class="link-button">Lire la suite</a>
            </div>
        </div>
            
        </div>
        <br>
        <div class="partenaire-dsa-france">
            <img src="images/Dsa_france.png" alt="Logo de DSA France" height=150 width=300 />
            <div class="text-container">
                <h3><u>DSA France</u></h3>
                <p> Dsa France accélère la croissance du territoire et s’engage avec les collectivités territoriales.
                Nous accompagnons les entreprises dans les étapes clés de leur évolution.
                Notre philosophie : s’adapter à chaque entreprise.
                Nous les accompagnons pour voir plus grand et plus loin et proposons des solutions de financement adaptées à chaque étape de la vie des entreprises
                </p>
            <div class="button-dsa-france">
                <a href="dsa_france.php" class="link-button">Lire la suite</a>
            </div>
        </div>
            
        </div>
        <br>
        <div class="partenaire-cde">
            <img src="images/CDE.png" alt="Logo de CDE" height=150 width=300 />
            <div class="text-container">
                <h3><u>CDE</u></h3>
                <p> La CDE (Chambre Des Entrepreneurs) accompagne les entreprises dans leurs démarches de formation. 
                Son président est élu pour 3 ans par ses pairs, chefs d’entreprises et présidents des CDE.</p>
            <div class="button-cde">
                <a href="cde.php" class="link-button">Lire la suite</a>
            </div>
        </div>
            
            
        </div>
    </div>
        <br>
        <?php include ("footer.php"); ?> 
    </body>
</html>
