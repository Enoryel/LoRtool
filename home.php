<!doctype html>
<html>
  <?php
    include("meta.php");
    include("header.php");
  ?>


    <div class="mb-4" id="player_selection">
        <h2>Antagonistes</h2>

        <?php
          getFormDatas();
        ?>
    </div>
  
    <!-- <div id="result" class="d-grid col-6 mx-auto">
      <p>?</p>
    </div> -->

  <?php
    include("footer.php")
  ?>
</html>