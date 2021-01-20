<?php 
    require ("config.php");
    if(isset($_GET['t'], $_GET['id']) AND !empty($_GET['t']) AND !empty($_GET['id']))
    {
        $getid = (int) $_GET['id'];
        $get_t = (int) $_GET['t'];

        $sessionid = 4;

        /*$check = $bdd->prepare('SELECT id_acteur FROM vote WHERE id_acteur = ?');
        $check->execute(array($getid));
        var_dump($check->rowCount());

        if($check->rowCount() == 1)
        { */
            if($get_t == 1)
            {
                $like = $bdd->prepare('INSERT INTO vote (id_acteur, id_user, vote) VALUES (?, ?, 1)');
                $like->execute(array($getid, $sessionid));
                print_r($like->errorInfo());
            }
            elseif ($get_t == 2)
            {
                $dislike = $bdd->prepare('INSERT INTO vote (id_acteur,id_user, vote) VALUES (?, ?, 2)');
                $dislike->execute(array($getid, $sessionid));
            }
            header('Location: '.$_SERVER['HTTP_REFERER']);
            
            
            
       // }
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