<?php

    $param1 = "'Christophe'";
    //$param2 = $_POST['param2'];

    $ser="localhost:3306";
    $user="root";
    $pass="";
    $db="test";
    $conn = mysqli_connect($ser ,$user ,$pass ,$db) or die("Connection Failed");

    $conn->query("SET NAMES 'utf8'"); 
    $conn->query("SET CHARACTER SET utf8");  
    $conn->query("SET SESSION collation_connection = 'utf8_unicode_ci'");

    $requete = "SELECT AGE FROM utilisateurs WHERE PRENOM = $param1";
    $resultat = mysqli_query($conn, "SELECT * FROM utilisateurs WHERE PRENOM = $param1");
    
    $donnees = mysqli_fetch_column($resultat, 3);
    echo $donnees . '<br />';
    

    

// Fermer la connexion à la base de données
mysqli_close($conn);

// Renvoyer les données sous forme de réponse JSON
echo json_encode($data);
?>
