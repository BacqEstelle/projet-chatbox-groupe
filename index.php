<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Courgette&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>ChatBox</title>
</head>
<body>
<div class="integral">
    <header>
        <!-- Collapse Utilisateur en ligne -->
        <button type="button" class="collapsible pink"><img src="assets/img/chat.gif"> Utilisateur en ligne (<div id="userOnlineDisplay"></div>)</button>
        <div class="content">
            <div class="userOnline" id="useronline"></div>
        </div>
              <!-- Collapse Profil Utilisateur -->
        <?php
        if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) {
            echo '<button type="button" class="collapsible violet"><img src="assets/img/chat-2.gif"> Votre Profil</button>';
            echo '<div class="content">';
            echo '<div class="content-profil">';
            echo '<img src="'.$_SESSION['avatar'].'" alt="user"></img>';
            echo '<p>Votre login est '.$_SESSION['login'].'</p>';
            echo '<p>Votre email est '.$_SESSION['email'].'</p>';
            echo '<p>Statut : '.$_SESSION['statut'].'</p>';
            echo '<p>Grade : '.$_SESSION['grade'].'</p>';
            echo '<span><a href="assets/inc/logout.php"><button  value="Déconnection">Déconnexion</button></a></span>';
            echo '  ';
            echo '<span><a href="assets/inc/modifyuser.php?id='.$_SESSION['id'].'"><button>Modifier mon compte</button></a></span>';
            echo '</div>';
            echo '</div>';
        }else{
        ?>
        
        <!-- Collapse Connection -->
        <button type="button" class="collapsible violet"><img src="assets/img/chat-3.gif">Connexion</button>
        <div class="content">
          <div class="content-connexion">
            <form action="assets/inc/login.php" class="connexion-form" method="post">
              <label for="login">Votre login :</label> <input type="text" name="login" placeholder="Username">
              <label for="mdp">Votre mot de passe :</label> <input type="password" name="pwd" placeholder="Password">
              <button type="submit" value="Connexion">Connexion</button>
            </form>
          </div>
        </div>



        <!-- Collapse Enregistrement  -->
        
        <button type="button" class="collapsible fuschia"><img src="assets/img/chat-4.gif">Enregistrement</button>
        <div class="content-register">
        <?php 
          include('assets/inc/register.php');
        }
        ?>
        </div>

    </header>

    <div class="message">
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
    
    
    <footer>
      <div class="sendMessage">
        <?php include("assets/inc/sendmessage.php");?>
      </div>
    </footer>
</div>
<script>
let coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    let content = this.nextElementSibling;
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