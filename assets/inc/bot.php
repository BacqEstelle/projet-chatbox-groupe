<?php

    try {
        // recherche la connection a la bddd
        include('bdd.php');
            // check les valeurs du formulaire
            $avatar = '"assets/img/lili.gif"';
            $name = "Lili La Licorne";
            $date = date("Y-m-d H:i:s");
            $message = "test";
            $sql = 'SELECT * FROM `message`';
            $q2 = array('message'=>$message);
            $req2 = $bdd->prepare($sql);
            $req2->execute();
            if ($req2->bindValue() == "Salut lili !"){ 
                $message = "Salut à toi !"; 
            $req2->closeCursor();
            $req = $bdd->prepare('INSERT INTO message(user, date, message, avatar) VALUES(:user, :date, :message, :avatar)');
                $req->execute(array(
                    'user' => $name,
                    'date' => $date,
                    'message' => '<p>' . $message . '</p>',
                    'avatar' => $avatar,
                ));
            }
            }
    // si le serveur n'arrive pas a se co a la bdd, renvoi l'/les erreur(s)
    catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

