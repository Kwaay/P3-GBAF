<?php
  // Démarrage de la session //
  session_start();
  // Destruction la session //
  if(session_destroy())
  {
    header("Location: connexion.php");
  }
?>