<?php
    session_start();
?>
<?php 
    require ("config.php");
    // Système d'ajout de votes //
    if(isset($_GET['t'], $_GET['id']) AND !empty($_GET['t']) AND !empty($_GET['id']))
    {
        $getid = (int) $_GET['id'];
        $get_t = (int) $_GET['t'];
        
        if(isset())
        {

        }
            if($get_t == 1)
            {
                $likes = $bdd->prepare('INSERT INTO vote (id_acteur, id_user, vote) VALUES (?, ?, 1)');
                $likes->execute(array($getid, $_SESSION['id']));
            }
            elseif ($get_t == 2)
            {
                $dislikes = $bdd->prepare('INSERT INTO vote (id_acteur, id_user, vote) VALUES (?, ?, 2)');
                $dislikes->execute(array($getid, $_SESSION['id']));
            }
            header('Location: '.$_SERVER['HTTP_REFERER']);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>GBAF | Vote</title>
	    <link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <?php include ('header.php'); ?>
      
        <?php include ('footer.php'); ?>
    </body>
</html>