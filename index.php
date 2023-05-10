<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>LoRTool</title>

    <script src="function.js" defer></script>
  </head>

  <body>
    <h1>LoRTool</h1>

<!--RÉCUPÉRATION DES INFOS DEPUIS LA BASE DE DONNÉES-->
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
      $requete = "SELECT valeur FROM setup WHERE option = 'nbr_joueurs_max'";
      $resultat = mysqli_query($conn, $requete);
      $row = mysqli_fetch_row($resultat);
      $nbr_joueurs_max = $row[0];

      //Récupération races
      $requete = "SELECT * FROM races_list";
      $resultat = mysqli_query($conn, $requete);

      $liste_races = [];
      $compteur = 0;
      while ($donnees = mysqli_fetch_array($resultat)) {
        $liste_races[$compteur] = $donnees["NOM"];
        $compteur ++;
      }

      mysqli_close($conn);
    ?>

<!--SELECTEUR NOMBRE DE JOUEUR·EUSE·S-->
      
    <h2>Nombre de joueur·euse·s</h2>
        <div id="player_number_selector">
          <select name="player_nbr" id="player_nbr" onchange="playerSelector()">
            <?php
              //Définition et transfert nbr joueur·euse·s
              $nbr_joueurs_min = 2;
              $nbr_joueurs_max = 8;

              // Boucle pour générer le nombre de joueur·euse·s
              for ($i = $nbr_joueurs_min; $i <= $nbr_joueurs_max; $i++) {
                echo "<option value='" . $i . "'>" . $i . " joueurs</option>";
              }
              ?>
          </select>
        </div>

<!--SELECTEUR RACES DES JOUEUR·EUSE·S-->
<h2>Noms et races jouées</h2>
    <div id="player_chara">

      <div id="player1">
        <input id="player1_name" type="text" value="Joueur 1">
        <select id="player1_race">
          <?php
              foreach($liste_races as $option) {
                echo '<option value="' . $option . '">' . $option . '</option>';
              }
            ?>
        </select>
      </div>

      <div id="player2">
        <input id="player2_name" type="text" value="Joueur 2">
        <select id="player2_race">
          <?php
              foreach($liste_races as $option) {
                echo '<option value="' . $option . '">' . $option . '</option>';
              }
            ?>
        </select>
      </div>

    </div>
    
  </body>
</html>