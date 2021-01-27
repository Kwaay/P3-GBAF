<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <div class="header">
             <a href="index.php"><img src="images/logo_gbaf_p3.png" height=125 width=125 /></a>  
             <h1>Bienvenue <?php echo $_SESSION['username']; ?></h1>
            <div class="deco-button" align="center" style="border: 2px solid red; border-radius: 30px; padding: 0.5vh; text-align: center; display: inline-flex">
                <a href="deconnexion.php" class="link-button">Se déconnecter</a>    
            </div>    
        </div>
        
        
    </head>
</html>
