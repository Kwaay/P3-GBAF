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
        $sessionid = $_SESSION['id'];

        $checkreq = $bdd->prepare('SELECT * FROM vote WHERE id_acteur = ? AND id_user = ?');
        $checkreq->execute(array($getid, $sessionid));
        
        if($checkreq->rowCount() == 0)
        {
            if($get_t == 1) 
            {
                $likes = $bdd->prepare('INSERT INTO vote (id_acteur, id_user, vote) VALUES (?, ?, 1)');
                $likes->execute(array($getid, $sessionid));
            }
            elseif ($get_t == 2)
            {
                $dislikes = $bdd->prepare('INSERT INTO vote (id_acteur, id_user, vote) VALUES (?, ?, 2)');
                $dislikes->execute(array($getid, $sessionid)); 
            }
        }
        else
        {
            $exisitingvote = $checkreq->fetch();

            if($get_t == 1) 
            {
                if($exisitingvote['vote'] == 1)
                {
                    $del_likes = $bdd->prepare('DELETE vote FROM vote WHERE id=:id');
                    $del_likes->execute(array('id' => $exisitingvote['id']));
                }
                else 
                {
                    $update = $bdd->prepare('UPDATE vote SET vote= 1 WHERE id=:id');
                    $update->execute(array('id' => $exisitingvote['id']));
                    
                    //update dislike to like
                }
            }
            elseif ($get_t == 2)
            {
                if($exisitingvote['vote'] == 2)
                {
                    $del_likes = $bdd->prepare('DELETE vote FROM vote WHERE id=:id');
                    $del_likes->execute(array('id' => $exisitingvote['id']));
                    // delete like
                }
                else 
                {
                    $update = $bdd->prepare('UPDATE vote SET vote= 2 WHERE id=:id');
                    $update->execute(array('id' => $exisitingvote['id']));
                    //update dislike to like
                }
            }
        }

        header("Location: ".$_SERVER['HTTP_REFERER']."");
        
        
        
    }
?>