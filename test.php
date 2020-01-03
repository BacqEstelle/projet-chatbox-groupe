<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/chatbox.css">

    <title>Chatbox</title>
</head>
<body>
    <div class="container">
        <header>
                <h2>Votre profil</h2>
                <?php
                    if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) {
                        echo '<img src="'.$_SESSION['avatar'].'" alt="user" style="width: 100px; height: 100px; border-radius: 100px; border: 3px solid pink;"></img>';
                        echo '<p>Votre login est '.$_SESSION['login'].'</p>';
                        echo 'Votre email est '.$_SESSION['email'].'</p>';
                        echo '<p><button><a href="assets/inc/logout.php">Déconnection</a></button></p>';
                        echo '<p><button><a href="assets/inc/modifyuser.php?id='.$_SESSION['id'].'">Modifier mon compte</a></button></p>';
                    }else{
                ?>
            <h2> Connexion </h2>
            <form action="assets/inc/login.php" method="post">
                <span>Votre login : <input type="text" name="login">
                Votre mot de passé : <input type="password" name="pwd"></span>

                <p><a href="register.php">register ?</a></p>
                <p><input type="submit" value="Connexion"></p>
            </form>
                    <?php
                    }   
                    ?>
        </header>
        <h2>Message</h2>
        <div class="content"  style="overflow-x:scroll; height:300px;">
            <div id="messageAfficher">
            </div>
        </div>
        <?php include("assets/inc/sendmessage.php");?>

        <footer>

        </footer>
    <div class="container">
<script src="assets/js/refresh.js"></script>

</body>
</html>