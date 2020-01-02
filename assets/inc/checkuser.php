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

                echo '<div style="text-align:center;">';
                echo '<p>'.$donnees['user'].'</p>';
                if($donnees['statut'] === "En ligne"){
                    echo '<p><img src="'.$donnees['avatar'].'alt="user" style="width: 50px; height: 50px; border-radius: 50px; border: 3px solid green;"</img><p>';
                    echo '<p>'.$donnees['statut'].'</p>';
                }
                if($donnees['statut'] === "Absent"){
                    echo '<p><img src="'.$donnees['avatar'].'alt="user" style="width: 50px; height: 50px; border-radius: 50px; border: 3px solid orange;"</img><p>';
                    echo '<p>'.$donnees['statut'].'</p>';
                }
                if($donnees['statut'] === "Ne pas déranger"){
                    echo '<p><img src="'.$donnees['avatar'].'alt="user" style="width: 50px; height: 50px; border-radius: 50px; border: 3px solid red;"</img><p>';
                    echo '<p>'.$donnees['statut'].'</p>';
                }
                echo '</div>';


                
    
    
}