<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>LoRTool</title>

    <script src="function.js"></script>
  </head>

  <body>
    <h1>LoRTool</h1>

<!--RÉCUPÉRATION DES DONNÉES DEPUIS LA DATABASE-->
    <?php
      include("getData.php"); 
    ?>

<!--SELECTEUR NOMBRE DE JOUEUR·EUSE·S-->
      
    <h2>Nombre de joueur·euse·s</h2>
        <div id="player_number_selector">
          <select name="player_nbr" id="player_nbr" onchange="playerSelector()">
            <?php
              // Boucle pour générer le nombre de joueur·euse·s
              for ($i = $nbr_joueurs_min; $i <= $nbr_joueurs_max; $i++)
              {
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

    <?php
      for ($generatingPlayer = $nbr_joueurs_min +1; $generatingPlayer <= $nbr_joueurs_max; $generatingPlayer++){
        echo '<script>generateNewPlayer('. $generatingPlayer . ')</script>';
      }
    ?>
    
  </body>
</html>