<!doctype html>
<html>

      <!--RÉCUPÉRATION DES DONNÉES DEPUIS LA DATABASE-->
      <?php
        include("meta.php");

        include("header.php");
        include("getData.php");
      ?>
<?php
      foreach($armiesList as $key => $value){
        echo $key. "<br>";
        if(is_array($value)){
            foreach($value as $key => $value){
                 echo $key." : ".$value."<br>";
            }
        }
        echo "<br>";
    }
?>