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
        <fieldset>
                <form class="changevalue" action="modifyuser.php?id=<?php echo $donnesModify['id']; ?>" method="POST">
                    <p>ID: <?php echo $donnesModify['id'];?></p>
                    <p>Pseudo : <?php echo $donnesModify['user']; ?></p>
                    <p>Mot de passe : <input type="password" name="mdp1" required></p>
                    <p>Retaper le Mot de passe : <input type="password" name="mdp2" required></p>
                    <p>E-mail : <input type="email" name="email" value="<?php echo $donnesModify['email']; ?>" required> </p>
                    <p>Avatar: <input type="url" name="avatar" value="<?php echo $donnesModify['avatar']; ?>" required> </p>
                    <p>Statut: 
                                <select id="statut" name="statut">
                                    <option value="<?php echo $donnesModify['statut'];?>"><?php echo $donnesModify['statut'];?></option>
                                    <option value="En ligne">En ligne</option>
                                    <option value="Absent">Absent</option>
                                    <option value="Ne pas déranger">Ne pas déranger</option>
                                </select>
                    </p>
                    <button type="submit" name="changevalue" value="changeValueUser">Modifier mon profil</button>
                </form>
        </fieldset>
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
                    
                        $sql = "UPDATE utilisateur SET user='$user', email='$email', psw='$mdphash', avatar='$avatar', statut='$statut'  WHERE user='$user'";
                    
                        // Prepare statement
                        $stmt = $bdd->prepare($sql);
                    
                        // execute the query
                        $stmt->execute();
                    
                        // echo a message to say the UPDATE succeeded
                        $_SESSION['statut'] = $statut;
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