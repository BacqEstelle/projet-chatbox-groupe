<!DOCTYPE html>
<html lang="en">
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
        <h2>Utilisateur en ligne</h2>
<div class="userOnline" id="useronline"></div>
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
        <div class="content-chat">
            <section id="user">
            <div class="user-name">
                <img src="assets/img/index.png" alt="photo">
                <p>Bouh</p>
            </div>
            <div class="user-name">
                <img src="assets/img/index.png" alt="photo">
                <p>Bouh</p>
            </div>
            </section>
            <section id="chatbox">
                <div class="text">

                    <div class="text-left">
                        
                            <img src="assets/img/index.png">
                            <div class="background-chat"><p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga molestiae optio corrupti? Nulla quisquam facere velit blanditiis, omnis ipsum neque soluta sunt possimus magni expedita? Consectetur unde labore adipisci accusantium. Lorem ipsum, dolor sit amet consectetur adipisicing</p></div>
                        
                    </div>

                    <div class="text-right">

                            
                            <div class="background-chat"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio sequi qui perspiciatis aperiam rerum esse sunt consequatur corporis odit at recusandae dolor aut, necessitatibus, id ex? Ratione labore facilis ad! Lorem ipsum, dolor sit amet consectetur adipisicing</p></div>
                            <img src="assets/img/index.png">
                    
                    </div>
                    <div class="text-left">
                        
                        <img src="assets/img/index.png">
                        <div class="background-chat"><p>Lorem ipsum, dolor sit amet consectetur adipisicing</p></div>
                    
                </div>

                <div class="text-right">

                            
                    <div class="background-chat"><p>Lorem facilis ad! Lorem ipsum, dolor sit amet consectetur adipisicing</p></div>
                    <img src="assets/img/index.png">
            
            </div>

                </div>
                <div class="textarea">

                <textarea placeholder="Enter your text"></textarea>
                <a href="#"><img src="assets/img/icone.png"></a>
                </div>
                
            </section>
        </div>
    </div>
</body>
</html>