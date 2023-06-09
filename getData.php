<?php
      //Configuration accès database
      $ser="localhost:3306";
      $user="root";
      $pass="";
      $db="test";
      $conn = mysqli_connect($ser ,$user ,$pass ,$db) or die("Connection Failed");

      $conn->query("SET NAMES 'utf8'"); 
      $conn->query("SET CHARACTER SET utf8");  
      $conn->query("SET SESSION collation_connection = 'utf8_unicode_ci'");

      //Récupération nombre de joueurs min
      $requete = "SELECT valeur FROM setup WHERE option = 'nbr_joueurs_min'";
      $resultat = mysqli_query($conn, $requete);
      $row = mysqli_fetch_row($resultat);
      $nbr_joueurs_min = $row[0];

      //Récupération nombre de joueurs max
      $requete = "SELECT DISTINCT valeur FROM setup WHERE option = 'nbr_joueurs_max'";
      $resultat = mysqli_query($conn, $requete);
      $row = mysqli_fetch_row($resultat);
      $nbr_joueurs_max = $row[0];

      //Récupération races
      $requete = "SELECT DISTINCT ARMEE FROM units_data";
      $resultat = mysqli_query($conn, $requete);

      $armiesList = [];
      $compteur = 0;
      while ($donnees = mysqli_fetch_array($resultat)) {
        $armiesList[$compteur] = $donnees["ARMEE"];
        $compteur ++; 
      }

      //Récupération unités par races

      $requete = "SELECT NOM FROM units_data WHERE ARMEE = 'Les Royaumes Déchus'" ;
      $resultat = mysqli_query($conn, $requete);

      foreach($armiesList as $army) {
        while ($donnees = mysqli_fetch_array($resultat)) {
          $armiesList = [
            [$donnees["NOM"]]
          ];
        }
        
      }
    
        

      mysqli_close($conn);
    ?>