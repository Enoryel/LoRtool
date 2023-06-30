<!doctype html>
<html>


      <!----------------------- RÉCUPÉRATION DES DONNÉES DEPUIS LA DATABASE ----------------------->
      <?php
        include("meta.php");
        include("header.php");
      ?>

      <!--------------------------------------- FORMULAIRE --------------------------------------->
      <form action="home.php" id ="playersForm" method="post">
      <!-- <form action="https://show.ratufa.io/" id ="playersForm" method="post"> -->
        
        <!--Sélecteur nombre joueur·euse·s-->
        <div class="container mb-4">
        <p class="h2">Nombre de joueur·euse·s</p>

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

        <!--Sélecteur infos joueur·euse·s-->
        <div class="container mb-4" id="player_entries">
          <p class="h2">Noms et armées jouées</p>

          <div class="mb-3" id="player1">

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Joueur 1</span>
              </div>
              <input type="text" class="form-control" name="player1_name"  value="Joueur 1">
            </div>
            <select name="player1_army" class="form-select">
              <?php
                getArmies();
              ?>
            </select>

          </div>
          
          <div class="mb-3" id="player2">

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Joueur 2</span>
              </div>
              <input type="text" class="form-control" name="player2_name"  value="Joueur 2">
            </div>
            <select name="player2_army" class="form-select">
              <?php
                getArmies();
              ?>
            </select>
          </div>

        </div>

        <div id="submit_button" class="d-grid col-3 mx-auto">
          <input type="submit" value="Commencer" class="btn btn-outline-dark">
        </div>

      </form>
    
    
<?php
  include("footer.php")
?>
</html>