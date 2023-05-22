<html>
  <head>
    <meta charset="UTF-8">
    <title>LOR Helper</title>

    <link rel="stylesheet" href="">
  </head>

  <body>
    <h1>LoRTool</h1>

      <input type="button" onclick="displayPlayers()" value="debug players">

      <select class='fighter' id='fighter1'>
        <?php
          echo '<script>generatePlayersEntries()</script>'
        ?>

      <select class='fighter' id='fighter2'>
        <?php
          echo '<script>generatePlayersEntries()</script>'
        ?>

  </body>
</html>