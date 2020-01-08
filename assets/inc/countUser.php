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
// Ouvre une connection a la bdd avec l'affichage du tableau qui ne comprenant que l'affichage du online "yes".
$reponse = $bdd->query("SELECT * FROM utilisateur WHERE online='yes'");
$countUser = 0;
// Boucle qui permet d'afficher toutes les données dans la bdd => tableau : message
while ($donnees = $reponse->fetch())
{
    if($donnees['online'] === "yes"){
        $countUser++;
    }
}
echo $countUser;