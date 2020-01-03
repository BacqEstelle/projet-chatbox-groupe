<?php
// On démarre la session
session_start ();
// Pour modifier la valeur connect
include('bdd.php');

// Modifier la valeur statut dans la bdd 
$online = 'no';
$user = $_SESSION['login'];
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
$sql = "UPDATE utilisateur SET online='$online' WHERE user='$user'";
        // Prepare statement
        $stmt = $bdd->prepare($sql);
					
		// execute the query
        $stmt->execute();

echo $user;



//On détruit les variables de notre session
session_unset ();

// On détruit notre session
session_destroy ();

// On redirige le visiteur vers la page d'accueil
header ('location: ../../index.php');