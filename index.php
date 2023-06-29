<!doctype html>
<html>

      <!--RÉCUPÉRATION DES DONNÉES DEPUIS LA DATABASE-->
      <?php
        include("meta.php");
        include("header.php");
      ?>

      <!--SELECTEUR NOMBRE DE JOUEUR·EUSE·S-->
      <form action="home.php" id ="playersForm" method="post">
      <!-- <form action="https://show.ratufa.io/" id ="playersForm" method="post"> -->
        

      <h2>Nombre de joueur·euse·s</h2>
          <div id="player_number_selector">
            <select name="player_nbr" id="player_nbr" class="form-select" onchange="playerNbrSelector()">
              <?php
                // Boucle pour générer le nombre de joueur·euse·s
                $nbr_joueurs_max = getMaxPlayers();
                for ($i = 2; $i <= $nbr_joueurs_max; $i++)
                {
                  echo "<option value='" . $i . "'>" . $i . " joueur·euse·s</option>";
                }
                ?>
            </select>
          </div>

      <!--SELECTEUR INFOS JOUEUR·EUSE·S-->


        <h2>Noms et armées jouées</h2>

              <div id="player1" class="input-group">
                <input type="text" class="form-control" name="player_name1"  value="Joueur 1">
                <select name="player_army1" class="form-select">
                  <?php
                    getArmies();
                  ?>
                </select>
              </div>

              <div id="player2" class="input-group">
                <input type="text" class="form-control" name="player_name2"  value="Joueur 2">
                <select name="player_army2" class="form-select">
                  <?php
                    getArmies();
                  ?>
                </select>
              </div>

              <!-- <div id="player2">
                <input name="player_name2" type="text" value="Joueur 2">
                <select name  ="player_army2">
                    <?php
                      getArmies();
                    ?>
                </select>
              </div> -->
  
        <div class="d-grid col-4 mx-auto">
          <input type="submit" id="submit_button" value="Confirmer" class="btn btn-outline-dark mt-3">
        </div>
    
    
<?php
  include("footer.php")
?>
</html>