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
$reponse = $bdd->query('SELECT * FROM message ORDER By id desc');
// function permettant de remplacer des symboles par des images smiley
function smiley($messageSmiley){
    // creation d'un tableau avec les symboles
    $entre=array(
        ":)",
        ":D",
        ":p",
        "#love",
        "#ok",
        "#rolf",
        "#ha",
        ":(",
        "zzz",
        "#omg",
        "#drool",
        "#sob",

    );
    // creation d'un tableau qui remplacera les symboles par des images
    $sortie=array (
        '<img src="assets/img/smiley/:).png" alt="Smiley joyeux" style="width: 50px; height: 50px">',
        '<img src="assets/img/smiley/:D.png" alt="Smiley mdr" style="width: 50px; height: 50px">',
        '<img src="assets/img/smiley/:p.png" alt="Smiley langue" style="width: 50px; height: 50px">',
        '<img src="assets/img/smiley/love.png" alt="Smiley love" style="width: 50px; height: 50px">',
        '<img src="assets/img/smiley/ok.png" alt="Smiley ok" style="width: 50px; height: 50px">',
        '<img src="assets/img/smiley/rolf.png" alt="Smiley rolf" style="width: 50px; height: 50px">',
        '<img src="assets/img/smiley/ha.png" alt="Smiley ha" style="width: 50px; height: 50px">',
        '<img src="assets/img/smiley/:(.png" alt="Smiley triste" style="width: 50px; height: 50px">',
        '<img src="assets/img/smiley/zzz.png" alt="Smiley dors" style="width: 50px; height: 50px">',
        '<img src="assets/img/smiley/omg.png" alt="Smiley ha" style="width: 50px; height: 50px">',
        '<img src="assets/img/smiley/drool.png" alt="Smiley ha" style="width: 50px; height: 50px">',
        '<img src="assets/img/smiley/sob.png" alt="Smiley sob" style="width: 50px; height: 50px">',
    );
    // function permettant de remplacer une entrée par une sortie 
    return str_replace($entre,$sortie,$messageSmiley);
}
// Boucle qui permet d'afficher toutes les données dans la bdd => tableau : message
while ($donnees = $reponse->fetch())
{
    $dateRecup = $donnees['date'];
    $date = date("d/m/Y à h:m:s", strtotime($dateRecup));
    // activation de la fonction smiley
    $messageSmiley = $donnees['message'];
    // permet de selectionner les id pair
    if ($donnees['id']%2 ==1){
            // affichage des différents éléments contenu dans la base de données avec un formatage html
            echo '<fieldset class="textGauche" style="color: blue; text-align: left;">';
            echo '<div>';
            echo '<img src="'.$donnees['avatar'].'" alt="avatar" style=" width: 50px; height: 50px; border-radius: 50px; border: 3px solid pink;"></img>';
            echo '<strong  style="margin-left:2%; margin-top: 15%; font-size: 20px;">'.$donnees["user"].'  </strong>';
            echo '<span  style="margin-right: 2%; margin-top: 15%; font-size: 12px;"> envoyé le '.$date.'</span>';
            echo '</div>';
            echo '</p>';
            echo '<p>';
            echo '<strong>Message : </strong>'.smiley($messageSmiley).'';
            echo '</p>';
            echo '</fieldset>';

    }else{
            // si l'id recu de la bdd est impair
            // affichage des différents éléments contenu dans le tableau message 
            echo '<fieldset class="textDroite" style="color: red; text-align:right;">';
            echo '<div>';
            echo '<strong  style="margin-top: 15%; font-size: 20px;">'.$donnees["user"].'  </strong>';
            echo '<span  style="margin-right: 2%; margin-top: 15%; font-size: 12px;"> envoyé le '.$date.'</span>';
            echo '<img src="'.$donnees['avatar'].'" alt="avatar" style=" width: 50px; height: 50px; border-radius: 50px; border: 3px solid pink;"></img>';
            echo '</div>';
            echo '</p>';
            echo '<p>';
            echo '<strong>Message : </strong>'.smiley($messageSmiley).'';
            echo '</p>';
            echo '</fieldset>';

                
    }
    
}

