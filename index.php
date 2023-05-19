<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>LoRTool</title>

    <script src="function.js"></script>
  </head>

  <body>
    <h1>LoRTool</h1>

    <!--DÉBUT DE LA PAGE 1 (SÉLECTIONS JOUEUR·EUSE·S--/armee)-->
    <div id="page1" style="display:block">

      <!--RÉCUPÉRATION DES DONNÉES DEPUIS LA DATABASE-->
      <?php
        include("getData.php"); 
      ?>

      <!--SELECTEUR NOMBRE DE JOUEUR·EUSE·S-->  
      <h2>Nombre de joueur·euse·s</h2>
          <div id="player_number_selector">
            <select id="player_nbr" onchange="playerSelector()">
              <?php
                // Boucle pour générer le nombre de joueur·euse·s
                for ($i = $nbr_joueurs_min; $i <= $nbr_joueurs_max; $i++)
                {
                  echo "<option value='" . $i . "'>" . $i . " joueurs</option>";
                }
                ?>
            </select>
          </div>

      <!--SELECTEUR INFOS JOUEUR·EUSE·S-->

      <form id ="playersForm" onsubmit="playersForm_submit();return false">

        <h2>Noms et armées jouées</h2>

              <div id="player0">
                <input name="player_name" type="text" value="Joueur 1">
                <select name="player_army">
                  <?php
                      foreach($armiesList as $option) {
                        echo '<option value="' . $option . '">' . $option . '</option>';
                      }
                    ?>
                </select>
              </div>

              <div id="player1">
                <input name="player_name" type="text" value="Joueur 2">
                <select name  ="player_army">
                  <?php
                      foreach($armiesList as $option) {
                        echo '<option value="' . $option . '">' . $option . '</option>';
                      }
                    ?>
                </select>
              </div>

        <input type="submit" id="submit_button" value="Confirmer">

      </form>
    
    
    </div>
    <!--FIN DE LA PAGE 1-->

    <!--DÉBUT DE LA PAGE 2 (MAIN PAGE)-->
    <div id="page2" style="display:none">

      <input type="button" onclick="displayPlayers()" value="Afficher joueurs">

    </div>
    
  </body>
</html>