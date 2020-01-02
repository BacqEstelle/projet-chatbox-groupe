<?php
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
$req = $bdd->query('SELECT * FROM utilisateur');
while ($info = $req->fetch())
{
$id_valide = $info['id'];
$login_valide = $info['user'];
$pwd_valide = $info['psw'];
$email_valide = $info['email'];
$avatar_valide = $info['avatar'];
$statut_valide = $info['statut'];

// on teste si nos variables sont définies
if (isset($_POST['login']) && isset($_POST['pwd'])) {
    $verifyPwd = $_POST['pwd'];
	// on vérifie les informations du formulaire, à savoir si le pseudo saisi est bien un pseudo autorisé, de même pour le mot de passe
	if ($login_valide == $_POST['login'] && $pwd_valide == sha1($verifyPwd)) {
		// dans ce cas, tout est ok, on peut démarrer notre session

		// on la démarre :)
		session_start ();
		// on enregistre les paramètres de notre visiteur comme variables de session ($login et $pwd) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
		$_SESSION['id'] = $id_valide;
		$_SESSION['login'] = $_POST['login'];
		$_SESSION['pwd'] = $_POST['pwd'];
		$_SESSION['email'] = $email_valide;
		$_SESSION['avatar'] = $avatar_valide;
		$_SESSION['statut'] = $statut_valide;

		//
		$online = 'yes';
		$statut = 'En ligne';
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
        $sql = "UPDATE utilisateur SET online='$online', statut='$statut' WHERE user='$login_valide'";
                    
        // Prepare statement
        $stmt = $bdd->prepare($sql);
					
		// execute the query
        $stmt->execute();

		// on redirige notre visiteur vers la page index
        header ('location: ../../index.php');
        echo '<body onLoad="alert(\'Vous êtes maintenant connecté\')">';
    }
	else {
		// Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
		echo '<body onLoad="alert(\'Utilisateur non reconnu...\')">';
		// puis on le redirige vers la page d'accueil
		header ('location: ../../index.php');
	}
}
else {
	echo $pwd_valide;
}
}

?>