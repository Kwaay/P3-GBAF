<?php
            require('config.php');
            require('contact.php');
            // Système d'envoi de mail //
            if(isset($_POST['submit']))
            { 
                $entete  = 'MIME-Version: 1.0' . "\r\n";
                $entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                $entete .= 'De: ' . $_POST['email'] . "\r\n";

                $message = '<h1>Message envoyé depuis la page Contact de GBAF</h1>
                <p><b>Nom : </b>' . $_POST['nom'] . '<br>
                <b>Email : </b>' . $_POST['email'] . '<br>
                <b>Message : </b>' . $_POST['demande'] . '</p>';
                
                $retour = mail('benoit.dum74@gmail.com', 'Envoi depuis la page Contact', $message, $entete);
                if($retour) 
                {
                    echo "Votre demande a bien été envoyé";
                    header('contact.php');
                    var_dump($retour);
                }
            }
?>