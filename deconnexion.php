<?php  
  // Détruire la session.
  if(session_destroy())
  {
    header("Location: connexion.php");
  }
?>