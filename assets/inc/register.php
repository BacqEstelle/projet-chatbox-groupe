
            <form class="register" action="" method="post">
                <label>Pseudo:</label> <input type="textarea" name="pseudo" placeholder="Username" required>
                <label>Mot de Passe :</label><input type="password" name="mdp1" placeholder="Password" required>
                <label>Retape votre Mot de Passe :</label><input type="password" name="mdp2" placeholder="Password" required>
                <label>email :</label><input type="mail" name="email" placeholder="Mail" required>
                <label>url de votre avatar :</label><input type="textarea" name="avatar" placeholder="Url" required>
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
            $q2 = array('pseudo'=>$pseudo);
            $sql = 'SELECT * FROM `utilisateur` WHERE user= :pseudo ';
            $req2 = $bdd->prepare($sql);
            $req2->execute($q2);
            $mdp1Brut= $_POST['mdp1'];
            $mdp1= filter_var($mdp1Brut, FILTER_SANITIZE_STRING);
            $mdp2Brut= $_POST['mdp2'];
            $mdp2= filter_var($mdp2Brut, FILTER_SANITIZE_STRING);
            $emailBrut= $_POST['email'];
            $email= filter_var($emailBrut, FILTER_SANITIZE_STRING);
            $avatarBrut= $_POST['avatar'];
            $avatar = filter_var($avatarBrut, FILTER_SANITIZE_STRING);
            $online = "no";
            $statut = "En ligne";
            $grade = "Utilisateur";
            if ($req2->rowCount() == 1){ 
                echo "Ce pseudo existe déjà !"; 
            }else{
            $req2->closeCursor();
            if (empty($_POST["pseudo"])) { 
                        echo "<p>* Veuillez entrer un pseudo.</p>";
                        return;
            }
            if (empty($_POST["mdp1"])) { 
                echo "<p>* Veuillez entrer un mot de passe.</p>";
                return;
            }
            if (empty($_POST["mdp2"])) { 
                echo "<p>* Veuillez entrer un mot de passe.</p>";
                return;
            }
            if ($_POST["mdp2"] != $_POST["mdp1"]){
                echo "<p>* Veuillez indiquer le même mot de passe.</p>";
                return;
            }
            if (empty($_POST["avatar"])) { 
                echo "<p>* Veuillez indiquer l'url de votre avatar.</p>";
                return;
            }
        
            else {
                // si tout est ok, prépare une connexion a la bdd et envoi les infos
                $req = $bdd->prepare('INSERT INTO utilisateur(user, email, psw, avatar, online, statut, grade) VALUES(:user, :email, :psw, :avatar, :online, :statut, :grade)');
                $req->execute(array(
                    'user' => $pseudo,
                    'email' => $email,
                    'psw' => sha1($mdp1),
                    'avatar' => $avatar,
                    'online' => $online,
                    'statut' => $statut,
                    'grade' => $grade,
                    ));
                
                    echo '<body onLoad="alert(\'Votre compte a été créé.\')">';
            }

        }   }
    }
    catch (Exception $e)
    {
            die('Erreur : ' . $e->getMessage());
    }
