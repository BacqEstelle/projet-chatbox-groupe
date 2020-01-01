<?php



function sendMessage(){

            echo '<form class="add" action="index.php" method="post">';
            echo '<p>Message : <input type="textarea" name="messageToSend"></p>';

            echo '<button type="submit" name="addMessage" value="addMessage">Envoyer</button>';
            echo '</form>';

        try
        {
            include('bdd.php');


            if ( $_SERVER["REQUEST_METHOD"] == "POST" AND isset($_POST["addMessage"]) ) {
                $avatar = $_SESSION['avatar'];
                $name = $_SESSION['login'];
                $date = date("Y-m-d H:i:s");
                $messageBrut= $_POST['messageToSend'];
                $message= filter_var($messageBrut, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                if (empty($_POST["messageToSend"])) { 
                            echo "<p>* Veuillez entrer un message.</p>";
                }
                else {
                    $req = $bdd->prepare('INSERT INTO message(user, date, message, avatar) VALUES(:user, :date, :message, :avatar)');
                    $req->execute(array(
                        'user' => $name,
                        'date' => $date,
                        'message' => '<p>'.$message.'</p>',
                        'avatar' => $avatar,
                        ));
                    
                        // header ('refresh: 3');
                
                }

            }
        }
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }
    }
    if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) {
        sendMessage();
        }else{
            echo "Veuillez vous connecter, pour écrire un message";
        }
