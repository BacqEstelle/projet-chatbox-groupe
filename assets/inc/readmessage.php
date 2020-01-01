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
$reponse = $bdd->query('SELECT * FROM message ORDER By id desc');
function smiley($messageSmiley){
    $entre=array(
        ":)",
        ":("

    );
    $sortie=array (
        '<img src="assets/img/smiley/tresJoyeux.png" alt="Smiley très joyeux" style="width: 20px; height: 20px">',
        '<img src="assets/img/smiley/tresTriste.png" alt="Smiley très triste" style="width: 20px; height: 20px">'
    );
    return str_replace($entre,$sortie,$messageSmiley);
}
while ($donnees = $reponse->fetch())
{
   
    $messageSmiley = $donnees['message'];
    if ($donnees['id']%2 ==1){
        
            echo '<fieldset class="textGauche" style="color: blue; text-align: right;">';
            echo '<p>';
            echo '<img src="'.$donnees['avatar'].'" alt="avatar" style="width: 50px; height: 50px; border-radius: 50px; border: 3px solid pink;"></img>';
            echo '</p>';
            echo '<p>';
            echo '<strong>Pseudo : </strong>'.$donnees["user"].'</a>';
            echo '</p>';
            echo '<p>';
            echo '<strong>Date : </strong>'.$donnees["date"].'';
            echo '</p>';
            echo '<p>';
            echo '<strong>Message : </strong>'.smiley($messageSmiley).'';
            echo '</p>';
            echo '</fieldset>';

    }else{

            echo '<fieldset class="textDroite" style="color: red; text-align: left;">';
            echo '<p>';
            echo '<img src="'.$donnees['avatar'].'" alt="avatar" style="width: 50px; height: 50px; border-radius: 50px; border: 3px solid pink;"></img>';
            echo '</p>';
            echo '<p>';
            echo '<strong>Pseudo : </strong>'.$donnees["user"].'</a>';
            echo '</p>';
            echo '<p>';
            echo '<strong>Date : </strong>'.$donnees["date"].'';
            echo '</p>';
            echo '<p>';
            echo '<strong>Message : </strong>'.smiley($messageSmiley).'';
            echo '</p>';
            echo '</fieldset>';

                
    }
    
}

