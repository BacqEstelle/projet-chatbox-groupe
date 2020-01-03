<?php


// Creation de la fonction envoi du message
function sendMessage(){
            // formatage en html et creation des divers éléments du formulaire
            echo '<form class="add" action="index.php" method="post">';
            echo    '<textarea placeholder="Entrer un message" name="messageToSend"></textarea>';
            echo    '<button type="submit" name="addMessage" value="addMessage"><img src="assets/img/icone.png"></button>';
            echo '</form>';

        try
        {
            // recherche la connection a la bddd
            include('bdd.php');

            // Vérifie si il y a une méthode post
            if ( $_SERVER["REQUEST_METHOD"] == "POST" AND isset($_POST["addMessage"]) ) {
                // check les valeurs du formulaire
                $avatar = $_SESSION['avatar'];
                $name = $_SESSION['login'];
                $date = date("Y-m-d H:i:s");
                $messageBrut= $_POST['messageToSend'];
                $message= filter_var($messageBrut, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                if (empty($_POST["messageToSend"])) { 
                            echo "<p>* Veuillez entrer un message.</p>";
                }
                else {
                    // si tout est ok Créer une instance d'envoi dans la bdd
                    $req = $bdd->prepare('INSERT INTO message(user, date, message, avatar) VALUES(:user, :date, :message, :avatar)');
                    $req->execute(array(
                        'user' => $name,
                        'date' => $date,
                        'message' => '<p>'.$message.'</p>',
                        'avatar' => $avatar,
                        ));
                    // function refresh qui ne fonctionne pas après 5-7 envoi de message
                    // CF : fonction ajax en js => assets/js/refresh.js
                        // header ('refresh: 3');
                
                }

            }
        }
        // si le serveur n'arrive pas a se co a la bdd, renvoi l'/les erreur(s)
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }
    }
    // Vérifie si l'utilisateur est en mode session ou pas ...
    if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) {
        sendMessage();
        }else{
            echo "<p>Veuillez vous connecter, pour écrire un message</p>";
        }
