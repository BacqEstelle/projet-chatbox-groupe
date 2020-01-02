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
// Ouvre une connection a la bdd avec l'affichage du tableau en ordre descendant de l'id, pour que le dernier message s'affiche en premier pour une meilleure lecture de l'utilisateur.
$reponse = $bdd->query("SELECT * FROM utilisateur WHERE online='yes'");

// Boucle qui permet d'afficher toutes les données dans la bdd => tableau : message
while ($donnees = $reponse->fetch())
{

                echo '<div>';
                //echo '<p>'.$donnees['user'].'</p>';
                echo '<img src="'.$donnees['avatar'].'alt="user" style="width: 50px; height: 50px; border-radius: 50px; border: 3px solid pink;"</img>';
                echo '</div>';

}