<html>
  <head>
    <meta charset="UTF-8">
    <title>LOR Helper</title>

    <link rel="stylesheet" href="">
  </head>

  <body>
<!--RÉCUPÉRATION DEPUIS LA BASE DE DONNÉES-->
    <?php
    $ser="localhost:3306";
    $user="root";
    $pass="";
    $db="test";
    $conn = mysqli_connect($ser ,$user ,$pass ,$db) or die("Connection Failed");

    $conn->query("SET NAMES 'utf8'"); 
    $conn->query("SET CHARACTER SET utf8");  
    $conn->query("SET SESSION collation_connection = 'utf8_unicode_ci'");

    $resultat = mysqli_query($conn, "SELECT * FROM utilisateurs");

    $options_tableau = [];
    $compteur = 0;
    while ($donnees = mysqli_fetch_array($resultat)) {
      $options_tableau[$compteur] = $donnees['NOM'] . ' ' . $donnees['PRENOM'];
      $compteur ++;
    }

    mysqli_close($conn);
    ?>

<!--GÉNÉRATION DU MENU DÉROULANT-->
    <select name="mySelect1" id="mySelect1">
    <?php
      foreach($options_tableau as $option) {
        echo '<option value="' . $option . '">' . $option . '</option>';
      }
    ?>
    </select>

    <select name="mySelect2" id="mySelect2">
    <?php
      foreach($options_tableau as $option) {
        echo '<option value="' . $option . '">' . $option . '</option>';
      }
    ?>
    </select>

    <button id="myButton">Appeler la fonction PHP</button>
      <script>
        document.getElementById("myButton").addEventListener("click", function() {
          var xhr = new XMLHttpRequest();
          xhr.open('POST', 'script.php', true);
          xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
          xhr.onload = function () {
            console.log(this.responseText);
          };
        xhr.send('param1=valeur1&param2=valeur2');
      </script>


      
  </body>
</html>