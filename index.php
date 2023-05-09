<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>LoRTool</title>

    <script src="function.js" defer></script>
  </head>

  <body>
    <h1>LoRTool</h1>
<!--RÉCUPÉRATION DES RACES DEPUIS LA BASE DE DONNÉES-->
    <?php
      $ser="localhost:3306";
      $user="root";
      $pass="";
      $db="test";
      $conn = mysqli_connect($ser ,$user ,$pass ,$db) or die("Connection Failed");

      $conn->query("SET NAMES 'utf8'"); 
      $conn->query("SET CHARACTER SET utf8");  
      $conn->query("SET SESSION collation_connection = 'utf8_unicode_ci'");

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
          // Boucle pour générer le nombre de joueur·euse·s

          $nbr_joueur_min = 2;
          $nbr_joueur_max = 8;
          for ($i = $nbr_joueur_min; $i <= $nbr_joueur_max; $i++) {
            echo "<option value='" . $i . "'>" . $i . "</option>";
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