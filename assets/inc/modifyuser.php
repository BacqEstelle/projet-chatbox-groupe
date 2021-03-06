<?php
    session_start();
    if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) {
    try
    {
        // On se connecte à MySQL
        include('bdd.php');
        $idSelected = $_SESSION['login'];
        $reponseModify = $bdd->query("SELECT * FROM utilisateur where user='$idSelected'");
        $donnesModify = $reponseModify->fetch();
        $idFinal = $donnesModify['user'];
        ?>
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <link rel="stylesheet" href="../css/normalize.css">
                <link rel="stylesheet" href="../css/style.css">
                <title>ChatBox</title>
            </head>
        <body>
        <div class="integral">
            <form class="changevalue" action="modifyuser.php?id=<?php echo $donnesModify['id']; ?>" method="POST">
                <label>ID:</label>
                <p> <?php echo $donnesModify['id'];?></p>
                <label>Pseudo :</label>
                <p> <?php echo $donnesModify['user']; ?></p>
                <label for="mdp1">Mot de passe :</label> 
                <input type="password" name="mdp1" placeholder="Password" required>
                <label for="mdp2">Retaper le Mot de passe :</label> 
                <input type="password" placeholder="Password" name="mdp2" required>
                <label for="mail">E-mail :</label> 
                <input type="email" name="email" placeholder="Mail" value="<?php echo $donnesModify['email']; ?>" required> 
                <label for="avatar">Avatar:</label> 
                <input type="url" name="avatar" placeholder="Url" value="<?php echo $donnesModify['avatar']; ?>" required> 
                <label for="statut">Statut:</label> 
                <select id="statut" name="statut">
                    <option value="<?php echo $donnesModify['statut'];?>"><?php echo $donnesModify['statut'];?></option>
                    <option value="En ligne">En ligne</option>
                    <option value="Absent">Absent</option>
                    <option value="Ne pas déranger">Ne pas déranger</option>
                </select>
                    <label>Grade:</label> <p><?php echo $donnesModify['grade'];?></p>
                    <button type="submit" name="changevalue" value="changeValueUser">Modifier mon profil</button>
            </form>
        <?php
            if ( $_SERVER["REQUEST_METHOD"] == "POST" AND isset($_POST["changevalue"]) ) {

                    $id = $donnesModify['id'];
                    $user = $donnesModify['user'];
                    $mdp1Brut= $_POST['mdp1'];
                    $mdp1= filter_var($mdp1Brut, FILTER_SANITIZE_STRING);
                    $mdp2Brut= $_POST['mdp2'];
                    $mdp2= filter_var($mdp2Brut, FILTER_SANITIZE_STRING);
                    $emailBrut= $_POST['email'];
                    $email= filter_var($emailBrut, FILTER_SANITIZE_STRING);
                    $avatarBrut= $_POST['avatar'];
                    $avatar = filter_var($avatarBrut, FILTER_SANITIZE_STRING);
                    $statutBrut = $_POST['statut'];
                    $statut = filter_var($statutBrut, FILTER_SANITIZE_STRING);
                    $grade = $donnesModify['grade'];
                    if (empty($_POST["mdp1"])) { 
                        echo "<p>* Veuillez entrer un mot de passe.</p>";
                    }
                    if (empty($_POST["mdp2"])) { 
                        echo "<p>* Veuillez entrer un mot de passe.</p>";
                    }
                    if ($_POST["mdp2"] != $_POST["mdp1"]){
                        echo "<p>* Veuillez indiquer le même mot de passe.</p>";
                    }
                    if (empty($_POST["email"])) { 
                        echo "<p>* Veuillez entrer un e-mail valide.</p>";
                    }
                    if (empty($_POST["avatar"])) { 
                        echo "<p>* Veuillez indiquer l'url de votre avatar.</p>";
                    }
                    else {
                        // set the PDO error mode to exception
                        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $mdphash = sha1($mdp1);
                    
                        $sql = "UPDATE utilisateur SET user='$user', email='$email', psw='$mdphash', avatar='$avatar', statut='$statut', grade='$grade'  WHERE user='$user'";
                    
                        // Prepare statement
                        $stmt = $bdd->prepare($sql);
                    
                        // execute the query
                        $stmt->execute();
                    
                        // echo a message to say the UPDATE succeeded
                        $_SESSION['statut'] = $statut;
                        $_SESSION['email'] = $email;
                        echo "<script>alert('Modification effectuée')</script>";
                        header ('location: ../../index.php');
                    }
                    }
    }
    catch(Exception $e)
    {
        // En cas d'erreur
            die('Erreur : '.$e->getMessage());
    }
}else{
    echo "Vous devez être connecté pour avoir accès a cette page";
}
?>
    </div>
</body>