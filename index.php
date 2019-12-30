<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <header>
        <?php
        if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) {
            echo '<body>';
            echo '<img src="'.$_SESSION['avatar'].'" alt="user" style="width: 100px; height: 100px; border-radius: 100px; border: 3px solid pink;"></img>';
            echo '<p>Votre login est '.$_SESSION['login'].'</p>';
            echo 'Votre email est '.$_SESSION['email'].'</p>';
            echo '<a href="logout.php">Déconnection</a>';
        }else{
        ?>
        <h2> Connexion </h2>
        <form action="login.php" method="post">
        <span>Votre login : <input type="text" name="login">
        Votre mot de passé : <input type="password" name="pwd"></span>

        <p><a href="register.php">register ?</a></p>
        <p><input type="submit" value="Connexion"></p>
        </form>
        <?php
        }
        ?>
    <header>


    <h2>Message</h2>
    <?php include ("message.php")?>


    <footer>

    </footer>
</body>
</html>