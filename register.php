

<!-- //  creation du formulaire d'enregistrement -->
            <form class="register" action="register.php" method="post">
                <p>Pseudo: <input type="textarea" name="pseudo"></p>
                <p>Mot de Passe : <input type="password" name="mdp1"></p>
                <p>Retape votre Mot de Passe : <input type="password" name="mdp2"></p>
                <p>email : <input type="mail" name="email"></p>
                <p>url de votre avatar : <input type="textarea" name="avatar"></p>

                <button type="submit" name="register" value="register">S'inscrire</button>
            </form>
<?php
    //function ascynchrome qui permet une récupération des données ainsi qu'une connection a la bdd
    try
    {
        include('bdd.php');

        // vérifie si il y a eu post ou non
        if ( $_SERVER["REQUEST_METHOD"] == "POST" AND isset($_POST["register"]) ) { 
            // sanatization des différentes informations et vérifications des informations
            $pseudoBrut= $_POST['pseudo'];
            $pseudo= filter_var($pseudoBrut, FILTER_SANITIZE_STRING);
            $mdp1Brut= $_POST['mdp1'];
            $mdp1= filter_var($mdp1Brut, FILTER_SANITIZE_STRING);
            $mdp2Brut= $_POST['mdp2'];
            $mdp2= filter_var($mdp2Brut, FILTER_SANITIZE_STRING);
            $emailBrut= $_POST['email'];
            $email= filter_var($emailBrut, FILTER_SANITIZE_STRING);
            $avatarBrut= $_POST['avatar'];
            $avatar = filter_var($avatarBrut, FILTER_SANITIZE_STRING);
            if (empty($_POST["pseudo"])) { 
                        echo "<p>* Veuillez entrer un pseudo.</p>";
            }
            if (empty($_POST["mdp1"])) { 
                echo "<p>* Veuillez entrer un mot de passe.</p>";
            }
            if (empty($_POST["mdp2"])) { 
                echo "<p>* Veuillez entrer un mot de passe.</p>";
            }
            if ($_POST["mdp2"] != $_POST["mdp1"]){
                echo "<p>* Veuillez indiquer le même mot de passe.</p>";
            }
            if (empty($_POST["avatar"])) { 
                echo "<p>* Veuillez indiquer l'url de votre avatar.</p>";
            }
            else {
                // si tout est ok, prépare une connexion a la bdd et envoi les infos
                $req = $bdd->prepare('INSERT INTO utilisateur(user, email, psw, avatar) VALUES(:user, :email, :psw, :avatar)');
                $req->execute(array(
                    'user' => $pseudo,
                    'email' => $email,
                    'psw' => sha1($mdp1),
                    'avatar' => $avatar,
                    ));
                
                echo 'Votre compte a bien été ajoutée';
            }

        }
    }
    catch (Exception $e)
    {
            die('Erreur : ' . $e->getMessage());
    }
