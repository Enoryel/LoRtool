<!doctype html>
<html>
  <?php
        include("meta.php");

        include("header.php");
        include("getData.php");

        include("getFormData.php");
  ?>

<!-- <button class='player_selector' id=test onclick='playerIsSelected("test")'>test</button> -->
  
  <?php
    foreach($players_datas as $key => $value){
      echo "<button class='player_selector' id={$key} onclick='playerIsSelected('{$key}')'>'{$key}'</button>";
    }
  ?>

  </body>
</html>