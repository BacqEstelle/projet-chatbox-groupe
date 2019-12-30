<?php
function afficheMessage(){
try
{
	// On se connecte à MySQL
	include('bdd.php');
}
catch(Exception $e)
{
	// En cas d'erreur
        die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query('SELECT * FROM message');

while ($donnees = $reponse->fetch())
{
    if ($donnees['id']%2 ==1){
?>
<fieldset class="textGauche" style="color: red; text-align: left;">
    <p>
    <img src="<?php echo $donnees['avatar']; ?>" alt="avatar" style="width: 50px; height: 50px; border-radius: 50px; border: 3px solid pink;"></img>
    </p>
    <p>
    <strong>Pseudo : <?php echo $donnees['user']; ?> </a>
    </p>
   <p>
   <strong>Date : </strong> <?php echo $donnees['date']; ?>
   </p>
   <p>
   <strong>Message : </strong> <?php echo $donnees['message']; ?>
   </p>
</fieldset>
<?php
    }else{
            ?>
            <fieldset class="textDroite" style="color: blue; text-align: right;">
                <p>
                <img src="<?php echo $donnees['avatar']; ?>" alt="avatar" style="width: 50px; height: 50px; border-radius: 50px; border: 3px solid pink;"></img>
                </p>
                <p>
                <strong>Pseudo : <?php echo $donnees['user']; ?> </a>
                </p>
               <p>
               <strong>Date : </strong> <?php echo $donnees['date']; ?>
               </p>
               <p>
               <strong>Message : </strong> <?php echo $donnees['message']; ?>
               </p>
            </fieldset>
            <?php
    }
}

$reponse->closeCursor(); // Termine le traitement de la requête
}
afficheMessage();

function sendMessage(){
?>
            <form class="add" action="index.php" method="post">
                <p>Message : <input type="textarea" name="messageToSend"></p>

                <button type="submit" name="addMessage" value="addMessage">Envoyer</button>
            </form>
<?php

        try
        {
            include('bdd.php');


            if ( $_SERVER["REQUEST_METHOD"] == "POST" AND isset($_POST["addMessage"]) ) {
                $avatar = $_SESSION['avatar'];
                $name = $_SESSION['login'];
                $date = date("Y-m-d H:i:s");
                $messageBrut= $_POST['messageToSend'];
                $message= filter_var($messageBrut, FILTER_SANITIZE_STRING);
                if (empty($_POST["messageToSend"])) { 
                            echo "<p>* Veuillez entrer un nom de randonnées.</p>";
                }
                else {
                    $req = $bdd->prepare('INSERT INTO message(user, date, message, avatar) VALUES(:user, :date, :message, :avatar)');
                    $req->execute(array(
                        'user' => $name,
                        'date' => $date,
                        'message' => $message,
                        'avatar' => $avatar,
                        ));
                    
                        header("Refresh:0");
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
