<?php
    // Function Reset
session_start();
    if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) {
        try
        {
                // On se connecte à MySQL
        include('bdd.php');
        $idSelected = $_GET["id"];
        $reponseModify = $bdd->query("SELECT * FROM message where id='$idSelected'");
        $donnesModify = $reponseModify->fetch();
        $idFinal = $donnesModify['id']; 
                        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $sql = "DELETE FROM message WHERE id='$idFinal'";
                
                        // Prepare statement
                        $stmt = $bdd->prepare($sql);
                
                        // execute the query
                        $stmt->execute();
                
                        // echo a message to say the UPDATE succeeded
                        echo "<script>alert('Suppression effectuée')</script>";
                        header('Location: ../../index.php');
        }

        catch(Exception $e)
        {
                // En cas d'erreur
                die('Erreur : '.$e->getMessage());
        }
}else{
        echo "Vous devez être connecté pour avoir accès a cette page";
}