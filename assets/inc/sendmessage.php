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
                ///////////////////////////////////////////////////////////////////////
                //              Lancement du bot                                     //
                //////////////////////////////////////////////////////////////////////
                // Creation d'un tableau message user => réponse lili
                $hour = date("H:i:s");
                $jour = date("w");
                $now = date("d m Y");
                switch ($jour) {
                    case '0':
                        $jour ="Dimanche";
                        break;

                    case '1':
                        $jour = "Lundi";
                        break;
                    case '2':
                        $jour = "Mardi";
                        break;
                    case '3':
                        $jour = "Mercredi";
                        break;
                    case '4':
                        $jour = "Jeudi";
                        break;
                    case '5':
                        $jour = "Vendredi";
                        break;
                    case '6':
                        $jour = "Samedi";
                        break;


                    default:
                        # code...
                        break;
                }
                $checkMessage = array(
                    "Bonjour Lili" => "Bonjour $name",
                    "Je t aime Lili" => "Moi aussi $name !",
                    "Comment vas-tu Lili ?" => "Je suis sur un petit nuage, et toi $name ?",
                    "Je vais bien Lili" => "C'est super, je suis trop contente pour toi $name",
                    "Tu manges quoi ce soir Lili ?" => "Facile, comme tout les jours un arc-en-ciel",
                    "Quelle heure est-il Lili ?" => "Il est $hour, $name",
                    "Quel jour sommes-nous Lili ?" => "Nous sommes le $jour $now, $name",
                    "Ouvre moi google Lili" => 'Voilà '. $name.', tu peux <a href="http://google.be" target="_blank">cliquer ici</a>',
                    "Musique Lili !" => 'Ouvre bien grand tes oreilles <button onclick="musiquePlay()">Play</button><button onclick="musiquePause()">Pause</button>',

                );
                // Creation d'un boucle qui générera une réponse selon le message recu.
                foreach ($checkMessage as $key => $value) {
                    // Vérifie si le message du tableau est exacte au message envoyé par l'utilisateur
                    if ($key == $message) {
                        // Préparation a l'envoi dans la bdd concernant le bot
                        $userlili = "Lili la licorne";
                        $avatarlili = 'assets/img/lili.gif';
                        $datelili = date("Y-m-d H:i:s");
                        // Le message sera la valeur du tableau choisi selon la clé.
                        $messagelili = $value;

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
    echo '<div class="noconnect">';
    echo '<img src="assets/img/connect.gif" alt="licorne">';
    echo '<p>Veuillez vous connecter, pour écrire un message</p>';
    echo '</div>';
}
