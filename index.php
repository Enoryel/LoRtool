<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>LOR Helper</title>

    <script src="function.js" defer></script>
  </head>

  <body>


<!--NOMBRE DE JOUEUR·EUSE·S-->
<select name="player_nbr" id="player_nbr" onchange="playerSelector()">
<?php
  // Boucle pour générer le nombre de joueur·euse·s

  $nbr_joueur_min = 2;
  $nbr_joueur_max = 10;
  for ($i = $nbr_joueur_min; $i <= $nbr_joueur_max; $i++) {
    echo "<option value='" . $i . "'>" . $i . "</option>";
  }
  ?>

<!--RÉCUPÉRATION DEPUIS LA BASE DE DONNÉES-->
    <?php
    $ser="localhost:3306";
    $user="root";
    $pass="";
    $db="test";
    $conn = mysqli_connect($ser ,$user ,$pass ,$db) or die("Connection Failed");

    $conn->query("SET NAMES 'utf8'"); 
    $conn->query("SET CHARACTER SET utf8");  
    $conn->query("SET SESSION collation_connection = 'utf8_unicode_ci'");

    $resultat = mysqli_query($conn, "SELECT 'NOM' FROM races");

    $liste_races = [];
    $compteur = 0;
    while ($donnees = mysqli_fetch_array($resultat)) {
      $liste_races[$compteur] = $donnees['NOM'] . ' ' . $donnees['PRENOM'];
      $compteur ++;
    }

    mysqli_close($conn);
    ?>

<!--GÉNÉRATION DU MENU DÉROULANT
    <select name="mySelect1" id="mySelect1" onchange="player_selector()">
    <?php
      foreach($liste_races as $option) {
        echo '<option value="' . $option . '">' . $option . '</option>';
      }
    ?>
    </select>-->




      
  </body>
</html>