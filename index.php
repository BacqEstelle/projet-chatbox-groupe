<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <!-- Collapse Utilisateur en ligne -->
        <button type="button" class="collapsible">Utilisateur en ligne</button>
        <div class="content">
            <div class="userOnline" id="useronline"></div>
        </div>
              <!-- Collapse Profil Utilisateur -->
        <?php
        if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) {
            echo '<button type="button" class="collapsible">Votre Profil</button>';
            echo '<div class="content">';
            echo '<img src="'.$_SESSION['avatar'].'" alt="user" style="width: 100px; height: 100px; border-radius: 100px; border: 3px solid pink;"></img>';
            echo '<p>Votre login est '.$_SESSION['login'].'</p>';
            echo '<p>Votre email est '.$_SESSION['email'].'</p>';
            echo '<p>Statut : '.$_SESSION['statut'].'</p>';
            echo '<p>Grade : '.$_SESSION['grade'].'</p>';
            echo '<p><button><a href="assets/inc/logout.php">Déconnection</a></button></p>';
            echo '<p><button><a href="assets/inc/modifyuser.php?id='.$_SESSION['id'].'">Modifier mon compte</a></button></p>';
            echo '</div>';
        }else{
        ?>
        
        <!-- Collapse Connection -->
        <button type="button" class="collapsible">Connexion</button>
        <div class="content">
        <h2> Connexion </h2>
        <form action="assets/inc/login.php" method="post">
        <span>Votre login : <input type="text" name="login">
        Votre mot de passé : <input type="password" name="pwd"></span>

        <p><a href="register.php">register ?</a></p>
        <p><input type="submit" value="Connexion"></p>
        </form>
        </div>



        <!-- Collapse Enregistrement  -->
        
        <button type="button" class="collapsible">Enregistrement</button>
        <div class="content">
        <?php 
          include('assets/inc/register.php');
        }
        ?>
        

    </header>


    <h2>Message</h2>
    <div class="message"  style="overflow-x:scroll; height:300px;">
        <div id="messageAfficher">
        </div>
    </div>
    <audio controls id="linkAudio">
    <source src="assets/sounds/0920.mp3" type="audio/mpeg">
    Your browser does not support the audio element.
    </audio>

    <div class="animation">
    <div class="animationClick"></div>
    </div>
    
    <?php include("assets/inc/sendmessage.php");?>

    <footer>

    </footer>
<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>
<script src="assets/js/refresh.js"></script>
<script src="assets/js/animation.js"></script>
</body>
</html>