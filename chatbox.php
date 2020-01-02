<?php session_start() ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chatbox</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/chatbox.css">
</head>
<body>
    <div class="container">
        <header>
                <?php
                    if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) {
                        echo '<h2>Votre profil</h2>';
                        echo '<img src="'.$_SESSION['avatar'].'" alt="user" style="width: 100px; height: 100px; border-radius: 100px; border: 3px solid pink;"></img>';
                        echo '<p>Votre login est '.$_SESSION['login'].'</p>';
                        echo 'Votre email est '.$_SESSION['email'].'</p>';
                        echo '<button><a href="assets/inc/logout.php">Déconnection</a></button>';
                        echo '<button><a href="assets/inc/modifyuser.php?id='.$_SESSION['id'].'">Modifier mon compte</a></button>';
                    }else{
                ?>
                <h2> Connexion </h2>
                <form action="assets/inc/login.php" method="post">
                    <label for="login">Login :</label>
                    <input type="text" name="login">
                    <label for="pwd">Mot de passe :</label> 
                    <input type="password" name="pwd">
                    <input type="submit" value="Connexion">
                    <a href="register.php">register ?</a>
                </form>
                    <?php
                    }
                    ?>
        </header>
        <div class="content-chat">
            <section id="user">
                <div class="userOnline" id="useronline"></div>
            </section>
            <!-- <section id="chatbox">
                <div class="text">
                 <?php //include("assets/inc/sendmessage.php");?>
                </div>
                <div class="textarea">

                <textarea placeholder="Enter your text"></textarea>
                <a href="#"><img src="assets/img/icone.png"></a>
                </div>
                
            </section> -->
        </div>
    </div>
    <script src="assets/js/refresh.js"></script>
</body>
</html>