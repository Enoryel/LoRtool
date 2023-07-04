<!doctype html>
<html>
  <?php
    include("meta.php");
    include("header.php");
  ?>

  <div id="players_selector" class="mb-4">
    <?php
      getDatasAndGeneratePlayers();
    ?>
  </div>

  <hr>

  <div id="units_selector" class="my-4">
    <?php
      generateUnitSelector();
    ?>
  </div>
  
    <div id="result" class="d-grid col-6 mx-auto">
    </div>

  <?php
    include("footer.php")
  ?>
</html>