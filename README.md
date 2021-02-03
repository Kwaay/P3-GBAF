# P3-GBAF
Le 3ème Projet du Parcours "Prep'FullStack" de chez OpenClassrooms, celui-ci concernant le GBAF


# Fonctionnalités présentes :

		- Connexion à la base de données via PDO
		
		- Partie Connexion et Inscription :
			↪ Connexion requise pour accéder aux informations du site via un Username et 
			un Password.
			↪ Au chargement de la page, les champs Username et Password prennent
			toute la largeur de l’écran, entre le header et le footer.
			↪ À la première connexion, l'utilisateur peut créer son compte via une page
			d’inscription.
			↪ L’utilisateur peut modifier ses informations personnelles à tout moment via
			la page « Paramètres du compte ».
  	
            - Champs requis sur la page d’inscription :
                - Nom
                - Prénom
                - Username
                - Password
                - Question secrète
                - Réponse à la question secrète.

              ↪ Si l'utilisateur oublie son mot de passe, il peut saisir son Username et répondre à la
              Question Secrète pour en créer un nouveau.

              ↪ Quand l’utilisateur est connecté, son nom et son prénom sont indiqués dans le header 
              sur l’ensemble des pages.

              ↪ Un bouton « Se déconnecter » est présent dans le header.
              ↪ Si l'utilisateur est déconnecté, il est redirigé automatiquement vers la première page pour
              une nouvelle connexion via un Username et un Password.

            - Partie Utilisateur connecté :
              ↪ Présentation succincte du GBAF
              ↪ Liste des différents acteurs/partenaires du système bancaire français comprenant :
                - Logo 
                - Titre
                - Présentation de l’entreprise
                - Bouton « Afficher la suite » (permettant d’ouvrir une nouvelle page 
                pour chaque acteur/partenaire).

            - Détails de la page partenaire comprenant :
              - Logo
              - Titre
              - Texte de description
              - Bouton Like/Dislike permettant de donner un avis en un clic sur l’acteur/partenaire
              - indication du nombre de Like/Dislike
              - Bouton pour poster un nouveau commentaire

            - Liste des commentaires sur cet acteur/partenaire incluant :
              - Le prénom de l’utilisateur qui a laissé le commentaire
              - La date de publication
              - Le texte

            - Informations complémentaires : 
              ↪ Pour chaque nouveau commentaire, le prénom et la date seront remplis	
              automatiquement.

# Installation :
  Le projet est juste à dézipper les fichiers et à les mettre dans votre fichier "www"
  Au niveau de votre base de données, n'oubliez pas de changer les identifiants dans le fichier "config.php"



