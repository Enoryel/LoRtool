<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>LoRTool</title>

    <script src="function.js"></script>
    <link rel="stylesheet" href="fontes\fontes.css">
    <link rel="stylesheet" href="stylesheet.css">
  </head>

    <?php
      include("header.php");
      include("getFormData.php");

        switch($player_nbr){
          case 2:
            break;
          case 3:
            break;
          case 4:
            break;
        }
    ?>

    

    <select name="player_army1">
      <?php
      foreach($players_datas as $key => $value) {
        echo '<option value="' . $key . '">' . $key . '</option>';
      }
      ?>
    </select>

  </body>
</html>