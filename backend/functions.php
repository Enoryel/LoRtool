<?php
$players_datas = array();
$player_nbr;
function accessDB() {
  //Configuration accès database
  $ser="localhost:3306";
  $user="root";
  $pass="";
  $db="test";
  $conn = mysqli_connect($ser ,$user ,$pass ,$db) or die("Connection Failed");

  $conn->query("SET NAMES 'utf8'"); 
  $conn->query("SET CHARACTER SET utf8");  
  $conn->query("SET SESSION collation_connection = 'utf8_unicode_ci'");

  return $conn;
};

function getMinPlayers() {
  $conn = accessDB();

  //Récupération nombre de joueurs min
  $requete = "SELECT valeur FROM setup WHERE option = 'nbr_joueurs_min'";
  $resultat = mysqli_query($conn, $requete);
  $row = mysqli_fetch_row($resultat);
  $nbr_joueurs_min = $row[0];

  mysqli_close($conn);

  return $nbr_joueurs_min;
}

function getMaxPlayers() {
  $conn = accessDB();

  //Récupération nombre de joueurs max
  $requete = "SELECT DISTINCT valeur FROM setup WHERE option = 'nbr_joueurs_max'";
  $resultat = mysqli_query($conn, $requete);
  $row = mysqli_fetch_row($resultat);
  $nbr_joueurs_max = $row[0];

  mysqli_close($conn);

  return $nbr_joueurs_max;
}

function getArmies() {  
  $conn = accessDB();

  //Récupération armées
  $requete = "SELECT DISTINCT ARMEE FROM units_data";
  $resultat = mysqli_query($conn, $requete);

  $armiesList = [];
  $compteur = 0;
  while ($donnees = mysqli_fetch_array($resultat)) {
    $armiesList[$compteur] = $donnees["ARMEE"];
    $compteur ++; 
  }
    
  mysqli_close($conn);

  foreach($armiesList as $option) {
    echo '<option value="' . $option . '">' . $option . '</option>';
  };
}

function getData() {
  global $players_datas, $player_nbr;
  
  //Stockage données du formulaire index.php
  $player_nbr = $_POST['player_nbr'];
  for ($compteur_joueurs = 1; $compteur_joueurs <= $player_nbr; $compteur_joueurs++) { 
      $player_name = $_POST["player{$compteur_joueurs}_name"];
      $player_army = $_POST["player{$compteur_joueurs}_army"];
      $players_datas[$player_name] = $player_army;
  };

  //Récupération des unités BDD SQL
}

function generatePlayerSelector() {
  global $players_datas, $player_nbr;
  switch ($player_nbr){
    case 2:
      echo "<div id='players_buttons'>";
      foreach($players_datas as $player => $army){
        echo "<button type='button' class='btn btn-outline-dark mx-3' autocomplete='off' id='{$player}' onclick='playerIsSelected(\"{$player}\")'>{$player}</button>";
      }
      echo "</div>";
      break;
    case 3:
      echo "<div id='players_buttons'>";
      break;
    case 4:
      break;
  } 
}



  //Players buttons
  
function generateUnitSelector() {
  global $players_datas, $player_nbr;
  //Armies selector
  echo "<div id='armies_selector'>";
  foreach($players_datas as $player => $army){
    echo "<select class='unit_selector' id='{$player}_units' onchange=\"unitSelector('{$player}')\">";
    getUnitsList($army);
    echo "</select>";
  }
  echo "</div>";
}

function getUnitsList($army) {
  $conn = accessDB();

  //Récupération units
  $requete = "SELECT * FROM units_data WHERE ARMEE = ?";
  $statement = mysqli_prepare($conn, $requete);
  mysqli_stmt_bind_param($statement, 's', $army);
  mysqli_stmt_execute($statement);
  $resultat = mysqli_stmt_get_result($statement);

  $unitsList = [];
  $compteur = 0;
  while ($donnees = mysqli_fetch_array($resultat)) {
    $unitsList[$donnees['NOM']] = $donnees['COMBAT'];
    $compteur ++; 
  }

  foreach($unitsList as $unit => $combat) {
    echo '<option value="' . $unit . '">' . $unit . '</option>';
    echo "<script>getUnitsStats(\"{$unit}\",\"{$combat}\")</script>";
  }

}

?>

