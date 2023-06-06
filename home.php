<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>LoRTool</title>

    <script src="function.js"></script>
  </head>

  <body>
    <h1>LoRTool</h1>

    <?php
        include("getFormData.php"); 
    ?>

      <input type="button" onclick="displayPlayers()" value="debug players">

      <!-- <select class='fighter' id='fighter1'>
        <?php
          echo '<script>generatePlayersEntries()</script>'
        ?>

      <select class='fighter' id='fighter2'>
        <?php
          echo '<script>generatePlayersEntries()</script>'
      ?> -->

  </body>
</html>