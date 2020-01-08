<?php


// Creation de la fonction envoi du message
function sendMessage()
{
    // formatage en html et creation des divers éléments du formulaire
    echo '<form class="add" action="" method="post">';
    echo '<textarea name="messageToSend" placeholder="Veuillez taper dans le chat ... mais pas trop fort ..."></textarea>';
    echo '<button class="button" type="submit" name="addMessage" value="addMessage"><img src="assets/img/send.png"></img></button>';
    echo '</form>';
    echo '<form class ="upload" method="POST" action="" enctype="multipart/form-data">';
    echo '<input type="file" name="image">';
    echo '<input type="submit" name="upload" value="Upload">';
    echo '</form>';

    try {
        // recherche la connection a la bddd
        include('bdd.php');

        // Vérifie si il y a une méthode post
        if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["addMessage"])) {
            // check les valeurs du formulaire
            $avatar = $_SESSION['avatar'];
            $name = $_SESSION['login'];
            $date = date("Y-m-d H:i:s");
            $messageBrut = $_POST['messageToSend'];
            $message = filter_var($messageBrut, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if (empty($_POST["messageToSend"])) {
                echo "<p>* Veuillez entrer un message.</p>";
            } else {




                // si tout est ok Créer une instance d'envoi dans la bdd
                $req = $bdd->prepare('INSERT INTO message(user, date, message, avatar) VALUES(:user, :date, :message, :avatar)');
                $req->execute(array(
                    'user' => $name,
                    'date' => $date,
                    'message' => '<p>' . $message . '</p>',
                    'avatar' => $avatar,
                ));
                // function refresh qui ne fonctionne pas après 5-7 envoi de message
                // CF : fonction ajax en js => assets/js/refresh.js
                // header ('refresh: 3');
                echo '<script>
                            let animationTime = setInterval(function() {
                            animation();
                            clearInterval(animationTime);
                            }, 500);

                        
                            </script>';
        // Bot
            // Salut lili
                if($message == "Salut Lili !" ){

                    $userlili = "Lili la licorne";
                    $avatarlili = 'assets/img/lili.gif';
                    $datelili = date("Y-m-d H:i:s");
                    $messagelili = "Salut $name !";

                    $req = $bdd->prepare('INSERT INTO message(user, date, message, avatar) VALUES(:userlili, :datelili, :messagelili, :avatarlili)');
                    $req->execute(array(
                        'userlili' => $userlili,
                        'datelili' => $datelili,
                        'messagelili' => '<p>' . $messagelili . '</p>',
                        'avatarlili' => $avatarlili,
                    ));    
                }
            // Salut lili
                if($message == "Salut Lili !" ){

                    $userlili = "Lili la licorne";
                    $avatarlili = 'assets/img/lili.gif';
                    $datelili = date("Y-m-d H:i:s");
                    $messagelili = "Salut $name !";

                    $req = $bdd->prepare('INSERT INTO message(user, date, message, avatar) VALUES(:userlili, :datelili, :messagelili, :avatarlili)');
                    $req->execute(array(
                        'userlili' => $userlili,
                        'datelili' => $datelili,
                        'messagelili' => '<p>' . $messagelili . '</p>',
                        'avatarlili' => $avatarlili,
                    ));    
                }
            // je t'aime lili
            if($message == "Je t aime Lili !" ){

                $userlili = "Lili la licorne";
                $avatarlili = 'assets/img/lili.gif';
                $datelili = date("Y-m-d H:i:s");
                $messagelili = "je t'aime aussi $name !";

                $req = $bdd->prepare('INSERT INTO message(user, date, message, avatar) VALUES(:userlili, :datelili, :messagelili, :avatarlili)');
                $req->execute(array(
                    'userlili' => $userlili,
                    'datelili' => $datelili,
                    'messagelili' => '<p>' . $messagelili . '</p>',
                    'avatarlili' => $avatarlili,
                ));    
            }
            // Comment ca va Lili ?
            if($message == "Comment ca va Lili ?" ){

                $userlili = "Lili la licorne";
                $avatarlili = 'assets/img/lili.gif';
                $datelili = date("Y-m-d H:i:s");
                $messagelili = "Je vais bien $name et toi ?";

                $req = $bdd->prepare('INSERT INTO message(user, date, message, avatar) VALUES(:userlili, :datelili, :messagelili, :avatarlili)');
                $req->execute(array(
                    'userlili' => $userlili,
                    'datelili' => $datelili,
                    'messagelili' => '<p>' . $messagelili . '</p>',
                    'avatarlili' => $avatarlili,
                ));    
            }
            // Réponse a je vais bien
            if($message == "Je vais bien Lili !" ){

                $userlili = "Lili la licorne";
                $avatarlili = 'assets/img/lili.gif';
                $datelili = date("Y-m-d H:i:s");
                $messagelili = "Tant mieux $name !";

                $req = $bdd->prepare('INSERT INTO message(user, date, message, avatar) VALUES(:userlili, :datelili, :messagelili, :avatarlili)');
                $req->execute(array(
                    'userlili' => $userlili,
                    'datelili' => $datelili,
                    'messagelili' => '<p>' . $messagelili . '</p>',
                    'avatarlili' => $avatarlili,
                ));    
            }
            }
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["upload"])) {
            $avatar = $_SESSION['avatar'];
            $name = $_SESSION['login'];
            $date = date("Y-m-d H:i:s");
            $folder = $_SERVER["DOCUMENT_ROOT"] . "/chatbox/assets/uploads/img/";
            $maxsize =  100000;
            $image = $_FILES['image']['name'];
            $unique = uniqid();
            $rename = $unique;
            $path = $folder . $rename;
            $target_file = $folder . basename($_FILES["image"]["name"]);
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);


            $allowed = array('jpeg', 'png', 'jpg', 'gif');
            $filename = $_FILES['image']['name'];

            $pathInfo = pathinfo($filename, PATHINFO_EXTENSION);
            if (!in_array($pathInfo, $allowed)) {

                echo '<script> alert("Désolé, les formats JPG, JPEG, PNG & GIF  sont seulement autorisé.")</script>';
            }

            if (($_FILES['image']['size'] >= $maxsize) || ($_FILES["image"]["size"] == 0)) {
                echo '<script> alert("Votre fichier est trop gros. La taille max est de 100Ko")</script>';
            } else {

                move_uploaded_file($_FILES['image']['tmp_name'], $path);

                $reponse = $bdd->prepare('INSERT INTO message(user, date, message, avatar) VALUES(:user, :date, :messageImg, :avatar)');
                $reponse->execute(array(
                    'user' => $name,
                    'date' => $date,
                    'messageImg' => '<a href="assets/uploads/img/' . $rename . '" alt="thumbnail" target="_blank"><img src=assets/uploads/img/' . $rename . ' style="width:100px; height:100px;"></img></a>',
                    'avatar' => $avatar,
                ));
                // function
            }
        }
    }
    // si le serveur n'arrive pas a se co a la bdd, renvoi l'/les erreur(s)
    catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
// Vérifie si l'utilisateur est en mode session ou pas ...
if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) {
    sendMessage();
} else {
    echo'<div class="noconnect">';
    echo'<img src="assets/img/connect.gif" alt="licorne">';
    echo '<p>Veuillez vous connecter, pour écrire un message</p>';
    echo '</div>';
}
