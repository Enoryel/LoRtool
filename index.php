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
        

      
          <div class="container mb-5">
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

      <!--SELECTEUR INFOS JOUEUR·EUSE·S-->

          <div class="container mb-3" id="player1">
          <p class="h2">Noms et armées jouées</p>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Joueur 1</span>
              </div>
              <input type="text" class="form-control" name="player_name1"  value="Nom">
            </div>

            <select name="player_army1" class="form-select">
              <?php
                getArmies();
              ?>
            </select>

          </div>
          
          <div class="container p-3 mb-3" id="player2">

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Joueur 2</span>
              </div>
              <input type="text" class="form-control" name="player_name2"  value="Nom">
            </div>

            <select name="player_army2" class="form-select">
              <?php
                getArmies();
              ?>
            </select>
          </div>
  
        <div class="d-grid col-4 mx-auto">
          <input type="submit" id="submit_button" value="Confirmer" class="btn btn-outline-dark mt-3">
        </div>
    
    
<?php
  include("footer.php")
?>
</html>